<?php

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://www.dynapso.de/xovilichter/"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Xovilichter.Dynapso/1.0 (+https://github.com/xovilichter/dynapso)');
curl_setopt($ch, CURLOPT_REFERER, 'https://github.com/xovilichter/dynapso'); 
$output = curl_exec($ch);
curl_close($ch);

preg_match_all('#<td class="right"><span data-sort="(.*)">(.*)</span></td> <td class="link"><span data-sort="(.*)">(.*)</span></td> <td class="googlePlus">(.*)</td>#Uis', $output, $matches);

$rankings_rows = array();

foreach($matches[1] as $n => $position){

	if(preg_match('#<img class="icon" src="http://www.dynapso.de/images/icons/(.*).png" alt="(.*)"#Uis', $matches[2][$n], $universal_search_match)){
		$type = $universal_search_match[1];		
	}else{
		$type = 'organic';
	}
	
	if(preg_match('#<a href="(.*)" title="(.*)" target="_blank"><img class="ico" src="(.*)" alt="(.*)"#Uis', $matches[5][$n], $google_plus_match)){
		$google_plus = array(
			'name' => $google_plus_match[4],
			'short_url' => $google_plus_match[1],
		);
	}else{
		$google_plus = array();
	}

	$rankings_rows[] = $position."\t".$matches[3][$n]."\t".$type."\t".(!empty($google_plus['name']) ? $google_plus['name'] : '')."\t".(!empty($google_plus['short_url']) ? $google_plus['short_url'] : '');
}

$save_file = fopen(dirname(__FILE__)."/dynapso/".date('Y-m-d-H-i').'.txt',"w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);

$save_file = fopen(dirname(__FILE__)."/dynapso/current.txt","w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);