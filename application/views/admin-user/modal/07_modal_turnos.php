<!-- Adicionando o modal turnos cadastrados -->

<div class="modal fade bd-add_turnos_employer-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- .//inicio form -->
      <form class="form-horizontal" id="add_form_horas" role="form">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="name_turno">Nome do turno:</label>
                <div class="col-sm-9">
                    <input type="text" name="name_turno" id="name_turno" class="form-control"  placeholder="Ex.: Turno comércial">
                    <p class="help-block">Ex.: Turno comércial, 1º turno, 2º turno, 3º turno.</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="horas_tot_mes_turno">Horas mês:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="horas_tot_mes_turno" id="horas_tot_mes_turno" placeholder="Ex.: Turno comércial">
                    <p class="help-block">Ex.: Total de horas mês trabalhda. Ex: 40(horas semanais) * 5(semas do mês) = 125 horas</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="qualityControl">Dias de trabalho:</label>
                
                <div class="col-sm-10">

                    <label class="checkbox-inline">
                        <div>
                        <input type="checkbox" name="dia_sema_01" id="dia_sema_01" value="Seg" checked="checked"><a href="#"></a>                        
                        <label for="undefined">Segunda</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div >                        
                        <input type="checkbox" name="dia_sema_02" id="dia_sema_02"  value="Ter" checked="checked"><a href="#"></a>                      
                        <label for="undefined">Terça</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="dia_sema_03" type="checkbox" value="Qua" checked="checked"><a href="#"></a>                       
                        <label for="undefined">Quarta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="dia_sema_04" type="checkbox" value="Qui" checked="checked"><a href="#"></a>                       
                        <label for="undefined">Quinta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="dia_sema_05" type="checkbox" value="Sex" checked="checked"><a href="#"></a>                       
                        <label for="undefined">Sexta</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="dia_sema_06" id="dia_sema_hid" type="checkbox"  checked="checked" value="Sab">
                        <a href="#"></a>                       
                        <label for="undefined">Sábado</label></div>
                    </label>

                    <label class="checkbox-inline">
                        <div>                       
                        <input name="dia_sema_07" type="checkbox" value="Dom"><a href="#"></a>                       
                        <label for="undefined">Domingo</label></div>
                    </label>

                </div>

            </div>

            <div class="form-row">

                <div class="col-sm-3">
                <label for="">Entrada:</label>
                    <input type="time" name="horas_entrada" class="form-control" placeholder="Ex.: 8:00">
                </div>
                

                <div class="col-sm-3">
                <label for="">Saída intervalo:</label>
                    <input type="time" name="horas_saida_int" class="form-control" placeholder="Ex.: 12:00">
                </div>

                <div class="col-sm-3">
                <label for="">Entrada pos intervalo:</label>
                    <input type="time" name="horas_retorno_int" class="form-control" placeholder="Ex.: 13:30">
                </div>

                <div class="col-sm-3">
                <label for="">Sáida:</label>
                    <input type="time" name="horas_saida" class="form-control" placeholder="Ex.: 18:00">
                </div>

            </div>
            <!-- .//&&&&&&&&&&&&&&&&&&&&&&&&&&&&  finais de semana &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&-->
            <br><br><br><br>
            <div class="form-row" id="mais_turn">
                <h4>Turno final de semana</h4>
                <div class="col-sm-3">
                <label for="">Entrada:</label>
                    <input type="time" name="fin_horas_entrada" class="form-control" placeholder="Ex.: 8:00">
                </div>


                <div class="col-sm-3">
                <label for="">Saída intervalo:</label>
                    <input type="time" name="fin_horas_saida_int" class="form-control" placeholder="Ex.: 12:00">
                </div>
            <!--
                <div class="col-sm-3">
                <label for="">Entrada pos intervalo:</label>
                    <input type="time" name="fin_horas_retorno_int" class="form-control" placeholder="Ex.: 13:30">
                </div>

                <div class="col-sm-3">
                <label for="">Sáida:</label>
                    <input type="time" name="fin_horas_saida" class="form-control" placeholder="Ex.: 18:00">
                </div>
            -->
            </div>
            <br><br><br><br>    
                <div class="col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <span class="elusive icon-ok"></span> Salvar
                </button>

                 <button type="reset" class="btn btn-warning">
                    <span class="elusive icon-refresh"></span> Novo
                </button>

                </div>

            <br><br><br>
            <div class="alert alert-danger print-error-msg_addTurno" style="display:none"></div>
        </form>
        <br><br><br>
        <!-- Dados lista -->
<div class="table-responsive">
    <table class="table table-hover">
    <div id="view_lista_turno"></div>
</div>
<!-- fim lista -->
<!-- .//fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <span class="elusive icon-remove"></span>  Fechar
        </button>
      </div>
    </div>
  </div>
</div>



<!-- ver dados do turno -->

<div class="modal fade" id="modalVIEW_turno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Dados do turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="dd_name">Nome do turno</label>
                <input type="text" class="form-control" name="dd_name" id="dd_name" disabled>
                </div>
                <div class="form-group col-md-6">
                <label for="dd_horas">Horas mês</label>
                <input type="text" class="form-control" id="dd_horas" id="dd_horas" disabled>
                </div>
            </div>

 

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="inputCity">Entrada</label>
                    <input type="time" class="form-control" name="horas_entr_1" id="horas_entr_1" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputCity">Intervalo Saída</label>
                    <input type="time" class="form-control" name="horas_sair_2" id="horas_sair_2" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputCity">Intervalo Entrada</label>
                    <input type="time" class="form-control" name="horas_entr_3" id="horas_entr_3" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputCity">Saída</label>
                    <input type="time" class="form-control" name="horas_sair_4" id="horas_sair_4" disabled>
                </div>


            </div>

            <div class="form-group">

                <label for="qualityControl" class="col-sm-2 control-label">Dias</label>
                    <div class="col-sm-10">
                    <label class="checkbox-inline ">
                        <div class="clearfix">
                        <input type="checkbox" name="opcao_Day_01" id="opcao_Day_01" value="Seg" disabled>
                        <a href="#" class=""></a>
                    <label for="undefined">Seg</label>
                     </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="opcao_Day_02" id="opcao_Day_02" value="Ter" disabled>
                            <a href="#" class=""></a>
                            <label for="undefined">Ter</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                        <input type="checkbox"  name="opcao_Day_03" id="opcao_Day_03" value="Qua" disabled>
                        <a href="#" class=""></a>
                        <label for="undefined">Qua</label>
                    </div>
                    </label>
                    
                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="opcao_Day_04" value="Qui" disabled>
                            <a href="#" class=""></a>
                            <label for="undefined">Qui</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="opcao_Day_05" value="Sex" disabled>
                            <a href="#" class=""></a>
                            <label for="undefined">Sex</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="opcao_Day_06" value="Sab" disabled>
                            <a href="#" class=""></a>
                            <label for="undefined">Sáb</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="opcao_Day_07" value="Dom" disabled>
                            <a href="#" class=""></a>
                            <label for="undefined">Dom</label>
                        </div>
                    </label>


                </div>
            </div>
                                        
            <button type="button" class="btn btn-primary" disabled>Salvar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <span class="elusive icon-remove"></span>  Fechar
        </button>
      </div>
    </div>
  </div>
</div>


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@   ver dados do turno para serem alterados @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<div class="modal fade" id="update_my_turno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alterar turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="update_turno_my">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="up_name">Nome do turno</label>
                <input type="text" class="form-control" name="up_name" id="up_name">
                </div>
                <div class="form-group col-md-6">
                <label for="up_horas">Horas mês</label>
                <input type="text" class="form-control" name="up_horas" id="up_horas">
                </div>
            </div>

 

            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="up_horas_entr_1">Entrada</label>
                    <input type="time" class="form-control" name="up_horas_entr_1" id="up_horas_entr_1">
                </div>

                <div class="form-group col-md-3">
                    <label for="up_horas_sair_2">Intervalo Saída</label>
                    <input type="time" class="form-control" name="up_horas_sair_2" id="up_horas_sair_2">
                </div>

                <div class="form-group col-md-3">
                    <label for="up_horas_entr_3">Intervalo Entrada</label>
                    <input type="time" class="form-control" name="up_horas_entr_3" id="up_horas_entr_3">
                </div>

                <div class="form-group col-md-3">
                    <label for="up_horas_sair_4">Saída</label>
                    <input type="time" class="form-control" name="up_horas_sair_4" id="up_horas_sair_4">
                </div>


            </div>

            <div class="form-group">

                <label for="qualityControl" class="col-sm-2 control-label">Dias</label>
                    <div class="col-sm-10">
                    <label class="checkbox-inline ">
                        <div class="clearfix">
                        <input type="checkbox" name="up_opcao_Day_01" id="up_opcao_Day_01" value="Seg">
                        <a href="#" class=""></a>
                    <label for="undefined">Seg</label>
                     </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="up_opcao_Day_02" id="up_opcao_Day_02" value="Ter">
                            <a href="#" class=""></a>
                            <label for="undefined">Ter</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                        <input type="checkbox"  name="up_opcao_Day_03" id="up_opcao_Day_03" value="Qua">
                        <a href="#" class=""></a>
                        <label for="undefined">Qua</label>
                    </div>
                    </label>
                    
                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="up_opcao_Day_04" value="Qui">
                            <a href="#" class=""></a>
                            <label for="undefined">Qui</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="up_opcao_Day_05" value="Sex">
                            <a href="#" class=""></a>
                            <label for="undefined">Sex</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="up_opcao_Day_06" value="Sab">
                            <a href="#" class=""></a>
                            <label for="undefined">Sáb</label>
                        </div>
                    </label>

                    <label class="checkbox-inline ">
                        <div class="clearfix">
                            <input type="checkbox" name="up_opcao_Day_07" value="Dom">
                            <a href="#" class=""></a>
                            <label for="undefined">Dom</label>
                        </div>
                    </label>


                </div>
            </div>

            <input type="hidden" name="up_turno_id" id="up_turno_id">

            <button type="submit" class="btn btn-primary">
             <span class="elusive icon-refresh"></span> Alterar
            </button>
        </form>
        <br><br>
        <div class="alert alert-danger print-error-msg_upTurno" style="display:none"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <span class="elusive icon-remove"></span>  Fechar
        </button>
      </div>
    </div>
  </div>
</div>




<script>
/**Cadastrados dos turnos */
$(document).on('submit', '#add_form_horas', function(event){  
    event.preventDefault(); 
    var str = $("form").serialize();

    $.ajax({
        url:"<?php echo base_url() . 'turno/add_turno'?>",
        type:'POST',
        dataType: "json",
        data: str,
        success: function(data) {
            if($.isEmptyObject(data.error)){
                $(".print-error-msg_addTurno").css('display','none');
                swal("Muito bem!", data.success, "success");
                //$('#add_form_horas')[0].reset();
            }else{
                $(".print-error-msg_addTurno").css('display','block');
                $(".print-error-msg_addTurno").html(data.error);
            }
        }
    });

}); 
/**Visualiza os dados cadastrados */
$(document).on('click', '.ver_my_turnoCAD', function(){  
	var user_id = $(this).attr("id");  
	$.ajax({  
			url:"<?php echo base_url(); ?>turno/get_dados_turno/" + user_id,  
			method:"GET",  
			data:{user_id:user_id},  
			dataType:"json",  
			success:function(data)  
			{  
                $('#modalVIEW_turno').modal('show');  
                $('#dd_name').val(data.turn_nome);  
                $('#dd_horas').val(data.turn_hora);
                $('#dis_seg').val(data.turn_tn_1); 

                $('#horas_entr_1').val(data.turn_tn_1_sai);  
                $('#horas_sair_2').val(data.turn_tn_2_ent);
                $('#horas_entr_3').val(data.turn_tn_3_ent);
                $('#horas_sair_4').val(data.turn_tn_4_sai);

                let dia_01 = data['turn_tn_1'];
                $("input[name=opcao_Day_01][value="+dia_01+"]").attr('checked', 'checked');

                let dia_02 = data['turn_tn_2'];
                $("input[name=opcao_Day_02][value="+dia_02+"]").attr('checked', 'checked');

                let dia_03 = data['turn_tn_3'];
                $("input[name=opcao_Day_03][value="+dia_03+"]").attr('checked', 'checked');

                let dia_04 = data['turn_tn_4'];
                $("input[name=opcao_Day_04][value="+dia_04+"]").attr('checked', 'checked');

                let dia_05 = data['turn_tn_5'];
                $("input[name=opcao_Day_05][value="+dia_05+"]").attr('checked', 'checked');

                let dia_06 = data['turn_tn_6'];
                $("input[name=opcao_Day_06][value="+dia_06+"]").attr('checked', 'checked');

                let dia_07 = data['turn_tn_7'];
                $("input[name=opcao_Day_07][value="+dia_07+"]").attr('checked', 'checked'); 

			}  
	})  
}); 

/** 77777777777777777777777777777  Altera os dados do turno 7777777777777777777777777777777777777777777777777777777*/
$(document).on('click', '.update_data_turnoVIEW', function(){  
	var user_id = $(this).attr("id");  
	$.ajax({  
			url:"<?php echo base_url(); ?>turno/get_dados_turno/" + user_id,  
			method:"GET",  
			data:{user_id:user_id},  
			dataType:"json",  
			success:function(data)  
			{  
                $('#update_my_turno').modal('show');  
                $('#up_name').val(data.turn_nome);  
                $('#up_horas').val(data.turn_hora);
                $('#up_turno_id').val(user_id);  

                $('#up_horas_entr_1').val(data.turn_tn_1_sai);  
                $('#up_horas_sair_2').val(data.turn_tn_2_ent);
                $('#up_horas_entr_3').val(data.turn_tn_3_ent);
                $('#up_horas_sair_4').val(data.turn_tn_4_sai);

                let dia_up_01 = data['turn_tn_1'];
                $("input[name=up_opcao_Day_01][value="+dia_up_01+"]").attr('checked', 'checked');

                let dia_up_02 = data['turn_tn_2'];
                $("input[name=up_opcao_Day_02][value="+dia_up_02+"]").attr('checked', 'checked');

                let dia_up_03 = data['turn_tn_3'];
                $("input[name=up_opcao_Day_03][value="+dia_up_03+"]").attr('checked', 'checked');

                let dia_up_04 = data['turn_tn_4'];
                $("input[name=up_opcao_Day_04][value="+dia_up_04+"]").attr('checked', 'checked');

                let dia_up_05 = data['turn_tn_5'];
                $("input[name=up_opcao_Day_05][value="+dia_up_05+"]").attr('checked', 'checked');

                let dia_up_06 = data['turn_tn_6'];
                $("input[name=up_opcao_Day_06][value="+dia_up_06+"]").attr('checked', 'checked');

                let dia_up_07 = data['turn_tn_7'];
                $("input[name=up_opcao_Day_07][value="+dia_up_07+"]").attr('checked', 'checked'); 

			}  
	})  
}); 

/** envia as alterações ao controlador para serem validados */
$(document).on('submit', '#update_turno_my', function(event){  
    event.preventDefault(); 
    var str = $("form").serialize();
    let id = $("input[name='up_turno_id']").val();

    swal({
    title: "Deseja alterar?",
    text: "Essa ação será de forma permanente ao você confirmar!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {

            $.ajax({
            url:"<?php echo base_url() . 'turno/altera_data_turno/'?>" + id,
            type:'POST',
            dataType: "json",
            data: str,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg_upTurno").css('display','none');
                    swal( data.success, {
                        icon: "success",
                        });
                    //$('#add_form_horas')[0].reset();
                }else{
                    $(".print-error-msg_upTurno").css('display','block');
                    $(".print-error-msg_upTurno").html(data.error);
                }
            }
        });
        
    } else {
        swal("Você desistiu de alterar!");
    }
    });
}); 

/**Deletando o turno */
$(document).on('click', '.delete_data_turno', function(){  
    let user_id = $(this).attr("id");

    swal({
    title: "Deseja deletar?",
    text: "Essa ação será de forma permanente ao você confirmar!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {

            $.ajax({  
                url:"<?php echo base_url(); ?>turno/delete_one_categoria/" + user_id,  
                method:"POST",  
                data:{user_id:user_id},  
                success:function(data)  
                { 
                    swal(data, {
                        icon: "success",
                    }); 
                    $('.bd-add_turnos_employer-modal-lg').modal('hide');  
                }  
            }); 

        } else {
            swal("Você desistiu de deletar!");
        }
    }); 
});

</script>

<script>
    $("#dia_sema_hid").click(function(){
        $("#mais_turn").toggle();
    });
</script>

