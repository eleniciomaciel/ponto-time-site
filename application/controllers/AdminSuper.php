<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSuper extends CI_Controller {

    public function add_insti()
    {
        $data = array('success' => false, 'mensagem' => array());
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cadast_fantasy', 'nome fantasia', 'required|is_unique[tbl_dados_instituicao.nome_inst]');
        $this->form_validation->set_rules('cadast_instituicao', 'inscrição estadual', 'required');
        $this->form_validation->set_rules('cadast_razao', 'razão social', 'required|is_unique[tbl_dados_instituicao.razao_social_inst]');
        $this->form_validation->set_rules('cadast_cnpj', 'CNPJ', 'required|is_unique[tbl_dados_instituicao.cnpj_inst]');
        $this->form_validation->set_rules('cadast_endereco', 'endereço', 'required');
        $this->form_validation->set_rules('cadast_compl', 'complemeto', 'required');
        $this->form_validation->set_rules('cadast_numero', 'número delocalização', 'required|numeric');
        $this->form_validation->set_rules('cadast_City', 'cidade', 'required');
        $this->form_validation->set_rules('cadast_State', 'estado', 'required');
        $this->form_validation->set_rules('cadast_Zip', 'cep', 'required');
        $this->form_validation->set_rules('input_mail', 'email', 'required|valid_email|is_unique[tbl_dados_instituicao.email_inst]');
        $this->form_validation->set_rules('input_tel', 'telefone', 'required|exact_length[14]');
        $this->form_validation->set_rules('input_cel', 'celular', 'required|exact_length[16]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == FALSE)
        {
            foreach ($_POST as $key => $value) {
                $data['mensagem'][$key] = form_error($key);
            }
            //$this->load->view('myform');
        }
        else
        {
            $data = array(
                'nome_inst'             => $this->input->post('cadast_fantasy'),
                'inscri_estadual_inst'  => $this->input->post('cadast_instituicao'),
                'razao_social_inst'     => $this->input->post('cadast_razao'),
                'cnpj_inst'             => $this->input->post('cadast_cnpj'),
                'endereco_inst'         => $this->input->post('cadast_endereco'),
                'complemento_inst'      => $this->input->post('cadast_compl'),
                'numero_inst'           => $this->input->post('cadast_numero'),
                'cidade_inst'           => $this->input->post('cadast_City'),
                'estado_inst'           => $this->input->post('cadast_State'),
                'cep_inst'              => $this->input->post('cadast_Zip'),
                'email_inst'            => $this->input->post('input_mail'),
                'telefone_inst'         => $this->input->post('input_tel'),
                'celular_inst'          => $this->input->post('input_cel')
            );
            
            $this->db->insert('tbl_dados_instituicao', $data);
            $data['success'] = TRUE;
        }
        echo json_encode($data);
    }
 /**mostra os dados da empresa no modal view */
    public function getDadosEmpresa(int $id)
    {
        $output = array();   
        $data = $this->db->select('*')
                            ->where('id_inst', $id)
                            ->get('tbl_dados_instituicao')->result();
        foreach($data as $row)  
        {  
             $output['dado_emp_nome'] = $row->nome_inst;  
             $output['dado_emp_insc'] = $row->inscri_estadual_inst; 
             $output['dado_emp_raza'] = $row->razao_social_inst; 
             $output['dado_emp_cnpj'] = $row->cnpj_inst;  
             $output['dado_emp_ende'] = $row->endereco_inst; 
             $output['dado_emp_comp'] = $row->complemento_inst;  
             $output['dado_emp_nume'] = $row->numero_inst; 
             $output['dado_emp_cida'] = $row->cidade_inst;  
             $output['dado_emp_esta'] = $row->estado_inst; 
             $output['dado_emp_cepe'] = $row->cep_inst; 
             $output['dado_emp_emai'] = $row->email_inst;
             $output['dado_emp_tele'] = $row->telefone_inst; 
             $output['dado_emp_celu'] = $row->celular_inst; 
        }  
        echo json_encode($output);  
    }
    /**Altera dados da empresa */
    public function updateDadosEmpresa($id)
    {
        $data = array(
            'nome_inst'             => $this->input->post('update_data_empresa'),
            'inscri_estadual_inst'  => $this->input->post('update_data_inscric'),
            'razao_social_inst'     => $this->input->post('update_data_razao'),
            'cnpj_inst'             => $this->input->post('update_data_cnpj'),
            'endereco_inst'         => $this->input->post('update_data_endere'),
            'complemento_inst'      => $this->input->post('update_data_comple'),
            'numero_inst'           => $this->input->post('update_data_numer'),
            'cidade_inst'           => $this->input->post('update_data_cidade'),
            'estado_inst'           => $this->input->post('update_data_estado'),
            'cep_inst'              => $this->input->post('update_data_cepe'),
            'email_inst'            => $this->input->post('update_data_email'),
            'telefone_inst'         => $this->input->post('update_data_telefone'),
            'celular_inst'          => $this->input->post('update_data_celeular')
    );
    
    $this->db->where('id_inst', $id);
    $this->db->update('tbl_dados_instituicao', $data);
    echo "Dados alterado com sucesso!";
    }
    /**Deletar dados da empresa */
    public function delete_single_company(int $id)
    {
        $this->db->delete('tbl_dados_instituicao', array('id_inst' => $id));
        echo "Dados deletado com sucesso";
    }

}

/* End of file AdminSuper.php */
