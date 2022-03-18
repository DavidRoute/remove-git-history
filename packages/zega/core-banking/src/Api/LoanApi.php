<?php

namespace Zega\CoreBanking\Api;

use Illuminate\Support\Facades\Http;

class LoanApi
{
	public function list() 
	{
		$response = Http::coreBanking()->get('/loans');

		return $response;
	}

	public function create(
		int $clientId,
		int $productId,
		float $loanAmount,
		int $loanTermFrequency,
		int $loanTermFrequencyType,
		int $numberOfRepayments,
		int $repaymentEvery,
		int $repaymentFrequencyType,
		float $interestRatePerPeriod,
		int $interestType,
		int $interestCalculationPeriodType,
		int $amortizationType,
		string $expectedDisbursementDate
	) {
		$locale = config('corebanking.locale');
		$dateFormat = config('corebanking.date_format');
		$expectedDisbursementDate = parse_date_format($expectedDisbursementDate);

		$response = Http::coreBanking()->post('/loans', [
			"locale" => $locale,
			"dateFormat" => $dateFormat,
			"clientId" => $clientId,
			"productId" => $productId,
			"principal" => $loanAmount,
			"loanType" => "individual",
			"loanTermFrequency" => $loanTermFrequency,
			"loanTermFrequencyType" => $loanTermFrequencyType,
			"numberOfRepayments" => $numberOfRepayments,
			"repaymentEvery" => $repaymentEvery,
			"repaymentFrequencyType" => $repaymentFrequencyType,
			"interestRatePerPeriod" => $interestRatePerPeriod,
			"interestType" => $interestType,
			"interestCalculationPeriodType" => $interestCalculationPeriodType,
			"amortizationType" => $amortizationType,
			"transactionProcessingStrategyId" => 1,
			"expectedDisbursementDate" => $expectedDisbursementDate,
			"submittedOnDate" => formatted_current_date(),
		]);

		return $response;
	}

	public function find($id) 
	{
		$response = Http::coreBanking()->get("/loans/{$id}");

		return $response;
	}
}