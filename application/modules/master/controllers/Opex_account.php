<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Opex_account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master/opex_account_model',"opex_account_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $opex_ms = $this->opex_account_model->get_all();

        $data = array(
            'opex_ms_data' => $opex_ms
        );
		
		$data["title"] = "Opex Account";
		$data["header_title"] = "Opex Account";
		$data["template"] = "master/template";
		$data["content"] = "opex/opex_ms_list";
		
        $this->load->view('index', $data);
    }

    public function read($id) 
    {
        $row = $this->opex_account_model->get_by_id($id);
		
        if ($row) {
            $data = array(
			'no_acc_opex' => $row["no_acc_opex"],
			'account_name' => $row["account_name"],
			'detail' => $row["detail"],
			'aktivasi' => $row["aktivasi"],
			'controllable' => $row["controllable"],
			'cost_pool' => $row["cost_pool"],
			'description' => $row["description"],
			);
			
			$data["title"] = "Opex Account";
			$data["header_title"] = "Opex Account Detail";
			$data["template"] = "master/template";
			$data["content"] = "opex/opex_ms_read";
			
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('opex_ms'));
        }
    }

    public function create() 
    {
        
        $this->load->view('opex/opex_ms_form');
    }
    
    public function create_action() 
    {
        $this->_rules();
		
		//print_r($_POST); 
		//var_dump($this->form_validation->run());
		//exit;
		
		
		$no_account_opex = $this->input->post("no_acc_opex",TRUE);
		//echo $no_account_opex; exit;
		$ocm = $this->opex_account_model->check_account($no_account_opex);
		
        if ($this->form_validation->run() == FALSE || !empty($ocm)) {
		  
		  $err  = "";
		  if(!empty($ocm))
		  {	
			  $err .= "No. account opex has been used ";
		  }
		  
          $err .= validation_errors();
		  $message = notif_error($err);
		  
		  $result["message"] = $message;
		  $result["status"]  = "error";			
			
        } else {
			
            $data = array(
				//'account_name'  => $this->input->post('account_name',TRUE),
				'no_acc_opex'	=> $this->input->post("no_acc_opex",TRUE),
				'detail' 		=> $this->input->post('detail',TRUE),
				'aktivasi' 		=> $this->input->post('aktivasi',TRUE),
				'controllable'  => $this->input->post('controllable',TRUE),
				'cost_pool' 	=> $this->input->post('cost_pool',TRUE),
				'description' 	=> $this->input->post('description',TRUE),
			);

            $this->opex_account_model->insert($data);
            
			$ss  = notif_success("you successfully added Opex Account");
			$ss .= reload(3); 
			$result["message"] = $ss;
			$result["status"]  = "success";
        }
		
		echo json_encode($result);
    }
    
    public function update() 
    {
		$id = $this->input->post("id");
        $row = $this->opex_account_model->get_by_id($id);

        if ($row) {
			
            $data = array(
              
				'no_acc_opex'  => set_value('no_acc_opex', $row["no_acc_opex"]),
				'account_name' => set_value('account_name', $row["account_name"]),
				'detail' 	   => set_value('detail', $row["detail"]),
				'aktivasi' 	   => set_value('aktivasi', $row["aktivasi"]),
				'controllable' => set_value('controllable', $row["controllable"]),
				'cost_pool'    => set_value('cost_pool', $row["cost_pool"]),
				'description'  => set_value('description', $row["description"]),
	    	);
			
            $this->load->view('opex/opex_ms_update', $data);
			
        } else {
           
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		
		$no_account_opex = $this->input->post("no_acc_opex",TRUE);
		$no_account_opex2 = $this->input->post("nO_acc_opex2",TRUE);
		//print_r($_POST); exit;
		//echo $no_account_opex; exit;
		$ocm = $this->opex_account_model->check_account($no_account_opex);
		
        if ($this->form_validation->run() == FALSE ) {
		  
		  $err  = "";
		  $update_no_acc = "no";
		  
		  if($no_account_opex != $no_account_opex2)
		  {
			  $update_no_acc = "yes";
		  }
		  
		  if(!empty($ocm) && $update_no_acc == "yes")
		  {	
			  $err .= "No. account opex has been used ";
		  }
		  
		  $err .= validation_errors();
		  $message = notif_error($err);
		  
		  $result["message"] = $message; 
		  $result["status"]  = "error";
		  
        } else {
			
			
			
            $data = array(
				'no_acc_opex2' => $this->input->post("no_acc_opex2",TRUE),
				'no_acc_opex'  => $this->input->post("no_acc_opex",TRUE),
				'account_name' => $this->input->post('account_name',TRUE),
				'detail' 	   => $this->input->post('detail',TRUE),
				'aktivasi' 	   => $this->input->post('aktivasi',TRUE),
				'controllable' => $this->input->post('controllable',TRUE),
				'cost_pool'    => $this->input->post('cost_pool',TRUE),
				'description'  => $this->input->post('description',TRUE)
				
			);

            $this->opex_account_model->update($no_account_opex,$data);
            
			$ss  = notif_success("you successfully updated this Opex Account");
			$ss .= reload(3); 
			
			$result["message"] = $ss;
			$result["status"]  = "success";
			
        }
		
		echo json_encode($result);
    }
    
	function delete_confirmation()
	{
		$id = $this->input->post("id");	
		
		$data["opex_account"] = $this->opex_account_model->get_by_id_row($id);
		//print_r($data); exit;
		
		//load view
		$this->load->view("opex/confirm_delete",$data);
		
	}
	
    public function delete() 
    {
		$no_acc_opex = $this->input->post("no_acc_opex"); 
		//print_r($_POST);
		//exit;
        $row = $this->opex_account_model->check_account($no_acc_opex);

        if ($row) {
            $this->opex_account_model->delete($no_acc_opex);
			
			$ss  = notif_success("you successfully deleted this Opex Account");
			$ss .= reload(3); 
			$result["message"] = $ss;
			$result["status"]  = "success";
			
           
        } else {
           $err = validation_errors();
			$message = notif_error($err);
			
			$result["message"] = $message; 
			$result["status"]  = "error";
           
        }
		
		echo json_encode($result);
    }

    public function _rules() 
    {
		//$this->form_validation->set_rules('account_name', 'account name', 'trim|required');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required');
		$this->form_validation->set_rules('aktivasi', 'aktivasi', 'trim|required');
		$this->form_validation->set_rules('controllable', 'controllable', 'trim|required');
		$this->form_validation->set_rules('cost_pool', 'cost pool', 'trim|required');
		//$this->form_validation->set_rules('description', 'description', 'trim');
	
		$this->form_validation->set_rules('no_acc_opex', 'No Account Opex', 'required|trim');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }

}

/* End of file Opex_ms.php */
/* Location: ./application/controllers/Opex_ms.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-13 17:42:51 */
/* http://harviacode.com */