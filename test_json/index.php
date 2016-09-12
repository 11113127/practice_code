<?php 
	$string = file_get_contents("json/1.json");
	echo json_decode(removeBOM($string))[0]->醫事機構代碼;
	echo json_decode(removeBOM($string))[0]->醫事機構名稱;
	echo json_decode(removeBOM($string))[0]->特約類別;
	echo json_decode(removeBOM($string))[0]->電話;
	// print_r(json_decode(removeBOM($string))[0]);

	function removeBOM($str = ''){
	    if (substr($str, 0,3) == pack("CCC",0xef,0xbb,0xbf))
	        $str = substr($str, 3);

	    return $str;
	}

	//https://blog.longwin.com.tw/2008/06/php_check_remove_bom_utf8_2008/
	//https://blog.longwin.com.tw/2013/11/php-json_decode-null-fix-2013/
?>