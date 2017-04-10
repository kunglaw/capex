<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	function hashing_password()
	{
		echo password_hash("999999",PASSWORD_BCRYPT);
		
		
		//$hash = "$2y$10$IC/o7yZGNgLmWgzJPkqi/uaOOvke0Q83hs2cbLZfqBybIbNcdvW7G";
		/*$hash = '$2y$10$tRB8U5meemNnQnXB9RlhN.6jzLUGuHi0Ds1/IfErKW0apSI5JkTka';
		if(password_verify("rasmuslerdorf",$hash))
		{
			echo "<h1> cocok </h1>";
		}*/ 
		
		// See the password_hash() example to see where this came from.
		/*$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
		
		if (password_verify('rasmuslerdorf', $hash)) {
			echo 'Password is valid!';
		} else {
			echo 'Invalid password.';
		}*/
		
	}
	
	function test_session()
	{
		$a = $this->session->all_userdata();
		
		print_r($a);	
		
		echo "<hr>";
		
		echo password_hash("999999",PASSWORD_BCRYPT);
		
		echo "<hr>";
		
		$str = "select * from users WHERE email = 'alhusna901@gmail.com' ";
		$q = $this->db->query($str);
		$f = $q->row_array();
		
		echo $f["password"];
		
	}
}
