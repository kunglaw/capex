<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller users, module users

class Users extends MX_Controller {

	function __construct()
	{
		
		parent::__construct();
        $this->load->model('users_model');
		//$this->load->model("user_model");
        $this->load->library('form_validation');
		
		$this->load->helper("general");
			
	}
	
	public function login()
	{
		$this->index();
	}
	
	public function user_list()
	{
		
		$users = $this->users_model->get_all();

        $data = array(
            'users_data' => $users
        );
		
		$data["title"]	  	  = "User - User list";
		$data["header_title"] = "User";
		$data["content"]	  = "users/users_list";
		$data["template"] 	  = "users/template";
			
		$this->load->view("index",$data);
		
		
	}

	public function index()
	{
		
		$data["title"] = "Login";
		
		$this->load->view("login",$data);
		
	}
	
	public function register()
	{
		$data["title"] = "Register";	
		$this->load->view("register",$data);
	}
	
	function load_jabatan()
	{
		$is_ajax = $this->input->is_ajax_request();
		if(!$is_ajax)
		{
			show_404();
			exit;	
		}
		
		$this->load->model("master/json_ajax");	
		
		$role = $this->input->post("role");
		
		if($role == "division")
		{
			$this->json_ajax->select_division();
		}
		else
		{
			$this->json_ajax->select_department();	
		}
		
		
	}
	
	public function read($id) 
    {
        $row = $this->users_model->detail_users_row($id);
		
        if ($row) {
			
            $data = array(
				'id' => $row["id"],
				'name' => $row["name"],
				'email' => $row["email"],
				'role' => $row["role"],
				'kode' => $row["kode"],
				'photo' => $row["photo"],
				'password' => $row["password"],
				'created_at' => $row["created_at"],
				'updated_at' => $row["updated_at"],
			);
			
			$data["title"] 		  = "User Detail";
			$data["header_title"] = "User Detail";
			$data["template"] 	  = "users/template";
			$data["content"] 	  = "users/users_read";
			
            $this->load->view('index', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
	}
    
    public function create_action() 
    {
		$name  = $this->input->post('name',TRUE);
		$email = $this->input->post('email',TRUE);
		$role = $this->input->post('role',TRUE);
		$password = $this->input->post('password',TRUE);
		$agreement = $this->input->post("agreement",TRUE); 
		
		$a = explode("@",$email);
		$username = $a[0];
				
		if($role == "department")
		{
			$kode = $this->input->post("department",TRUE);	
			$this->form_validation->set_rules("department","Department","required");
		}
		else
		{
			$kode = $this->input->post("division",TRUE);	
			$this->form_validation->set_rules("division","Division","required");
		}
		
		$photo =  $_FILES["photo"];
		
        $this->_rules();
		
		//check_email
		$check_email = $this->users_model->check_email($email);
		
		
        if ($this->form_validation->run() == FALSE || !empty($check_email) || $agreement == FALSE) {
            
			$email_err = "";
			if(!empty($check_email))
			{
				$email_err .= "<div> Email has been used </div>";
			}
			if($agreement == FALSE)
			{
				$email_err .= "<div> You must accept the agreement </div>";	
			}
			
			$error = notif_error(validation_errors().$email_err);
			$this->session->set_flashdata('message',$error);
			redirect(site_url("users/register"));
			
        } else {
			
			$new_name = "";
			if(!empty($_FILES))
			{
				$pathinfo = pathinfo($photo["name"]);
				$new_name = $username.".".$pathinfo["extension"];
				
				if(move_uploaded_file($photo["tmp_name"],"resources/upload/$new_name"))
				{
					echo "success upload";	
				}
			}
						
            $data = array(
				'name' => $name,
				'email' => $email,
				'role' => $role,
				'kode' => $kode,
				'photo' => $new_name,
				'password' =>  password_hash($password,PASSWORD_BCRYPT),
				'created_at' => date("Y-m-d H:i:s"),
				//'updated_at' => date("d-m-Y H:i:s"),
			);

            $this->users_model->insert($data);
            $this->session->set_flashdata('message', notif_success('Create Record Success'));
            redirect(site_url('users/login'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->users_model->detail_users_row($id);
		
        if ($row) {
            $data = array(
			
					'button' => 'Update',
					'action' => site_url('users/update_action'),
					'id' 	 => set_value('id', $row["id"]),
					'name'   => set_value('name', $row["name"]),
					'email'  => set_value('email', $row["email"]),
					'role'   => set_value('role', $row["role"]),
					'kode'   => set_value('kode', $row["kode"]),
					'photo'  => set_value('photo', $row["photo"]),
				
					
			);
			
			$data["title"] 		  = "User Detail";
			$data["header_title"] = "User Detail";
			$data["template"] 	  = "users/template";
			$data["content"] 	  = "users/users_form";
			
            $this->load->view('index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
		$name  = $this->input->post('name',TRUE);
		$email = $this->input->post('email',TRUE);
		$role  = $this->input->post('role',TRUE);
		$username = $this->session->userdata("username");
		$password = $this->input->post("password",TRUE);
		$new_pass = $this->input->post("new_pass",TRUE);
		$repeat_pass = $this->input->post("repeat_pass",TRUE);
		$id = $this->input->post("id",TRUE);
		
		if($role == "department")
		{
			$kode = $this->input->post("department",TRUE);	
		}
		else
		{
			$kode = $this->input->post("division",TRUE);	
		}
		
		$password =  $this->input->post("password",TRUE);
		$photo = $_FILES["photo"];
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		//$this->form_validation->set_rules('role', 'role', 'trim|required');
		
		$update_password = "no";
		$check_pass = $this->users_model->check_password($username,$password);
		if(!empty($password) && !empty($check_pass))
		{
			$update_password = "yes";
			$this->form_validation->set_rules("new_pass","New Password","required|matches[repeat_pass]");
			
		}
		
        //$this->_rules();
		//check_email
		$check_email = $this->users_model->check_email($email);
		$check_email2 = $this->users_model->check_email2($email,$check_email["email"]);
        if ($this->form_validation->run() == FALSE || !empty($check_email2)) {
			
			$email_err = "";
			if(!empty($check_email))
			{
				$email_err = "<div> Email has been used </div>";
			}
			
			$error_text = validation_errors()." ".$email_err;
			
			$result["status"] = "error";
			$result["message"] = notif_error($error_text);
            // $this->update($this->input->post('id', TRUE));
			
        } else {
			
			$photo = $_FILES["photo"];
			if(!empty($photo))
			{
				$update_photo = "yes";
				$pathinfo = pathinfo($photo["name"]);
				$new_name = $username.".".$pathinfo["extension"];
				
				if(move_uploaded_file($photo["tmp_name"],"resources/upload/$new_name"))
				{
					echo "success upload";	
				}
			}
			else
			{
				$update_photo = "no";
				$photo["name"] = "";	
			}
			
			$data = array(
			  	  'name' => $name,
				  'email' => $email
				  //'role' => $role,
				  //'kode' => $kode			  
			);
			
			if($update_photo == "yes")
			{
				$this->users_model->update_photo( $username,$photo["name"]);	
			}
			
			if($update_password == "yes")
			{
				$this->users_model->update_password($username,$new_pass);
			}
			
            $this->users_model->update($this->input->post('id', TRUE), $data);
           
            $result["status"] = "success";
			$result["message"] = notif_success("You successfully updated this user");
        }
		
		//echo json_encode($result);
		 $this->session->set_flashdata('message', $result["message"]);
		 redirect(site_url("users/update/$id"));
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('role', 'role', 'trim|required');
		//$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		//$this->form_validation->set_rules('photo', 'photo', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		//$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		//$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_value("agreement","Agreement","required");
	
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	function __destruct()
	{
		
		
	}
}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */