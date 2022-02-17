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

		$this->form_validation->set_rules("type", "típus", "required");
		$this->form_validation->set_rules("license_plate", "rendszám", "required");
		$this->form_validation->set_rules("registrarion_year", "forgalomba helyezés éve", "required");

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

		$this->form_validation->set_rules("type", "típus", "required");
		$this->form_validation->set_rules("license_plate", "rendszám", "required");
		$this->form_validation->set_rules("registrarion_year", "forgalomba helyezés éve", "required");

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Car_Model->update($posts, $id);
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}
		else{
			$data = $this->Add_Edit_Car_Model->load($id);
		}

		$data['page_title'] = 'Autó adatainak módosítása';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Car_View', $data);
		$this->load->view('Footer_View');
	}
}
