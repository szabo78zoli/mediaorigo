<?php

class List_Car extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("List_Car_Model");
    }

	public function index(){

		$posts = $this->input->post();

		if(isset($posts['delete'])){
			$this->List_Car_Model->delete($posts['delete']);
		}

		$data['carList'] = $this->List_Car_Model->loadList();

		$data['page_title'] = 'Autók listája';

		$this->load->view('Header_View');
		$this->load->view('List_Car_View', $data);
		$this->load->view('Footer_View');
	}
}
