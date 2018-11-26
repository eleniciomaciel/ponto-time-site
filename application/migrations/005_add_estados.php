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
            'id_cg' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'fk_employer_cg' => array(
                    'type' => 'INT',
                    'constraint' => '10',
                    'null' => TRUE,
            ),
            'nome_cg' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
            ),
            'date'	=>	array(
            'type'	=>	'DATETIME',
            'null'	=>	FALSE,
            ),

    ));
    $this->dbforge->add_key('id_cg', TRUE);
    $this->dbforge->create_table('tbl_cargos');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_cargos');
    }

}

/* End of file Class_name.php */
