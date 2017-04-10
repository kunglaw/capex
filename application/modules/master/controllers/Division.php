<?php

	class Division extends MX_COntroller{
		
		function __construct()
		{
			parent::__construct();
				
			$this->load->model("division_model");
			
		}
		
		function index()
		{
			
			// list year
			
			$data["title"]	  	  = "Division";
			$data["header_title"] = "Division";
			$data["content"]	  = "master/division/content";
			$data["template"] 	  = "master/template";
			$data["js_top"]		  = "master/js_top";
			$data["division"]	  = $this->division_model->list_division();
				
			$this->load->view("index",$data);
		}
		
		function detail()
		{
			// list year
			
			$data["title"]	  	  = "Division";
			$data["header_title"] = "Division";
			$data["content"]	  = "master/division/detail_division";
			$data["template"] 	  = "master/template";
			$data["js_under"]	  = "master/division/js_under"; 
				
			$this->load->view("index",$data);
			
		}
		
		function add_division_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$this->load->view("master/division/add_division");	
			}
			else
			{
				show_404();	
			}
		}
		
		function delete_division_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$kode_div = $this->input->post("kode_div");
				
				$arr_division["kode_div"] = $kode_div;
				
				$division = $this->division_model->detail_division($arr_division);
				
				$data["division"] = $division;
				
				$this->load->view("master/division/confirm_delete",$data);	
			}
			else
			{
				show_404();	
			}	
			
		}
		
		function update_division_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$kode_div = $this->input->post("kode_div");
				
				$arr_division["kode_div"] = $kode_div;
				
				$division = $this->division_model->detail_division($arr_division);
				
				$data["division"] = $division;
				
				$this->load->view("master/division/update_division",$data);	
			}
			else
			{
				show_404();	
			}
			
			
		}
		
		function add_division_process()
		{
			
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
				
			$kode_divisi = $this->input->post("kode_divisi");
			$division    = $this->input->post("divisi");
			$description = $this->input->post("description");
			
			$this->form_validation->set_rules("kode_divisi","Kode Divisi","required|trim");
			$this->form_validation->set_rules("divisi","Divisi","required|trim");
			// $this->form_validation->set_rules("description","Description","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$arr_division["kode_divisi"] = $kode_divisi;
				$arr_division["division"]	 = $division;
				$arr_division["description"] = $description;
				
				$this->division_model->add_division($arr_division);	
				
				$ss  = notif_success("you successfully added Division");
				$ss .= reload(3); 
				$result["message"] = $ss;
				$result["status"]  = "success";
			}
			else
			{
				$err = validation_errors();
				$message = notif_error($err);
				
				$result["message"] = $message; 
				$result["status"] = "error";
				
			}
			
			echo json_encode($result);
			
			
		}
		
		function update_division_process()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
				
			$kode_divisi = $this->input->post("kode_divisi");
			$division    = $this->input->post("divisi");
			$description = $this->input->post("description");
			
			$this->form_validation->set_rules("kode_divisi","Kode Divisi","required|trim");
			$this->form_validation->set_rules("divisi","Divisi","required|trim");
			// $this->form_validation->set_rules("description","Description","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$arr_division["kode_divisi"] = $kode_divisi;
				$arr_division["division"]	 = $division;
				$arr_division["description"] = $description;
				
				$this->division_model->update_division($arr_division);	
				
				$ss  = notif_success("you successfully updated Division");
				$ss .= reload(3); 
				$result["message"] = $ss;
				$result["status"]  = "success";
			}
			else
			{
				$err = validation_errors();
				$message = notif_error($err);
				
				$result["message"] = $message; 
				$result["status"] = "error";
				
			}
			
			echo json_encode($result);
			
		}
		
		function delete_division_process()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
			
			$kode_divisi = $this->input->post("kode_divisi");
			$this->form_validation->set_rules("kode_divisi","Kode Divisi","required|trim");
			
			if($this->form_validation->run() == TRUE)
			{
				$arr_division["kode_divisi"] = $kode_divisi;
				
				$this->division_model->delete_division($arr_division);	
				
				$ss  = notif_success("you successfully delete Division");
				$ss .= reload(3); 
				
				$result["message"] = $ss;
				$result["status"]  = "success";
			}
			else
			{
				$err = validation_errors();
				$message = notif_error($err);
				
				$result["message"] = $message; 
				$result["status"] = "error";
			}
			
			echo json_encode($result);
			
			
		}
		
		function create()
		{
			$this->load->view("");
		}
		
	}