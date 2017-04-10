<?php

	class Opex_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		function opex_ms_detail($no_acc_opex)
		{
			$str = "SELECT * FROM opex_ms WHERE no_acc_opex = '$no_acc_opex' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
			
		}
		
		function opex_tr_list()
		{
			// berdasarkan kode_department
			$kode = $this->session->userdata("kode");
			
			$str = "SELECT * FROM opex_tr WHERE kode_department = '$kode'";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
	
		}
										//year atau opex_trid
		function opex_trd_group($key)// group by no_acc_opex
		{
			
			
			$str = "SELECT * FROM opex_tr_detail WHERE (year = '$key' OR opex_trid = '$key') 
			GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
			
		}
		
		// penggabungan 2 table, opex_tr_detail, opex_tr
		function opex_trd_group_gabung($key)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE opex_trid = '$key' GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;
			
		}
		
		function opex_trd_group2($key)// group by no_acc_opex
		{
			$str = "SELECT * FROM opex_tr_detail WHERE year = '$key' OR opex_trid = '$key' GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
			
		}
		
		function opex_trd_group3($opex_trid,$no_acc_opex)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE opex_trid = '$opex_trid' AND no_acc_opex = '$no_acc_opex' GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
				
			
		}
		
		// ada masalah, disini
		function opex_trd_detail($opex_trd_id)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE opex_trd_id = '$opex_trd_id' ";
			$q = $this->db->query($str);
			$f = $q->result_array(); // row_array //result_array
			
			return $f;
			
		}
		
		function opex_trd_detail_row($opex_trd_id)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE opex_trd_id = '$opex_trd_id' ";
			$q = $this->db->query($str);
			$f = $q->row_array(); // row_array //result_array
			
			return $f;
			
		}
		
		function opex_tr_detail($opex_trid="")
		{
			
			$kode = $this->session->userdata("kode");
			
			$str = "SELECT * FROM opex_tr WHERE year = '$opex_trid' AND kode_department = '$kode'";	
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
			
		}
		
		// load opex_trd berdasarkan account dan tahun 
		function opex_trd_acc($no_acc_opex,$year)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE no_acc_opex = '$no_acc_opex' AND year = '$year' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f; 
			
		}
		
		// load opex_trd berdasarkan account dan tahun serta department nya 
		function opex_trd_acc_gabung($no_acc_opex,$year)
		{
			$kode = $this->session->userdata("kode");
			
			$str = "SELECT a.*,b.* FROM opex_tr_detail a, opex_tr b  WHERE (a.no_acc_opex = '$no_acc_opex' AND a.year = '$year') AND b.kode_department = '$kode' AND a.opex_trid = b.opex_trid"; 
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
			
		}
		
		function opex_trd_acc2($no_acc_opex,$year,$month)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE no_acc_opex = '$no_acc_opex' AND year = '$year' AND month = '$month' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f; 
			
		}
				
		function opex_ms_list()
		{
			$str = "SELECT * FROM opex_ms ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
			
		}
		
		function opex_tr_insert($arr)
		{
			$year 			 = $arr["year"];
			$kode_department = $arr["kode_department"];
			$ip_address		 = $_SERVER["REMOTE_ADDR"]; 
			$user_agent   	 = $this->input->user_agent(); 
			$username 		 = $this->session->userdata("email"); 
			
			$str  = "INSERT INTO opex_tr SET 		 		 ";
			$str .= "year = '$year'							,";
			$str .= "kode_department = '$kode_department'	,";
			$str .= "last_update	 = now()				,";
			$str .= "ip_address		 = '$ip_address'		,";
			$str .= "user_agent		 = '$user_agent'		,";
			$str .= "username		 = '$username'			 ";
			
			
			$q = $this->db->query($str);
		
						
			return $q;
			
		}
		
		function opex_tr_update($arr)
		{
			$opex_trid		 = $arr["opex_trid"];
			$year 			 = $arr["year"];
			$kode_department = $arr["kode_department"];
			$ip_address		 = $_SERVER["REMOTE_ADDR"]; 
			$user_agent   	 = $this->input->user_agent(); 
			$username 		 = $this->session->userdata("email"); 
			
			$str  = "UPDATE opex_tr SET 		 		 ";
			//$str .= "year = '$year'							,";
			$str .= "kode_department = '$kode_department'	,";
			$str .= "last_update	 = now()				,";
			$str .= "ip_address		 = '$ip_address'		,";
			$str .= "user_agent		 = '$user_agent'		,";
			$str .= "username		 = '$username'			 ";
			
			$str .= "WHERE opex_trid = '$opex_trid'			 ";
			
			return $q = $this->db->query($str);
		}
		
		function opex_tr_detail_insert($arr_opex_tr)
		{
			$opex_trid	  = $arr_opex_tr["opex_trid"];
			$opex_account = $arr_opex_tr["opex_account"];
			$month		  = $arr_opex_tr["month"];
			$budget 	  = $arr_opex_tr["budget"];
			
			$year 		  = $arr_opex_tr["year"];
			$user_agent   = $arr_opex_tr["user_agent"]; 
			$ip_address	  = $arr_opex_tr["ip_address"];
			
			$str  = "INSERT INTO opex_tr_detail SET		 	 ";
			$str .= "opex_trid		= '$opex_trid'			,";
			$str .= "year 			= '$year'				,";
			$str .= "month			= '$month'				,";
			$Str .= "budget			= '$budget'				,";
			$str .= "no_acc_opex 	= '$opex_account'		,";
			$str .= "user_agent 	= '$user_agent'			,";
			$str .= "ip_address		= '$ip_address'			,";
			$str .= "last_update	= now()					 ";
			
			return $this->db->query($str);	
		}
		
		function opex_tr_detail_update($arr_opex_tr)
		{
			$opex_trd_id  = $arr_opex_tr["opex_trd_id"];
			
			$opex_trid	  = $arr_opex_tr["opex_trid"];
			$opex_account = $arr_opex_tr["opex_account"];
			$month		  = $arr_opex_tr["month"];
			$budget 	  = $arr_opex_tr["budget"];
			
			$year 		  = $arr_opex_tr["year"];
			$user_agent   = $this->input->user_agent(); 
			$ip_address	  = $_SERVER["REMOTE_ADDR"];
			
			$str  = "UPDATE opex_tr_detail SET 		 	 	 ";
			$str .= "year 			= '$year'				,";
			$str .= "month			= '$month'				,";
			$Str .= "budget			= '$budget'				,";
			$str .= "no_acc_opex 	= '$opex_account'		,";
			$str .= "user_agent 	= '$user_agent'			,";
			$str .= "ip_address		= '$ip_address'			,";
			$str .= "last_update	= now()					 ";
			
			$str .= "WHERE opex_trd_id = '$opex_trd_id'		 ";
			
			return $this->db->query($Str);	
			
		}
		
		function delete_opex_tr_detail($opex_trid)
		{
			$str = "DELETE FROM opex_tr_detail WHERE opex_trid = '$opex_trid' ";
			
			return $this->db->query($str);
			
		}
		
		function delete_opex_trd_detail($opex_trd_id)
		{
			$str = "DELETE FROM opex_tr_detail WHERE opex_trd_id = '$opex_trd_id' ";
			
			return $this->db->query($str);	
			
		}
		// per account di tahun tertentu 
		function delete_opex_per_account($opex_trid,$no_acc_opex)
		{
			$str = "DELETE FROM opex_tr_detail WHERE opex_trid = '$opex_trid' AND no_acc_opex = '$no_acc_opex' ";
			
			return $this->db->query($str);	
			
		}
		
		function update_month_budget($arr)
		{
			$month = $arr["month"];
			$budget = $arr["budget"];
			$year = $arr["year"];
			$no_acc_opex = $arr["opex_account"];
			
			
			$str = "UPDATE opex_tr_detail SET budget = '$budget' WHERE month = '$month' AND year = '$year' AND no_acc_opex = '$no_acc_opex' "; 
			$q = $this->db->query($str);
			
		}
		
		function load_month_budget($month,$year,$no_acc_opex)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE month = '$month' AND year = '$year' AND no_acc_opex = '$no_acc_opex' "; 
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
			
		}
		
		// gabung table untuk berdasarkan kode_department
		function load_month_budget_gabung($month,$year,$no_acc_opex)
		{
			$kode = $this->session->userdata("kode");
			
			$str = "SELECT a.*,b.* FROM opex_tr_detail a, opex_tr b WHERE a.month = '$month' AND a.year = '$year' AND a.no_acc_opex = '$no_acc_opex' AND b.kode_department = '$kode' AND a.opex_trid = b.opex_trid "; 
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
		}
		
		// opex_ms untuk opex_detail_add
		// opex_acc berdasarkan opex_trd_detail 
		function opex_acc_trdetail($key)
		{
			// untuk mengenerate no_acc_opex yang ada di opex_ms
			$str = "SELECT * FROM opex_tr_detail WHERE opex_trid = '$key' OR year = '$key' GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
		}
		
		
		// buat opex_trdetail
		function opex_acc_not_trd($key)
		{
			// definisikan dahulu yang sudah ada di trdetail
			$opex_ms2 = $this->opex_acc_trdetail($key);
			
			//PERLU pembaharuan
			
			$str_opex_ms = "SELECT * FROM opex_ms";
			$q_opex_ms = $this->db->query($str_opex_ms);
			$f_opex_ms = $q_opex_ms->result_array();
			
			foreach($opex_ms2 as $omp){
				
				$fopms[] = $omp["no_acc_opex"];
			}
			
			$result = array();
			if(!empty($opex_ms2))
			{
			  foreach($f_opex_ms as $rowa)
			  {
				  if(!in_array($rowa["no_acc_opex"],$fopms))
				  {
					  $result[] = $rowa;
					  
				  }
			  }
			}
			else
			{
				$result = $f_opex_ms;	
			}
			
			return $result;
		}
		
		function opex_acc_trdetail_not($key,$no_acc_opex)
		{
			$str = "SELECT * FROM opex_tr_detail WHERE no_acc_opex <> '$no_acc_opex' AND (  opex_trid = '$key' OR year = '$key' ) GROUP BY no_acc_opex ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
			
		}
		
		function total_budget_year($year)
		{
			
			$str = "SELECT SUM(budget) AS total_budget FROM opex_tr_detail WHERE year = '$year' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f["total_budget"];
			
		}
		
		function total_budget_opex_trd($opex_trid,$arr=array())
		{
			
			$year 		 = $arr["year"];
			$no_acc_opex = $arr["no_acc_opex"];
			
			
			$str  = "SELECT SUM(budget) AS total_budget_opex_trd FROM opex_tr_detail WHERE opex_trid = '$opex_trid' ";
			if(!empty($arr))
			{ 
				$str .=" OR ( year = '$year' AND no_acc_opex = '$no_acc_opex')  ";	
			}
			
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f["total_budget_opex_trd"];
		}
		
		
	}