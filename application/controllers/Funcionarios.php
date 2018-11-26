<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Funcionarios extends CI_Controller
{

    /**Lista s dados da empresa e rh para inserir na tabela a baixo */
    public function levanta_dados_modal(int $id)
    {
        $output = array();
           
        $data = $this->db->select('*')
                        ->where('id_inst_pw', $id)
                        ->get('tbl_dados_inst_pw_instuicao')->result();

        foreach ($data as $row) {
            $output['id_da_empresa'] = $row->fk_user_pw;
        }
        echo json_encode($output);
    }

    public function add_funcionario()
    {
        $this->load->library('form_validation');
                    
        $data = array('success' => false,'messages' => array());
        
        $this->form_validation->set_rules('fun_name', 'nome', 'required|is_unique[tbl_funcionario.nome_fun]|max_length[100]');
        $this->form_validation->set_rules('fun_matric', 'número da matricula', 'required|is_unique[tbl_funcionario.matri_fun]|max_length[30]');
        $this->form_validation->set_rules('fun_endere', 'endereço', 'required|max_length[200]');
        $this->form_validation->set_rules('fun_bair', 'bairro', 'required|max_length[100]');

        $this->form_validation->set_rules('fun_compl', 'complemento', 'required|max_length[50]');
        $this->form_validation->set_rules('fun_cida', 'cidade', 'required|max_length[50]');
        $this->form_validation->set_rules('fun_rg', 'rg', 'required|is_unique[tbl_funcionario.rg_fun]|max_length[20]');
        $this->form_validation->set_rules('fun_cpf', 'cpf', 'required|is_unique[tbl_funcionario.cpf_fun]|max_length[15]');

        $this->form_validation->set_rules('fun_ctps', 'CTPS', 'required|is_unique[tbl_funcionario.ctps_fun]|max_length[20]');
        $this->form_validation->set_rules('fun_pis', 'PIS', 'required|is_unique[tbl_funcionario.pis_fun]|max_length[25]');
        $this->form_validation->set_rules('fun_tele', 'telefone', 'required|max_length[16]');
        $this->form_validation->set_rules('fun_email', 'Email', 'required|valid_email|is_unique[tbl_funcionario.email_fun]|max_length[100]');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run()) {
            $data = array(
                'nome_fun'      =>  $this->input->post('fun_name'),
                'matri_fun'     =>  $this->input->post('fun_matric'),
                'ende_fun'      => $this->input->post('fun_endere'),
                'bair_fun'      => $this->input->post('fun_bair'),

                'com_fun'       =>  $this->input->post('fun_compl'),
                'cida_fun'      =>  $this->input->post('fun_cida'),
                'rg_fun'        => $this->input->post('fun_rg'),
                'cpf_fun'       => $this->input->post('fun_cpf'),

                'ctps_fun'      =>  $this->input->post('fun_ctps'),
                'pis_fun'       =>  $this->input->post('fun_pis'),
                'tele_fun'      => $this->input->post('fun_tele'),
                'email_fun'     => $this->input->post('fun_email'),

                'fk_emplower_fun' => $this->input->post('id_company'),
                'fk_empresa_fun' => $this->input->post('empresa_id')

            );
            $this->db->insert('tbl_funcionario', $data);
            $data['success'] = true;
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    /**Seleciona os dados do funcionario na tabela */

    public function lista_dados_funcionario(int $id)
    {
        $this->load->library('encryption');
        $output = array();
           
           $data = $this->db->select('*')
                            ->where('id_fun', $id)
                            ->get('tbl_funcionario')->result();
        foreach ($data as $row) {
             $output['eye_fun_nome'] = $row->nome_fun;
             $output['eye_fun_matr'] = $row->matri_fun;
             $output['eye_fun_ende'] = $row->ende_fun;
             $output['eye_fun_bair'] = $row->bair_fun;

             $output['eye_fun_comp'] = $row->com_fun;
             $output['eye_fun_cida'] = $row->cida_fun;
             $output['eye_fun_rg'] = $row->rg_fun;
             $output['eye_fun_cpf'] = $row->cpf_fun;

             $output['eye_fun_ctps'] = $row->ctps_fun;
             $output['eye_fun_pis'] = $row->pis_fun;
             $output['eye_fun_tele'] = $row->tele_fun;
             $output['eye_fun_emai'] = $row->email_fun;
             $output['eye_fun_status'] = $row->status_fun;
             $output['eye_fun_pw_pw'] = $row->pw_fun;

             $output['eye_fun_id'] = $row->id_fun;
        }
           echo json_encode($output);
    }

    /**Conclui alteração dos dados do funcionário (06_modal_lista_funcionario) */
    public function you_employer(int $id = null)
    {
        if (empty($id) and ! is_numeric($id)) {
            show_404();
        } else {
            $this->form_validation->set_rules('employer_eye_nome', 'Nome', 'required');
            $this->form_validation->set_rules('employer_eye_matr', 'matrícula', 'required');
            $this->form_validation->set_rules('employer_eye_enfr', 'endereço', 'required');
            $this->form_validation->set_rules('employer_eye_bair', 'bairro', 'required');
            $this->form_validation->set_rules('employer_eye_comp', 'complemento', 'required');
            $this->form_validation->set_rules('employer_eye_cida', 'cidade', 'required');
            $this->form_validation->set_rules('employer_eye_rg', 'rg', 'required');
            $this->form_validation->set_rules('employer_eye_cpf', 'cpf', 'required');
            $this->form_validation->set_rules('employer_eye_ctps', 'ctps', 'required');
            $this->form_validation->set_rules('employer_eye_pis', 'pis', 'required');
            $this->form_validation->set_rules('employer_eye_tele', 'telefone', 'required');
            $this->form_validation->set_rules('employer_eye_email', 'Email', 'required|valid_email');


            if ($this->form_validation->run() == false) {
                $errors = validation_errors();
                echo json_encode(['error'=>$errors]);
            } else {
                $data = array(
                    'nome_fun' =>  $this->input->post('employer_eye_nome'),
                    'matri_fun' =>   $this->input->post('employer_eye_matr'),
                    'ende_fun' =>   $this->input->post('employer_eye_enfr'),
                    'bair_fun' =>  $this->input->post('employer_eye_bair'),
                    'com_fun' =>   $this->input->post('employer_eye_comp'),
                    'cida_fun' =>   $this->input->post('employer_eye_cida'),
                    'rg_fun' =>  $this->input->post('employer_eye_rg'),
                    'cpf_fun' =>   $this->input->post('employer_eye_cpf'),
                    'ctps_fun' =>   $this->input->post('employer_eye_ctps'),
                    'pis_fun' =>  $this->input->post('employer_eye_pis'),
                    'tele_fun' =>   $this->input->post('employer_eye_tele'),
                    'email_fun' =>   $this->input->post('employer_eye_email'),
                );

                $this->db->update('tbl_funcionario', $data, array('id_fun' => $id));
                echo json_encode(['success'=>'Dados alterado com sucesso.']);
            }
        }
    }

    /**Deleta empregado employer */
    public function you_employer_delete(int $id = null)
    {
        if (empty($id) and ! is_numeric($id)) {
            show_404();
        } else {
            $this->db->delete('tbl_funcionario', array('id_fun' => $id));
            echo "Empregado deletado com sucesso";
        }
    }

    /**Inseri a senha do usuário */
    public function add_update_senha(int $id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'add_password_new_fun01',
            'senha',
            'required|regex_match[/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]|trim',
            array(
                'required'      => 'Por favor preencha o campo %s.',
                'regex_match'     => 'A %s deve conter no mínimo uma letra maiúscula uma ou mais minúsculas e números, somando 8 ou mais caracteres.'
            )
        );


        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {
            $this->load->library('encryption');
            
            $pass_encryption = $this->input->post('add_password_new_fun01', true);
            $pw =$pass_encryption;
            $data = array(
                'pw_fun' => $pw
            );
            $this->db->update('tbl_funcionario', $data, array('id_fun' => $id));
            echo json_encode(['success'=>'Senha gerada com sucesso!']);
        }
    }
    /**Altera o status do employer(funcionario) */
    public function altera_status_acesso(int $id)
    {
        $this->form_validation->set_rules('text_func_new_status', 'status de acesso', 'required|in_list[1,0]');

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        } else {
            $data = array(
                'status_fun' => $this->input->post('text_func_new_status')
            );
            $this->db->update('tbl_funcionario', $data, array('id_fun' => $id));

            echo json_encode(['success'=>'Status atualizado com sucesso.']);
        }
    }
/* End of file Controllername.php */
}
