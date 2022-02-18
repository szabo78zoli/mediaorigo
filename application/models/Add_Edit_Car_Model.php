<?php

class Add_Edit_Car_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function save($posts){
		$fields['type'] = $posts['type'];
		$fields['license_plate'] = $posts['license_plate'];
		$fields['registrarion_year'] = $posts['registrarion_year'];
		$fields['category'] = $posts['category'];
		$fields['passenger'] = $posts['passenger'];
		$fields['weight'] = $posts['weight'];
		$this->db->insert('cars', $fields);
	}

	public function load($id){
		$this->db->select("type, license_plate, registrarion_year, category, passenger, weight");
		$this->db->where("id", $id);
		$this->db->where("deleted", 0);
		$query = $this->db->get("cars");

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
		$this->db->update('cars', $posts);
	}

    public function getCategory(){
        $this->db->select("id, name");
        $this->db->where("deleted", 0);
        $this->db->order_by("name", 'ASC');
        $query = $this->db->get("type_of_cars");

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
