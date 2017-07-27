<?php if(!defined('BASEPATH')) exit ('no direct script access allowed');

class Users_process extends MX_Controller{


	function __construct()
	{
		parent::__construct();
		$this->load->model("users/user_model");
	}

	function login_process()
	{
		//print_r($_POST);

		$this->load->library("form_validation");

		$email    = $this->input->post("email",TRUE);
		$password = $this->input->post("password",TRUE);
		$username = explode("@",$email)[0];

		$this->form_validation->set_rules("email","Email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required");

		if($this->form_validation->run() == TRUE)
		{
			$check_user = $this->user_model->check_user();
			$dt = $check_user["data"];
			$role = $check_user["data"]["role"];
			//$pass = $check_user["passs"];

			if($check_user["status"] == TRUE )
			{
				$dt_user = array(
					"username"=>$username,
				  "id_user"=>$dt["id"],
					"name"=>$dt["name"],
					"email"=>$dt["email"],
					"role"=>$dt["role"],
					"kode"=>$dt["kode"],
					"photo"=>$dt["photo"]

				);

				$this->session->set_userdata($dt_user);

				header("location:".base_url("dashboard"));
			}
			else
			{
				header("location:".base_url("users/login"));
			}
		}
		else
		{
			$result["status"] = FALSE;
			$result["data"] = validation_errors();
			echo $result;
		}
		//user_model

		// check user di 3 table yang berbeda -> taruh di model

	}

	function logout()
	{
		$this->session->sess_destroy();
		header("location:".base_url("users/login"));

	}

	function __destruct()
	{
		//echo "</pre>";

	}


}
