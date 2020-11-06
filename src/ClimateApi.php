<?php declare (strict_types=1);

namespace ClimateApi;

use ClimateApi\Exceptions\BadCountryCodeException;
use ClimateApi\Exceptions\DateRangeNotSupportedException;

class ClimateApi {

	private const XML_ENDPOINT = "http://climatedataapi.worldbank.org/climateweb/rest/v1/country/annualavg/pr/{from}/{to}/{countryIso}.xml";

	private function downloadXmlData($from, $to, $countryIso){
		$endpoint = str_replace("{from}", $from, self::XML_ENDPOINT);
		$endpoint = str_replace("{to}", $to, $endpoint);
		$endpoint = str_replace("{countryIso}", $countryIso, $endpoint);

		$xmlData = file_get_contents($endpoint);

		if ($xmlData == "Invalid country code. Three letters are required"){
			throw new BadCountryCodeException();;
		}

		return $xmlData;
	}

	private function extractRainfallDataFromXml($xmlData){
		$xml = simplexml_load_string($xmlData);
		$sum = 0;
		$total = 0;
		if ($xml) {
			foreach ($xml->{"domain.web.AnnualGcmDatum"} as $key => $value) {
				$sum += (double)$value->annualData->double;
				$total += 1;
			}
		}

		return ["sum"=>$sum, "total"=>$total];
	}

	public function getAveAnnualRainfall($from, $to, $countryIso){
		$xmlData = self::downloadXmlData($from, $to, $countryIso);
		$rainfallData = self::extractRainfallDataFromXml($xmlData);

		if ($rainfallData["total"] <= 0){

			throw new DateRangeNotSupportedException();
		}
		
		$avg = $rainfallData["sum"] / $rainfallData["total"];

		return $avg;
	}
}

?>