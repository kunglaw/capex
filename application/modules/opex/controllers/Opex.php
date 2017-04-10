<?php

	class Opex extends MX_COntroller{
		
		private $role_sess;
		
		function __construct()
		{
			parent::__construct();	
			$this->load->model("opex_model");
			$this->load->model("master/division_model");
			$this->load->model("master/department_model");
			$this->load->model("master/opex_account_model","oam");
			
			$this->role_sess = $this->session->userdata("role");
		}
		
		function index()
		{
			
			// list year
			
			$data["title"]	  	  = "Opex - Operation expense";
			$data["header_title"] = "OPEX";
			$data["js_top"]		  = "opex/js_top";
			$data["js_under"]	  = "opex/js_under";
			$data["content"]	  = "opex/content";
			$data["template"] 	  = "opex/template";
			
			$data["opex_tr"] = $this->opex_model->opex_tr_list();
				
			$this->load->view("index",$data);
		}
		
		function detail()
		{
			// list year
			$year_now = date("Y");
			$year_uri = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : $year_now; // year		
			$kode = $this->session->userdata("kode");
			//$opex_tr_detail = $this->opex_model->opex_trd_group($year_uri);
			$sstr = "SELECT * FROM opex_tr WHERE kode_department = '$kode' AND year = '$year_uri'"; 
			$qss = $this->db->query($sstr);
			$ffs = $qss->row_array();
			
			$opex_tr_detail = $this->opex_model->opex_trd_group_gabung($ffs["opex_trid"]);
			
			$arr1["kode_department"] = $this->session->userdata('kode');
			$arr1["kode_div"]	 = $this->session->userdata("kode");
			
			if($this->role_sess == "department" || $this->role_sess == "admin")
			{
				$data["department"]  = $this->department_model->detail_department($arr1);
			}
			else if($this->role_sess == "division")
			{
				$data["division"] = $this->division_model->detail_division($arr1);	
			}
			
			$data["title"]	  	  = "Opex - Operation expense";
			$data["header_title"] = "OPEX";
			
			if($this->role_sess == "department" || $this->role_sess == "admin")
			{
				$data["content"]	  = "opex/detail_opex";
				$data["js_top"]		  = "opex/js_top";
				$data["js_under"]	  = "opex/js_under"; 
			}
			else if($this->role_sess == "division")
			{
				$data["content"]	  = "opex/division/detail_opex";
				$data["js_top"]		  = "opex/division/js_top";
				$data["js_under"]	  = "opex/division/js_under";
			}
			
			$data["template"] 	  = "opex/template";
			
			
			$data["opex_tr_detail"] = $opex_tr_detail;
				
			$this->load->view("index",$data);
			
		}
		
		function add_opex_detail_modal()
		{
			$data["year"]	= $this->input->post("year");
			$data["months"] = $this->config->item("months");
			$data["opex_acc"] = $this->opex_model->opex_ms_list();
			//$data["opex_acc"] = $this->opex_model->opex_acc_not_trd($data["year"]);
			
			//print_r($data["opex_acc"]); exit;
			
			$this->load->view("opex/content/add_opex_detail_modal",$data);
		}
		
		function delete_opex_detail_modal()
		{
			$opex_trid 			 = $this->input->post("opex_trid",TRUE);
			$no_acc_opex 		 = $this->input->post("no_acc_opex",TRUE);
			
			$data["opex_detail"] = $this->opex_model->opex_trd_group3($opex_trid,$no_acc_opex);
			//result_array
			//print_r($data);
			
			$this->load->view("opex/content/delete_opex_detail_modal",$data);	
			
		}
		
		function create()
		{
			
				
			$this->load->view("");
		}
		
	}