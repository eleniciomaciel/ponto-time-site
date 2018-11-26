<!-- listagen de todos os dados do funcionário para consultar -->
<div class="modal fade" id="modalAllData" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dados do funcionario</h4>
            </div>
            <div class="modal-body">
                <!-- form consulta dados -->
                <form>
                    <div class="form-row">

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputCity">Funcionário</label>
                                <input type="text" class="form-control" name="fun_nome" id="fun_nome">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">CTPS</label>
                                <input type="text" class="form-control" name="fun_ctpsdata" id="fun_ctpsdata">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputZip">CPF</label>
                                <input type="text" class="form-control" name="fun_cpff" id="fun_cpff">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputCity">PIS</label>
                                <input type="text" class="form-control" name="fun_piss" id="fun_piss">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Cargo</label>
                                <input type="text" class="form-control" name="fun_cargo" id="fun_cargo">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputZip">Telefone</label>
                                <input type="text" class="form-control" name="fun_tel" id="fun_tel">
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th colspan="4" id="text_nomeDoTurno"></th>
                                    </tr>
                                    <tr>
                                        <th>Início</th>
                                        <th>Saída do intervalo</th>
                                        <th>Retorno do Intervalo</th>
                                        <th>Saída</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td id="text_hs_access_ent"></td>
                                        <td id="text_hs_access_sai_int"></td>
                                        <td id="text_hs_access_retorn_int"></td>
                                        <td id="text_hs_access_sai"></td>
                                    </tr>
                                    <tr>
                                        <td>Dias</td>
                                        <td colspan="3">
                                            <div class="btn-group">
                                                <button class="btn btn-sm" id="text_dia_dia1"></button>
                                                <button class="btn btn-sm" id="text_dia_dia2"></button>
                                                <button class="btn btn-sm" id="text_dia_dia3"></button>
                                                <button class="btn btn-sm" id="text_dia_dia4"></button>
                                                <button class="btn btn-sm" id="text_dia_dia5"></button>
                                                <button class="btn btn-sm" id="text_dia_dia6"></button>
                                                <button class="btn btn-sm" id="text_dia_dia7"></button>
                                            </div>
                                        </td>
                                        <td>Carga Horária: <span id="text_dia_cgh"></span> hs.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="input-group col-md-12">
                            <span class="input-group-btn">
                                <button class="btn btn-default">Buscar</button>
                            </span>
                            <input type="text" name="search_text_termo_busca" id="search_text_termo_busca" class="form-control" placeholder="Digite o mês e o ano para a busca,  ex.: 11/2018">
                            <input type="hidden" name="funcionario_id" id="funcionario_id">
                        </div>

                     <br>
                        <!-- Data block -->
                        <article class="col-sm-12">
                            <div class="dark data-block">
                                <header>
                                    <h2>Registro indivisual do funcionário - busca simples</h2>
                                </header>
                                <section>

                                    <div id="result_termo_busca"></div>
                                    <div style="clear:both"></div>

                                </section>
                            </div>
                        </article>
                        <!-- 0008 senha Mar123456 -->
                </form> 

                <!-- fim form consulta dados -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="elusive icon-remove"></span>&nbsp;Sair</button>
                </button>
            </div>
        </div>
    </div>
</div>







<script>
    //** busca os dados do funcionário e mostra na lista */
    $(document).on('click', '.dados_relatorio_fun', function () {
        let user_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url(); ?>relatorios/busca_dados_all_one/" + user_id,
            method: "POST",
            data: {user_id: user_id},
            dataType: "json",
            success: function (data)
            {
                $('#modalAllData').modal('show');
                $('#fun_nome').val(data.view_fnc_nome);
                $('#fun_tel').val(data.view_fnc_tel);
                $('#fun_ctpsdata').val(data.view_fnc_ctps);
                $('#fun_piss').val(data.view_fnc_pis);
                $('#fun_cpff').val(data.view_fnc_cpf);
                $('#fun_cargo').val(data.view_fnc_cargo);

                //* Dados do turno*/
                let txt_nome_tur = data['view_turn_nome'];
                $('#text_nomeDoTurno').text(txt_nome_tur);
                
                let text_turn_dia1 = data['view_turn_dia1'];
                $('#text_dia_dia1').text(text_turn_dia1); 
                //* Dias Turno*/
                let text_turn_dia2 = data['view_turn_dia2'];
                $('#text_dia_dia2').text(text_turn_dia2); 

                let text_turn_dia3 = data['view_turn_dia3'];
                $('#text_dia_dia3').text(text_turn_dia3); 

                let text_turn_dia4 = data['view_turn_dia4'];
                $('#text_dia_dia4').text(text_turn_dia4); 

                let text_turn_dia5 = data['view_turn_dia5'];
                $('#text_dia_dia5').text(text_turn_dia5); 

                let text_turn_dia6 = data['view_turn_dia6'];
                $('#text_dia_dia6').text(text_turn_dia6); 

                let text_turn_dia7 = data['view_turn_dia7'];
                $('#text_dia_dia7').text(text_turn_dia7); 

                let text_turn_cgh = data['view_turn_cgh'];
                $('#text_dia_cgh').text(text_turn_cgh); 

                /** horario acessos */
                let text_turn_ent = data['view_turn_entrada'];
                $('#text_hs_access_ent').text(text_turn_ent); 

                let text_turn_sai_int = data['view_turn_saida_int'];
                $('#text_hs_access_sai_int').text(text_turn_sai_int); 

                let text_turn_retorn_int = data['view_turn_retorno_int'];
                $('#text_hs_access_retorn_int').text(text_turn_retorn_int); 

                let text_turn_sai = data['view_turn_saida'];
                $('#text_hs_access_sai').text(text_turn_sai); 

                $('.modal-title').text("Dados do funcionário");
                $('#user_id').val(user_id);
                $('#funcionario_id').val(user_id);
            }
        })
    });

    $('.datatable3').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "sangoma",
        "oLanguage": {
            "sLengthMenu": "_MENU_ registros por página"
        }
    });
</script>
<script>
 load_data_termo_busca();

 function load_data_termo_busca(query)
 {
    var my_fun_00123 = $('#funcionario_id').val(); 
    
    $.ajax({
        url:"<?php echo base_url(); ?>relatorios/buscar_access_employer/" + my_fun_00123,
        method:"POST",
        data:{query:query},
        success:function(data){
            $('#result_termo_busca').html(data);
        }
    })
 }

 $('#search_text_termo_busca').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
    load_data_termo_busca(search);
  }
  else
  {
    load_data_termo_busca();
  }
 });
</script>
