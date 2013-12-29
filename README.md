Weather Data
===========

Script for converting WeatherCat data from old format to new format

Upload file to be converted to /upload/raw_data.xlsx

Usage
-----

Clone into weatherdata.dev directory and fire up MAMP, make sure you hit the "Start" button also.

Load the data file to be converted into the upload directory

Open includes/config.php and check the settings against your data file. inputFileName should match your datasheet, all other settings should be self explanatory.

Once you are happy, with the settings, just visit the web page, it will run the script. If successful you should have a output .txt file in the output directory, called whatever you set it to in outputFileName.


How it works
------------

The script takes reads the inputFileName and loops through the active record sheet, row by row. 

When it hits the defined header row number, (default 4) it saves this row as the headers for output. 

When it goes past the row set to read data in after, it begins formatting and saving the read in data to write out to a file later. 

At present, it is configured that columns A and C contains the date and time values (respectively) to be used to format the timestamp.

The script looks for values, that are in columns whose headers (when saved at row 4 (or whatever you set it to)) match the regex pattern ([A-Za-z]:$) e.g. (b: t: Wc: etc), any data in a column whose headers doesn't match this is ignored, you can add / delete any more columns, as long as they match this pattern, they will be included. 

The script then writes these out to the outputFileName location in separate lines, with the lineNumbers starting at 10, and incrementing 10 at a time. 


Future Dev
----------

Create a web interface to upload a file, format, and send back the resulting txt. 



