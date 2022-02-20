<?php

class List_Delivery_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function loadList($order, $orderWay){
        $this->db->select("deliveries.id AS id, cars.type AS car_type, customer_name AS customer_name, deliveries.passenger AS passenger, deliveries.weight AS weight, place_of_recruitment, delivery_date");
        $this->db->join("cars",'deliveries.car_id = cars.id');
		$this->db->where("deliveries.deleted", 0);

        if(!empty($order)){
            $this->db->order_by($order, $orderWay);
        }

		$query = $this->db->get("deliveries");

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
		$this->db->update('deliveries', $set);
	}
}
