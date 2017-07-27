<?php 

	class Additional extends MX_Controller {
		
		function __construct()
		{
			parent::__construct();	
			
			$this->load->model("opex_model");
			$this->load->model("additional_model","am");
			$this->load->model("master/department_model");
			$this->load->model("master/division_model");
			$this->load->model("master/opex_account_model","ocm");
		}
		
		function index()
		{
			$role_sess = $this->session->userdata("role");
			
			$data["title"] = "Additional List";
			$data["header_title"] = "Additional List";
			if($role_sess == "admin" || $role_sess == "department")
			{
				$data["js_top"] = "opex/js_top";
				$data["js_under"] = "opex/js_under";
			}
			else
			{
				$data["js_top"] = "opex/division/js_top";
				$data["js_under"] = "opex/division/js_under";	
				
			}
			$data["content"] = "opex/content/additional_list";
			$data["template"] = "opex/template";
			
			
			$data["list_additional"] = $this->am->list_additional();
			
			$this->load->view("index",$data);
		}
		
		function submit_additional()
		{
			
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			
			$data["additional"] = $this->am->detail_additional($add_tr_id);  
			$data["opex_trd"] = $this->opex_model->opex_trd_detail_row($data["additional"]["opex_trd_id"]);
			
			//print_r($data["additional"]);
			$this->load->view("division/submit_additional",$data);	
		}
		
		function submit_additional_process()
		{
			$this->load->library("form_validation");	
			
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			
			$this->form_validation->set_rules("add_tr_id","Additional Id","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$dt_additional = $this->am->detail_additional($add_tr_id);  
				$this->am->update_submited_additional($dt_additional);
				
			    $result["status"] = "success";
			    $result["message"] = notif_success("You Succesfully approved Additional ")." "
			   .reload(3);	
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
		}
		
		function add_additional()
		{
			
			$data["year"]   = $this->input->post("year",TRUE);
			$data["months"] = $this->config->item("months");
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["year"]);
						
			$this->load->view("content/add_additional_form",$data);	
			
		}
		
		function update_additional()
		{
			
			//$data["months"] = $this->config->item("months");
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			
			
			$data["add_detail"] = $this->am->detail_additional($add_tr_id);
			
			
			
			$data["opex_detail"] = $this->opex_model->opex_trd_detail_row($data["add_detail"]["opex_trd_id"]);
			
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["opex_detail"]["opex_trid"]);
			
			$data["year"]   = $data["opex_detail"]["year"];
			
			//print_r($data["add_detail"]); exit;
			
			$this->load->view("content/update_additional_form",$data);	
			
		}
		
		function delete_additional()
		{
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			
			$data["additional"] = $this->am->detail_additional($add_tr_id);
			$data["opex_trd"]	= $this->opex_model->opex_trd_detail_row($data["additional"]["opex_trd_id"]);
			
			//print_r($data);
			
			$this->load->view("opex/content/delete_additional_modal",$data);
			
		}
		
		function add_additional_process()
		{
			$this->load->library("form_validation");
			
			$opex_trd_id = $this->input->post("opex_trd_id");
			$budget		 = $this->input->post("budget");
			$kode		 = $this->input->post("kode_department");
			$year 		 = $this->input->post("year");
			$reason 	 = $this->input->post("reason");
			
			$this->form_validation->set_rules("opex_trd_id","Opex detail","required");
			$this->form_validation->set_rules("budget","Budget","required");
			$this->form_validation->set_rules("year","Year","required");
			$this->form_validation->set_rules("reason","Reason","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$arr["opex_trd_id"] = $opex_trd_id;
				$arr["kode"] 		= $kode;
				$arr["budget"] 		= $budget;
				$arr["reason"]		= $reason;
				
				$this->am->insert_additional($arr);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully add Additional ")." "
			   .reload(3);	
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
	
		}
		
		function load_additional()
		{
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			
			$dt = $this->am->detail_additional($add_tr_id);
			
			echo json_encode($dt);
			
		}
		
		function update_additional_process()
		{
			$this->load->library("form_validation");
			
			$add_tr_id	 = $this->input->post("add_tr_id");
			$opex_trd_id = $this->input->post("opex_trd_id");
			$budget		 = $this->input->post("budget");
			$kode		 = $this->input->post("kode_department");
			$year 		 = $this->input->post("year");
			$reason		 = $this->input->post("reason");
			
			//print_r($_POST);
			
			$this->form_validation->set_rules("add_tr_id","Additional Id","required");
			$this->form_validation->set_rules("opex_trd_id","Opex detail","required");
			$this->form_validation->set_rules("budget","Budget","required");
			$this->form_validation->set_rules("year","Year","required");
			$this->form_validation->set_rules("reason","Reason","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$arr["add_tr_id"]	= $add_tr_id;
				$arr["opex_trd_id"] = $opex_trd_id;
				$arr["kode"] 		= $kode;
				$arr["budget"] 		= $budget;
				$arr["reason"]		= $reason;
				
				$this->am->update_additional($arr);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully updated Additional ")." "
			   .reload(3);	
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
		}
		
		function delete_additional_process()
		{
			$this->load->library("form_validation");
			
			$add_tr_id = $this->input->post("add_tr_id",TRUE);
			$this->form_validation->set_rules("add_tr_id","Additional id","required|trim");
			
			if($this->form_validation->run() == TRUE)
			{
				
				$this->am->delete_additional($add_tr_id);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully deleted this Additional ")." "
			   .reload(3);	
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
			
			
			
		}
		
		
		
	}