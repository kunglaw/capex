<?php

	function test()
	{
			
		echo "test";
	}
	
	function view_image($filename)
	{
		$CI =& get_instance();
		$result_image = DEFAULT_IMG;
		if(!empty($filename))
		{	
			$c = $CI->config->item("img_path");
			$path_img = $c."/".$filename;
			$result_image = base_url("resources/upload/$filename");
			if(!file_exists($path_img))
			{
				$result_image = DEFAULT_IMG;
			}
			
		}
		
		return $result_image;
		
		
	}
	
	function get_crsf_name()
	{
		
		$CI =& get_instance();
		
		$csrf = array(
				'name' => $CI->security->get_csrf_token_name(),
				'hash' => $CI->security->get_csrf_hash()
		);
		
		return $csrf["name"];	
	}
	
	function get_crsf_code()
	{
		
		$CI =& get_instance();
		
		$csrf = array(
				'name' => $CI->security->get_csrf_token_name(),
				'hash' => $CI->security->get_csrf_hash()
		);
		
		return $csrf["hash"];	
	}
	
	if(!function_exists("reload"))
	{
		function reload($second)
		{
			$script = "<script> setTimeout(function(){
   window.location.reload(1);
}, $second*1000); </script>";

			return $script;
			
		}
		
	}