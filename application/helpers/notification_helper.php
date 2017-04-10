<?php

	if(!function_exists('notif_error'))
	{
		function notif_error($text)
		{
			$result = "<div class='alert alert-danger' role='alert'>
			 <i class='fa fa-exclamation-triangle' aria-hidden='true'> </i>
			
  			
			$text 
			<span class='clearfix'></span>
			</div>";
			
			return $result;		
		
		}
	}
	
	if(!function_exists("notif_success"))
	{
		function notif_success($text)
		{
			$result = "<div class='alert alert-success' role='alert'> 
			<i class='fa fa-check-circle' aria-hidden='true'></i>

			$text </div>";
			
			return $result;	
			
		}
	}
	
	if(!function_exists("notif_warning"))
	{
		function notif_warning($text)
		{	
			$result = "<div class='alert alert-warning'> $text </div>";
		
		}
	}
	