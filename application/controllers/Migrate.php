<?php
class Migrate extends CI_Controller
{

    public function index()
    {
        if ($this->migration->current() === FALSE)
        {
                show_error($this->migration->error_string());
        }else {
            echo 'Migração concluida com sucesso';
            echo "<br>";
            echo "Versão da migração: " .$this->migration->version(5);
        }
    }

}