<?php

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of Test
 *
 * @author adi
 */
<<<<<<< HEAD
class Test extends MX_Controller{
=======
class Test extends CI_Controller{
>>>>>>> capex/master
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
		
        echo "<h1>Module Test</h1>";
        echo "<p>Modul ini adalah modul HMVC pertama saya</p>";
        echo "<p>Tanpa menggunakan view dan model</p>";
        echo "<p>Lokasi di application/modules/test/controlers/Test.php</p>";
		
		$this->load->view("dummy/loading-state");
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
	
	function total_month_year()
	{
		$this->load->model("opex/opex_model");
		
		
		$this->opex_model->total_month_peryear("January",2017);	
		
	}
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
	
	function view_session()
	{
		$aa = $this->session->all_userdata();
			
			print_r($aa);	
				
	}
<<<<<<< HEAD
=======
=======
>>>>>>> capex/master
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
}
