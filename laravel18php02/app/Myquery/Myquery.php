<?php

namespace App\Myquery;

	function stripUnicode($str){
		if(!$str){
			return false;
		}
		$unicode = array(
			'a'	=>	'á'|'à'|'ả'|'ã'|'ạ'|'ắ'|'ằ'|'ẳ'|'ẵ'|'ặ'|'ấ'|'ầ'|'ẩ'|'ẫ'|'ậ',
			'A'	=>	'Á'|'À'|'Ả'|'Ã'|'Ạ'|'Ắ'|'Ằ'|'Ẳ'|'Ẵ'|'Ặ'|'Ấ'|'Ầ'|'Ẩ'|'Ẫ'|'Ậ',
			'd'	=>	'đ',
			'D'	=>	'Đ',
			'e'	=>	'é'|'è'|'ẻ'|'ẽ'|'ẹ'|'ế'|'ề'|'ể'|'ễ'|'ệ',
			'E'	=>	'É'|'È'|'Ẻ'|'Ẽ'|'Ẹ'|'Ế'|'Ề'|'Ể'|'Ễ'|'Ệ',
			'i'	=>	'í'|'ì'|'ỉ'|'ĩ'|'ị',
			'I'	=>	'Í'|'Ì'|'Ỉ'|'Ĩ'|'Ị',
			'o'	=>	'ó'|'ò'|'ỏ'|'õ'|'ọ',
			'O'	=>	'Ó'|'Ò'|'Ỏ'|'Õ'|'Ọ',
			'u'	=>	'ú'|'ù'|'ủ'|'ũ'|'ụ',
			'U'	=>	'Ú'|'Ù'|'Ủ'|'Ũ'|'Ụ',
			'y'	=>	'ý'|'ỳ'|'ỷ'|'ỹ'|'ỵ',
			'Y'	=>	'Ý'|'Ỳ'|'Ỷ'|'Ỹ'|'Ỵ'
		);
		foreach ($unicode as $khongdau=>$codau){
			$arr = explode("|", $codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}
	function changeTitle($str){
		$str = trim($str);
		if ($str == ""){
			return "";
		}
		$str = str_replace('"','',$str);
		$str = str_replace("'", '', $str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		$str = str_replace(' ','-', $str);
		return $str;
	} 
?>