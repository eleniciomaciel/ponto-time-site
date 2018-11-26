<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function view_one_perfil(int $id)
    {
        $output = array();  
        
        $data = $this->db->select('*')
                            ->from('tbl_dados_instituicao')
                            ->join('tbl_dados_inst_pw_instuicao', 'tbl_dados_inst_pw_instuicao.fk_user_pw = tbl_dados_instituicao.id_inst')
                            ->where('id_inst_pw', $id)
                            ->get()->result();
        foreach($data as $row)  
        {  
            $output['employer_id_inst']             = $row->id_inst; 
            $output['employer_nome']                = $row->nome_inst;  
            $output['employer_ins_est']             = $row->inscri_estadual_inst;
            $output['employer_razao_social_inst']   = $row->razao_social_inst;  
            $output['employer_cnpj_inst']           = $row->cnpj_inst;
            $output['employer_endereco_inst']       = $row->endereco_inst;  
            $output['employer_complemento_inst']    = $row->complemento_inst;
            $output['employer_numero_inst']         = $row->numero_inst;  
            $output['employer_cidade_inst']         = $row->cidade_inst;
            $output['employer_estado_inst']         = $row->estado_inst;  
            $output['employer_cep_inst']            = $row->cep_inst;
            $output['employer_email_inst']          = $row->email_inst;
            $output['employer_telefone_inst']       = $row->telefone_inst;  
            $output['employer_celular_inst']        = $row->celular_inst;

            $output['fk_user_name']        = $row->nome_user_pw;
            $output['fk_user_email']        = $row->email_inst_pw;

        }  
        echo json_encode($output); 
    }
    /**altera os dados da empresa */
    public function update_one_emplower(int $id)
    {
        $this->form_validation->set_rules('emplo_nome', 'nome da empresa', 'required|max_length[100]');
        $this->form_validation->set_rules('emplo_inse', 'endereço', 'required|max_length[20]');

        $this->form_validation->set_rules('emplo_raza', 'razão social', 'required|max_length[20]');
        $this->form_validation->set_rules('emplo_cnpj', 'cnpj', 'required|max_length[20]');

        $this->form_validation->set_rules('emplo_ende', 'endereço', 'required|max_length[100]');
        $this->form_validation->set_rules('emplo_comp', 'complemento', 'required|max_length[50]');

        $this->form_validation->set_rules('emplo_nume', 'número', 'required|max_length[100]|numeric');
        $this->form_validation->set_rules('emplo_cida', 'cidade', 'required|max_length[50]');

        $this->form_validation->set_rules('emplo_esta', 'estado', 'required|max_length[2]');
        $this->form_validation->set_rules('emplo_cepe', 'cep', 'required|max_length[12]');

        $this->form_validation->set_rules('emplo_emai', 'email', 'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('emplo_tele', 'telefone', 'required|max_length[15]');

        $this->form_validation->set_rules('emplo_celu', 'celular', 'required|max_length[15]');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array(
                'nome_inst'             => $this->input->post('emplo_nome'),
                'inscri_estadual_inst'  => $this->input->post('emplo_inse'),
                'razao_social_inst'     => $this->input->post('emplo_raza'),
                'cnpj_inst'             => $this->input->post('emplo_cnpj'),
                'endereco_inst'         => $this->input->post('emplo_ende'),
                'complemento_inst'      => $this->input->post('emplo_comp'),
                'numero_inst'           => $this->input->post('emplo_nume'),
                'cidade_inst'           => $this->input->post('emplo_cida'),
                'cep_inst'              => $this->input->post('emplo_cepe'),
                'email_inst'            => $this->input->post('emplo_emai'),
                'telefone_inst'         => $this->input->post('emplo_tele'),
                'celular_inst'          => $this->input->post('emplo_celu')
            );
            $this->db->where('id_inst', $id);
            $this->db->update('tbl_dados_instituicao', $data); 

           echo json_encode(['success'=>'Dados alterado com sucesso!']);
        }
    }

    /**Altera dados perfil */
    public function rename_dado_perfil(int $id)
    {
        $user_image = '';  
        if($_FILES["user_up_perfil"]["name"] != '')  
        {  
             $user_image = $this->upload_image();  
        }  
        else  
        {  
             $user_image = $this->input->post("hidden_user_image");  
        }  
        $data = array(  
             'nome_user_pw'    =>     $this->input->post('myPerf_nome'),  
             'email_inst_pw'   =>     $this->input->post('myPerf_email'),  
             'file_pw'         =>     $user_image  
        );  
        $this->db->update('tbl_dados_inst_pw_instuicao', $data, array('id_inst_pw' => $id));  
        echo 'Dados alterado com sucesso';  
    }

    /**gurda imagem do perfil */
    public function upload_image()
    {
        if(isset($_FILES["user_up_perfil"]))  
        {  
            $extension = explode('.', $_FILES['user_up_perfil']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './stylus/upload/perfil_user/' . $new_name;  
            move_uploaded_file($_FILES['user_up_perfil']['tmp_name'], $destination);  
            return $new_name;  
        }  
    }

    /**altera dados do login senha */
    public function new_password(int $id)
    {
        $this->form_validation->set_rules('new_pd_user', 'Senha', 'required|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]|trim',
        array(  'required' => 'O campo %s é obrigatório.',
                'regex_match' => 'A %s deve conter uma ou mais letras maiúsculas, uma ou mais mininúsculas, números e 8 ou mais caracteres.'));
        $this->form_validation->set_rules('reapeti_new_pw', 'confirmar a senha', 'required|matches[new_pd_user]',
        array('required' => 'O campo %s é obrigatório.',
              'matches'=>'Confirmar senha está diferente de senha.'));

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'password_inst_pw' => md5($this->input->post('new_pd_user'))
            );
            $this->db->update('tbl_dados_inst_pw_instuicao', $data, array('id_inst_pw' => $id));
           echo json_encode(['success'=>'Senha alterada com sucesso.']);
        }
    }
}

/* End of file Perfil.php */
