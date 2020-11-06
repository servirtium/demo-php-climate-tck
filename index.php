<?php
	require "vendor/autoload.php";

	$climateApi = new ClimateApi\ClimateApi();

	$data = $climateApi->getAveAnnualRainfall(1985, 1999, "gbr");

	print_r($data);