<?php

	class Dashboard extends MX_Controller{
		
		function __construct()
		{
			parent::__construct();	
		}
		
		function index()
		{
			$data["title"]	  	  = "Dashboard";
			$data["template"] 	  = "dashboard/template";
			
			
			$this->load->view("index",$data);
		}
		
		function __destruct()
		{
			
		}
		
	}