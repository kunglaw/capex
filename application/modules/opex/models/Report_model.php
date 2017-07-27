<?php
	
	class Report_model extends CI_Model{
		
		function __contruct()
		{
			parent::__construct();
			
			$this->load->model("Opex_model");
			$this->load->model("Realization_model");
			$this->load->model("Additional_model");	
			
		}
		
		function saldo_akhir_acc_peryear($no_acc_opex,$year)
		{
			$kode_department = $this->session->all_userdata("kode");
			
			$real_acc_peryear = $this->realization_model->total_real_account_peryear($no_acc_opex,$year);
			$add_acc_peryear  = $this->additional_model->total_add_account_peryear($no_acc_opex,$year);
			$opex_acc_peryear = $this->opex_model->total_account_peryear($no_acc_opex,$year);
			
			$saldo_akhir_acc  = ($opex_acc_peryear + $add_acc_peryear) - $real_acc_peryear; 
			
			return $saldo_akhir_acc;
		}
		
		function saldo_akhir_peryear($year)
		{
			$real_peryear = $this->realization_model->total_real_peryear($year);
			$add_year	  = $this->additional_model->total_add_peryear($year);
			$opex_peryear = $this->opex_model->total_all_year($year);
			
			$saldo_akhir = ($opex_peryear + $add_year) - $real_peryear; 
			
			return $saldo_akhir;
		}
		
		
	}