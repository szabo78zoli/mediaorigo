<?php

class List_Car_Driver_Assembly_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function loadList($order, $orderWay){
        $this->db->select("cars_drivers_assembly.id AS id, cars.type AS carType, drivers.name AS driverName, cars_drivers_assembly.date");
        $this->db->join("cars",'cars_drivers_assembly.car_id = cars.id');
        $this->db->join("drivers",'cars_drivers_assembly.driver_id = drivers.id');
		$this->db->where("cars_drivers_assembly.deleted", 0);

        if(!empty($order)){
            $this->db->order_by($order, $orderWay);
        }

		$query = $this->db->get("cars_drivers_assembly");

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
		$this->db->update('cars_drivers_assembly', $set);
	}
}
