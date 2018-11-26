<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function access_user() {

        $this->form_validation->set_rules('pw_login', 'usuário', 'required|trim|valid_email',
        array(
                'required'      => 'Preencha o campo %s.',
                'valid_email'   => 'Preencha um %s válido por favor.'
        ));
        $this->form_validation->set_rules('pw_senha', 'senha', 'required|trim|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]',
        array(
                'required'      => 'A %s é obrigatório.',
                'regex_match'   => 'Senha fora do padrão permitido.'
        ));

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('welcome_message');
        }
        else
        {
            $this->db->where('email_inst_pw', $this->input->post('pw_login'));
            $this->db->where('password_inst_pw', md5($this->input->post('pw_senha')));
          
            $this->db->where('status_user_pw', '1');
            
            $usuario = $this->db->get('tbl_dados_inst_pw_instuicao')->result();

            if (count($usuario)==1 and $usuario[0]->nivel_user_pw == 1) {
                $dadosSessao['user'] = $usuario[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                $this->load->view('admin-c8/panel_admin_geral');
            }elseif (count($usuario)==1 and $usuario[0]->nivel_user_pw == 2) {
                $dadosSessao['user'] = $usuario[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                $data['users'] = 'Usuario C8 - Sistemas.';
                //$data['news'] = $this->home_model->list_contatic();
                $this->load->view('admin-user/home',  $data);
            } else {
                $dadosSessao['user'] = NULL;
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                $this->session->set_flashdata('item', 'Dados de acesso não compatível ao cadastrado!');
                $this->load->view('welcome_message');
            }
        }
    }
    
    public function logaut() {
        $dadosSessao['user'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        $this->load->view('welcome_message');
    }

    /**Lista dados no modal perfíl */
    public function list_dado_one_perfil(int $id)
    {
        $output = array();   
        $data =  $this->db->select('*')
                        ->where('id_inst_pw', $id)
                        ->get('tbl_dados_inst_pw_instuicao')->result();
        foreach($data as $row)  
        {  
             $output['perfil_name'] = $row->nome_user_pw;  
             $output['perfil_emai'] = $row->email_inst_pw;  
        }  
        echo json_encode($output);
    }
/**altera dados do login */
    public function update_one_user(int $id)
    {
        $user_image = '';  
        if($_FILES["super_admin_file"]["name"] != '')  
        {  
            $user_image = $this->upload_image();  
        }  
        else  
        {  
            $user_image = $this->input->post("hidden_user_image");  
        }  
        $data = array(  
            'nome_user_pw'      =>     $this->input->post('my_perfil_name'),  
            'email_inst_pw'     =>     $this->input->post('my_perfil_emai'),  
            'file_pw'           =>     $user_image  
        );  
        $this->db->where('id_inst_pw', $id);
        $this->db->update('tbl_dados_inst_pw_instuicao', $data);  
        echo 'Dados de perfíl alterado com sucesso!';  
    }
    /**Validação da imagem */
    public function upload_image()  
    {  
         if(isset($_FILES["super_admin_file"]))  
         {  
              $extension = explode('.', $_FILES['super_admin_file']['name']);  
              $new_name = rand() . '.' . $extension[1];  
              $destination = './stylus/img/files_user/' . $new_name;  
              move_uploaded_file($_FILES['super_admin_file']['tmp_name'], $destination);  
              return $new_name;  
         }  
    } 
    /**ALtera login e senha */
    public function update_one_password(int $id)
    {
        $this->form_validation->set_rules('pw1', 'nova senha', 'required|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]|trim');
        $this->form_validation->set_rules('pw2', 'repetir senha', 'required|matches[pw1]|trim');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array('password_inst_pw' => md5($this->input->post('pw1')));
            $this->db->where('id_inst_pw', $id);
            $this->db->update('tbl_dados_inst_pw_instuicao', $data); 

           echo json_encode(['success'=>'Dados alterado com sucesso!']);
        }
    }

}

/* End of file Controllername.php */
