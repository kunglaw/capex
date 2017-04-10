<?php

	class Json_ajax extends CI_Model{
		
		function __construct()
		{
			parent::__construct();	
			
		}
		
		function select_division()
		{
			$str = "SELECT * FROM division_ms";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			echo "<select name='division' class='form-control'>";
			echo "<option value=''>- Select Division -</div>";
			foreach($f as $row)
			{
				echo "<option value='$row[kode_div]'>
				$row[division]
				</option>";	
				
			}
			echo "</select>";
			
		}
		
		function select_department()
		{
			$str = "SELECT * FROM department_ms";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			echo "<select name='department' class='form-control'>";
			echo "<option value=''>- Select Department -</div>";
			foreach($f as $row)
			{
				echo "<option value='$row[kode_department]'>
				$row[department]
				</option>";	
				
			}
			echo "</select>";
			
			
		}
		
		function department_by_division($kode_div)
		{
			$str = "SELECT * FROM department_ms WHERE kode_div = '$kode_div' ";
			$q = $this->db->query($str);
			$f = $q->result_array();
			
			foreach($f as $row)
			{
				echo "<option value='$row[kode_department]'>
				$row[department]
				</option>";	
				
			}
			
		}
		
		
	}