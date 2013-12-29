<?php

//Setup basic config params


//Set the name/location of our excel file to be read in
$inputFileName = "upload/raw_data.xlsx";

//Set output file name/location
$outputFileName =  "output/formatted_data_".date("d-m-Y-H-i").".txt";

//Set linenumber, after which, data is starts to be read in
$readDataAfterLine = 6;

//Set Linenumber, on which, the header rows are located (t: , P: etc)
$headerRowLine = 4;

//Set verfication code number for the end of each line
$verificationCode = "V:4";