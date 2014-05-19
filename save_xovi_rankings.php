<?php 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://www.xovi.de/xovilichter/"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Xovilichter.Dynapso/1.0 (+https://github.com/xovilichter/xovi)');
curl_setopt($ch, CURLOPT_REFERER, 'https://github.com/xovilichter/xovi'); 
$output = curl_exec($ch);
curl_close($ch);

// den code ein wenig aufrŠumen
$output = str_replace("\n", '', $output);
$output = str_replace("\t", '', $output);
$output = str_replace('itemprop="itemListElement"', ' ', $output);
$output = str_replace('  ', ' ', $output);
$output = str_replace('  ', ' ', $output);
$output = str_replace('  ', ' ', $output);
$output = str_replace('  ', ' ', $output);
$output = str_replace(' <', '<', $output);

preg_match_all('#<div class="line"><span class="(.*)">(.*).</span><span class="(.*)"><a href="(.*)" target="_blank">(.*)</a></span><span class="(.*)">(.*)</span><span class="(.*)">(.*)</span><span class="gplus">(.*)</span></div>#Uis', $output, $matches);

$rankings_rows = array();

foreach($matches[2] as $n => $position){	
	$rankings_rows[] = $position."\t".$matches[4][$n];
}

$save_file = fopen(dirname(__FILE__)."/xovi/".date('Y-m-d-H-i').'.txt',"w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);

$save_file = fopen(dirname(__FILE__)."/xovi/current.txt","w+");
fwrite($save_file, implode("\n", $rankings_rows));
fclose($save_file);
