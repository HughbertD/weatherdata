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
$lineNum = 0; //set our lineNumber var now, will begin inc' when required
foreach($sheetData as $row){

	if($i == 4) $headers = $row; //grab this row, it contains the required header values

	if($i > 6){ //gone past header rows, into data
		
		$lineNum += 10;	//inc our line number by 10 (this means lineNumbering STARTS at 10)
		foreach($row as $column => $data){	
			if(preg_match("/[a-zA-Z]:/",$headers[$column])){ //match up the column data to its header (e.g. B => t:) and assign to the array
				$formattedData[$lineNum][$headers[$column]] = $data;
			}
			$formattedData[$lineNum]['t:'] = formatTimeStamp($row['A'], $row['C']); //special case, for the timestamp
		}
	}
	$i++; //inc the count after each iteration
}
print_r($formattedData);
echo "</pre>";