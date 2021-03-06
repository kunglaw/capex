<?php 

	class Additional_model extends CI_Model{
		
		function __construct()
		{
			parent::__construct();
			
		}
		
		function list_additional()
		{
			$kode_department = $this->session->userdata("kode");
			
			$str = "SELECT * FROM additional_tr WHERE kode = '$kode_department' ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;
			
		}
		
		function detail_additional($add_tr_id)
		{
			$str = "SELECT * FROM additional_tr WHERE add_tr_id = '$add_tr_id' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
			
		}
		
		function update_submited_additional($dt_additional)
		{
			$this->load->model("opex_model");
			
			$opex_trd_id = $dt_additional["opex_trd_id"];
			$add_tr_id	 = $dt_additional["add_tr_id"];
			$budget 	 = $dt_additional["budget"];
			$username 	 = $this->session->userdata("email");
			
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			$budget_opex_trd = $opex_trd["budget"];
			
			$total_budget = $budget + $budget_opex_trd;
			
			$str = "UPDATE opex_tr_detail SET budget = '$total_budget'
			WHERE opex_trd_id = '$opex_trd_id'";
			$q = $this->db->query($str);
			
			$str2 = "UPDATE additional_tr SET submit = '$username' WHERE add_tr_id = '$add_tr_id'";
			$q2 = $this->db->query($str2); 
		}
		
		function insert_additional($arr)
		{
			$opex_trd_id = $arr["opex_trd_id"];
			$kode 		 = $arr["kode"];
			$budget		 = $arr["budget"];
			$reason		 = $arr["reason"];
<<<<<<< HEAD
=======
			$year		 = $arr["year"];
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
			
			$username 	 = $this->session->userdata("email");
			$user_agent  = $this->input->user_agent();
			$ip_address	 = $_SERVER["REMOTE_ADDR"];
			
			
			$str  = "INSERT additional_tr SET 			 ";
			$str .= "opex_trd_id = '$opex_trd_id'		,";
			$str .= "reason		 = '$reason'			,";
			$str .= "budget		 = '$budget'			,";
			$str .= "year		 = '$year'				,";
			$str .= "kode		 = '$kode'				,";
			$str .= "username	 = '$username'			,";
			$str .= "create_date = now()				,";
			$str .= "user_agent	 = '$user_agent'		,";
			$str .= "ip_address	 = '$ip_address'		 ";
			
			$this->db->query($str);
				
			
		}
		
		function update_additional($arr)
		{
			$add_tr_id	 = $arr["add_tr_id"];
			
			$opex_trd_id = $arr["opex_trd_id"];
			$kode 		 = $arr["kode"];
			$budget		 = $arr["budget"];
			$reason		 = $arr["reason"];
<<<<<<< HEAD
=======
			$year		 = $arr["year"];
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
			
			$username 	 = $this->session->userdata("email");
			$user_agent  = $this->input->user_agent();
			$ip_address	 = $_SERVER["REMOTE_ADDR"];
			
			
			$str  = "UPDATE additional_tr SET 			 ";
			$str .= "opex_trd_id = '$opex_trd_id'		,";
			$str .= "reason		 = '$reason'			,";
			$str .= "budget		 = '$budget'			,";
			$str .= "year		 = '$year'				,";
			$str .= "kode		 = '$kode'				,";
			$str .= "username	 = '$username'			,";
			//$str .= "create_date = now()				,";
			$str .= "user_agent	 = '$user_agent'		,";
			$str .= "ip_address	 = '$ip_address'		 ";
			$str .= "WHERE add_tr_id = '$add_tr_id'		 ";
			
			$this->db->query($str);
				
			
		}
		
		function delete_additional($add_tr_id)
		{
			$str = "DELETE FROM additional_tr WHERE add_tr_id = '$add_tr_id' ";
			$q 	 = $this->db->query($str); 	
			
		}
		
		function total_add_account_peryear($no_acc_opex,$year)
		{
			$kode_department = $this->session->userdata("kode");
			
			$str = "SELECT SUM(a.budget) as total_account
			
			FROM additional_tr a , opex_tr_detail b 
			
			WHERE a.opex_trd_id = b.opex_trd_id AND a.year = '$year' 
			AND b.no_acc_opex = '$no_acc_opex' AND a.kode = '$kode_department' ";
			$q2 = $this->db->query($str);
			$f2 = $q2->row_array();
			
			return $f2["total_account"];
			
		}
		
		function total_add_peryear($year)
		{
			$kode_department = $this->session->userdata("kode");
			
			$str = "SELECT SUM(budget) as total_add, year, kode FROM additional_tr WHERE year = '$year' AND kode = '$kode_department' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f["total_add"];
			
			
			
		}
		
	}