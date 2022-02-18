<?php

class Add_Edit_Driver_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function save($posts){
		$fields['name'] = $posts['name'];
		$fields['birth_year'] = $posts['birth_year'];
        $fields['driving_license'] = $posts['driving_license'];
		$this->db->insert('drivers', $fields);
	}

	public function load($id){
		$this->db->select("name, birth_year, driving_license");
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

    public function getDrivingLicense(){
        $this->db->select("id, name");
        $this->db->where("deleted", 0);
        $this->db->order_by("name", 'ASC');
        $query = $this->db->get("driving_license");

        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $value){
                $row[$value['id']] = $value['name'];
            }
            return $row;
        }
        else{
            return false;
        }
    }
}
