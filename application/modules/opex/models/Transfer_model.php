<?php

	class Transfer_model extends CI_model{
		
		function __construct()
		{
			parent::__construct();	
			$this->load->model("opex_model");
		}
		

		
		function transfer_list()
		{
			$kode_department = $this->session->userdata("kode");
			$str = "SELECT * FROM transfer_tr WHERE kode = '$kode_department' ";
			$q = $this->db->query($str);
			$f = $q->result_array();	
			
			return $f;
		}
		
		function transfer_detail_row($trf_tr_id)
		{
			
			$str = "SELECT * FROM transfer_tr WHERE trf_tr_id = '$trf_tr_id' ";
			$q = $this->db->query($str);
			return $f = $q->row_array();
		}
		
		function transfer_detail($arr)
		{
			$opex_trd_id 	= $arr["opex_trd_id"];
			$transfer_from  = $arr["transfer_from"];
			$transfer_to 	= $arr["transfer_to"];
			$year 			= $arr["year"];
			$month_from		= $arr["month_from"];
			$month_to		= $arr["month_to"];
			
			$str  = "SELECT * FROM transfer_tr WHERE 		   ";
			$str .= "opex_trd_id 			= '$opex_trd_id' OR";
			$str .= "no_account_trfto		= '$transfer_to' OR"; // belum selesai
				
			$q = $this->db->query($str);
			
			return $f = $q->result_array();
		}
		
		function update_submited_transfer($dt_transfer)
		{
			$this->load->model("opex_model");
			
			$opex_trd_id = $dt_transfer["opex_trd_id"];
			$trf_tr_id	 = $dt_transfer["trf_tr_id"];
			$budget 	 = $dt_transfer["budget"];
			$no_account_trfto = $dt_transfer["no_account_trfto"];
			$username 	 = $this->session->userdata("email");
			
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			$budget_opex_trd = $opex_trd["budget"];
			$year 			 = $opex_trd["year"];
			$month_from		 = $opex_trd["month_from"];
			$month_to		 = $opex_ted["month_to"];
			
			$budget_left = $budget_opex_trd - $budget;
			$str = "UPDATE opex_tr_detail SET budget = '$budget_left' WHERE opex_trd_id = '$opex_trd_id'";
			$q = $this->db->query($str);
			
			$opex_trd_trfto = $this->opex_model->opex_trd_acc2($no_account_trfto,$year,$month);
			$budget_add  = $budget + $opex_trd_trfto["budget"];
			$str2 = "UPDATE opex_tr_detail SET budget = '$budget_add' WHERE opex_trd_id = '$opex_trd_trfto[opex_trd_id]'";
			$q2 = $this->db->query($str2);
			
			$str3 = "UPDATE transfer_tr SET submit = '$username' WHERE trf_tr_id = '$trf_tr_id'";
			$q3 = $this->db->query($str3); 
			
			
		}
		
		function add_transfer($arr)
		{
			$opex_trd_id 	= $arr["opex_trd_id"];
			$opex_trd_id_to = $arr["opex_trd_id_to"];
			//$transfer_from  = $arr["transfer_from"];
			$transfer_to 	= $arr["opex_account_to"];
			//$year 			= $arr["year"];
			//$month 			= $arr["month"];
			$budget			= $arr["budget"]; 
			
			$ip_address		= $this->input->ip_address();
			$user_agent		= $this->input->user_agent();
			$username 	 	= $this->session->userdata("email");
			$kode			= $this->session->userdata("kode");
			
			$str  = "INSERT INTO transfer_tr SET						 ";
			$str .= "opex_trd_id		= '$opex_trd_id'				,";
			$str .= "opex_trd_id_to		= '$opex_trd_id_to'				,";
			//$str .= "no_account_trfto	= '$transfer_to'				,";
			//$str .= "year 				= '$year'						,";
			//$str .= "month				= '$month'						,";
			$str .= "budget				= '$budget'						,";
			$str .= "ip_address			= '$ip_address'					,";
			$str .= "kode				= '$kode'						,";
			$str .= "username			= '$username'					,";
			$str .= "user_agent			= '$user_agent'					,";
			$str .= "create_date		= now()							,";
			$str .= "last_update		= now()							 ";
			
			$q = $this->db->query($str);
			
			return $q;
			
		}
		
		function update_transfer($arr)
		{
			$trf_tr_id		= $arr["trf_tr_id"];
			$opex_trd_id 	= $arr["opex_trd_id"];
			$opex_trd_id_to = $arr["opex_trd_id_to"];
			//$transfer_from  = $arr["transfer_from"];
			$transfer_to 	= $arr["opex_account_to"];
			//$year 			= $arr["year"];
			//$month 			= $arr["month"];
			$budget			= $arr["budget"]; 
			
			$ip_address		= $this->input->ip_address();
			$user_agent		= $this->input->user_agent();
			$username 	 	= $this->session->userdata("email");
			$kode			= $this->session->userdata("kode");
					
			$str  = "UPDATE transfer_tr SET						 		 ";
			$str .= "opex_trd_id		= '$opex_trd_id'				,";
			$str .= "opex_trd_id_to		= '$opex_trd_id_to'				,";
			$str .= "no_account_trfto	= '$transfer_to'				,";
			//$str .= "year 				= '$year'						,";
			//$str .= "month				= '$month'						,";
			$str .= "budget				= '$budget'						,";
			$str .= "ip_address			= '$ip_address'					,";
			$str .= "kode				= '$kode'						,";
			$str .= "username			= '$username'					,";
			$str .= "user_agent			= '$user_agent'					,";
			//$str .= "create_date		= now()							,";
			$str .= "last_update		= now()							 ";
			
			$str .= "WHERE trf_tr_id	= '$trf_tr_id'					 ";
			
			$q = $this->db->query($str);
			
			return $q;
			
		}
		
		function delete_transfer($trf_tr_id)
		{
			$str = "DELETE FROM transfer_tr WHERE trf_tr_id = '$trf_tr_id'";
			$q 	 = $this->db->query($str);	
			
		}
		
		
	}