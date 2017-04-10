<?php

	class Authentification{
		
		function __construct()
		{
			$CI =& get_instance();
			
			$name_session = $CI->session->userdata("name");
			
			if(!empty($name_session))
			{
				$this->logged_in();
			}
			else
			{
				$this->logged_out();	
			}
			
		}
		
		function logged_in()
		{
			$CI =& get_instance();
			$uri2 = $CI->uri->segment(1);
			if($uri2 == "" )
			{
				$uri3 = $CI->uri->segment(2);
				if($uri3 == "login" || $uri3 == "register")
				{
					header("location:".base_url("dashboard"));		
				}
					
			}			
			
		}
		
		function logged_out()
		{
			$CI =& get_instance();
			$uri2 = $CI->uri->segment(1);
			if($uri2 != "users")
			{
				header("location:".base_url("users"));		
			}
			
			
		}
		
	
		
		
		
	}