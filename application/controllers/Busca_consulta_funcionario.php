<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Busca_consulta_funcionario extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    
    public function consulta_acesso($page = 'busca_pdf_funcionario_um')
    {
        if ( ! file_exists(APPPATH.'views/admin-user/'.$page.'.php'))
        {
            show_404();
        }
        
        $this->output->enable_profiler(TRUE);

        $id = $this->input->post('option_id_fun');
        
        $data['news'] = $this->news_model->get_funcionarios($id);
        $data['list_hours'] = $this->news_model->get_hours($id);
        $data['soma_hors'] = $this->news_model->get_calcula_horas($id);
   
        $data['registro'] = 'Registro-do-funcionario';
        $this->load->view('admin-user/'.$page, $data);
    }

    public function consulta_geral($page = 'consulta_geral_por_periodo_pdf')
    {
        if ( ! file_exists(APPPATH.'views/admin-user/'.$page.'.php'))
        {
            show_404();
        }
        $id = $this->input->post('dados_user_bg', TRUE);//id do rh
        $data['gg'] = $this->news_model->get_all_funcionarios($id);
        $data['lfunc'] = $this->news_model->listaFuncionariosDaInstituicao($id);
        //$data['soma_hors'] = $this->news_model->get_calcula_horas($id);
   
        $data['registro'] = 'Consulta por período';
        $this->load->view('admin-user/'.$page, $data);
    }

}

/* End of file Controllername.php */
