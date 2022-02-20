<?php

class List_Delivery extends CI_Controller{
    public function __construct () {
		parent::__construct();
		$this->load->model("List_Delivery_Model");
        $this->load->library('session');
    }

	public function index(){

		$posts = $this->input->post();

		if(isset($posts['delete'])){
			$this->List_Delivery_Model->delete($posts['delete']);
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

		$data['deliveryList'] = $this->List_Delivery_Model->loadList($order, $orderWay);

		$data['page_title'] = 'Szállítások listája';

		$this->load->view('Header_View');
		$this->load->view('List_Delivery_View', $data);
		$this->load->view('Footer_View');
	}
}
