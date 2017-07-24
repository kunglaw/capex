<?php
	
	class Realization_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();	
			$this->load->model("opex_model");
		}
		
		function list_relization()
		{
			$kode_department = $this->session->userdata("kode");
			
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
			$year	     = $arr["year"];
			
			$ip_address	 = $this->input->ip_address();
			$user_agent  = $this->input->user_agent();
			
			$str  = "INSERT INTO realization_tr SET 	     ";
			$str .= "opex_trd_id	= '$opex_trd_id'		,";
			$str .= "kode			= '$kode'				,";
			$str .= "username		= '$username'			,";
			$str .= "activity		= '$activity'			,";
			$str .= "amount 		= '$amount'				,";
			$str .= "year			= '$year'				,";
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
			$year		 = $arr["year"];
			
			$ip_address	 = $this->input->ip_address();
			$user_agent  = $this->input->user_agent();
			
			$str  = "UPDATE realization_tr SET 	     		 ";
			$str .= "opex_trd_id	= '$opex_trd_id'		,";
			$str .= "kode			= '$kode'				,";
			$str .= "username		= '$username'			,";
			$str .= "activity		= '$activity'			,";
			$str .= "amount 		= '$amount'				,";
			$str .= "year			= '$year'				,";
			$str .= "ip_address		= '$ip_address'			,";
			$str .= "user_agent		= '$user_agent'			 ";
			
			$str .= "WHERE id_realization = '$id_realization' ";
			
			$q = $this->db->query($str);
			
		}
		
		function total_real_account_peryear($no_acc_opex,$year)
		{
			$kode_department = $this->session->userdata("kode");
			
			$str = "SELECT SUM(a.amount) as total_account, b.opex_trid, b.opex_trd_id, a.year, b.no_acc_opex  FROM realization_tr a , opex_tr_detail b WHERE a.opex_trd_id = b.opex_trd_id AND a.year = '$year' AND b.no_acc_opex = '$no_acc_opex' AND a.kode = '$kode_department' ";
			$q2 = $this->db->query($str);
			$f2 = $q2->row_array();
			
			return $f2["total_account"];
			
		}
		
		function total_real_peryear($year)
		{
			
			$kode_department = $this->session->userdata("kode");
			
			$str = "SELECT SUM(amount) as total_real, year, kode FROM realization_tr WHERE year = '$year' AND kode = '$kode_department' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f["total_real"];
			
		}
		
		function delete_realization($id_realization)
		{
			$str = "DELETE FROM realization_tr WHERE id_realization = '$id_realization' ";
			$q = $this->db->query($str);
			
		}
		
		
		
		
		
	}