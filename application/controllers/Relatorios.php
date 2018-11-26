<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Relatorios extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    protected $dados_id_fun;

    public function busca_funcionario(int $id)
    {

        $this->dados_id_fun = $id;

        $search_data = $_POST['search_data'];
        $user = $this->input->post('user_adm', TRUE);
        $query = $this->get_live_items($search_data, $id,  $user);
         
        foreach ($query as $row) :
            echo
                "<div class='well'>
                    <a href='#' class='dados_relatorio_fun' id='$row->id_fun' title='Nome do funcionário'>" . $row->nome_fun . "</a>
                </div>";
        endforeach;
    }

    public function get_live_items($search_data, $id,  $user)
    {
 
        //$this->db->group_start();
        //$this->db->like('nome_fun', $search_data);
        //$this->db->or_like('cpf_fun', $search_data);
        //$this->db->group_end();
        //$this->db->limit(15);
        //$this->db->where('fk_emplower_fun', $id);
        //$this->db->order_by("id_fun", 'desc');
       // $sess_user = $this->session->userdata('user')->id_inst_pw;
        $array = array('fk_emplower_fun' => $id, 'fk_tblusuario_rh_instituicao_tf' => $user);
        $query = $this->db->select('*')
                        ->from('tbl_turno_funcionario')
                        ->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf')
                        ->like('nome_fun', $search_data)
                        //->or_like('cpf_fun', $search_data) busca todos os campos
                        ->where($array)
                        //->group_end()
                        //->limit(15)
                        //->order_by("id_fun", 'desc')
                        ->get()->result();
        //print_r($query)
        return $query;
    }

    /**buscando todos os dados do funcionario */
    public function busca_dados_all_one(int $id)
    {
        $output = array();
        $data = $this->db->select('*')
                        ->from('tbl_turno_funcionario')
                        ->join('tbl_funcionario', 'tbl_funcionario.id_fun = tbl_turno_funcionario.fk_tbl_funcionario_tf')
                        ->join('tbl_cargos', 'tbl_cargos.id_cg = tbl_turno_funcionario.fk_tbl_cargo_tf')
                        ->join('tbl_turno', 'tbl_turno.id_tn = tbl_turno_funcionario.fk_tbl_turno_tf')
                        ->where('id_fun', $id)
                        ->get()->result();

        
        foreach ($data as $row) {
            $output['view_fnc_nome'] = $row->nome_fun;
            $output['view_fnc_matri'] = $row->matri_fun;
            $output['view_fnc_ctps'] = $row->ctps_fun;
            $output['view_fnc_pis'] = $row->pis_fun;
            $output['view_fnc_cpf'] = $row->cpf_fun;
            $output['view_fnc_tel'] = $row->tele_fun;
            $output['view_fnc_cargo'] = $row->nome_cg;

            /**Dados do turno*/
            $output['view_turn_nome'] = $row->nome_tn;

            $output['view_turn_dia1'] = $row->dia_tb_tn_01 = ($row->dia_tb_tn_01) ?: "(Seg. Folga)";
            $output['view_turn_dia2'] = $row->dia_tb_tn_02 = ($row->dia_tb_tn_02) ?: "(Ter. Folga)";
            $output['view_turn_dia3'] = $row->dia_tb_tn_03 = ($row->dia_tb_tn_03) ?: "(Qua. Folga)";
            $output['view_turn_dia4'] = $row->dia_tb_tn_04 = ($row->dia_tb_tn_04) ?: "(Qui. Folga)";
            $output['view_turn_dia5'] = $row->dia_tb_tn_05 = ($row->dia_tb_tn_05) ?: "(Sex. Folga)";
            $output['view_turn_dia6'] = $row->dia_tb_tn_06 = ($row->dia_tb_tn_06) ?: "(Sáb. Folga)";
            $output['view_turn_dia7'] = $row->dia_tb_tn_07 = ($row->dia_tb_tn_07) ?: "(Dom. Folga)";

            $output['view_turn_cgh'] = $row->horas_mes_tn;

            /** dias hora acesso*/
            $output['view_turn_entrada']        = $row->hs_entrada_tn;
            $output['view_turn_saida_int']      = $row->hs_saida_int_tn;
            $output['view_turn_retorno_int']    = $row->hs_retorno_int_tn;
            $output['view_turn_saida']          = $row->hs_saida_tn;
        }
        echo json_encode($output);
    }


    /**Visualiza dados do n Tbela dos acessos */
    public function buscar_access_employer($id)
    {
       

        $output = '';
        $query = '';

       
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }
        $data = $this->busca_termo($query,  $id);

        $output .= '
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Intervalo</th>
                            <th>Retorno</th>
                            <th>Saída</th>
                            <th>Horas trab.</th>
                            <th>Horas extr.</th>
                            <th>Obs.</th>
                        </tr>
                    </thead>
                <tbody>
        ';
        if($data->num_rows() > 0)
        {
           
          
         foreach($data->result() as $row)
         {

            //$date1 = new DateTime($row->hora_entrada_n);
            //$date2 = new DateTime($row->hora_intervalo_n);

            //$diff = $date2->diff($date1);

            //$hours = $diff->h;
            //$hours = $hours + ($diff->days/60/60);

            /**Somando entrada e intervalo */
            $bb_f = strtotime($row->hora_entrada_n);//entrada
            $bb_i = strtotime($row->hora_intervalo_n);//intervalo

            $total_um_turno = $bb_i  - $bb_f; // aqui voce já tem o intervalo, agora é tratar !
            $pri_turno_tot = round($total_um_turno/60/60, 2); //ou $teste = $teste/3600

             /**Somando retorno e saida */
             $bb_r = strtotime($row->hora_retorno_n);//retorno
             $bb_s = strtotime($row->hora_saida_n);//saida

             $total_seg_turno = $bb_s  - $bb_r; // aqui voce já tem o intervalo, agora é tratar !
             $seg_turno_total = $total_seg_turno/60/60; //ou $teste = $teste/3600

            $tot  =  $seg_turno_total + $pri_turno_tot;

            if (empty($row->hora_intervalo_n)) {
                $tat = $tot = "0:00";
            } else {
                $tat = round($tot, 2);
            }

            if ( $tat <= 8) {
                $extra = "Sem extra";
            } else {
                $extra = $tat - 8 ." seg.";
            }

            
          $output .= '
                    <tr>
                        <td>'.date("d/m/Y - l", strtotime($row->data_n)).'</td>
                        <td>'.item_data($row->hora_entrada_n).'</td>
                        <td>'.item_data($row->hora_intervalo_n).'</td>
                        <td>'.item_data($row->hora_retorno_n).'</td>
                        <td>'.item_data($row->hora_saida_n).'</td>
                        <td>'.$tat.' min.</td>
                        <td>'.$extra.'</td>
                        <td class="toolbar">
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm " title="Ver observações"><span class="elusive icon-eye-open"></span></button>
                                <button class="btn btn-primary btn-sm" title="Adicionar observação"><span class="elusive icon-plus"></span></button>
                            </div>
                        </td>
                    </tr>
          ';
         }
        }
        else
        {
         $output .= '<tr>
             <td colspan="5">Nenhum arquivo com esse termo de busca digitado.</td>
            </tr>';
        }
        $output .= '
                    </tbody>
                </table>
            </div>';
        echo $output;

        /**
         *  $output .= '
        
         */
    }

  
    public function get_soma($id)
    {
        $sql = "SELECT sum(DATE_FORMAT(hora_rpt,'%H:%i')) as hora_rpt FROM tbl_registra_ponto WHERE fk_employer_rpt = '$id'";
        $result = $this->db->query($sql);
        return $result->row()->hora_rpt;
    }
    /**busca os dados pelo termo digitado */
    public function busca_termo($query,  $id)
    {
        $this->db->select("*");
        $this->db->from("new_registro");
        $this->db->limit(20);
        
        
        $data = implode("-",array_reverse(explode("/",$query)));
        if($data != '')
        {
            $this->db->like('data_n', $data);
        }
        $this->db->where('fk_funcionario_n', $id);
        $this->db->order_by('id_n', 'ASC');
        return $this->db->get();
    }


}

/* End of file Relatorios.php */
