<?php

include('include/xovilichter_dynapso_scraper.php');

$rankings_rows = array();
$scraper_results = xovilichter_dynapso_scraper();

// columns
$rankings_rows[] = 'last_update:'.$scraper_results['last_update'];
$rankings_rows[] = implode("\t", array('position', 'url', 'type', 'google_plus_name', 'google_plus_short_url'));

foreach($scraper_results['search_results'] as $n => $search_result){

	$row = array();
	$row[] = $search_result['position'];
	$row[] = $search_result['url'];
	$row[] = $search_result['type'];
	$row[] = $search_result['google_plus']['name'];
	$row[] = $search_result['google_plus']['short_url'];

	$rankings_rows[] = implode("\t", $row);

}

$save_file = fopen(dirname(__FILE__)."/archive/dynapso/".date('Y-m-d-H-i').'.txt',"w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);

$save_file = fopen(dirname(__FILE__)."/archive/dynapso/current.txt","w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);