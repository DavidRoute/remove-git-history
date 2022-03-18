<?php

namespace Zega\CoreBanking\Facades;

use Illuminate\Support\Facades\Facade;

class Loan extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'loan-api';
    }
}