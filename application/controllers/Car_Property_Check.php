<?php

class Car_Property_Check extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Car_Property_Check_Model");
    }

    public function index($id)
    {

        echo $this->Car_Property_Check_Model->getCar($id);

    }
}
