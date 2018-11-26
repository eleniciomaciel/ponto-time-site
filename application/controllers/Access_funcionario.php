<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Access_funcionario extends CI_Controller
{
    
    private $login_decript;

    public function painel_login_geral($page = 'painel_login')
    {
        if (! file_exists(APPPATH.'views/access_funcionario/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('access_funcionario/templates/header', $data);
        $this->load->view('access_funcionario/'.$page, $data);
        $this->load->view('access_funcionario/templates/footer', $data);
    }

    public function login_ponto()
    {
        $this->form_validation->set_rules('login_collaborator', 'Matricula', 'required|alpha_numeric_spaces|trim');
        $this->form_validation->set_rules('senha_collaborator', 'Senha', 'required|trim|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]');

        if ($this->form_validation->run() === false) {
            $this->painel_login_geral();
        } else {
            $login = $this->input->post('login_collaborator');
            $senha = $this->input->post('senha_collaborator');

            $this->db->where('matri_fun', $login);
            $this->db->where('pw_fun', $senha);
            $this->db->where('status_fun', '1');

            $usuario = $this->db->select('*')
                ->from('tbl_turno_funcionario')
                ->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf')
                ->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_turno_funcionario.fk_tbl_empresa_tf')
                ->join('tbl_cargos', 'tbl_cargos.id_cg = tbl_turno_funcionario.fk_tbl_cargo_tf')
                ->get()->result();

            //$this->db->get('tbl_funcionario')->result();



            if (count($usuario)==1) {
                $dadosSessao['user'] = $usuario[0];
                $dadosSessao['logado'] = true;
                $this->session->set_userdata($dadosSessao);
                $this->load->view('access_funcionario/painel_registro', array('error' => ''));
            } else {
                $dadosSessao['user'] = null;
                $dadosSessao['logado'] = false;
                $this->session->set_userdata($dadosSessao);
                $this->session->set_flashdata('erro_conect', 'Dados de acesso hhhh não compatível ao cadastrado!');
                $this->painel_login_geral();
            }
        }
    }

    public function descripita_senha($senha)
    {
        $this->load->library('encryption');
        
           
           $data = $this->db->select('*')
                            ->get('tbl_funcionario')->result();

        foreach ($data as $row) {
             $output['eye_fun_pw_pw'] = $this->encryption->decrypt($row->pw_fun);
        }
    }

    /**Novo modelo de registro de acesso */
    public function add_new_regirtro(int $id = null)
    {
        $entrada 	= $this->input->post('inlineRadio1');
        $interva 	= $this->input->post('inlineRadio2');
        $retorno 	= $this->input->post('inlineRadio3');
        $saida 		= $this->input->post('inlineRadio4');

        $query = $this->db->query("SELECT MAX(id_n) as id_n FROM new_registro WHERE fk_funcionario_n = $id");
        $row = $query->row();
        $id = $row->id_n;


        if ($entrada) {

                date_default_timezone_set('America/Araguaina');
                $hours1 = date('H:i:s');

               /* $user_image = '';  
                if($_FILES["registra_photo"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                } */
               
                $data = array(
                    'entrada_n' => $this->input->post('inlineRadio1'),
                    'hora_entrada_n' => $hours1,
                    'fk_funcionario_n' => $this->input->post('id_funcionario_data', true),
                    'fk_empresa_n' => $this->input->post('id_empresa_data', true),
                    'fk_cargo_n' => $this->input->post('id_cargo'),
                    //'foto_entrada_n' => $user_image
                    
                    );
    
                    $this->db->insert('new_registro', $data);
                    $this->session->set_flashdata('success_pt', 'Ponto registrado com sucesso!');
                    $this->load->view('access_funcionario/painel_registro', array('error' => ''));
                
                
        } elseif($interva) {
                date_default_timezone_set('America/Araguaina');
                $hours2 = date('H:i:s');

                /*$user_image = '';  
                if($_FILES["registra_photo"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                } */

                $data = array(
                        'intervalo_n' => $this->input->post('inlineRadio2'),
                        'hora_intervalo_n' => $hours2,
                        'fk_funcionario_n' => $this->input->post('id_funcionario_data', true),
                        'fk_empresa_n' => $this->input->post('id_empresa_data', true),
                        'fk_cargo_n' => $this->input->post('id_cargo'),
                        //'foto_intervalo_n' => $user_image
                    );
                $this->db->update('new_registro', $data, array('id_n' => $id));
                $this->session->set_flashdata('success_pt', 'Intervalo registrado com sucesso!');
                $this->load->view('access_funcionario/painel_registro', array('error' => ''));

        } elseif($retorno ) {
                
                date_default_timezone_set('America/Araguaina');
                $hours2 = date('H:i:s');

               /* $user_image = '';  
                if($_FILES["registra_photo"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                } */

                $data = array(
                        'retorno_n' => $this->input->post('inlineRadio3'),
                        'hora_retorno_n' => $hours2,
                        'fk_funcionario_n' => $this->input->post('id_funcionario_data', true),
                        'fk_empresa_n' => $this->input->post('id_empresa_data', true),
                        'fk_cargo_n' => $this->input->post('id_cargo'),
                        //'foto_retorno_n' => $user_image
                    );
                $this->db->update('new_registro', $data, array('id_n' => $id));
                $this->session->set_flashdata('success_pt', 'Retorno registrado com sucesso!');
                $this->load->view('access_funcionario/painel_registro', array('error' => ''));


        } elseif($saida) {
               date_default_timezone_set('America/Araguaina');
                $hours2 = date('H:i:s');

                $user_image = '';  
                if($_FILES["registra_photo"]["name"] != '')  
                {  
                     $user_image = $this->upload_image();  
                } 

                $data = array(
                        'saida_n' => $this->input->post('inlineRadio4'),
                        'hora_saida_n' => $hours2,
                        'fk_funcionario_n' => $this->input->post('id_funcionario_data', true),
                        'fk_empresa_n' => $this->input->post('id_empresa_data', true),
                        'fk_cargo_n' => $this->input->post('id_cargo'),
                        'foto_n' => $user_image
                    );
                $this->db->update('new_registro', $data, array('id_n' => $id));
                $this->session->set_flashdata('success_pt', 'Saída registrado com sucesso!');
                $this->load->view('access_funcionario/painel_registro', array('error' => ''));

        } 
    }

    /**Imagem */
    public function upload_image()
    {
        if(isset($_FILES["registra_photo"]))  
           {  
                $extension = explode('.', $_FILES['registra_photo']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './stylus/upload/photo_access/' . $new_name;  
                move_uploaded_file($_FILES['registra_photo']['tmp_name'], $destination);  
                return $new_name;  
           } 
    }
 /**Modo teste */
    public function add_registro()
    {
        $this->form_validation->set_rules('select_access', 'tipo de acesso', 'required|in_list[1,2,3,4]');

        if ($this->form_validation->run() == false) {
            $this->load->view('access_funcionario/painel_registro', array('error' => ''));
        } else {
            $config['upload_path']          = './stylus/upload/photo_access/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('registra_photo')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('access_funcionario/painel_registro', $error);
            } else {
                $mail_user = $this->input->post('email_fun', true);

                $data = array(
                    'registros_rpt' => $this->input->post('select_access', true),
                    'fk_employer_rpt' => $this->input->post('id_funcionario_data', true),
                    'fk_empresa_rpt' => $this->input->post('id_empresa_data', true),
                    'photo_rpt' => $this->upload->data('file_name'),
                    'ip_enddress_rpt' => $this->input->ip_address(),
                    'fk_cargo_rpt' => $this->input->post('id_cargo')
                );
                $this->db->insert('tbl_registra_ponto', $data);
                $this->session->set_flashdata('success_pt', 'Ponto registrado com sucesso!');
                $this->load->view('access_funcionario/painel_registro', array('error' => ''));
            }
        }
    }

    /**registrar o ponto  modo original
    public function add_registro()
    {

        $this->form_validation->set_rules('select_access', 'tipo de acesso', 'required|in_list[1,2,3,4]');

        if ($this->form_validation->run() == false) {
            $this->load->view('access_funcionario/painel_registro', array('error' => ''));
        } else {
            $config['upload_path']          = './stylus/upload/photo_access/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('registra_photo')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('access_funcionario/painel_registro', $error);
            } else {
                $mail_user = $this->input->post('email_fun', true);
                $data = array(
                    'registros_rpt' => $this->input->post('select_access', true),
                    'fk_employer_rpt' => $this->input->post('id_funcionario_data', true),
                    'fk_empresa_rpt' => $this->input->post('id_empresa_data', true),
                    'photo_rpt' => $this->upload->data('file_name'),
                    'ip_enddress_rpt' => $this->input->ip_address()
                );
                
                $this->load->library('email');

                $config['protocol'] = 'mail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = true;
                $config['mailtype'] = 'html';

                $this->email->initialize($config);

                $mensagem = $this->load->view('access_funcionario/email/template_email.php', $data, true);
                
                $this->email->from('c8sistemas@Tecnologia', 'C8-Sistemas Registro de Ponto');
                $this->email->to($mail_user);
                
                $this->email->subject('C8-Sistemas Tecnologia - Registro do Ponto');
                $this->email->message($mensagem);
                
                if ($this->email->send()) {
                    $this->db->insert('tbl_registra_ponto', $data);
                    $this->session->set_flashdata('success_pt', 'Ponto registrado com sucesso!');
                    $this->load->view('access_funcionario/painel_registro', array('error' => ''));
                } else {
                    echo $this->email->print_debugger();
                }
            }
        }
    }
*/
    /**sair do registro */
    public function logout()
    {
        $dadosSessao['user'] = null;
        $dadosSessao['logado'] = false;
        $this->session->set_userdata($dadosSessao);
        $this->painel_login_geral();
    }
}

/* End of file Access_funcionario.php */
