<?php

class List_Car_Daily_Data_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function loadList($order, $orderWay, $car, $date){
        $this->db->select(" drivers.name AS drivers_name,
                            drivers.birth_year AS drivers_birth_year,
                            driving_license.name AS driving_license_name,
                            cars.type AS car_type,
                            cars.license_plate AS car_license_plate,
                            cars.registrarion_year AS car_registrarion_year,
                            cars.passenger AS car_passenger,
                            cars.weight AS car_weight,
                            deliveries.customer_name AS customer_name,
                            deliveries.passenger AS delivery_passenger,
                            deliveries.weight AS delivery_weight,
                            deliveries.place_of_recruitment AS place_of_recruitment,
                            deliveries.delivery_date AS delivery_date,
                            ");
        $this->db->join("cars_drivers_assembly",'deliveries.delivery_date = cars_drivers_assembly.date');
        $this->db->join("cars",'cars_drivers_assembly.car_id = cars.id');
        $this->db->join("drivers",'cars_drivers_assembly.driver_id = drivers.id');
        $this->db->join("driving_license",'drivers.driving_license = driving_license.id');
		$this->db->where("deliveries.car_id", $car);
		$this->db->where("deliveries.delivery_date", $date);

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
		$this->db->update('cars_drivers_assembly', $set);
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
}
