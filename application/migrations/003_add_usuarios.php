<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_usuarios extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->dbforge->add_field(array(
            'id_inst_pw'       => array(
                'type'	        =>	'INT',
                'constraint'	=>	10,
                'unsigned'	    =>	TRUE,
                'auto_increment'=>	TRUE
            ),
            'nome_user_pw'	    =>	array(
                'type'	        =>	'VARCHAR',
                'constraint'	=>	'100',
                'null'	        =>	TRUE,
            ),
            'email_inst_pw' =>  array(
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unsigned'	    =>	TRUE,
            ),
            'password_inst_pw' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	60,
                'null'	        =>	TRUE,

            ),
            'status_user_pw' => array(
                'type' => 'ENUM("0","1")',
                'default' => '0',
                'null' => FALSE,
            ),
            'nivel_user_pw' => array(
                'type' => 'ENUM("0","1")',
                'default' => '0',
                'null' => FALSE,
            ),
            'fk_user_pw' => array(
                'type'	        =>	'INT',
                'null'          => FALSE,
            ),
            'date'	=>	array(
                'type'	=>	'DATETIME',
                'null'	=>	FALSE,
            ),
        ));
        $this->dbforge->add_key('id_inst_pw',	TRUE);
        $this->dbforge->create_table('tbl_dados_inst_pw_instuicao');
        $this->dbforge->add_key('fk_user_pw', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('tbl_dados_inst_pw_instuicao');

    }

}

/* End of file Class_name.php */
