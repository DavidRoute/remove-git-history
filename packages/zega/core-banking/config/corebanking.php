<?php

return [
	
	'base_url' => env('CORE_BANKING_URL', 'https://dev.irl.musoniservices.com:8443/api/v1'),

	/**
	 * Bacis authentication
	 */
	'username' => env('CORE_BANKING_USERNAME'),
	'password' => env('CORE_BANKING_PASSWORD'),

	/**
	 * Header keys
	 */
	'tenant_id' => env('CORE_BANKING_X_TENANT_ID', 'test'),
	'api_key' => env('CORE_BANKING_X_API_KEY', 'test'),

	'locale' => 'en',
	'date_format' => 'dd MMMM yyyy',
	'carbon_date_format' => 'd F Y',

	'gender_id' => [
		'male' => 218,
		'female' => 219,
	],

	'frequency_type' => [
		'Days' => 0, 
		'Weeks' => 1,
		'Months' => 2,
		'Years' => 3,
	],

	'office' => [
		'id' => 1,
	],

	'loan_product' => [
		'endpoint' => 'loanproducts',
	], 

	'loan' => [
		'endpoint' => 'loans',
		'interest_type' => [
			'0' => 'Declining Balance',
			'1' => 'Flat'
		],
		'interest_calculation_period_type' => [
			'0' => 'Daily', 
			'1' => 'Same as repayment period'
		],
		'amortization_type' => [
			'0' => 'Equal principle payments', 
			'1' => 'Equal installments'
		],
		'transaction_processing_strategy_id' => [
			1 => 'Stanard (Penalties, Fees, Interest, Principal order)',
			5 => 'Principal, Interest, Penalties, Fees Order',
			6 => 'Interest, Principal, Penalties, Fees Order',
		],
	],
];