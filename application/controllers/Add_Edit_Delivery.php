<?php

class Add_Edit_Delivery extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("Add_Edit_Delivery_Model");
		$this->load->library("form_validation");
    }

	public function index(){

		$data = array();
		$posts = $this->input->post();
        $data['cars'] = $this->Add_Edit_Delivery_Model->getCars();

		$this->form_validation->set_rules("cars", "autó", "required|greater_than[0]", array("greater_than" => "A kategória kiválasztása kötelező!"));
		$this->form_validation->set_rules("customer_name", "megrendelő neve", "required");
		$this->form_validation->set_rules("place_of_recruitment", "felvétel helye", "required");
		$this->form_validation->set_rules("delivery_date", "Szállítás dátuma", "required");

		if ($this->form_validation->run() == TRUE) {

            $parametersOfCar = $this->Add_Edit_Delivery_Model->getParametersOfCar($this->input->post('cars'));

            if($parametersOfCar['category'] > 1){
                if($posts['weight'] > $parametersOfCar['weight']){
                    $data['error'] = 'A szállítható teher súlya kisebb, mint amit megadott!';
                }else{
                    $data['success'] = 'Az adatrögzítés sikeresen megtörtént!';
                    $this->Add_Edit_Delivery_Model->save($posts);
                }
            }else{
                if($posts['passenger'] > $parametersOfCar['passenger']){
                    $data['error'] = 'A szállítható személyek száma kevesebb, mint amit megadott!';
                }else{
                    $data['success'] = 'Az adatrögzítés sikeresen megtörtént!';
                    $this->Add_Edit_Delivery_Model->save($posts);
                }
            }
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Hiba történt az adatrögzítés során!';
		}

		$data['page_title'] = 'Szállítás rögzítése';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Delivery_View', $data);
		$this->load->view('Footer_View');
	}

	public function load($id){

		$data = array();
		$posts = $this->input->post();
        $data['cars'] = $this->Add_Edit_Delivery_Model->getCars();

        $this->form_validation->set_rules("cars", "autó", "required|greater_than[0]", array("greater_than" => "A kategória kiválasztása kötelező!"));
        $this->form_validation->set_rules("customer_name", "megrendelő neve", "required");
        $this->form_validation->set_rules("place_of_recruitment", "felvétel helye", "required");
        $this->form_validation->set_rules("delivery_date", "Szállítás dátuma", "required");

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Delivery_Model->update($posts, $id);

            $data['selectedCategory'] = $data['category'];
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}
		else{
			$loadedData = $this->Add_Edit_Delivery_Model->load($id);
            $data['selectedCar'] = $loadedData['car_id'];
            $data['customer_name'] = $loadedData['customer_name'];
            $data['passenger'] = $loadedData['passenger'];
            $data['weight'] = $loadedData['weight'];
            $data['place_of_recruitment'] = $loadedData['place_of_recruitment'];
            $data['delivery_date'] = $loadedData['delivery_date'];
		}

		$data['page_title'] = 'Szállítás módosítása';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Delivery_View', $data);
		$this->load->view('Footer_View');
	}
}
