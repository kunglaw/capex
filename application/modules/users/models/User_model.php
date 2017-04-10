<?php

	class User_model extends CI_Model{
		
		
		public $table = 'users';
		public $id = 'id';
		public $order = 'DESC';
	
		function __construct()
		{
			parent::__construct();
		}
	
		// get all
		function get_all()
		{
			$this->db->order_by($this->id, $this->order);
			return $this->db->get($this->table)->result();
		}
	
		// get data by id
		function get_by_id($id)
		{
			$this->db->where($this->id, $id);
			return $this->db->get($this->table)->row();
		}
		
		// get total rows
		function total_rows($q = NULL) {
			$this->db->like('id', $q);
		$this->db->or_like('name', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('role', $q);
		$this->db->or_like('kode', $q);
		$this->db->or_like('photo', $q);
		$this->db->or_like('password', $q);
		$this->db->or_like('created_at', $q);
		$this->db->or_like('updated_at', $q);
		$this->db->from($this->table);
			return $this->db->count_all_results();
		}
	
		// get data with limit and search
		function get_limit_data($limit, $start = 0, $q = NULL) {
			
			$this->db->order_by($this->id, $this->order);
			$this->db->like('id', $q);
			$this->db->or_like('name', $q);
			$this->db->or_like('email', $q);
			$this->db->or_like('role', $q);
			$this->db->or_like('kode', $q);
			$this->db->or_like('photo', $q);
			$this->db->or_like('password', $q);
			$this->db->or_like('created_at', $q);
			$this->db->or_like('updated_at', $q);
			$this->db->limit($limit, $start);
			return $this->db->get($this->table)->result();
			
		}
	
		// insert data
		function insert($data)
		{
			$this->db->insert($this->table, $data);
		}
	
		// update data
		function update($id, $data)
		{
			$this->db->where($this->id, $id);
			$this->db->update($this->table, $data);
		}
	
		// delete data
		function delete($id)
		{
			$this->db->where($this->id, $id);
			$this->db->delete($this->table);
		}
	
			
			function check_user()
			{
				$email    = $this->input->post("email",TRUE); // or username
				$password = $this->input->post("password",true);
				
				$str = "SELECT * FROM users WHERE email = '$email' ";
				$q   = $this->db->query($str); 
				$f   = $q->row_array();
				
				$result["status"] = FALSE;
				if(!empty($f))
				{
					
					if(password_verify($password,$f['password']))
					{
						$result["pass"] = $f["password"]; 
						$result["data"] = $f; 
						$result["status"] = TRUE;	
					}
					else
					{
						$result["status"] = FALSE;
					}
				}
				else
				{
					
					$result["status"] = FALSE;	
				}
				
				
				
				return $result;
			}
			
			function __destruct()
			{
					
				
			}
		
		
	}