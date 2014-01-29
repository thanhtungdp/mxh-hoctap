<?php
class cUrlController{
	public static function getPage($url, $referer="", $timeout=30, $header=1){
		 set_time_limit(0) ;
        if(!isset($timeout))
            $timeout=30;
        $curl = curl_init();
        if(strstr($referer,"://")){
            curl_setopt ($curl, CURLOPT_REFERER, $referer);
        }
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36'); 
		curl_setopt($curl, CURLOPT_REFERER, 'http://google.com');
        curl_setopt ($curl, CURLOPT_HEADER, 0);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
        @$html = curl_exec ($curl);
        curl_close ($curl);
        return $html;
    }
    public static function postPage($url,$data_post){//$url,$pvars
		//Kết nối tới BalancedEquation
		//Trả về dữ liệu nhận được
	    $curl = curl_init();
	    $post = http_build_query(array('reaction'=>$data_post));
	    curl_setopt ($curl, CURLOPT_URL, $url);
	    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
	    curl_setopt ($curl, CURLOPT_HEADER, 0);
	    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt ($curl, CURLOPT_POST, 1);
	    curl_setopt ($curl, CURLOPT_POSTFIELDS, $post);
	    curl_setopt ($curl, CURLOPT_HTTPHEADER,
	        array("Content-type: application/x-www-form-urlencoded"));
	    $html = curl_exec ($curl);
	    curl_close ($curl);
	    return $html;
	}
}