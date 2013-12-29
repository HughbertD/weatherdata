<?php

/**
* Author: Hugh Downer & Dave Mattey
* Desc: Script for converting data from old WeatherCat format, to new WeatherCat format
* Date: 29/12/2013
*/

/** PHPExcel_IOFactory */
//Include an external library that lets us read in xlsx files
include 'includes/PHPExcel/IOFactory.php';
//load some custom function for use within the script
require 'includes/functions.php';

/**Set the name/location of our excel file to be read in*/
$inputFileName = "upload/raw_data.xlsx";


try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

echo '<hr />';
echo "<pre>";

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$i = 1; //set a count
foreach($sheetData as $row){
	echo $i;
	print_r($row);
	if($i > 6){ //gone past header rows, into data
		foreach($row as $column => $data){
			print_r($data);
		}
		echo "<hr />";
	}
	$i++; //inc the count after each iteration
}
print_r($sheetData);