<!-- Modal lista menu dos relatórios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
<div class="modal fade" id="relatoriosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span class="elusive icon-list-alt"></span>&nbsp;Relatórios
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Modal -->
                <a href="#"  class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#pesquisaFuncionarioIndividual">
                    Relatório de presença individual - consulta simples
                </a>

                <br>
                <a href="#" class="btn btn-inverse btn-lg btn-block" data-toggle="modal" data-target="#modalConsulta_simplesPdf">
                    Consulta individual
                </a>

                <br>
                <a href="#" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#consulta_geral_my_funcionarios_101">
                    Relatório geral
                </a>
                
                <br>
                <a href="#" class="btn btn-warning btn-lg btn-block">
                    Relatório de fotos
                </a>  
                <!-- Modal -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span class="elusive icon-remove"></span>&nbsp;Sair</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalConsulta_simplesPdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Consulta individual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //Dados form -->
       <div class="orange data-block">
            <header>
                <h2>Formulário de consulta</h2>
            </header>
            <section>
                

                <!-- Inline form -->
               
                        
                <?php echo form_open('busca_consulta_funcionario/consulta_acesso', array('class'=>'form-inline', 'role'=>'form', 'target'=>'_blank')); ?>
                        <label for="">Selecione um funcionário</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                                <span class="elusive icon-ok"></span>
                            </span>
                            <select class="form-control" name="option_id_fun" required>
                                <option value="" selected="" disabled="">Selecione aqui....</option>
                                <?php
                                
                                $id_rh = $this->session->userdata('user')->id_inst_pw;//apenas funcionário desse rh

                                $this->db->select('*');
                                $this->db->from('tbl_funcionario');
                                $this->db->where('fk_emplower_fun', $id_rh);
                                $query = $this->db->get(); 
                                    foreach ($query->result() as $row)
                                    { 
                                        ?>
                                            <option value="<?php echo $row->id_fun;?>"><?php echo $row->nome_fun;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            
                        </div>
                        <br> 
                        <label for="">Data da consulta</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="elusive icon-calendar"></i></span>
                            <input type="date" name="data_um"  class="datepicker form-control" required>
                        </div>
                        <p class="help-block">Digite uma data para a busca, menor que a data do registro</p>
                        <br> 

                        <label for="">Data do registro</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="elusive icon-calendar"></i></span>
                            <input type="date" name="data_dois" class="datepicker form-control" required>
                        </div>
                        <p class="help-block">Digite uma data para a busca, maior que a data da consulta</p>

                        <button type="submit" class="btn btn-block btn-lg btn-success">
                            <span class="elusive icon-zoom-in"></span>&nbsp;Buscar
                        </button>
                </form>
                <!-- /Inline form -->
            </section>
        </div>
       <!-- //fim dados form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="elusive icon-remove"></span>&nbsp;Sair</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="consulta_geral_my_funcionarios_101" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consultar relatório geral por período</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- //formulário de busca -->
       <?php echo form_open('busca_consulta_funcionario/consulta_geral', array('target'=>'_blank')); ?>
            <label for="">Data da consulta</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="elusive icon-calendar"></i></span>
                <input type="date" name="data_dt_g1" class="datepicker form-control"  required>
            </div>
            <p class="help-block">Digite uma data para a busca, menor que a data do registro</p>
            <br> 

            <label for="">Data do registro</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="elusive icon-calendar"></i></span>
                <input type="date" name="data_dt_g2" class="datepicker form-control" required>
            </div>
            <p class="help-block">Digite uma data para a busca, maior que a data da consulta</p>

            <input type="hidden" name="dados_user_bg" value="<?php echo $this->session->userdata('user')->id_inst_pw;?>">

            <button type="submit" class="btn btn-block btn-lg btn-success">
                <span class="elusive icon-zoom-in"></span>&nbsp;Buscar
            </button>
        </form>
       <!-- //fim do formulário de busca -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="elusive icon-remove"></span>&nbsp;Sair</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get('<?php echo base_url() . 'busca_consulta_funcionario/busca_funcionario_ajax'?>', { query: query }, function (data) {
                console.log(data);
                data = $.parseJSON(data);
                return process(data);
            });
        }
    });
    
</script>
<script>
    var datainicial = document.getElementById('datainicial');
    var datafinal = document.getElementById('datafinal');

    function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0, 1);
        var texto = mascara.substring(i);
        if (texto.substring(0, 1) != saida) {
            documento.value += texto.substring(0, 1);
        }
        verificar();
    }

    function gerarData(str) {
        var partes = str.split("/");
        return new Date(partes[2], partes[1] - 1, partes[0]);
    }

    function verificar() {
        var inicio = datainicial.value;
        var fim = datafinal.value;
        if (inicio.length != 10 || fim.length != 10) return;

        if (gerarData(fim) <= gerarData(inicio)) swal("Ops!", "A data da consulta deve ser menor quea a data do registro!", "error");
    }
</script>