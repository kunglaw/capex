<?php

	class Json_ajax extends MX_Controller{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("opex_model");	
		}
		
		function load_month_budget()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$month 		 = $this->input->post("month",TRUE);
			$year  		 = $this->input->post("year",TRUE);
			$no_acc_opex = $this->input->post("no_acc_opex",TRUE);
			
			//echo json_encode($_POST); exit;
			
			//$data = $this->opex_model->load_month_budget($month,$year,$no_acc_opex);
			$data = $this->opex_model->load_month_budget_gabung($month,$year,$no_acc_opex);
			
			echo json_encode($data);
			
		}
		
		function load_transfer_to()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			//$month 		 = $this->input->post("month",TRUE);
			$year  		 = $this->input->post("year",TRUE);
			$no_acc_opex = $this->input->post("no_acc_opex",TRUE);
			
				
			$data = $this->opex_model->opex_acc_trdetail_not($year,$no_acc_opex);
			
			if(!empty($data))
			{
			  foreach($data as $row)
			  {
				  $opex_ms = $this->opex_model->opex_ms_detail($row["no_acc_opex"]);
				  echo "<option value='$opex_ms[no_acc_opex]'> $opex_ms[no_acc_opex] - $opex_ms[detail]</option>";	
				  
			  }
			}
			else
			{
				echo "<option value=''>- no account can receive a trasfer-</option>";	
				
			}
			
			//echo json_encode($data);
			
			
		}
		
		function load_opex_trd()
		{
			$opex_account = $this->input->post("opex_account",TRUE);
			$month	  	  = $this->input->post("month",TRUE);
			$year 		  = $this->input->post("year",TRUE);
			
			$data = $this->opex_model->opex_trd_acc2($opex_account,$year,$month); 	
			
			echo json_encode($data);
			
		}
		
		function load_transfer_tr()
		{
			
			
			
			
		}
		
		function reload_year()
		{
			$year_select = $this->input->post("year_select",TRUE);
			
			header("location:".base_url("opex/create/$year_select"));	
			
			
		}
		
		
	}