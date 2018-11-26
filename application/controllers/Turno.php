<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Turno extends CI_Controller {

    public function add_turno()
    {
        $user = $this->session->userdata('user')->id_inst_pw;
        $this->form_validation->set_rules('name_turno', 'nome do turno', 'required|max_length[150]');
        $this->form_validation->set_rules('horas_tot_mes_turno', 'horas mês de trabalho', 'required|is_natural_no_zero|max_length[3]');


        $this->form_validation->set_rules('horas_entrada', 'hora de entrada', 'required');
        $this->form_validation->set_rules('horas_saida_int', 'saída para o intervalo', 'required');
        $this->form_validation->set_rules('horas_retorno_int', 'retorno do intervalo', 'required');
        $this->form_validation->set_rules('horas_saida', 'saída', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{

            $data = array(
                'nome_tn'       => $this->input->post('name_turno'),
                'horas_mes_tn'  => $this->input->post('horas_tot_mes_turno'),

                'dia_tb_tn_01'  => $this->input->post('dia_sema_01'),
                'dia_tb_tn_02'  => $this->input->post('dia_sema_02'),
                'dia_tb_tn_03'  => $this->input->post('dia_sema_03'),
                'dia_tb_tn_04'  => $this->input->post('dia_sema_04'),
                'dia_tb_tn_05'  => $this->input->post('dia_sema_05'),
                'dia_tb_tn_06'  => $this->input->post('dia_sema_06'),
                'dia_tb_tn_07'  => $this->input->post('dia_sema_07'),

                'hs_entrada_tn' => $this->input->post('horas_entrada'),
                'hs_saida_int_tn' => $this->input->post('horas_saida_int'),
                'hs_retorno_int_tn' => $this->input->post('horas_retorno_int'),
                'hs_saida_tn' => $this->input->post('horas_saida'),

                'fk_user_rh_empresa_tn' => $user,

                'fin_horas_entrada_tn' => $this->input->post('fin_horas_entrada'),
                'fin_horas_saida_int_tn' => $this->input->post('fin_horas_saida_int'),
                'fin_horas_retorno_int_tn' => $this->input->post('fin_horas_retorno_int'),
                'fin_horas_saida_tn' => $this->input->post('fin_horas_saida'),
                
            );
            
            $this->db->insert('tbl_turno', $data);
            echo json_encode(['success'=>'Cadastro inserido com sucesso!']);
        }
    }

    /**retorna todos os cadastros das horas */
    public function get_all_one_user(int $id)
    {
        $all = '';
        $data = $this->db->select('*')
                        ->order_by('id_tn', 'DESC')
                        ->where('fk_user_rh_empresa_tn', $id)
                        ->get('tbl_turno')->result();

    	if (count($data)>0) {
            $all .= '    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome do turno</th>
                        <th>Horas mês</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            <tbody>';
            foreach ($data as $value) {
                $all .= '<tr>
                            <td>'.$value->nome_tn.'</td>
                            <td>'.$value->horas_mes_tn.'</td>';
                            $all .= '<td class="toolbar toolbar-btn-link">
                            <div class="btn-group">
                            <a href="#" title="Visualizar" class="ver_my_turnoCAD btn btn-link" id="'.$value->id_tn.'" data-toggle="modal" data-target="#modalVIEW_turno">
                                <span class="elusive icon-eye-open"></span>
                            </a>
                            <a href="#" title="Editar" class="update_data_turnoVIEW btn btn-link" id="'.$value->id_tn.'">
                                <span class="elusive icon-edit"></span>
                            </a>
                            <a href="#" title="Deletar" class="delete_data_turno btn btn-link" id="'.$value->id_tn.'">
                                <span class="elusive icon-trash"></span>
                            </a>
                        </div>
                    </td>';
                $all .= '</tr>';
            }//fim do foreach
            $all .= '</tbody>';
            $all .= '</table>';
            echo json_encode($all);
        }
    }

    /**visualiza os dados dos turnos cadastrados */
    public function get_dados_turno(int $id)
    {
        $output = array();   
            $data = $this->db->select('*')
                            ->where('id_tn', $id)
                            ->get('tbl_turno')->result();

            foreach($data as $row)  
            {  
                $output['turn_nome'] = $row->nome_tn;  
                $output['turn_hora'] = $row->horas_mes_tn;  
                
                $output['turn_tn_1'] = $row->dia_tb_tn_01;  
                $output['turn_tn_2'] = $row->dia_tb_tn_02;  
                $output['turn_tn_3'] = $row->dia_tb_tn_03;  
                $output['turn_tn_4'] = $row->dia_tb_tn_04; 
                $output['turn_tn_5'] = $row->dia_tb_tn_05;  
                $output['turn_tn_6'] = $row->dia_tb_tn_06;  
                $output['turn_tn_7'] = $row->dia_tb_tn_07; 
                
                $output['turn_tn_1_sai'] = $row->hs_entrada_tn;  
                $output['turn_tn_2_ent'] = $row->hs_saida_int_tn;  
                $output['turn_tn_3_ent'] = $row->hs_retorno_int_tn;  
                $output['turn_tn_4_sai'] = $row->hs_saida_tn; 
            }  
            echo json_encode($output); 
    }

    /**altera dados do turno */
    public function altera_data_turno(int $id)
    {
        if (empty($id))
        {
            show_404();
        }else {
            
            $user = $this->session->userdata('user')->id_inst_pw;
            $this->form_validation->set_rules('up_name', 'Nome do turno', 'required');
            $this->form_validation->set_rules('up_horas', 'Horas do turno', 'required');
    
            $this->form_validation->set_rules('up_horas_entr_1', 'hora da entrada', 'required');
            $this->form_validation->set_rules('up_horas_sair_2', 'saida', 'required');
            $this->form_validation->set_rules('up_horas_entr_3', 'entrada depois do intervalo', 'required');
            $this->form_validation->set_rules('up_horas_sair_4', 'saída', 'required');
    
    
            if ($this->form_validation->run() == FALSE){
                $errors = validation_errors();
                echo json_encode(['error'=>$errors]);
            }else{
                    $data = array(
                    'nome_tn'       => $this->input->post('up_name'),
                    'horas_mes_tn'  => $this->input->post('up_horas'),

                    'dia_tb_tn_01'  => $this->input->post('up_opcao_Day_01'),
                    'dia_tb_tn_02'  => $this->input->post('up_opcao_Day_02'),
                    'dia_tb_tn_03'  => $this->input->post('up_opcao_Day_03'),
                    'dia_tb_tn_04'  => $this->input->post('up_opcao_Day_04'),
                    'dia_tb_tn_05'  => $this->input->post('up_opcao_Day_05'),
                    'dia_tb_tn_06'  => $this->input->post('up_opcao_Day_06'),
                    'dia_tb_tn_07'  => $this->input->post('up_opcao_Day_07'),

                    'hs_entrada_tn' => $this->input->post('up_horas_entr_1'),
                    'hs_saida_int_tn' => $this->input->post('up_horas_sair_2'),
                    'hs_retorno_int_tn' => $this->input->post('up_horas_entr_3'),
                    'hs_saida_tn' => $this->input->post('up_horas_sair_4'),
                    
                    'fk_user_rh_empresa_tn' => $user,
/*
                    'fin_horas_entrada_tn' => $this->input->post('fin_horas_entrada'),
                    'fin_horas_saida_int_tn' => $this->input->post('fin_horas_saida_int'),
                    'fin_horas_retorno_int_tn' => $this->input->post('fin_horas_retorno_int'),
                    'fin_horas_saida_tn' => $this->input->post('fin_horas_saida'),
 */
                    );
                $this->db->update('tbl_turno', $data, array('id_tn' => $id));
                echo json_encode(['success'=>'Dados doturno alterado com sucesso.']);
            }
        }
    }
    /**deletando */
    public function delete_one_categoria(int $id)
    {
        if (empty($id))
        {
            show_404();
        }else {
        $this->db->delete('tbl_turno', array('id_tn' => $id));
        echo "Turno deletado com sucesso!";
        }
    }
    /**Dados do contador */

}

/* End of file Turno.php */
