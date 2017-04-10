<?php

	class Division_model extends CI_Model{
		
		function __construct()
		{
			
			
		}
		
		function list_division()
		{
			$str = "SELECT * FROM division_ms";
			$q   = $this->db->query($str);
			$f   = $q->result_array();
			
			return $f;  	
			
		}
		
		function detail_division($arr_division)
		{
			$kode_div = $arr_division["kode_div"];
			
			$str = "SELECT * FROM division_ms WHERE kode_div = '$kode_div' ";	
			$q = $this->db->query($str);
			$f = $q->row_array();
			
			return $f;
			
		}
		
		function add_division($arr_division)
		{
			$kode_divisi = $arr_division["kode_divisi"];
			$divisi		 = $arr_division["division"];
			$description = $arr_division["description"];
			
			$str  = "INSERT INTO division_ms SET 		";
			$str .= "kode_div 		= '$kode_divisi'   ,";
			$str .= "division  		= '$divisi'		   ,";
			$str .= "description	= '$description'    ";
			
			return $q = $this->db->query($str);
				
			
		}
		
		function update_division($arr_division)
		{
			$kode_divisi = $arr_division["kode_divisi"];
			$divisi		 = $arr_division["division"];
			$description = $arr_division["description"];
			
			$str  = "UPDATE division_ms SET 			";
			$str .= "kode_div 		= '$kode_divisi'   ,";
			$str .= "division  		= '$divisi'		   ,";
			$str .= "description	= '$description'    ";
			$str .= "WHERE kode_div = '$kode_divisi'	";
			
			return $q = $this->db->query($str);
				
			
		}
		
		function delete_division($arr_division)
		{
			$kode_divisi = $arr_division["kode_divisi"];
			
			$str = "DELETE FROM division_ms WHERE kode_div = '$kode_divisi' ";	
			
			return $q = $this->db->query($str);
			
			
		}
		
		
		
	}