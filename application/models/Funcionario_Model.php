<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funcionario_Model extends CI_Model
{
    public function autenticar($usuario, $senha)
    {
        //Retorna o Funcionario filtrando pelo Usuario
        $funcionario = $this->getFuncionarioPorUsuario($usuario);
        //se não retornar o funcionario, retorna falso
        if (!$funcionario) {
            return false;
        }
        //Chama lib de encryption
        $this->load->library('encryption');
        
        //pega senha criptografada do banco
        $senhaDB = $this->encryption->decrypt($funcionario['pw_fun']);
        return ($senha == $senhaDB);
    }
  /**
   * Retorna o funcionario filtrando pelo Usuario/Login
   */
    public function getFuncionarioPorUsuario($usuario)
    {
         $this->db->where('matri_fun', $usuario);
         $this->db->where('status_fun', '1');
         
         $this->db->limit(1);
         return $this->db->get('tbl_funcionario')->result();
    }
}
