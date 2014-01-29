<?php
function get_path_thumbnails($file){
	return "contents/thumbnails/".$file;
}
function get_url_thumbnail($file){
	return Asset(get_path_thumbnails($file));
}
function save_image_from_url($url,$path){
	$contents=file_get_contents($url);
	$savefile = fopen($path, 'w');
	fwrite($savefile, $contents);
	fclose($savefile);
}
function convert_html_to_innertext($html){
		$html="<div id='t'>".$html."</div>";
		$html=str_get_html($html);
		foreach ($html->find("div#t") as $element) {
			return $element->plaintext;
		}
	}