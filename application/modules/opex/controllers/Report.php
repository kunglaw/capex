<?php

	class Report extends MX_Controller {
		
		private $role_sess;
		
		function __construct()
		{
			parent::__construct();	
			
			$this->load->model("opex_model");
			$this->load->model("additional_model");
			$this->load->model("realization_model");
			$this->load->model("report_model");
			
			$this->load->model("master/division_model");
			$this->load->model("master/department_model");
			$this->load->model("master/opex_account_model","oam");

			$this->role_sess = $this->session->userdata("role");
			
		}
		
		function index()
		{
			$year_now = date("Y");
			$year_uri = !empty($this->input->get("year")) ? $this->input->get("year") : $year_now; // year
			//$year_uri = !empty($year) ? $year : $year_now;
			
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
			
			$data["title"] 			= "Opex Report";
			$data["header_title"]   = "Opex Report";				
			
			$data["content"] 		= "opex/content/report";
			$data["template"] 		= "opex/template";
			
			$data["opex_tr_detail"] = $opex_tr_detail;
			//$data["list_additional"] = $this->am->list_additional();
			
			$this->load->view("index",$data);	
			
		}
		
		function reload_year()
		{
			$year_select = $this->input->post("year_select",TRUE);
			
			header("location:".base_url("opex/report/?year=$year_select"));	
			
			
		}
		
		function report_pdf()
		{
			
			$this->load->library("M_pdf");
			
			$date = date("d-m-Y"); 
			$year_now = date("Y");
			$year_uri = !empty($this->input->get("year")) ? $this->input->get("year") : $year_now; // year
			//$year_uri = !empty($year) ? $year : $year_now;
			
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
			
			$data["title"] 			= "Opex Report";
			$data["header_title"]   = "Opex Report";				
			
			$data["content"] 		= "opex/content/report";
			$data["template"] 		= "opex/template";
			
			$data["opex_tr_detail"] = $opex_tr_detail;
			//$data["list_additional"] = $this->am->list_additional();
			
			$year_now = date("Y");
			$this_year = date("Y") + 3;
	
 			$bulan = $this->config->item("months");
			
			$data["bulan"] = $bulan;
			$data["this_year"] = $this_year;
			$data["year_uri"] = $year_uri;
			
			$html = $this->load->view("opex/content/table_report_pdf",$data,true);	
			
			$this->m_pdf->generate_pdf($html, "Capex Report $year_now -  $date.pdf");
			
		}
		
	}