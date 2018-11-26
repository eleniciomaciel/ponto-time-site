<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dados_model extends CI_Model {

    public function get_news($id = null)
    {
        if ($id === null) {
            $data = $this->db->get('tbl_cargos');
            }
            else{
            $data = $this->db->get_where('tbl_cargos',array('id_cg'=>$id));
            }
            return $data;
    }
    
}

/* End of file Dados_model.php */
