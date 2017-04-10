<?php 

	class Transfer extends MX_Controller{
		
		function __construct()
		{
			parent::__construct ();
			$this->load->model("opex_model");
			$this->load->model("transfer_model");
			$this->load->model("master/department_model");
			$this->load->model("master/opex_account_model","ocm");
		}
		
		function index()
		{
			$role_sess = $this->session->userdata("role");
			
			$data["title"] 			= "Transfer List";
			$data["header_title"]   = "Transfer List";
			if($role_sess == "admin" || $role_sess == "department")
			{
				$data["js_top"] 		= "opex/js_top";
				$data["js_under"] 		= "opex/js_under";
			}
			else if($role_sess == "division")
			{
				$data["js_top"] 		= "opex/division/js_top";
				$data["js_under"] 		= "opex/division/js_under";
			}
			
			$data["content"] 		= "opex/content/transfer_list";
			$data["template"] 		= "opex/template";
			
			$data["list_transfer"] = $this->transfer_model->transfer_list();
			
			$this->load->view("index",$data);
			
		}
		
		function submit_transfer()
		{
			$trf_tr_id = $this->input->post("trf_tr_id",TRUE);	
			
			$data["transfer"] = $this->transfer_model->transfer_detail_row($trf_tr_id);  
			$data["opex_trd"] = $this->opex_model->opex_trd_detail_row($data["transfer"]["opex_trd_id"]);
			
			//print_r($data["additional"]);
			$this->load->view("division/submit_transfer",$data);	
		}
		
		function submit_transfer_process()
		{
			$this->load->library("form_validation");	
			
			$trf_tr_id = $this->input->post("trf_tr_id",TRUE);
			
			$this->form_validation->set_rules("trf_tr_id","Transfer Id","required");
			
			if($this->form_validation->run() == TRUE)
			{
				$dt_transfer = $this->transfer_model->transfer_detail_row($trf_tr_id);  
				$this->transfer_model->update_submited_transfer($dt_transfer);
				
			    $result["status"] = "success";
			    $result["message"] = notif_success("You Succesfully approved Transfer ")." "
			   .reload(3);	
				
			}
			else
			{
				$result["status"] = "error";
				$result["message"] = notif_error(validation_errors());
			}
			
			echo json_encode($result);
			
		}
		
		function update_transfer()
		{
			$trf_tr_id = $this->input->post("trf_tr_id",TRUE);
			
			$data["transfer"] = $this->transfer_model->transfer_detail_row($trf_tr_id); 
			$data["opex_detail"] =  $this->opex_model->opex_trd_detail_row($data["transfer"]["opex_trd_id"]);
			$data["months"] = $this->config->item("months");
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["opex_detail"]["year"]);	
			$data["year"]  = $data["opex_detail"]["year"];
			$this->load->view("content/update_transfer_form",$data);
		}
		
		function add_transfer()
		{
			$data["year"]	= $this->input->post("year",TRUE);
			$data["months"] = $this->config->item("months");
			$data["opex_acc"] = $this->opex_model->opex_acc_trdetail($data["year"]);	
			
			$this->load->view("content/add_transfer_form",$data);	
			
		}
		
		function update_transfer_process()
		{
			$this->load->library("form_validation");
			
			$trf_tr_id			= $this->input->post("trf_tr_id",TRUE);
			$year 			 	= $this->input->post("year",TRUE);
			$kode_department 	= $this->input->post("kode_department",TRUE);
			$opex_trd_id	 	= $this->input->post("opex_trd_id",TRUE);
			$opex_trd_id_to		= $this->input->post("opex_trd_id_to",TRUE);
			$opex_account_from	= $this->input->post("opex_account_from",TRUE);
			$opex_account_to	= $this->input->post("opex_account_to",TRUE);
			$month_from			= $this->input->post("month_from",TRUE);
			$month_to			= $this->input->post("month_to",TRUE);
			$budget 			= $this->input->post("budget",TRUE);
			
			$this->form_validation->set_rules("trf_tr_id","Transfer Id","required|trim");
			$this->form_validation->set_rules("opex_account_from","Transfer from","required|trim");
			$this->form_validation->set_rules("opex_account_to","Transfer to","required|trim");
			$this->form_validation->set_rules("opex_trd_id","Opex Trd id From","required|trim");
			$this->form_validation->set_rules("opex_trd_id_to","Opex Trd id To","required|trim");
			$this->form_validation->set_rules("month_from","Month From","required|trim");
			$this->form_validation->set_rules("month_to","Month To","required|trim");
			$this->form_validation->set_rules("budget","Budget","required|trim");
			
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			//print_r($_POST); exit;
			//echo json_encode($opex_trd); exit;
			
			$over_budget = FALSE;
			if($budget > $opex_trd["budget"])
			{
				$over_budget = TRUE;	
			}
			
			if($this->form_validation->run() == TRUE && $over_budget === FALSE)
			{
				$arr["trf_tr_id"]		= $trf_tr_id;
				$arr["year"] 			= $year;
				$arr["opex_trd_id"] 	= $opex_trd_id;
				$arr["opex_trd_id_to"]	= $opex_trd_id_to;
				$arr["opex_account_to"]	= $opex_account_to;
				$arr["month_from"]		= $month_from;
				$arr["month_to"]		= $month_to;
				$arr["budget"]			= $budget;
				
				$this->transfer_model->update_transfer($arr);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully update Transfer account ")." "
			   .reload(3);	
			}
			else
			{
				$err = "";
				if($amount > $opex_trd["budget"])
				{
					
					$err .= "<div> You can't Transfer over ".number_format(
					$opex_trd["budget"])." for this account $opex_trd[no_acc_opex] </div>";	
				}
				
				$err .= validation_errors();
				
				$result["status"] = "error";
				$result["message"] = notif_error($err);
			}
			
			echo json_encode($result);
			
			
		}
		
		function add_transfer_process()
		{
			$this->load->library("form_validation");
			
			$year 			 	= $this->input->post("year",TRUE);
			$kode_department 	= $this->input->post("kode_department",TRUE);
			$opex_trd_id	 	= $this->input->post("opex_trd_id",TRUE);
			$opex_trd_id_to		= $this->input->post("opex_trd_id_to",TRUE);
			$opex_account_from	= $this->input->post("opex_account_from",TRUE);
			$opex_account_to	= $this->input->post("opex_account_to",TRUE);
			$month_from			= $this->input->post("month_from",TRUE);
			$month_to			= $this->input->post("month_to",TRUE); 
			$budget 			= $this->input->post("budget",TRUE);
			
			$this->form_validation->set_rules("opex_account_from","Transfer from","required|trim");
			$this->form_validation->set_rules("opex_account_to","Transfer to","required|trim");
			$this->form_validation->set_rules("opex_trd_id","Opex Trd id From","required|trim");
			$this->form_validation->set_rules("opex_trd_id_to","Opex Trd id to","required|trim");
			$this->form_validation->set_rules("month_from","Month From","required|trim");
			$this->form_validation->set_rules("month_to","MOnth To","required|trim");
			$this->form_validation->set_rules("budget","Budget","required|trim");
			
			$opex_trd = $this->opex_model->opex_trd_detail_row($opex_trd_id);
			
			//echo json_encode($opex_trd); exit;
			
			$over_budget = FALSE;
			if($budget > $opex_trd["budget"])
			{
				$over_budget = TRUE;	
			}
			
			if($this->form_validation->run() == TRUE && $over_budget === FALSE)
			{
				$arr["year"] 			= $year;
				$arr["opex_trd_id"] 	= $opex_trd_id;
				$arr["opex_trd_id_to"]  = $opex_trd_id_to;
				$arr["opex_account_to"]	= $opex_account_to;
				$arr["month_from"]		= $month_from;
				$arr["month_to"]		= $month_to;
				$arr["budget"]			= $budget;
				
				$this->transfer_model->add_transfer($arr);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully add Transfer account ")." "
			   .reload(3);	
			}
			else
			{
				$err = "";
				if($amount > $opex_trd["budget"])
				{
					
					$err .= "<div> You can't Transfer over ".number_format(
					$opex_trd["budget"])." for this account $opex_trd[no_acc_opex] </div>";	
				}
				
				$err .= validation_errors();
				
				$result["status"] = "error";
				$result["message"] = notif_error($err);
			}
			
			echo json_encode($result);
			
		}
		
		function delete_transfer()
		{
			$trf_tr_id = $this->input->post("trf_tr_id",TRUE);
			
			$data["transfer"] = $this->transfer_model->transfer_detail_row($trf_tr_id);
			$data["opex_trd"]	= $this->opex_model->opex_trd_detail_row($data["transfer"]["opex_trd_id"]);
			
			//print_r($data); exit;
			
			$this->load->view("opex/content/delete_transfer_modal",$data);
			
		}
		
		function delete_transfer_process()
		{
			$this->load->library("form_validation");
			
			$trf_tr_id = $this->input->post("trf_tr_id",TRUE);
			$this->form_validation->set_rules("trf_tr_id","Transfer id","required|trim");
			
			if($this->form_validation->run() == TRUE)
			{
				
				$this->transfer_model->delete_transfer($trf_tr_id);
				
			   $result["status"] = "success";
			   $result["message"] = notif_success("You Succesfully deleted this Transfer ")." "
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