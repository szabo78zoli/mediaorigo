<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Driving_License_Field_To_Tbl_Drivers extends CI_Migration {

	public function up()
	{
		$fields = array(
			'driving_license' => array(
				'type' => 'varchar',
				'constraint' => 25,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_column('drivers', $fields);
	}

	public function down()
	{

	}
}
