<?php

namespace Zega\CoreBanking\Api;

use Illuminate\Support\Facades\Http;

class ClientApi
{
	public function list() 
	{
		$response = Http::coreBanking()->get('/clients');

		return $response;	
	}

	public function create(
		string $firstname,
		string $lastname,
		int $genderId,
		string $dateOfBirth,
		string $mobileNo,
		string $emailAddress		
	) {
		$officeId = config('corebanking.office.id');
		$locale = config('corebanking.locale');
		$dateFormat = config('corebanking.date_format');
		$externalId = generate_random_string(8, false, 'ud');
		$dateOfBirth = parse_date_format($dateOfBirth);

		$response = Http::coreBanking()->post('/clients', [
			"officeId" => $officeId,
			"firstname" => $firstname,
			"lastname" => $lastname,
			"locale" => $locale,
			"dateFormat" => $dateFormat,
			"active" => false,
			"activationDate" => null,
			"externalId" => $externalId,
			"genderId" => $genderId,
			"dateOfBirth" => $dateOfBirth,
			"mobileNo" => $mobileNo,
			"mobileNoSecondary" => null,
			"emailAddress" => $emailAddress,
		  	"submittedOnDate" => formatted_current_date()
		]);

		return $response;
	}

	public function find(int $id) 
	{
		$response = Http::coreBanking()->get("/clients/{$id}");

		return $response;	
	}
}