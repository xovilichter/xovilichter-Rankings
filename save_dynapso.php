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
	$rankings_rows[] = $position."\t".$matches[3][$n];
}

$save_file = fopen("./dynapso/".date('Y-m-d-H-i').'.txt',"w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);