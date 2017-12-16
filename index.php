<?php
/*
  * query string = you app link 
  * e.g: https://play.google.com/store/apps/details?id=com.metro.metroestore
*/

$link = $_SERVER['QUERY_STRING']; 
$contents = file_get_contents($link);
$dom = new DOMDocument();
@$dom->loadHTML($contents);

$div = $dom->getElementsByTagName('div');
for ($i = 0; $i < $div->length; $i++) {
	$attr = $div->item($i)->getAttribute('itemprop');
	if($attr == 'softwareVersion'){
		$value = $div->item($i);
		echo $value->textContent;
	}
}
?>
