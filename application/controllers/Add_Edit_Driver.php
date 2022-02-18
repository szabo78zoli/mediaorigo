<?php

class Add_Edit_Driver extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("Add_Edit_Driver_Model");
		$this->load->library("form_validation");
    }

	public function index(){

		$data = array();
		$posts = $this->input->post();

		$this->form_validation->set_rules("name", "név", "required");
		$this->form_validation->set_rules("birth_year", "születési év", "required|integer|exact_length[4]|is_natural_no_zero");

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Driver_Model->save($posts);
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}

		$data['page_title'] = 'Sofőr rögzítése';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Driver_View', $data);
		$this->load->view('Footer_View');
	}

	public function load($id){

		$data = array();
		$posts = $this->input->post();

        $this->form_validation->set_rules("name", "név", "required");
        $this->form_validation->set_rules("birth_year", "születési év", "required|integer|exact_length[4]|is_natural_no_zero");

		if ($this->form_validation->run() == TRUE) {
			$data['success'] = 'Success';
			$this->Add_Edit_Driver_Model->update($posts, $id);
		}
		elseif($this->form_validation->run() == FALSE && !empty($posts)) {
			$data['error'] = 'Error';
		}
		else{
			$data = $this->Add_Edit_Driver_Model->load($id);
		}

		$data['page_title'] = 'Sofőr adatainak módosítása';

		$this->load->view('Header_View');
		$this->load->view('Add_Edit_Driver_View', $data);
		$this->load->view('Footer_View');
	}
}
