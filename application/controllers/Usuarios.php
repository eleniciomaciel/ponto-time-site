<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function add_user()
    {
        $this->load->library('encryption');
        

        $this->form_validation->set_rules('input_nome_user', 'nome', 'required|max_length[100]');
        $this->form_validation->set_rules('exampleInputEmail1', 'email', 'required|trim|valid_email|is_unique[tbl_dados_inst_pw_instuicao.email_inst_pw]');
        $this->form_validation->set_rules('exampleInputPassword1', 'senha', 'required|trim|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]');
        $this->form_validation->set_rules('instituicaoSelect1', 'instituição', 'required');
        $this->form_validation->set_rules('nivelControlSelect1', 'nivel', 'required');
        $this->form_validation->set_rules('key_words', 'Chave de acesso', 'required|trim|alpha_numeric_spaces|min_length[5]|max_length[30]');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            
            $data = array(
                'nome_user_pw'      => $this->input->post('input_nome_user'),
                'email_inst_pw'     => $this->input->post('exampleInputEmail1'),
                'password_inst_pw'  => md5($this->input->post('exampleInputPassword1')),
                'nivel_user_pw'     => $this->input->post('nivelControlSelect1'),
                'fk_user_pw'        => $this->input->post('instituicaoSelect1'),
                'key_word_pw'       => $this->encryption->encrypt($this->input->post('key_words'))
            );
            $this->db->insert('tbl_dados_inst_pw_instuicao', $data);

           echo json_encode(['success'=>'Usuário criado com sucesso.']);
        }
    }
    /**Lista de todos os usuários */
    public function list_view_user_company()
    {
        $id = $this->session->userdata('user')->id_inst_pw;
        $output = '';
        $data = $this->db->select('*')
                         ->from('tbl_dados_instituicao')
                         ->join('tbl_dados_inst_pw_instuicao', 'tbl_dados_inst_pw_instuicao.fk_user_pw = tbl_dados_instituicao.id_inst')
                         //->where('id_inst_pw !=', $id)
                         ->get()->result();
        if (count($data)>0) {
            
            $output .='<table class="table table-striped table-hover table-media">';
                $output .='<thead>';
                    $output .='<tr>';
                        $output .='<th>Empresa</th>';
                        $output .='<th>Nome</th>';
                        $output .='<th>E-mail</th>';
                        $output .='<th>Nível</th>';
                        $output .='<th class="col-sm-2">Ações</th>';
                    $output .='</tr>';
                $output .='</thead>';
            $output .='<tbody>';
            
            foreach ($data as $key) {
                
                $output .='<tr>';
   
                    $output .='<td>'.$key->nome_inst.'</td>';
                    $output .='<td>'.$key->nome_user_pw.'</td>';
                    $output .='<td>'.$key->email_inst_pw.'</td>';
                        if ($key->nivel_user_pw == '1') {
                            $output .='<td><span class="label label-info">Administrador</span></td>';
                        } elseif($key->nivel_user_pw == '2') {
                            $output .='<td><span class="label label-danger">Usuário</span></td>';
                        }
                    $output .='<td>';
                        $output .='<div class="btn-group">';
                        $output .='<button class="btn btn-sm">';
                        if ($key->status_user_pw == '0') {
                            $output .='<span class="elusive icon-lock" id="'.$key->status_user_pw.'" title="Acesso Negado"></span>';
                        } else {
                            $output .='<span class="access_released elusive  icon-unlock" id="'.$key->status_user_pw.'" title="Acesso Liberado"></span>';
                        }
                       
                        $output .='</button>';
                        $output .='<button class="btn btn-sm" title="Ativar usuário"><span class="access_released elusive icon-wrench" id="'.$key->id_inst_pw.'"></span></button>';
                        $output .='<button class="btn btn-sm" title="Desativar usuário"><span class="access_denied elusive icon-off" id="'.$key->id_inst_pw.'"></span></button>';
                        $output .='</div>';
                    $output .='</td>';
                $output .='</tr>';
                
            }
            $output .= '</tbody>';
            $output .= '</table>';
            echo json_encode($output);
        }
    }
/**Altera status de acesso do usuários */
    public function status_level(int $id)
    {
        $data = array('status_user_pw' => '1');
        $this->db->update('tbl_dados_inst_pw_instuicao', $data, "id_inst_pw = $id"); 
        echo "Usuários ativado com sucesso";
    }
/**Negar acesso */
    public function status_level_denied(int $id)
    {
        $data = array('status_user_pw' => '0');
        $this->db->update('tbl_dados_inst_pw_instuicao', $data, "id_inst_pw = $id"); 
        echo "Usuários desativado com sucesso";
    }
}

/* End of file Usuarios.php */
