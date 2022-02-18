<?php

class Add_Edit_Driver_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function save($posts){
		$fields['name'] = $posts['name'];
		$fields['birth_year'] = $posts['birth_year'];
		$this->db->insert('drivers', $fields);
	}

	public function load($id){
		$this->db->select("name, birth_year");
		$this->db->where("id", $id);
		$this->db->where("deleted", 0);
		$query = $this->db->get("drivers");

		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $value){
				$row = $value;
			}
			return $row;
		}
		else{
			return false;
		}
	}

	public  function update($posts, $id){
		$this->db->where('id', $id);
		$this->db->update('drivers', $posts);
	}
}
