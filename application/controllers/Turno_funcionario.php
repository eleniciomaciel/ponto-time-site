<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Turno_funcionario extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('funcoes_helper');
        
    }
    
    /**busca o funcionario com jion no rh da empresa */
    public function get_funcionario_and_rh(int $id)
    {
        $output = array();   
        $data = $this->db->select('*')
                            ->from('tbl_dados_inst_pw_instuicao')
                            ->join('tbl_funcionario', 'tbl_funcionario.fk_emplower_fun = tbl_dados_inst_pw_instuicao.id_inst_pw')
                            ->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw')
                            ->where('fk_emplower_fun', $id)
                            ->get()->result();

        foreach($data as $row)  
        {  
             $output['name_rh'] = $row->nome_user_pw;  
             $output['empr_id'] = $row->id_inst;  
             $output['id_func'] = $row->id_fun;   /** id do funcionario*/ 
        }  
        echo json_encode($output);
    }
    public function busca_funcionario()
    {
        $output = '';
        $query = '';

        if($this->input->post('query'))
        {
        $query = $this->input->post('query');
        }
        $data = $this->get_funcionario($query);
        $output .= '
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome do funcionário</th>
                    <th>Matrícula</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
        ';
        if($data->num_rows() > 0)
        {
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
                <td>'.$row->nome_fun.'</td>
                <td>'.$row->matri_fun.'</td>
                <td>'.$row->cpf_fun.'</td>
                <td>'.$row->tele_fun.'</td>
                <input type="hidden" name="id_do_fun" id="id_do_fun" value="'.$row->id_fun.'">
            </tr>
            ';

        }
        }
        else
        {
        $output .= 
                '<tr>
                    <td colspan="5">Não há dados cadastrados com essas informações digitadas</td>
                </tr>';
        }
        $output .= '	
                    </tbody>
                </table>
            </div>';
        echo $output;
    }
    /**buscando o funcionario */
    public function get_funcionario($query)
    {
        $id = $this->session->userdata('user')->id_inst_pw;
        $this->db->select("*");
        $this->db->from("tbl_funcionario");
        $this->db->where('fk_emplower_fun', $id);
        $this->db->limit(3);
        if($query != '')
        {
         $this->db->like('cpf_fun', $query);
        }
        $this->db->order_by('id_fun', 'DESC');
        return $this->db->get();
       
    }

    public function add_turno_funcionario()
   {
        $this->form_validation->set_rules('id_do_fun', 'funcionário', 'required|is_unique[tbl_turno_funcionario.fk_tbl_funcionario_tf]',
        array('is_unique' => 'Esse %s já foi adicionado ao turno, selecione outro por favor!'));
        $this->form_validation->set_rules('select_turno_fun', 'turno', 'required');

 
        $this->form_validation->set_rules('salario_fun', 'salário', 'required|decimal');
        $this->form_validation->set_rules('fun_data', 'data de admissão', 'callback_data_check');
        $this->form_validation->set_rules('select_cargo', 'cargo', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'fk_tbl_funcionario_tf' => $this->input->post('id_do_fun'),
                'fk_tblusuario_rh_instituicao_tf' =>  $this->input->post('id_rh'),
                'fk_tbl_turno_tf' =>  $this->input->post('select_turno_fun'),
                'fk_tbl_cargo_tf' =>  $this->input->post('select_cargo'),
                'salario_tf' =>  $this->input->post('salario_fun'),
                'fk_tbl_empresa_tf' =>  $this->input->post('id_fun_rh_empresa'),
                'data_admissao' =>  $this->input->post('fun_data'),
        );
        
        $this->db->insert('tbl_turno_funcionario', $data);
        // Produces: INSERT INTO mytable (tit
           echo json_encode(['success'=>'Funcionário adicionado ao turno com sucesso.']);
        }
    }

    /**validação de data */
    public function data_check($str)
    {
            if ($str == date("Y-m-d"))
            {
                $this->form_validation->set_message('data_check', 'Digite uma data de admissão por favor.');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }
    /**get de todos os turnos cadastrados dos turnos dos funcionarios */
    public function get_all_turno_cadastro(int $id)
    {
        $output = array();    
        $data = $this->db->select('id_inst_pw')
                          ->where('id_inst_pw', $id)
                          ->get('tbl_dados_inst_pw_instuicao')->result();  
        foreach($data as $row)  
        {  
            $output['veryfy_id_rh'] = $row->id_inst_pw;    
  
        }  
        echo json_encode($output);  
    }
    /**listado os dados da tabela turnos funcionarios modal 07_funcionario_turno*/
    public function list_tabel_fun_turno()
    {
        $output = '';
        $query = '';
        if($this->input->post('query'))
        {
        $query = $this->input->post('query');
        }
        $data = $this->retorna_turno_cadastro($query);
        $output .= '
        <table class="table table-striped table-condensed table-hover table-media">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Funcionário</th>
                    <th>Turno</th>
                    <th>Salário</th>
                    <th>Admissão</th>
                    <th>Cargo</th>
                    <th>Opções</th>
                </tr>
            </thead>
        <tbody>
        ';
        if($data->num_rows() > 0)
        {
        foreach($data->result() as $row)
        {//'.date("d/m/Y", strtotime($row->data_admissao)).'
            $output .= '

            <tr>
                    <td>'.$row->id_fun.'</td>
                    <td class="thumbnail"><img alt="John Pixel avatar" src="http://placekitten.com/45/45"></td>
                    <td>'.$row->nome_fun.'</td>
                    <td>
                        <span class="label label-success">'.$row->nome_tn.'</span> 
                    </td>
                    <td>'.reais($row->salario_tf).'</td>
                    <td>'.date("d/m/Y", strtotime($row->data_admissao)).'</td>
                    <td>'.$row->nome_cg.'</td>
                    <td>
						<div class="btn-group">
                            <a href="#" title="Visualizar" class="view_turno_fum_update_" id="'.$row->id_fun.'">
                                <button class="btn btn-default btn-sm"><span class="elusive icon-pencil"></span></button>
                            </a>
													
                        </div>
                    </td>
            </tr>
            ';
        }
        }
        else
        {
        $output .= '<tr>
            <td colspan="5">Não há funcionários cadastrados com o nome digitado</td>
            </tr>';
        }
        $output .= '
                    </tbody>
                </table>';
        echo $output;
    }
    /**retorna os valores do banco */
    public function retorna_turno_cadastro($query)
    {
        $sess_user = $this->session->userdata('user')->id_inst_pw;
        $this->db->select('*');
        $this->db->from('tbl_turno_funcionario');
        $this->db->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf');
        $this->db->join('tbl_turno', 'tbl_turno.id_tn = tbl_turno_funcionario.fk_tbl_turno_tf');
        $this->db->join('tbl_cargos', 'tbl_cargos.id_cg = tbl_turno_funcionario.fk_tbl_cargo_tf');
        $this->db->join('tbl_dados_inst_pw_instuicao', 'tbl_dados_inst_pw_instuicao.id_inst_pw = tbl_turno_funcionario.fk_tblusuario_rh_instituicao_tf');
        $this->db->where('fk_tblusuario_rh_instituicao_tf', $sess_user);

        if($query != '')
        {
         $this->db->like('nome_fun', $query);
        }
        //$this->db->order_by('CustomerID', 'DESC');
        
        return $this->db->get();
      
    }

    /**Visualiza os dados do funcionário no moddal 07_funcionario_turno linha 380*/
    public function lista_une_turno_500(int $id = null)
    {
        $output = array();  
           $data = $this->db->select('*')
                            ->from('tbl_turno_funcionario')
                            ->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf')
                            ->join('tbl_cargos', 'tbl_cargos.id_cg = tbl_turno_funcionario.fk_tbl_cargo_tf')
                            ->join('tbl_turno', 'tbl_turno.id_tn = tbl_turno_funcionario.fk_tbl_turno_tf')
                            ->where('fk_tbl_funcionario_tf', $id)
                            ->get()->result();

           foreach($data as $row)  
           {  
                $output['name_500_fun'] = $row->nome_fun;  
                $output['matr_500_fun'] = $row->matri_fun;  

                $output['sal_500_fun'] = reais($row->salario_tf);  
                $output['add_500_fun'] = date("d/m/Y", strtotime($row->data_admissao));  

                $output['justifica_500_fun'] = $row->justifica_tf; 
                $output['id_tbl_500_fun'] = $row->id_tf;  
                
                /**Dados do cargo */
                $output['nome_tbl_500_fun'] = $row->id_cg;
                /**Dados do turno */
                $output['turno_tbl_500_fun'] = $row->id_tn;
           }  
           echo json_encode($output);  
    }

    /**altera dados do funcionário do turno */
    public function update_500_turno_fun(int $id = null)
    {
        $this->form_validation->set_rules('turno_500_option', 'turno', 'required');
        $this->form_validation->set_rules('500_add', 'data de admissão', 'required');

        $this->form_validation->set_rules('500_sal', 'salário', 'required|decimal',
            array('decimal' => 'O campo %s deve conter o seguinte formato Ex.: 1520.00'));
        $this->form_validation->set_rules('cargo_500__option', 'cargo', 'required');
        $this->form_validation->set_rules('500_justifica', 'justificativa', 'required|max_length[999]');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data_add = dataBr_to_dataMYSQL($this->input->post('500_add', TRUE));

            $data = array(
                'fk_tbl_turno_tf' =>  $this->input->post('turno_500_option', TRUE),
                'data_admissao' =>    $data_add,
                'salario_tf' =>   $this->input->post('500_sal', TRUE),
                'fk_tbl_cargo_tf' =>   $this->input->post('cargo_500__option', TRUE),
                'justifica_tf' =>   $this->input->post('500_justifica', TRUE)
        );

            $this->db->update('tbl_turno_funcionario', $data, array('id_tf' => $id));
           echo json_encode(['success'=>'Cadastro alterado com sucesso!']);
        }
    }

}

/* End of file Turno_funcionario.php */
