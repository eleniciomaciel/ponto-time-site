<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contabilidade extends CI_Controller {

    public function vew_dados_contador(int $id)
    {
        $output = array();  
        
        $data = $this->db->select('*')
                            ->from('tbl_dados_inst_pw_instuicao')
                            ->join('tbl_contabilidade', 'tbl_contabilidade.fk_user_conf = tbl_dados_inst_pw_instuicao.id_inst_pw')
                            ->where('fk_user_conf', $id)
                            ->get()->result();
        foreach($data as $row)  
        {  
            $output['contabil_nome_cont']             = $row->nome_fan_cont; 
            $output['contabil_insc_cont']             = $row->insc_estadual_cont;  
            $output['contabil_ende_cont']             = $row->endereco_cont;

            $output['contabil_comp_cont']             = $row->complem_conf; 
            $output['contabil_cida_cont']             = $row->cidade_conf;  
            $output['contabil_esta_cont']             = $row->estado_conf;

            $output['contabil_emai_cont']             = $row->email_conf; 
            $output['contabil_fixo_cont']             = $row->tel_fixo_conf;  
            $output['contabil_celu_cont']             = $row->celular_conf;

            $output['contabil_cont_cont']             = $row->contador_nome_conf; 
            $output['contabil_regi_cont']             = $row->registro_contador_conf;  
            $output['contabil_id_cont']             = $row->id_cont;

        }  
        echo json_encode($output); 
    }
 /**altera dados da contabilidade */
    public function update_contabil(int $id)
    {
        $this->form_validation->set_rules('view_cont_nome', 'nome fantasia', 'required|max_length[200]');
        $this->form_validation->set_rules('view_cont_insc', 'inscrição estadual', 'required|max_length[50]');

 
        $this->form_validation->set_rules('view_cont_comp', 'endereço', 'required|max_length[200]');
        $this->form_validation->set_rules('view_cont_ende', 'complemento', 'required|max_length[50]');
        $this->form_validation->set_rules('view_cont_cida', 'cidade', 'required|max_length[100]');
        $this->form_validation->set_rules('view_cont_esta', 'estado', 'required|exact_length[2]');
         
        $this->form_validation->set_rules('view_cont_emai', 'E-mail', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('view_cont_fixo', 'telefone fixo', 'required|max_length[20]');
         
        $this->form_validation->set_rules('view_cont_celu', 'celular', 'required|max_length[20]');
        $this->form_validation->set_rules('view_cont_cont', 'nome do contador', 'required|max_length[150]');
         
        $this->form_validation->set_rules('view_cont_regi', 'registro', 'required|max_length[30]');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'nome_fan_cont' => $this->input->post('view_cont_nome'),
                'insc_estadual_cont' => $this->input->post('view_cont_insc'),
                'endereco_cont' => $this->input->post('view_cont_ende'),
                'complem_conf' => $this->input->post('view_cont_comp'),
                'cidade_conf' => $this->input->post('view_cont_cida'),
                'estado_conf' => $this->input->post('view_cont_esta'),
                'email_conf' => $this->input->post('view_cont_emai'),
                'tel_fixo_conf' => $this->input->post('view_cont_fixo'),
                'celular_conf' => $this->input->post('view_cont_celu'),
                'contador_nome_conf' => $this->input->post('view_cont_cont'),
                'registro_contador_conf' => $this->input->post('view_cont_regi'),
            );
            $this->db->update('tbl_contabilidade', $data, array('id_cont' => $id));
            echo json_encode(['success'=>'Alteração feita com sucesso.']);
        }
    }
}

/* End of file Contabilidade.php */
