<?php

	class Department extends MX_COntroller{
		
		function __construct()
		{
			parent::__construct();	
			$this->load->model("division_model");
			$this->load->model("department_model");
		}
		
		function index()
		{
			
			// list year
			
			$data["title"]	  	  = "Department";
			$data["header_title"] = "Department";
			$data["content"]	  = "master/department/content";
			$data["template"] 	  = "master/template";
			$data["js_top"]		  = "master/js_top";
			$data["js_under"]	  = "master/js_under";
			$data["department"]	  = $this->department_model->list_department();
				
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
		
		function add_department_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$data["division"] =  $this->division_model->list_division();
				$this->load->view("master/department/add_department",$data);	
			}
			else
			{
				show_404();	
			}
		}
		
		function update_department_modal()
		{
			
			$is_ajax = $this->input->is_ajax_request();
			
			if($is_ajax)
			{
				$data["division"] =  $this->division_model->list_division();
				$kode_department = $this->input->post("kode_department");
				
				$arr_department["kode_department"] = $kode_department;
				
				$department = $this->department_model->detail_department($arr_department);
				
				$data["department"] = $department;
				
				$this->load->view("master/department/update_department",$data);	
			}
			else
			{
				show_404();	
			}
		}
		
		function add_department_process()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
			
			$kode_department = $this->input->post("kode_department");
			$department		 = $this->input->post("department");
			$kode_div		 = $this->input->post("division");
			$description	 = $this->input->post("description");
			
			$this->form_validation->set_rules("kode_department","Kode Department","trim|required");
			$this->form_validation->set_rules("department","department","required|trim");
			$this->form_validation->set_rules("division","Division","required|trim");
			$this->form_validation->set_rules("description","Description","trim");
			
			if($this->form_validation->run() == true)
			{
				$arr_department["kode_department"] = $kode_department;
				$arr_department["department"]	   = $department;
				$arr_department["kode_div"]		   = $kode_div;
				$arr_department["description"]	   = $description;
				
				$this->department_model->add_department($arr_department);
				
				$ss  = notif_success("you successfully added Department");
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
		
		function update_department_process()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
			
			$kode_department = $this->input->post("kode_department");
			$department		 = $this->input->post("department");
			$kode_div		 = $this->input->post("division");
			$description	 = $this->input->post("description");
			
			$this->form_validation->set_rules("kode_department","Kode Department","trim|required");
			$this->form_validation->set_rules("department","department","required|trim");
			$this->form_validation->set_rules("division","Division","required|trim");
			$this->form_validation->set_rules("description","Description","trim");
			
			$arr_department["kode_department"] = $kode_department;
			$check_department = $this->department_model->detail_department($arr_department); 
			
			if($this->form_validation->run() == TRUE)
			{
				$arr_department["kode_department"] = $kode_department;
				$arr_department["department"]	   = $department;
				$arr_department["kode_div"]		   = $kode_div;
				$arr_department["description"]	   = $description;
				
				$this->department_model->update_department($arr_department);
				
				$ss  = notif_success("you successfully updated Department");
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
		
		function delete_department_modal()
		{
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$kode_department = $this->input->post("kode_department"); 
			
			$arr_department["kode_department"] = $kode_department;
			
			$data["department"] = $this->department_model->detail_department($arr_department);
			print_r($data);
			
			$this->load->view("department/confirm_delete",$data);
		}
		
		function delete_department_process()
		{
			
			$is_ajax = $this->input->is_ajax_request();
			if(!$is_ajax)
			{
				show_404();
				exit;	
			}
			
			$this->load->library("form_validation");
			
			$kode_department = $this->input->post("kode_department");
			$this->form_validation->set_rules("kode_department","Kode Department","trim|required");
			
			if($this->form_validation->run() == true)
			{
				$arr_division["kode_department"] = $kode_department;
				
				$this->department_model->delete_department($arr_division);	
				
				$ss  = notif_success("you successfully delete Department");
				$ss .= reload(3); 
				
				$result["message"] = $ss;
				$result["status"]  = "success";
				
				
			}
			else
			{
				
			}
			
			echo json_encode($result);
			
		}
		
		function create()
		{
			$this->load->view("");
		}
		
	}