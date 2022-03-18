<?php

if (! function_exists('generate_random_string')) {
    /**
     *
     * @return string
     */
    function generate_random_string($length = 4, $add_dashes = false, $available_sets = 'd')
    {
        $sets = [];
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '3216459870';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if(!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }
    
}

if (! function_exists('parse_date_format')) {
    /**
     *
     * @return string
     */
    function parse_date_format($date)
    {
        return \Carbon\Carbon::parse($date)->format(
            config('corebanking.carbon_date_format')
        );
    }
}

if (! function_exists('formatted_current_date')) {
    /**
     *
     * @return string
     */
    function formatted_current_date()
    {
        return now()->format(
            config('corebanking.carbon_date_format')
        );
    }
}