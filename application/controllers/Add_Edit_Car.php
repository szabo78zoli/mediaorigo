<?php

class Add_Edit_Car extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("Add_Edit_Car_Model");
		$this->load->library("form_validation");
    }

	public function index(){

		$data = array();
		$posts = $this->input->post();
        $data['category'] = $this->Add_Edit_Car_Model->getCategory();

		$this->form_validation->set_rules("type", "típus", "required");
		$this->form_validation->set_rules("license_plate", "rendszám", "required");
		$this->form_validation->set_rules("registrarion_year", "forgalomba helyezés éve", "required");
        $this->form_validation->set_rules("category", "kategória", "required|greater_than[0]", array("greater_than" => "A kategória kiválasztása kötelező!"));

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Car_Model->save($posts);
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}

		$data['page_title'] = 'Autó rögzítése';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Car_View', $data);
		$this->load->view('Footer_View');
	}

	public function load($id){

		$data = array();
		$posts = $this->input->post();
        $data['category'] = $this->Add_Edit_Car_Model->getCategory();

		$this->form_validation->set_rules("type", "típus", "required");
		$this->form_validation->set_rules("license_plate", "rendszám", "required");
		$this->form_validation->set_rules("registrarion_year", "forgalomba helyezés éve", "required");
        $this->form_validation->set_rules("category", "kategória", "required|greater_than[0]", array("greater_than" => "A kategória kiválasztása kötelező!"));

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Car_Model->update($posts, $id);

            $data['selectedCategory'] = $data['category'];
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}
		else{
			$loadedData = $this->Add_Edit_Car_Model->load($id);
            $data['type'] = $loadedData['type'];
            $data['license_plate'] = $loadedData['license_plate'];
            $data['registrarion_year'] = $loadedData['registrarion_year'];
            $data['selectedCategory'] = $loadedData['category'];
            $data['passenger'] = $loadedData['passenger'];
            $data['weight'] = $loadedData['weight'];
		}

		$data['page_title'] = 'Autó adatainak módosítása';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Car_View', $data);
		$this->load->view('Footer_View');
	}
}
