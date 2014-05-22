<?php

$rankings_rows = array();

// curl
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://aus.gerech.net/data/xovilichter/top123.json"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Xovilichter.aus.gerech.net/1.0 (+https://github.com/xovilichter/)');
curl_setopt($ch, CURLOPT_REFERER, 'https://github.com/xovilichter/'); 
$scraper_results = curl_exec($ch);
curl_close($ch);

if(json_decode($scraper_results)){

	$scraper_results = json_decode($scraper_results);
	
	// columns
	$rankings_rows[] = 'last_update:'.date('Y-m-d H:i', strtotime($scraper_results->upd));
	$rankings_rows[] = implode("\t", array('position', 'url', 'type', 'google_plus_name'));
	
	foreach($scraper_results->rnk as $n => $search_result){
	
	        $row = array();
	        $row[] = $search_result->pos;
	        $row[] = $search_result->url;
	        $row[] = $search_result->typ;
	        $row[] = (!empty($search_result->aut) ? $search_result->aut : '');
	
	        $rankings_rows[] = implode("\t", $row);
	
	}
	
	$save_file = fopen(dirname(__FILE__)."/archive/aus.gerech.net/".date('Y-m-d-H-i').'.txt',"w+");
	fwrite($save_file, implode("\n", $rankings_rows));
	fclose($save_file);
	
	$save_file = fopen(dirname(__FILE__)."/archive/aus.gerech.net/current.txt","w+");
	fwrite($save_file, implode("\n", $rankings_rows));
	fclose($save_file);

}

