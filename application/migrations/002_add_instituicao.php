<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_instituicao extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->dbforge->add_field(array(
            'id_inst'       => array(
                'type'	        =>	'INT',
                'constraint'	=>	10,
                'unsigned'	    =>	TRUE,
                'auto_increment'=>	TRUE
            ),
            'nome_inst'	=>	array(
                'type'	=>	'VARCHAR',
                'constraint'	=>	'100',
                'null'	        =>	TRUE,
            ),
            'inscri_estadual_inst' =>  array(
                'type'          => 'VARCHAR',
                'constraint'    => 20,
                'unsigned'	    =>	TRUE,
            ),
            'razao_social_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	20,
                'null'	        =>	TRUE,

            ),
            'cnpj_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	20,
                'null'	        =>	TRUE,

            ),
            'endereco_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	100,
                'null'	        =>	TRUE,

            ),
            'complemento_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	50,
                'null'	        =>	TRUE,

            ),
            'numero_inst' => array(
                'type'          => 'INT',
                'constraint'	=>	5,
                'null'	        =>	TRUE,

            ),
            'cidade_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	50,
                'null'	        =>	TRUE,

            ),
            'estado_inst' => array(
                'type'          => 'CHAR',
                'constraint'	=>	2,
                'null'	        =>	TRUE,

            ),
            'cep_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	12,
                'null'	        =>	TRUE,

            ),
            'email_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	100,
                'null'	        =>	TRUE,

            ),
            'telefone_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	15,
                'null'	        =>	TRUE,

            ),
            'celular_inst' => array(
                'type'          => 'VARCHAR',
                'constraint'	=>	15,
                'null'	        =>	TRUE,

            ),
            'date'	=>	array(
                'type'	=>	'DATETIME',
                'null'	=>	FALSE,
            ),
        ));
        $this->dbforge->add_key('id_inst',	TRUE);
        $this->dbforge->create_table('tbl_dados_instituicao');
    }

    public function down() {
        $this->dbforge->drop_table('tbl_dados_instituicao');

    }

}

/* End of file Class_name.php */
