<!-- Button trigger modal -->

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
        <a href="#" class="viewCatColabore_003 btn btn-danger btn-lg btn-block" data-toggle="modal" data-target=".bd-add_cargo-modal-lg">
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


  <!--%%%%%%%%%%%%%%%%%%%%%%%% VER TURNOS CADASTRADADOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

<div class="modal fade bd-eye_turnos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- formularia ver turno -->
       <form method="post" class="form-horizontal" id="demoValidation" role="form" novalidate="">

<div class="form-group">
    <label class="col-sm-2 control-label" for="inputName">Nome do turno:</label>
    <div class="col-sm-9">
        <input name="text" class="form-control" id="inputName" required="" type="text" placeholder="Ex.: Turno comércial">
        <p class="help-block">Ex.: Turno comércial, 1º turno, 2º turno, 3º turno.</p>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="inputName">Horas mês:</label>
    <div class="col-sm-9">
        <input name="number" class="form-control" id="inputName" required="" type="text" placeholder="Ex.: Turno comércial">
        <p class="help-block">Ex.: Total de horas mês trabalhda. Ex: 40(horas semanais) * 5(semas do mês) = 125 horas</p>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="qualityControl">Dias de trabalho:</label>
    
    <div class="col-sm-10">

        <label class="checkbox-inline">
            <div>
            <input name="teste" type="checkbox" value="Seg"><a href="#"></a>                        
            <label for="undefined">Segunda</label></div>
        </label>

        <label class="checkbox-inline">
            <div >                        
            <input name="teste" type="checkbox" value="Ter"><a href="#"></a>                      
            <label for="undefined">Terça</label></div>
        </label>

        <label class="checkbox-inline">
            <div>                       
            <input name="teste" type="checkbox" value="Qua"><a href="#"></a>                       
            <label for="undefined">Quarta</label></div>
        </label>

        <label class="checkbox-inline">
            <div>                       
            <input name="teste" type="checkbox" value="Qui"><a href="#"></a>                       
            <label for="undefined">Quinta</label></div>
        </label>

        <label class="checkbox-inline">
            <div>                       
            <input name="teste" type="checkbox" value="Sex"><a href="#"></a>                       
            <label for="undefined">Sexta</label></div>
        </label>

        <label class="checkbox-inline">
            <div>                       
            <input name="teste" type="checkbox" value="Sab"><a href="#"></a>                       
            <label for="undefined">Sábado</label></div>
        </label>

        <label class="checkbox-inline">
            <div>                       
            <input name="teste" type="checkbox" value="Dom"><a href="#"></a>                       
            <label for="undefined">Domingo</label></div>
        </label>

    </div>

</div>

<div class="form-row">

    <div class="col-sm-3">
    <label for="">Entrada:</label>
        <input type="time" class="form-control" placeholder="Ex.: 8:00">
    </div>
    

    <div class="col-sm-3">
    <label for="">Saída intervalo:</label>
        <input type="time" class="form-control" placeholder="Ex.: 12:00">
    </div>

    <div class="col-sm-3">
    <label for="">Entrada pos intervalo:</label>
        <input type="time" class="form-control" placeholder="Ex.: 13:30">
    </div>

    <div class="col-sm-3">
    <label for="">Sáida:</label>
        <input type="time" class="form-control" placeholder="Ex.: 18:00">
    </div>

</div>

<br><br><br><br>       
    <div class="col-lg-10">
    <button type="submit" class="btn btn-primary">
        <span class="elusive icon-ok"></span> Salvar
    </button>
    </div>


</form>
       <!-- formularia ver turno -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>

<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% VER TURNOS PAINEL PARA ALTERAÇÃO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

<div class="modal fade bd-edit_turnos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- formularia edita turno -->
        <form method="post" class="form-horizontal" id="demoValidation" role="form" novalidate="">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="inputName">Nome do turno:</label>
                <div class="col-sm-9">
                    <input name="text" class="form-control" id="inputName" required="" type="text" placeholder="Ex.: Turno comércial">
                    <p class="help-block">Ex.: Turno comércial, 1º turno, 2º turno, 3º turno.</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="inputName">Horas mês:</label>
                <div class="col-sm-9">
                    <input name="number" class="form-control" id="inputName" required="" type="text" placeholder="Ex.: Turno comércial">
                    <p class="help-block">Ex.: Total de horas mês trabalhda. Ex: 40(horas semanais) * 5(semas do mês) = 125 horas</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="qualityControl">Dias de trabalho:</label>
                
                <div class="col-sm-10">

                    <label class="checkbox-inline">
                        <div>
                        <input name="teste" type="checkbox" value="Seg"><a href="#"></a>                        
                        <label for="undefined">Segunda</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div >                        
                        <input name="teste" type="checkbox" value="Ter"><a href="#"></a>                      
                        <label for="undefined">Terça</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="teste" type="checkbox" value="Qua"><a href="#"></a>                       
                        <label for="undefined">Quarta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="teste" type="checkbox" value="Qui"><a href="#"></a>                       
                        <label for="undefined">Quinta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="teste" type="checkbox" value="Sex"><a href="#"></a>                       
                        <label for="undefined">Sexta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="teste" type="checkbox" value="Sab"><a href="#"></a>                       
                        <label for="undefined">Sábado</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="teste" type="checkbox" value="Dom"><a href="#"></a>                       
                        <label for="undefined">Domingo</label></div>
                    </label>

                </div>

            </div>

            <div class="form-row">

                <div class="col-sm-3">
                <label for="">Entrada:</label>
                    <input type="time" class="form-control" placeholder="Ex.: 8:00">
                </div>
                

                <div class="col-sm-3">
                <label for="">Saída intervalo:</label>
                    <input type="time" class="form-control" placeholder="Ex.: 12:00">
                </div>

                <div class="col-sm-3">
                <label for="">Entrada pos intervalo:</label>
                    <input type="time" class="form-control" placeholder="Ex.: 13:30">
                </div>

                <div class="col-sm-3">
                <label for="">Sáida:</label>
                    <input type="time" class="form-control" placeholder="Ex.: 18:00">
                </div>

            </div>

            <br><br><br><br>       
                <div class="col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <span class="elusive icon-ok"></span> Salvar
                </button>
                </div>


        </form>
        <!-- formularia edita turno -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>

<script>
/**Retorna os cargos cadastrados */
$('.view_list_turno').click(function() {
	let id = $(this).attr("id");  
	$.ajax({
		url:"<?php echo base_url();?>turno/get_all_one_user/" + id,
		type:"GET",
		dataType:'json',
		success:function(data){
				$('#view_lista_turno').html(data);
				//$('.bd-add_turnos-modal-lg').modal('show');
		}
	});
});


</script>
