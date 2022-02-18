<?php

class Add_Edit_Car_Driver_Assembly extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("Add_Edit_Car_Driver_Assembly_Model");
		$this->load->library("form_validation");
    }

	public function index(){

        $data = array();

        $posts = $this->input->post();

        $data['cars'] = $this->Add_Edit_Car_Driver_Assembly_Model->getCars();
        $data['drivers'] = $this->Add_Edit_Car_Driver_Assembly_Model->getDrivers();

		$this->form_validation->set_rules("cars", "autó", "required|greater_than[0]", array("greater_than" => "Az autó kiválasztása kötelező!"));
		$this->form_validation->set_rules("drivers", "sofőr", "required|greater_than[0]", array("greater_than" => "Az autó kiválasztása kötelező!"));
		$this->form_validation->set_rules("date", "dátum", "required|greater_than_now");

		if ($this->form_validation->run() == TRUE) {
            $checkAssemblyMatch = $this->checkAssemblyMatch($posts['cars'], $posts['drivers'], $posts['date']);

            if($checkAssemblyMatch){
                $this->Add_Edit_Car_Driver_Assembly_Model->save($posts);
                $data['success'] = 'Sikeres adatrögzítés!';
            }else{
                $data['error'] = 'Az adott napra már az autó, vagy a sofőr be van osztva!';
            }

		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Hiba történt az adatrögzítés közben.';
		}

		$data['page_title'] = 'Autó, sofőr összerendelés rögzítése';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Car_Driver_Assembly_View', $data);
		$this->load->view('Footer_View');
	}

	public function load($id){

        $data = array();

        $posts = $this->input->post();

        $data['cars'] = $this->Add_Edit_Car_Driver_Assembly_Model->getCars();
        $data['drivers'] = $this->Add_Edit_Car_Driver_Assembly_Model->getDrivers();

        $this->form_validation->set_rules("cars", "autó", "required|greater_than[0]", array("greater_than" => "Az autó kiválasztása kötelező!"));
        $this->form_validation->set_rules("drivers", "sofőr", "required|greater_than[0]", array("greater_than" => "Az autó kiválasztása kötelező!"));
        $this->form_validation->set_rules("date", "dátum", "required|greater_than_now");

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Car_Driver_Assembly_Model->update($posts, $id);

            $data['selectedCar'] = $data['cars'];
            $data['selectedDriver'] = $data['drivers'];
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Hiba történt az adatrögzítés közben.';
		}
		else{
			$loadedData = $this->Add_Edit_Car_Driver_Assembly_Model->load($id);
            $data['selectedCar'] = $loadedData['car_id'];
            $data['selectedDriver'] = $loadedData['driver_id'];
            $data['date'] = $loadedData['date'];
		}

		$data['page_title'] = 'Autó, sofőr összerendelés módosítása';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Car_Driver_Assembly_View', $data);
		$this->load->view('Footer_View');
	}

    public function checkAssemblyMatch($car, $driver, $date){
        $loadAssemblyCarMatch = $this->Add_Edit_Car_Driver_Assembly_Model->loadAssemblyCarMatch($car, $date);
        $loadAssemblyDriverMatch = $this->Add_Edit_Car_Driver_Assembly_Model->loadAssemblyDriverMatch($driver, $date);

        if($loadAssemblyCarMatch || $loadAssemblyDriverMatch){
            return false;
        }else{
            return true;
        }
    }
}
