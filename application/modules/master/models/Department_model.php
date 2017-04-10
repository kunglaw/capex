<?php

	class Department_model extends CI_Model
	{
		function __construct()
		{
			
		}
		
		function list_department()
		{
			$str = "SELECT * FROM department_ms ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			return $f;	
			
		}
		
		function detail_department($arr_department)
		{
			$kode_department = $arr_department["kode_department"];
			
			$str = "SELECT * FROM department_ms WHERE kode_department = '$kode_department' ";
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;	
			
		}
		
		function add_department($arr_department)
		{
			$str = "INSERT INTO department_ms SET ";
			$str.= "kode_department  = '$arr_department[kode_department]' ,";
			$str.= "department		 = '$arr_department[department]'	  ,";
			$str.= "kode_div		 = '$arr_department[kode_div]'		  ,";
			$str.= "description		 = '$arr_department[description]'	   ";
			
			return $q = $this->db->query($str);
			
		}
		
		function update_department($arr_department)
		{
			$str  = "UPDATE department_ms SET 							   ";
			
			$str .= "department		 = '$arr_department[department]' 	  ,";
			$str .= "kode_div		 = '$arr_department[kode_div]'		  ,";
			$str .= "description	 = '$arr_department[description]'	   ";
			$str .= "WHERE kode_department = '$arr_department[kode_department]' ";
			
			return $q = $this->db->query($str);
			
			
		}
		
		
		function delete_department($arr_department)
		{
			
			$kode_department = $arr_department["kode_department"];
			
			$str = "DELETE FROM department_ms WHERE kode_department = '$kode_department' ";
			
			return $q = $this->db->query($str); 	
			
		}
		
		function __destruct()
		{
			
			
		}
		
	}