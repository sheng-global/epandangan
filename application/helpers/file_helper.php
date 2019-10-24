<?php
/*
*  Title: File export Helper
*  Version: 1.0 from 14 July 2017
*  Author: Fadli Saad
*  Website: https://fadli.my
*/

class File_helper extends Controller
{
	function csv($table, $header, $column)
	{
		global $config;
		
		# filename for export
		$csv_filename = 'db_export_'.$table.'_'.date('Ymd').'.csv';
		
		# database variables
		$hostname = getenv('DB_HOST');
		$user = getenv('DB_USER');
		$password = getenv('DB_PASS');
		$database = getenv('DB_NAME');
		$port = 3306;
		$conn = mysqli_connect($hostname, $user, $password, $database, $port);
		if (mysqli_connect_errno()) {
		    die("Failed to connect to MySQL: " . mysqli_connect_error());
		}

		# query to get data from database
		$query = mysqli_query($conn, "SELECT ".$column." FROM ".$table);

		// create a file pointer connected to the output stream
		$output = fopen(getenv('UPLOAD_FOLDER').'/'.$csv_filename, 'w');

		// output the column headings
		fputcsv($output, $header);

		// loop over the rows, outputting them
		while ($row = mysqli_fetch_assoc($query)) fputcsv($output, $row);

		fclose($output);
	}
}