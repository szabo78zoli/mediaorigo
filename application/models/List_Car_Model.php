<?php

class List_Car_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function loadList(){
		$this->db->where("deleted", 0);
		$query = $this->db->get("cars");

		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $value){
				$row[] = $value;
			}
			return $row;
		}
		else{
			return false;
		}
	}

	public  function delete($id){

		$set = array('deleted' => 1);

		$this->db->where('id', $id);
		$this->db->update('cars', $set);
	}
}
