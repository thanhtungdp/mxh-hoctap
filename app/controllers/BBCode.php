<?php
class BBCode{
	public static function replace($input){
		$pattern= array(
			"/\[b\](.*?)\[\/b\]/",
			"/\[i\](.*?)\[\/i\]/",
			"/\[u\](.*?)\[\/u\]/",
			"/\[img\](.*?)\[\/img\]/",
			"/\[url=(.*?)\](.*?)\[\/url\]/",
			'/(<p>)(.*)(<\/p>)/i'
		);
		$t=1;
		$replace= array(
			"<b>$1</b>",
			"<i>$1</i>",
			'<u>$1</u>',
			'<img src="$1">',
			'<a href="$1">$2</a>',
			'<b>$1</b>'
		);
		$input=str_replace("<p>","",$input);
		$input=str_replace("</p>","<br/>",$input);
		$input=BBcode::replace_pthh($input);
		//$input=preg_replace($pattern, $replace, $input);
		return $input;
	}
	public static function replace_pthh($input){
		//$regex = '#\[pthh]((?:[^[]|\[(?!/?indent])|(?R))+)\[/pthh]#';
		$regex ='/\/hh\{(.*?)\}/';
		$callback = function($matches) {
		    return EquationController::ConvertEquation($matches[1]);
		};
		return preg_replace_callback($regex, $callback, $input);
	}
}