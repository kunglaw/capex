<?php

	class Opex_process extends MX_Controller{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model("opex_model");	
		}
		
		function add_opex_detail_proccess()
		{
			//echo json_encode($_POST);
			error_reporting(0);
			
			$this->load->library("form_validation");
			
			$year 		  = $this->input->post("year",true);
			$opex_account = $this->input->post("opex_account",true);
			$month		  = $this->input->post("month",true);
			$budget		  = $this->input->post("budget",true);
			
			$this->form_validation->set_rules("opex_account","Opex Account","required|trim");
			$this->form_validation->set_rules("month","Month","required|trim");
			$this->form_validation->set_rules("budget","Budget","required|trim|integer");
			
			if($this->form_validation->run() == true)
			{				
				// insert opex_tr
				$arr["year"]		    = $year;
				$arr["opex_account"]    = $opex_account;
				$arr["kode_department"] = $this->session->userdata("kode");
				$arr["month"]		    = $month; // untuk opex_tr_detail
				$arr["budget"]		    = $budget; // budget untuk opex_tr_detail
				
				$opex_tr = $this->opex_model->opex_tr_detail($year);
				
				if(empty($opex_tr))
				{
					$opex_trid = $this->opex_model->opex_tr_insert($arr);
					
					$straa = "SELECT * FROM opex_tr ORDER BY create_date DESC LIMIT 1";
					$qaa = $this->db->query($straa);
					$faa = $qaa->row_array();
					
					$arr["opex_trid"] 	 = $faa["opex_trid"]; 
					
				}
				else
				{
					
					$arr["opex_trid"]    = $opex_tr["opex_trid"];
					
				}
				
				//echo $arr["opex_trid"];
				//print_r($arr); exit;
				//echo json_encode($arr); exit;	
				
				
				// check account_opex dan tahunnya dan kode_department , di group berdasarkan account_opex
				//$oa_year = $this->opex_model->opex_trd_acc($opex_account,$year); 
				$oa_year = $this->opex_model->opex_trd_acc_gabung($opex_account,$year);
				
				if(empty($oa_year))
				{
				  // insert 12 bulan sekaligus 
				  $months = $this->config->item("months");
				  foreach($months as $k=>$row_month)
				  {
					  $arr_detail["opex_trid"]		 = $arr["opex_trid"];
					  $arr_detail["year"]		     = $year;
					  $arr_detail["opex_account"]    = $opex_account; // untuk opex_tr_detail
					  $arr_detail["month"]		     = $row_month;
					  $arr_detail["budget"]		     = "";
					  
					  $arr_detail["ip_address"] = $_SERVER["REMOTE_ADDR"];
					  $arr_detail["user_agent"] = $this->input->user_agent();
					  
					  // insert opex_tr_detail
					  $this->opex_model->opex_tr_detail_insert($arr_detail);
				  }
				  
				  // update budget
				  $this->opex_model->update_month_budget($arr);
				  
				  $result["status"] = "success";
				  $result["message"] = notif_success("You Succesfully add Opex Detail ").reload();
				  
				}
				else
				{	
				  // update budget
				  $this->opex_model->update_month_budget($arr);
				  
				  $result["status"] = "success";
				$result["message"] = notif_success("You Succesfully Updated Opex Detail ")." ".reload(3);
					
				  //$result["status"] = "error";
				  //$result["message"] = notif_error("Opex Account is already exists");
				  //exit;
				}
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
			
			
			
		}
		
		function delete_opex_detail_process()
		{
			$this->load->library("form_validation");
			
			$opex_trid = $this->input->post("opex_trid",TRUE);
			$no_acc_opex = $this->input->post("no_acc_opex",TRUE);
			
			$this->form_validation->set_rules("opex_trid","Opex trid","required");
			$this->form_validation->set_rules("no_acc_opex","No Account Opex","required");
			
			if($this->form_validation->run() == TRUE)
			{
				//$this->opex_model->delete_opex_trd_detail($opex_trid);
				$this->opex_model->delete_opex_per_account($opex_trid,$no_acc_opex);
				
				$result["status"] = "success";
				$result["message"] = notif_success("You Succesfully deleted Opex Detail ")." ".reload(3);
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
			
			
				
			
		}
		
		
		
	}