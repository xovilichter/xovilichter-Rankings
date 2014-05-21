<?php 

include('include/xovilichter_xovi_scraper.php');

$rankings_rows = array();
$scraper_results = xovilichter_xovi_scraper();

// columns
$rankings_rows[] = 'last_update:'.$scraper_results['last_update'];
$rankings_rows[] = implode("\t", array('position', 'url'));

foreach($scraper_results['search_results'] as $n => $search_result){

	$row = array();
	$row[] = $search_result['position'];
	$row[] = $search_result['url'];

	$rankings_rows[] = implode("\t", $row);

}

$save_file = fopen(dirname(__FILE__)."/archive/xovi/".date('Y-m-d-H-i').'.txt',"w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);

$save_file = fopen(dirname(__FILE__)."/archive/xovi/current.txt","w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);
