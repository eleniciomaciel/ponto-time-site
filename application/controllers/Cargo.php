<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dados_model');
        
    }
    
    public function add_cargo()
    {
        $this->form_validation->set_rules('add_nome_cat', 'nome da categoria', 'required|max_length[60]');
        $this->form_validation->set_rules('id_user', 'Last Name', 'required');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'nome_cg'           => $this->input->post('add_nome_cat'),
                'fk_employer_cg'    => $this->input->post('id_user')
            );
            $this->db->insert('tbl_cargos', $data);
           echo json_encode(['success'=>'Categoria adicionada com sucesso.']);
        }
    }

    /**Seleciona dados cadastrados */
    public function getDados(int $id)
    {
        $all = '';
        $data = $this->db->select('*')
                        ->order_by('id_cg', 'DESC')
                        ->where('fk_employer_cg', $id)
                        ->get('tbl_cargos')->result();

    	if (count($data)>0) {
            $all .= '<table class="table table-hover">';
                $all .= '<thead>';
                    $all .= '<tr>';
                        $all .= '<th width="100">Código</th>';
                        $all .= '<th>Nome do cargo</th>';
                        $all .= '<th width="90">Ações</th>';
                    $all .= '</tr>';
                $all .= '</thead>';
            $all .= '<tbody>';
            foreach ($data as $value) {
                $all .= '<tr>';
                    $all .= '<td>'.$value->id_cg.'</td>';
                    $all .= '<td class="text-center">'.$value->nome_cg.'</td>';
                    $all .= '<td>';
                        $all .= '	
                        <div class="btn-group">
                            <a href="#" class="view_nameUP btn btn-primary btn-sm" title="Alterar" id="'.$value->id_cg.'" data-toggle="modal" data-target="#alteraModalCategoria">
                                <span class="elusive icon-refresh"></span>
                            </a>
                            <a href="#" class="del_car btn btn-primary btn-sm" id="'.$value->id_cg.'" title="Deletar">
                                <span class="elusive icon-trash"></span>
                            </a>
                        </div>';
                    $all .= '</td>';
                $all .= '</tr>';
            }//fim do foreach
            $all .= '</tbody>';
            $all .= '</table>';
            echo json_encode($all);
        }
        //fim do for
    }
    /**Seleciona o nome do cargo quando clicado */
    public function view_name_cargo(int $id)
    {
        $output = array();   
           $data = $this->db->select('*')
                            ->where('id_cg', $id)
                            ->get('tbl_cargos')->result();

           foreach($data as $row)  
           {  
                $output['cg_nome_cg'] = $row->nome_cg;  
                $output['cg_id'] = $row->id_cg;    
           }  
           echo json_encode($output); 
    }

    /**Altera nome do cargo */
    public function update_nome_caargo(int $id)
    {
        $data = array(  
        'nome_cg'   =>     $this->input->post('new_up_cargo01'),  
       );  
       $this->db->update('tbl_cargos', $data, array('id_cg' => $id)); 
       echo 'Nome do cargo alterado com sucesso'; 
    }

    /**Deletar o cargo */
    public function delete_cargo(int $id)
    {
        $this->db->delete('tbl_cargos', array('id_cg' => $id));
        echo 'Cargo deletado com sucesso';  
    }
}


/* End of file Cargo.php */
