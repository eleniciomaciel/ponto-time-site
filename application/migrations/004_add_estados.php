<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_estados extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->dbforge->add_field(array(
            'est_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'codigo_ibge' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '4',
            ),
            'sigla' => array(
                    'type' => 'CHAR',
                    'constraint' => '2',
                    'null' => TRUE,
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE,
            ),
            'date'	=>	array(
                'type'	=>	'DATETIME',
                'null'	=>	FALSE,
        ),

    ));
    $this->dbforge->add_key('est_id', TRUE);
    $this->dbforge->create_table('tbl_estados_brasil');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_estados_brasil');
    }

}

/* End of file Class_name.php */
