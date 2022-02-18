<?php

class List_Driver extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("List_Driver_Model");
        $this->load->library('session');
    }

	public function index(){

		$posts = $this->input->post();

		if(isset($posts['delete'])){
			$this->List_Driver_Model->delete($posts['delete']);
		}

        $orderDriver = NULL;
        $orderWayDriver = NULL;

        if($this->input->post('OrderBtn')){
print_r($this->input->post());
            if($this->session->userdata('orderWayDriver') == 'ASC'){
                $orderWayDriver = 'DESC';
                $data['orderWayDriver'] = 'DESC';
            }else{
                $orderWayDriver = 'ASC';
                $data['orderWayDriver'] = 'ASC';
            }
            $orderDriver = $this->input->post('OrderBtn');

            $this->session->set_userdata('orderDriver', $orderDriver);
            $this->session->set_userdata('orderWayDriver', $orderWayDriver);

            $data['orderDriver'] = $this->input->post('OrderBtn');
        }else{
            $orderDriver = $this->session->userdata('orderDriver');
            $orderWayDriver = $this->session->userdata('orderWayDriver');

            $data['orderDriver'] = $orderDriver;
            $data['orderWayDriver'] = $orderWayDriver;
        }

		$data['driverList'] = $this->List_Driver_Model->loadList($orderDriver, $orderWayDriver);

		$data['page_title'] = 'Sofőrök listája';

		$this->load->view('Header_View');
		$this->load->view('List_Driver_View', $data);
		$this->load->view('Footer_View');
	}
}
