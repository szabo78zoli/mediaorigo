<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_Cars extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE,
            ),
            'license_plate' => array(
                'type' => 'VARCHAR',
                'constraint' => 7,
                'unique' => TRUE,
                'null' => FALSE,
            ),
            'registrarion_year' => array(
                'type' => 'INT',
                'null' => TRUE,
                'constraint' => 4,
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cars');
    }

    public function down()
    {
        $this->dbforge->drop_table('cars');
    }
}
