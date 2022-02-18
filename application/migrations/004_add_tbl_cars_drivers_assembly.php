<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_Cars_Drivers_Assembly extends CI_Migration {

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
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'driver_id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'date' => array(
                'type' => 'DATE',
                'null' => FALSE,
            ),
            'deleted' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
        ),
        'CONSTRAINT car_ibfk_1 FOREIGN KEY(`car_id`) REFERENCES `cars`(`id`)',
        'CONSTRAINT driver_ibfk_1 FOREIGN KEY(`driver_id`) REFERENCES `drivers`(`id`)');

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cars_drivers_assembly');
    }

    public function down()
    {
        $this->dbforge->drop_table('Cars_Drivers_Assembly');
    }
}
