<?php declare(strict_types=1);

namespace ClimateApi\Exceptions;

class BadCountryCodeException extends \Exception {
	public function errorMessage(){
		return "Bad country code";
	}
}