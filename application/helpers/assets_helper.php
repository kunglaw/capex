<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

if(!function_exists('img_url'))
{
	function img_url($path = "")
	{
		$CI =& get_instance();
		$img_url = $CI->config->item("img_url");
		
		return $img_url."/".$path;
			
		
	}
}

if(!function_exists('asset_url'))
{
	function asset_url($path = "")
	{
		$CI =& get_instance();
		$asset_url = $CI->config->item("asset_path");
		
		return $asset_url."/".$path;
			
		
	}
}

if(!function_exists('image_type'))
{
	// nilai variable 
	function image_type($int_type)
	{
		/* 
		1 	IMAGETYPE_GIF
		2 	IMAGETYPE_JPEG
		3 	IMAGETYPE_PNG
		4 	IMAGETYPE_SWF
		5 	IMAGETYPE_PSD
		6 	IMAGETYPE_BMP
		7 	IMAGETYPE_TIFF_II (intel byte order)
		8 	IMAGETYPE_TIFF_MM (motorola byte order)
		9 	IMAGETYPE_JPC
		10 	IMAGETYPE_JP2
		11 	IMAGETYPE_JPX
		12 	IMAGETYPE_JB2
		13 	IMAGETYPE_SWC
		14 	IMAGETYPE_IFF
		15 	IMAGETYPE_WBMP
		16 	IMAGETYPE_XBM
		17 	IMAGETYPE_ICO
		*/
		
		$type[1] = "gif";
		$type[2] = "jpeg";
		$type[3] = "png";
		$type[6] = "bmp";
		
		$arr = $type[$int_type];
		
		return $arr;
		
	}
}

if(!function_exists('file_url'))
{
	function file_url($path)
	{
		$CI 	   =& get_instance();
		$file_url = $CI->config->item("file_url"); 
		
		return $file_url."/".$path;
			
		
	}
}


if(!function_exists('pathup'))
{
	function pathup($path)
	{
		$CI =& get_instance();
		
		$str_path = $CI->config->item("img_path"); 
		return $str_path."/".$path;
			
		
	}
}

if(!function_exists('path_img'))
{
	function img_path($path)
	{
		$CI =& get_instance();
		
		$str_path = $CI->config->item("img_path"); 
		return $str_path."/".$path;
			
		
	}
}


if(!function_exists('asset_path'))
{
	function asset_path($path)
	{
		$CI =& get_instance();
		
		$str_path = $CI->config->item("asset_path"); 
		return $str_path."/".$path;
			
		
	}
}


if(!function_exists('oldpath'))
{
	function oldpath($path)
	{
		$CI =& get_instance();
		
		$str_path = $CI->config->item("img_path"); 
		return $str_path.$path;
			
		
	}
}

