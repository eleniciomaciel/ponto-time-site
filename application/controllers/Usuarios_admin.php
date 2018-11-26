<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_admin extends CI_Controller {


    public function add_novos_usuarios_005()
    {
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


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
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
           echo json_encode(['success'=>'Empresa inserida com sucesso.']);
        }
    }

    /**Adicionando rh da empresa */
    public function add_rh_usuarios_006()
    {
        $this->load->library('encryption');
        $this->form_validation->set_rules('input_nome_user', 'nome do usuário', 'required');
        $this->form_validation->set_rules('key_words', 'chave de acesso', 'required');
        $this->form_validation->set_rules('email_rh', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password_rh', 'senha', 'required|trim|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]');
        $this->form_validation->set_rules('instituicaoSelect1', 'instituição do rh', 'required');
        $this->form_validation->set_rules('nivelControlSelect1', 'nivel do rh', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $ciphertext2 = $this->encryption->encrypt($this->input->post('key_words'));
            $data = array(
                'nome_user_pw' => $this->input->post('input_nome_user'),
                'email_inst_pw' => $this->input->post('email_rh'),
                'password_inst_pw' => md5($this->input->post('password_rh')),

                'nivel_user_pw' => $this->input->post('nivelControlSelect1'),
                'fk_user_pw' => $this->input->post('instituicaoSelect1'),
                'key_word_pw' => $ciphertext2
            );
        
            $this->db->insert('tbl_dados_inst_pw_instuicao', $data);
           echo json_encode(['success'=>'Record added successfully.']);
        }
    }
    public function ver_usuarios__rh(int $id){

        $output = array();   
        $data = $this->db->select('*')
                         ->from('tbl_dados_inst_pw_instuicao')
                         ->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw')
                         ->where('id_inst_pw', $id)
                         ->get()->result();

        foreach($data as $row)  
        {  
            $output['user_001_v_nome'] = $row->nome_user_pw;  
            $output['user_001_v_emai'] = $row->email_inst_pw;  
            $output['user_001_v_nive'] = ($row->nivel_user_pw == 1) ? "Administrador C8" : "RH";  
            $output['user_001_v_empr'] = $row->nome_inst;  
            $output['user_001_v_key'] = $row->key_word_pw;  

            $output['user_001_v_nive_up'] = $row->nivel_user_pw;  
            $output['user_001_v_empr_up'] = $row->fk_user_pw;

            $output['status_user_v'] = $row->status_user_pw;
            
                    
        }  
        echo json_encode($output);  
    }

    public function altera_usuario_rh(int $id)
    {
        $this->load->library('encryption');
        $this->form_validation->set_rules('view_new_up_001_v_name', 'usuário', 'required|max_length[60]');
        $this->form_validation->set_rules('view_new_up_001_v_emai', 'Email do usuário', 'required|valid_email');
        $this->form_validation->set_rules('view_new_up_001_v_key', 'chave de acesso', 'required|min_length[3]|max_length[10]|alpha');
        $this->form_validation->set_rules('view_new_up_001_v_empr', 'empresa', 'required');
        $this->form_validation->set_rules('view_new_up_001_v_nive', 'nível', 'required|in_list[1,2]');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $ciphertext = $this->encryption->encrypt($this->input->post('view_new_up_001_v_key'));
            $data = array(
                'nome_user_pw'  => $this->input->post('view_new_up_001_v_name'),
                'email_inst_pw' => $this->input->post('view_new_up_001_v_emai'),
                'nivel_user_pw' => $this->input->post('view_new_up_001_v_nive'),
                'fk_user_pw'    => $this->input->post('view_new_up_001_v_empr'),
                'key_word_pw'   => $ciphertext
            );
            $this->db->update('tbl_dados_inst_pw_instuicao', $data, array('id_inst_pw' => $id));
           echo json_encode(['success'=>'Dados do usuário alterado com sucesso.']);
        }
    }

    public function up_rh_user_pw(int $id)
    {
        $this->form_validation->set_rules('new_passord_ppw_003', 'nova senha', 'required|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]');
        $this->form_validation->set_rules('view_new_001_pw_emai', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array(
                'email_inst_pw'  => $this->input->post('view_new_001_pw_emai'),
                'password_inst_pw' => md5($this->input->post('new_passord_ppw_003'))
            );
            $this->db->update('tbl_dados_inst_pw_instuicao', $data, array('id_inst_pw' => $id));

           echo json_encode(['success'=>'Dados do usuário alterado com sucesso.']);
        }
    }

    public function altera_status_do_usuario(int $id)
    {
        $this->form_validation->set_rules('status_user_ver_04', 'Status', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array(
                'status_user_pw' => $this->input->post('status_user_ver_04')
            );
            $this->db->update('tbl_dados_inst_pw_instuicao', $data, array('id_inst_pw' => $id));
           echo json_encode(['success'=>'Status alterado com sucesso.']);
        }
    }

    public function delete_rh(int $id)
    {
        $this->db->delete('tbl_dados_inst_pw_instuicao', array('id_inst_pw' => $id));
    }
}