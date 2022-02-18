<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_Driving_License extends CI_Migration {

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
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE,
            ),
            'category' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'deleted' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('driving_license');
    }

    public function down()
    {
        $this->dbforge->drop_table('driving_license');
    }
}
