<?php

	class Realization extends MX_Controller{
		
		function __construct()
		{
			parent::__construct();
			parent::__construct ();
			$this->load->model("opex_model");
			$this->load->model("realization_model");
			$this->load->model("master/department_model");
			$this->load->model("master/opex_account_model","ocm");
		}
		
		function index()
		{
			$role_sess = $this->session->userdata("role");
			
			$data["title"] = "Realization List";
			$data["header_title"] = "Realization List";
			if($role_sess == "department" || $role_sess == "admin")
			{
				$data["js_top"] = "opex/js_top";
				$data["js_under"] = "opex/js_under";
			}
			else
			{
				$data["js_top"] = "opex/division/js_top";
				$data["js_under"] = "opex/division/js_under";
			}
			$data["content"] = "opex/content/realization_list";
			$data["template"] = "opex/template";
			
			$data["realization"] = $this->realization_model->list_relization();
			
			$this->load->view("index",$data);
			
		}
		
		function submit_realization()
		{
			// check authentification
						
			$id_realization = $this->input->post("id_realization");
			$data["realization"] = $this->realization_model->realization_detail($id_realization);
			
			$data["opex_trd"] = $this->opex_model->opex_trd_detail_row($data["realization"]["opex_trd_id"]);
			
			$this->load->view("division/submit_realization",$data);	
		}
		
		function submit_realization_process()
		{
			//check authentification
			
			$this->load->library("form_validation");
			$id_realization = $this->input->post("id_realization");
			$this->form_validation->set_rules("id_realization","Realization Id","required");
			
			if($this->form_validation->run() == TRUE)
			{
				
				$dt_realization = $this->realization_model->realization_detail($id_realization);  
				$this->realization_model->update_submited_realization($dt_realization);
				
			    $result["status"] = "success";
			    $result["message"] = notif_success("You Succesfully approved Realization ")." "
			   .reload(3);	
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
		}
		
		function delete_realization()
		{
			
			$id_realization = $this->input->post("id_realization",TRUE);
			
			$data["realization"] = $this->realization_model->realization_detail($id_realization);
			
			$data["opex_trd"]	= $this->opex_model->opex_trd_detail_row($data["realization"]["opex_trd_id"]);
			
			$this->load->view("content/delete_realization_modal",$data);
		}
		
		function delete_realization_process()
		{
			$this->load->library("form_validation");
			$id_realization = $this->input->post("id_realization",TRUE);
			
			$this->form_validation->set_rules("id_realization","Id Realization","required");
			
			if($this->form_validation->run() == TRUE)
			{
				
				$this->realization_model->delete_realization($id_realization);
				
				$result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully deleted Realization ")." "
			   .reload(3);	
			}
			else
			{
				$err = "";
				$err .= validation_errors();
				
				$result["status"] = "error";
				$result["message"] = notif_error($err);
			}
				
			echo json_encode($result);
			
		}
		
		function add_realization()
		{
			$data["year"]   = $this->input->post("year",TRUE);
			$data["months"] = $this->config->item("months");
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["year"]);
			
			$this->load->view("content/add_realization",$data);	
			
		}
		
		function update_realization()
		{
			$id_realization = $this->input->post("id_realization",TRUE);
			$data["realization"] = $this->realization_model->realization_detail($id_realization);
			$data["months"] = $this->config->item("months");
			$data["opex_detail"] =  $this->opex_model->opex_trd_detail_row($data["realization"]["opex_trd_id"]);
			
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["opex_detail"]["year"]);	
			$data["year"]  = $data["opex_detail"]["year"];
			
			$this->load->view("content/update_realization",$data);
		}
		
		function add_realization_process()
		{
			
			$this->load->library("form_validation");
			
			$opex_trd_id = $this->input->post("opex_trd_id",TRUE);
			$kode 		 = $this->input->post("kode_department",TRUE);
			$amount 	 = $this->input->post("amount",TRUE);
			$activity	 = $this->input->post("activity",TRUE);
			$year 		 = $this->input->post("year",TRUE);
			
			$this->form_validation->set_rules("opex_trd_id","Opex Trd id","required");
			$this->form_validation->set_rules("amount","Amount","required|integer");
			$this->form_validation->set_rules("activity","Activity","required");
			$this->form_validation->set_rules("kode_department","Kode","required");
			
			// 
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			//echo json_encode($opex_trd); exit;
			
			$over_budget = FALSE;
			if($amount > $opex_trd["budget"])
			{
				$over_budget = TRUE;	
			}
			
			if($this->form_validation->run() == TRUE && $over_budget === FALSE)
			{
			   
			   $arr["kode_department"] = $kode;
			   $arr["amount"] 		   = $amount;
			   $arr["activity"] 	   = $activity;
			   $arr["opex_trd_id"]	   = $opex_trd_id;
			   $arr["year"]			   = $year;
			   
			   $this->realization_model->add_realization($arr);
					
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully add Realization ")." "
			   .reload(3);	
			}
			else
			{
				
				$err = "";
				if($amount > $opex_trd["budget"])
				{
					
					$err .= "<div> You can't add realization over ".number_format(
					$opex_trd["budget"])." </div>";	
				}
				
				$err .= validation_errors();
				
				$result["status"] = "error";
				$result["message"] = notif_error($err);
			}
			
			echo json_encode($result);
			
		}
		
		function update_realization_process()
		{
			
			$this->load->library("form_validation");
			
			$id_realization = $this->input->post("id_realization",TRUE);
			$opex_trd_id = $this->input->post("opex_trd_id",TRUE);
			$kode 		 = $this->input->post("kode_department",TRUE);
			$amount 	 = $this->input->post("amount",TRUE);
			$activity	 = $this->input->post("activity",TRUE);
			$year		 = $this->input->post("year",TRUE);
			
			$this->form_validation->set_rules("id_realization","Id Realization","required");
			$this->form_validation->set_rules("opex_trd_id","Opex Trd id","required");
			$this->form_validation->set_rules("amount","Amount","required|integer");
			$this->form_validation->set_rules("activity","Activity","required");
			$this->form_validation->set_rules("kode_department","Kode","required");
			
			// 
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			//echo json_encode($opex_trd); exit;
			
			$over_budget = FALSE;
			if($amount > $opex_trd["budget"])
			{
				$over_budget = TRUE;	
			}
			
			if($this->form_validation->run() == TRUE && $over_budget === FALSE)
			{
			   $arr["id_realization"]  = $id_realization;
			   $arr["kode_department"] = $kode;
			   $arr["amount"] 		   = $amount;
			   $arr["activity"] 	   = $activity;
			   $arr["opex_trd_id"]	   = $opex_trd_id;
			   $arr["year"]			   = $year;
			   
			   $this->realization_model->update_realization($arr);
					
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully add Realization ")." "
			   .reload(3);	
			}
			else
			{
				
				$err = "";
				if($amount > $opex_trd["budget"])
				{
					
					$err .= "<div> You can't add realization over ".number_format(
					$opex_trd["budget"])." </div>";	
				}
				
				$err .= validation_errors();
				
				$result["status"] = "error";
				$result["message"] = notif_error($err);
			}
			
			echo json_encode($result);
			
		}
		
	}