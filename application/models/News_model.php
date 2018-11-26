<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {


    public function get_funcionarios($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->get('tbl_registra_ponto');
                return $query->result_array();
        }

        $query = $this->db->select('*')
                          ->from('tbl_turno_funcionario')
                          ->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf')
                          ->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_turno_funcionario.fk_tbl_empresa_tf')
                          ->join('tbl_cargos', 'tbl_cargos.id_cg = tbl_turno_funcionario.fk_tbl_cargo_tf')
                          ->join('tbl_turno', 'tbl_turno.id_tn = tbl_turno_funcionario.fk_tbl_turno_tf')
                          ->where('fk_tbl_funcionario_tf', $slug)
                          ->get();

        
        return $query->row_array();
    }

    public function get_hours(int $id)
    {
        $data_ini = date("Y-m-d", strtotime($this->input->post('data_um')));
        $data_fim = date("Y-m-d", strtotime($this->input->post('data_dois')));

        $this->db->select('*');
        $this->db->from('new_registro');
        $this->db->where('fk_funcionario_n', $id);
         
        $this->db->where('data_entrada_n >=', $data_ini);
        $this->db->where('data_n <=', $data_fim);

        //$this->db->like('data_entrada_n', $data_ini);
        //$this->db->like('data_n', $data_fim);
        
        return $query = $this->db->get();
    }

    /**Convertendo horas */

    public function converte_horas($seconds)
    {
        $hours = floor($seconds / 3600); 
        $minutes = floor($seconds % 3600 / 60); 
        $seconds = $seconds % 60; 

        return sprintf("%d:%02d:%02d", $hours, $minutes, $seconds); 
    }
    /**Somando as horas */
    public function get_calcula_horas($id)
    {
        $query = $this->db->query("SELECT DATE_FORMAT(hora_rpt,'%H:%i:%S') as hora_rpt FROM tbl_registra_ponto WHERE fk_employer_rpt = '.$id.' ");
        //$new_date = date_format($query,"H:i:s");

        //$lista = array('02:23:00','03:01:02', '00:32:00' , '01:12:23');
        $soma = 0;

        foreach ($query->result() as $key) {

            $calc = 0;

            list($horas, $minutos, $segundos) = explode(':', $key->hora_rpt);

            $calc = $horas * 3600 + $minutos * 60 + $segundos;
            
            $soma = $soma + $calc;

            
        }
        return $this->converte_horas($soma);
        
    }

    /**Busca todos os funcionários por período */
    public function get_all_funcionarios(int $id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_dados_inst_pw_instuicao');
        $this->db->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw');
        $this->db->where('id_inst_pw', $id);
        return $query = $this->db->get(); 
    }



    /**laço dos funcionários da instituição */
    public function listaFuncionariosDaInstituicao(int $id = null)
    {
        $new_fun_emp = $this->busca_empresa_do_id($id);//armazena o id da empresa

        $data_dt_g1 = $this->input->post('data_dt_g1', TRUE);
        $data_dt_g2 = $this->input->post('data_dt_g2', TRUE);

        $this->db->select('*');
        $this->db->from('new_registro');
        $this->db->join('tbl_funcionario', 'tbl_funcionario.id_fun = new_registro.fk_funcionario_n');
        $this->db->join('tbl_cargos', 'tbl_cargos.id_cg = new_registro.fk_cargo_n');
        $this->db->where('fk_empresa_n', $new_fun_emp);
        $this->db->distinct();
        $this->db->group_by("fk_funcionario_n");

        $this->db->where('data_entrada_n >=', $data_dt_g1);
        $this->db->where('data_n <=', $data_dt_g2);

        return $query = $this->db->get();

    }

       /**Busca instituição */
       public function busca_empresa_do_id(int $id)
       {

           $query = $this->db->select('*')
                               ->from('tbl_dados_inst_pw_instuicao')
                               ->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw')
                               ->where('id_inst_pw', $id)
                               ->get();
   
           $row = $query->row();
           return $id_emp = $row->id_inst;
       }

}

/* End of file ModelName.php */
