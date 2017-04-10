<?php
	
	class Realization_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();	
		}
		
		function list_relization()
		{
			$kode_department = $this->session->userdata("kode_department");
			
			$str = "SELECT * FROM realization_tr WHERE kode = '$kode_department'";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
			
		}
		
		function realization_detail($id_realization)
		{
			$str = "SELECT * FROM realization_tr WHERE id_realization = '$id_realization' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
		}
		
		function update_submited_realization($dt_realization)
		{
			$this->load->model("opex_model");
			
			$opex_trd_id 	 = $dt_realization["opex_trd_id"];
			$id_realization	 = $dt_realization["id_realization"];
			$budget 	 	 = $dt_realization["amount"];
			$username 	 	 = $this->session->userdata("email");
			
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			$budget_opex_trd = $opex_trd["budget"];
			
			$left_budget = $budget_opex_trd - $budget;
			
			$str = "UPDATE opex_tr_detail SET budget = '$left_budget'
			WHERE opex_trd_id = '$opex_trd_id'";
			$q = $this->db->query($str);
			
			$str2 = "UPDATE realization_tr SET submit = '$username' WHERE id_realization = '$id_realization'";
			$q2 = $this->db->query($str2); 
			
		}
		
		function add_realization($arr)
		{
			
			$username = $this->session->userdata("email");
			
			$opex_trd_id = $arr["opex_trd_id"];
			$kode	  	 = $arr["kode_department"];
			$amount		 = $arr["amount"];
			$activity 	 = $arr["activity"];
			
			$ip_address	 = $this->input->ip_address();
			$user_agent  = $this->input->user_agent();
			
			$str  = "INSERT INTO realization_tr SET 	     ";
			$str .= "opex_trd_id	= '$opex_trd_id'		,";
			$str .= "kode			= '$kode'				,";
			$str .= "username		= '$username'			,";
			$str .= "activity		= '$activity'			,";
			$str .= "amount 		= '$amount'				,";
			$str .= "ip_address		= '$ip_address'			,";
			$str .= "user_agent		= '$user_agent'			,";
			$str .= "create_date	= now()					 ";
			
			$q = $this->db->query($str);
			
		}
		
		function update_realization($arr)
		{
			$username = $this->session->userdata("email");
			
			$id_realization = $arr["id_realization"];
			$opex_trd_id = $arr["opex_trd_id"];
			$kode	  	 = $arr["kode_department"];
			$amount		 = $arr["amount"];
			$activity 	 = $arr["activity"];
			
			$ip_address	 = $this->input->ip_address();
			$user_agent  = $this->input->user_agent();
			
			$str  = "UPDATE realization_tr SET 	     		 ";
			$str .= "opex_trd_id	= '$opex_trd_id'		,";
			$str .= "kode			= '$kode'				,";
			$str .= "username		= '$username'			,";
			$str .= "activity		= '$activity'			,";
			$str .= "amount 		= '$amount'				,";
			$str .= "ip_address		= '$ip_address'			,";
			$str .= "user_agent		= '$user_agent'			 ";
			
			$str .= "WHERE id_realization = '$id_realization' ";
			
			$q = $this->db->query($str);
			
		}
		
		function delete_realization($id_realization)
		{
			$str = "DELETE FROM realization_tr WHERE id_realization = '$id_realization' ";
			$q = $this->db->query($str);
			
		}
		
		
		
		
		
	}