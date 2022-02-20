<?php

class Car_Property_Check_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

    public function getCar($id){
        $this->db->select("category");
        $this->db->where("id", $id);
        $query = $this->db->get("cars");

        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $value){
                $row = $value['category'];
            }
            return $row;
        }
        else{
            return false;
        }
    }
}
