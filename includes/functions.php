<?php

//Returns a formatted timestamp
function formatTimeStamp($date, $time){
	//create vars day,month,year from the elements separated by "-" in our date argument
	list($day, $month, $year) = explode('-', $date);

	//same as above, but with ":"
	list($hour, $minute) = explode(':', $time);

	//concatenate strings, use str_pad to make sure we have 2 chars per day,hour,minute
	$timestamp = str_pad($day, 2, '0', STR_PAD_LEFT).str_pad($hour, 2, '0', STR_PAD_LEFT).str_pad($minute, 2, '0', STR_PAD_LEFT);

	//return our formatted timestamp
	return $timestamp;
}