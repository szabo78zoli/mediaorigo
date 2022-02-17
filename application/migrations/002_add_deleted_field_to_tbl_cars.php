<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Deleted_Field_To_Tbl_Cars extends CI_Migration {

	public function up()
	{
		$fields = array(
			'deleted' => array(
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE,
			),
		);
		$this->dbforge->add_column('cars', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_table('cars');
	}
}
