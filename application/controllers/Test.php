<?php

	class Test extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
				
			
		}
		
		function index()
		{
			
			
		}
		
		function total_budget()
		{
			$this->load->model("opex/opex_model");
			$total = $this->opex_model->total_budget_year(2017);	
			echo number_format($total);
		}
		
		function total_budget_opextrd()
		{
			$this->load->model("opex/opex_model");
			$total = $this->opex_model->total_budget_opex_trd(20,array());	
			echo number_format($total);
			
		}
		
		function view_session()
		{
			$aa = $this->session->userdata("all_userdata");
			
			print_r($aa);	
			
		}
		
		
		
		function view_session()
		{
			$aa = $this->session->userdata("all_userdata");
			
			print_r($aa);	
			
		}
		
		
		
	}