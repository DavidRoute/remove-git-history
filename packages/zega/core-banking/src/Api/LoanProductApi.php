<?php

namespace Zega\CoreBanking\Api;

use Illuminate\Support\Facades\Http;

class LoanProductApi
{
	public function create() 
	{
		$response = Http::coreBanking()->post('/'.config('corebanking.loan_product.endpoint'), [
			"locale" => "en",
			"dateFormat" => "dd MMMM yyyy",
			"name" => "Aye Say Pay",
			"shortName" => "ASP",
			"currencyCode" => "MMK",
			"digitsAfterDecimal" => 0,
			"installmentAmountInMultiplesOf" => 1,
			"numberOfRepayments" => 6,
			"repaymentEvery" => 1,
			"repaymentFrequencyType" => 2,
			"interestType" => 1,
			"amortizationType" => 1,
			"interestCalculationPeriodType" => 1,
			"daysInYearType" => 1,
			"daysInMonthType" => 1,
			"transactionProcessingStrategyId" => 1
		]);

		return $response;
	}
}