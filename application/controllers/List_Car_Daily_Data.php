<?php

class List_Car_Daily_Data extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("List_Car_Daily_Data_Model");
        $this->load->library('session');
        $this->load->library("form_validation");
    }

	public function index(){

		$posts = $this->input->post();
        $data['carsFilter'] = $this->List_Car_Daily_Data_Model->getCars();

		if(isset($posts['delete'])){
			$this->List_Car_Daily_Data_Model->delete($posts['delete']);
		}

        $order = NULL;
        $orderWay = NULL;

        if($this->input->post('OrderBtn')){

            if($this->session->userdata('OrderWay') == 'ASC'){
                $orderWay = 'DESC';
                $data['orderWay'] = 'DESC';
            }else{
                $orderWay = 'ASC';
                $data['orderWay'] = 'ASC';
            }
            $order = $this->input->post('OrderBtn');

            $this->session->set_userdata('Order', $order);
            $this->session->set_userdata('OrderWay', $orderWay);

            $data['order'] = $this->input->post('OrderBtn');

        }else{
            $order = $this->session->userdata('Order');
            $orderWay = $this->session->userdata('OrderWay');

            $data['order'] = $order;
            $data['orderWay'] = $orderWay;
        }

        if($this->input->post('cars_filter') !== NULL && $this->input->post('date_filter') !== NULL){
            $data['carDailyDataList'] = $this->List_Car_Daily_Data_Model->loadList($order, $orderWay, $this->input->post('cars_filter'), $this->input->post('date_filter'));
        }

		$data['page_title'] = 'Autók adatai napi bontásban';

		$this->load->view('Header_View');
		$this->load->view('List_Car_Daily_Data_View', $data);
		$this->load->view('Footer_View');
	}
}
