<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->dbforge->add_field(array(
            'id_user'       => array(
                'type'	        =>	'INT',
                'constraint'	=>	10,
                'unsigned'	    =>	TRUE,
                'auto_increment'=>	TRUE
            ),
            'name_user'	=>	array(
                'type'	=>	'VARCHAR',
                'constraint'	=>	'100',
            ),
            'email_user' =>  array(
                'type'          => 'VARCHAR',
                'constraint'    => 100,
                'unsigned'	    =>	TRUE,
            ),
            'password_user' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	50,
                'null'	        =>	TRUE,

            ),
            'nivel_user' => array(
                'type' => 'ENUM("Administrador","Usuario")',
                'default' => 'Usuario',
                'null' => FALSE,
            ),
            'status_user' => array(
                'type'          => 'INT',
                'constraint'	=>	11,
                'null'	        =>	TRUE,

            ),
            'date'	=>	array(
                'type'	=>	'DATETIME',
                'null'	=>	FALSE,
            ),
        ));
        $this->dbforge->add_key('id_user',	TRUE);
        $this->dbforge->create_table('usuarios_c8');
    }

    public function down() {
        $this->dbforge->drop_table('usuarios_c8');

    }

}

/* End of file Class_name.php */
