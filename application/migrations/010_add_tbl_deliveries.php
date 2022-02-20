<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_Deliveries extends CI_Migration {

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
            'car_id' => array(
                'type' => 'INT',
                'constraint' => 0,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'customer_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE,
            ),
            'passenger' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'weight' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'place_of_recruitment' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE,
            ),
            'delivery_date' => array(
                'type' => 'DATE',
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
        $this->dbforge->create_table('deliveries');
    }

    public function down()
    {
        $this->dbforge->drop_table('deliveries');
    }
}
