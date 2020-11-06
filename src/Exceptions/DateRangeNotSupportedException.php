<?php declare(strict_types=1);

namespace ClimateApi\Exceptions;

class DateRangeNotSupportedException extends \Exception {
	public function errorMessage(){
		return "Date range not supported";
	}
}