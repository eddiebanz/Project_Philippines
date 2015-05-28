<?php 
require('new-connection.php');

if (date('L')){	$numberOfDays = 366;	}
else{ $numberOfDays = 365;}
$new_day_of_week = 1;
$f_day_of_week_ordinal = 1;	

for ( $i = 0; $i <= $numberOfDays; $i++ )
{ 
	$days = "+".$i.' days' ;
	// check for end of week
	if (date('N',strtotime($days)) == 7){	$end_of_week= 'Y';	}
	else 	{	$end_of_week= 'N';	}

	// end of year
	if (date("m",strtotime($days)) == 12 && date("j",strtotime($days)) == date("t",strtotime($days)) ) { $end_of_year= 'Y';	}
	else { $end_of_year= 'N';	}

	// end of month
	if (date("j",strtotime($days)) == date("t",strtotime($days)) ) { 
		$end_of_month= 'Y';	
		$f_last_of_the_month = 'Y';
	}
	else { 
		$end_of_month= 'N';	
		$f_last_of_the_month = 'N';
	}

	if (date("j",strtotime($days)) == 1) {
		$f_day_of_week_ordinal = 1;	
		$new_day_of_week = date('N',strtotime($days));
	}
	else{
		if ($new_day_of_week == date('N',strtotime($days))){
			$f_day_of_week_ordinal += 1;	
		}
	}

	$query = "INSERT INTO fiscal_calendar (full_date, f_month, f_date, f_year, end_of_week, end_of_month, end_of_year, f_day_of_week, f_day_of_week_ordinal, f_last_of_the_month,f_last_week_of_the_month) VALUES('". date("y-m-d",strtotime($days))."',".date("m",strtotime($days)) .",". date('j',strtotime($days)) .",". date('Y',strtotime($days)).",'".$end_of_week."','".$end_of_month."','".$end_of_year."','". date('N',strtotime($days)) ."',". $f_day_of_week_ordinal .",'". $f_last_of_the_month."','N')";
	$result = run_mysql_query($query);
}
?>
