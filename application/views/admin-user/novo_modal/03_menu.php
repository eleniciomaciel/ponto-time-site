<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu de ação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <a href="#" class="view_add_fun_com_empresa btn btn-info btn-lg btn-block" id="<?php echo $this->session->userdata('user')->id_inst_pw?>">
            Adicionar Funcionário
        </a>

        <a href="#" class="view_list_turno btn btn-inverse btn-lg btn-block" id="<?php echo $this->session->userdata('user')->id_inst_pw?>" data-toggle="modal" data-target=".bd-add_turnos_employer-modal-lg">
            Turnos
        </a>

        <a href="#" class="view_contabil btn btn-success btn-lg btn-block" id="<?php echo $this->session->userdata('user')->id_inst_pw?>">
            Contabilidade
        </a>
        <a href="#" class="view__turno_func btn btn-warning btn-lg btn-block" id="<?php echo $this->session->userdata('user')->id_inst_pw?>">
            Cadastro do funcionário ao turno
        </a>
        <a href="#" class="viewCatColabore_003 btn btn-danger btn-lg btn-block" id="<?php echo $this->session->userdata('user')->id_inst_pw?>" data-toggle="modal" data-target=".bd-add_cargo-modal-lg">
            Cadastrar cargos
        </a>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span> Fechar
        </button>
      </div>
    </div>
  </div>
</div>