<?php

class Add_Edit_Car_Driver_Assembly_Model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function save($posts){
		$fields['car_id'] = $posts['cars'];
		$fields['driver_id'] = $posts['drivers'];
		$fields['date'] = $posts['date'];
		$this->db->insert('cars_drivers_assembly', $fields);
	}

	public function load($id){
		$this->db->select("car_id, driver_id, date");
		$this->db->where("id", $id);
		$this->db->where("deleted", 0);
		$query = $this->db->get("cars_drivers_assembly");

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

    public function loadAssemblyCarMatch($car, $date){
        $this->db->select("car_id, driver_id, date");
        $this->db->where('car_id', $car);
        $this->db->where("date", $date);
        $this->db->where("deleted", 0);
        $query = $this->db->get("cars_drivers_assembly");
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function loadAssemblyDriverMatch($driver, $date){
        $this->db->select("car_id, driver_id, date");
        $this->db->where('driver_id', $driver);
        $this->db->where("date", $date);
        $this->db->where("deleted", 0);
        $query = $this->db->get("cars_drivers_assembly");

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function loadAssemblyCarMatchModify($car, $date, $id){
        $this->db->select("car_id, driver_id, date");
        $this->db->where('id !='.$id);
        $this->db->where('car_id', $car);
        $this->db->where("date", $date);
        $this->db->where("deleted", 0);
        $query = $this->db->get("cars_drivers_assembly");
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function loadAssemblyDriverMatchModify($driver, $date, $id){
        $this->db->select("car_id, driver_id, date");
        $this->db->where('id !='.$id);
        $this->db->where('driver_id', $driver);
        $this->db->where("date", $date);
        $this->db->where("deleted", 0);
        $query = $this->db->get("cars_drivers_assembly");

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function loadDriversCategory($driver){
        $this->db->select('category');
        $this->db->join('driving_license', 'drivers.driving_license = driving_license.id');
        $this->db->where('drivers.id', $driver);
        $this->db->where("drivers.deleted", 0);
        $query = $this->db->get("drivers");

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

    public function loadCarCategory($car){
        $this->db->select('category');
        $this->db->where('id', $car);
        $this->db->where("deleted", 0);
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

	public  function update($posts, $id){
        $updatedData['car_id'] = $posts['cars'];
        $updatedData['driver_id'] = $posts['drivers'];
        $updatedData['date'] = $posts['date'];

		$this->db->where('id', $id);
		$this->db->update('cars_drivers_assembly', $updatedData);
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

    public function getDrivers(){
        $this->db->select("id, name");
        $this->db->where("deleted", 0);
        $query = $this->db->get("drivers");

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
