<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Type_Of_Car_Field_To_Tbl_Cars extends CI_Migration {

	public function up()
	{
		$fields = array(
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => 25,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_column('cars', $fields);
	}

	public function down()
	{

	}
}
