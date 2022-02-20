<?php

class Add_Edit_Delivery_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function save($posts){
		$fields['car_id'] = $posts['cars'];
		$fields['customer_name'] = $posts['customer_name'];
		$fields['passenger'] = $posts['passenger'];
		$fields['weight'] = $posts['weight'];
		$fields['place_of_recruitment'] = $posts['place_of_recruitment'];
		$fields['delivery_date'] = $posts['delivery_date'];
		$this->db->insert('deliveries', $fields);
	}

	public function load($id){
		$this->db->select("car_id, customer_name, passenger, weight, place_of_recruitment, delivery_date");
		$this->db->where("id", $id);
		$this->db->where("deleted", 0);
		$query = $this->db->get("deliveries");

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

    public function getCars(){
        $this->db->select("id, type, license_plate, passenger, weight");
        $this->db->where("deleted", 0);
        $query = $this->db->get("cars");

        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $value){

                if($value['passenger'] > 0){
                    $row[$value['id']] = $value['type']." ".$value['license_plate']." (".$value['passenger']." fő)";
                }elseif($value['weight'] > 0){
                    $row[$value['id']] = $value['type']." ".$value['license_plate']." (".$value['weight']." kg)";
                }

            }
            return $row;
        }
        else{
            return false;
        }
    }

    public function getParametersOfCar($id){
        $this->db->select("weight, passenger, category");
        $this->db->where("id", $id);
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
}
