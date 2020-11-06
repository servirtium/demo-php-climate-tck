<?php declare (strict_types=1);

use PHPUnit\Framework\TestCase;
use ClimateApi\ClimateApi as ClimateApi;
use ClimateApi\Exceptions\BadCountryCodeException;
use ClimateApi\Exceptions\DateRangeNotSupportedException;

class ClimateApiTest extends TestCase {

	public function testAverageRainfallForGreatBritainFrom1980to1999Exists(){
		$climateApi = new ClimateApi();

		$result = $climateApi->getAveAnnualRainfall(1980, 1999, "gbr");
		$this->assertEquals($result, 988.8454972331015);
	}

	public function testAverageRainfallForFranceFrom1980to1999Exists(){
		$climateApi = new ClimateApi();

		$result = $climateApi->getAveAnnualRainfall(1980, 1999, "fra");
		$this->assertEquals($result, 913.7986955122727);
	}

	public function testAverageRainfallForEgyptFrom1980to1999Exists(){
		$climateApi = new ClimateApi();

		$result = $climateApi->getAveAnnualRainfall(1980, 1999, "egy");
		$this->assertEquals($result, 54.58587712129825);
	}

	public function testAverageRainfallForGreatBritainFrom1985to1995DoesNotExist(){
		$climateApi = new ClimateApi();

		$this->expectException(DateRangeNotSupportedException::class);
		$result = $climateApi->getAveAnnualRainfall(1985, 1995, "gbr");

		$this->assertEquals($result, 0);
	}

	public function testAverageRainfallForMiddleEarthFrom1980to1999DoesNotExist(){
		$climateApi = new ClimateApi();

		$this->expectException(BadCountryCodeException::class);
		$result = $climateApi->getAveAnnualRainfall(1980, 1999, "mde");

		$this->assertEquals($result, 0);
	}
}

?>