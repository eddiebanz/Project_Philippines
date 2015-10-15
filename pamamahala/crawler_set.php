<?php    
	// This program aims only to find links from a website and store the info in a database.
	// A user process will be necessary to select which link will be scrapped for specific info.
	// Another program will then read through the selected record for sampling, then the actual scraping itself

	// set runtime to only 10minutes
	set_time_limit(1200);
	// set the connection
	include ('new-connection.php');
	// set the job-scheduler
	include( dirname(__FILE__) . "/phpjobscheduler/firepjs.php");

	// get the first record. 
	// it will be assumed that the table will have an inital record which will contain the main site
	// only get the records that are tag for drilling : drill = 'Y'.
	// this will only loop(drill) 3times (or 3levels) just to be sure
	// anything after the 3rd level will be ignored
	$query = "SELECT * FROM sites WHERE dril = 'Y'";
	$row = fetch_all($sql_req);

	for($loopCounter = 0; $loopCounter = 3; $loopCounter++)
	{
		$documentResult = $collection->find($query);

		// if there are no query result, then just exit the program
		if (count(iterator_to_array($documentResult)) == 0){
			return;
		}

		// if there are any results, go and extract all the links from the site
		foreach ($documentResult as $hrefLinks) {
			grabAnchors($hrefLinks,$hrefLinks['main_site']);
		}
	}

	// ignore all the links that was added after the 3rd level
	$query = array("drill"=>"Y", "drillStatus"=>"Pending");
	foreach ($documentResult as $hrefLinks) {
		updateDocument($hrefLinks);
	}
?>