<!-- ##################################################  Turno do funcinário $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->

<div class="modal fade bd-turno_funcionario-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Turno do funcinário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- *******************  header campo de click para o modal dos cadastros *******************************-->
                <div class="data-block">
                    <header>
                        <h2>Adicionar funcionário ao turno</h2>
                        <ul class="data-header-actions">
                            <li>
                                <a href="#" class="view_turno_funcionario_cadastro" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>" >
                                    <span class="elusive icon-zoom-in"></span>&nbsp;Ver turnos
                                </a>
                            </li>
                        </ul>
                    </header>
                    <section>

                        <!--  -->
                        <form role="form" id="add_turno_fufuci">

                            <!-- Input group with left addon -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-zoom-in"></span> 
                                </span>
                                <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Buscar funcionário aqui...">
                            </div>
                            <p class="help-block">Digite o número do cpf do funcionário para fazer a busca!</p>
                            <!-- /@@@@@@@@@@@@@@@@@@@@@@   apresenta o resultado da busca @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

                            <div id="result"></div>
                            <br>
                            <div style="clear:both"></div>
                            <!-- /@@@@@@@@@@@@@@@@@@@@@@   apresenta o resultado da busca @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
                            <!-- Input group with dropdown -->
                            <label for="">Adicione o turno do funcionário:</label>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-cogs"></span> 
                                </span>
                                <select class="form-control" name="select_turno_fun" id="select_turno_fun" required>
                                    <option value="" selected="" disabled="">Selecione aqui...</option>
                                    <?php
                                    $is = $this->session->userdata('user')->id_inst_pw;
                                    $this->db->select('nome_tn, id_tn');
                                    $this->db->from('tbl_turno');
                                    $this->db->where('fk_user_rh_empresa_tn', $is);
                                    $query = $this->db->get();

                                    foreach ($query->result() as $row) {
                                        ?>
                                        <option value="<?php echo $row->id_tn; ?>"><?php echo $row->nome_tn; ?></option> 
                                        <?php

                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- /Input group with dropdown -->

                            <br>

                            <!-- Input group with both addons -->
                            <label for="">Salário báse:</label>
                            <div class="input-group">
                                <span class="input-group-addon">R$</span>
                                <input type="number" name="salario_fun" id="salario_fun" class="form-control" required>
                                <span class="input-group-addon">.00</span>
                            </div>
                            <!-- /Input group with both addons -->

                            <br>

                            <label for="">Data da admissão:</label>
                            <!-- Masked input -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-calendar"></span> 
                                </span>
                                <input type="date" name="fun_data" id="fun_data" class="form-control" required>
                            </div>
                            <!-- /Masked input -->

                            <br>

                            <label for="">Selecione um cargo:</label>
                            <!-- Masked input -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-wrench"></span> 
                                </span>
                                <select class="form-control" name="select_cargo" id="select_cargo" required>
                                    <option value="" selected="" disabled="">Selecione aqui...</option>
                                    <?php
                                    $cg = $this->session->userdata('user')->id_inst_pw;
                                    $this->db->select('nome_cg,id_cg');
                                    $this->db->from('tbl_cargos');
                                    $this->db->where('fk_employer_cg', $cg);
                                    $cargo = $this->db->get();

                                    foreach ($cargo->result() as $cag) {
                                        ?>
                                        <option value="<?php echo $cag->id_cg; ?>"><?php echo $cag->nome_cg; ?></option> 
                                        <?php

                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- /Masked input -->
                            <input type="hidden" name="id_rh" id="id_rh">
                            <input type="hidden" name="id_fun_rh_empresa" id="id_fun_rh_empresa">
                            <br>
                            <button type="submit" class="btn btn-lg btn-info">
                                <span class="elusive icon-ok"></span>  Salvar
                            </button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msg_fun_tur" style="display:none"></div>
                    </section>
                </div>
                <!-- form cadastro -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span class="elusive icon-remove"></span> Fechar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  Modal visualiza turnos cadastrados   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<div class="modal fade bd-view_fun_turno-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Turno dos funcionários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- tabela funcionarios no turno -->

                <div class="data-block">
                    <header>
                        <h2>Turnos e funcionários</h2>
                        <form class="header-search">
                            <input type="text" name="search_text2" id="search_text2" placeholder="Buscar...">
                        </form>
                    </header>
                    <section>
                        <div id="result2"></div>
                        <div style="clear:both"></div>
                    </section>
                    <footer>
                        <p>
                            <?php
                            $rh = $this->session->userdata('user')->id_inst_pw;
                                //$this->db->like('id_tf', 'match');
                            $this->db->from('tbl_turno_funcionario');
                            $this->db->where('fk_tblusuario_rh_instituicao_tf', $rh);
                            echo 'Você têm ' . $this->db->count_all_results() . ' turnos cadastrados.';
                            ?>
                        </p>
                    </footer>
                </div>

                <!-- tabela funcionarios no turno -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span class="elusive icon-remove"></span> Fechar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->

<div class="modal fade bd-view_list_funcionario_e_turno-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar dados do funcionário no turno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Tabela lista dados do funcionario do registro do ponto -->
       
       
						<div class="gray data-block">
							<header>
								<h2><span class="elusive icon-list-alt"></span> Alterar cadastro do turno</h2>
								
							</header>
							<section class="tab-content">

								<!-- Tab #horizontal -->
								<div class="tab-pane active" id="horizontal">

									<form id="altera_500_funcinario_turno" class="form-horizontal" role="form" method="post">
										
                                        
										<div class="form-group">
											<label class="col-sm-2 control-label">Funcionário: <span class="elusive icon-person"></span></label>
											<div class="col-sm-10">
												<p class="form-control-static" id="text_500_nome1"></p>
											</div>
										</div>

                                        <div class="form-group">
											<label class="col-sm-2 control-label">Matrícula: <span class="elusive icon-wrench"></span></label>
											<div class="col-sm-10">
												<p class="form-control-static" id="text_500_matri2"></p>
											</div>
										</div>


                                        <div class="form-group">
											<label for="select" class="col-sm-2 control-label">Turno: <span class="elusive icon-time"></span></label>
											<div class="col-sm-10">
												<select class="form-control" name="turno_500_option" id="turno_500_option" required>
													<option selected disabled value="">Selecione um novo turno</option>
                                                    <?php 
                                                        $id = $this->session->userdata('user')->id_inst_pw;

                                                        $this->db->select('id_tn, nome_tn, fk_user_rh_empresa_tn');
                                                        $this->db->from('tbl_turno');
                                                        $this->db->where('fk_user_rh_empresa_tn', $id);
                                                        $new_tt = $this->db->get(); 

                                                        foreach ($new_tt->result() as $tur)
                                                        {
                                                            ?>
                                                                <option value="<?php  echo $tur->id_tn; ?>"><?php  echo $tur->nome_tn; ?></option>
                                                            <?php
                                                        }                                                   
                                                    ?>
												</select>
											</div>
										</div>

                                        <div class="form-group">
											<label for="inputEmail1" class="col-sm-2 control-label">Admissão: <span class="elusive icon-calendar"></span></label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="500_add" id="500_add">
												<p class="help-block"><span class="label label-warning"> Digite uma data de admissão Ex.: 10/10/2018.</span></p>
											</div>
										</div>

										<div class="form-group">
											<label for="inputPassword1" class="col-sm-2 control-label">Salário: <span class="elusive icon-briefcase"></span></label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="500_sal" id="500_sal" placeholder="Ex.: 1500.00" required>
                                                <p class="help-block"><span class="label label-warning">O salário deve conter o seguinte formato Ex.: 1250.52</span></p>
											</div>
										</div>



										<div class="form-group">
											<label for="select" class="col-sm-2 control-label">Cargo: <span class="elusive icon-star"></span></label>
											<div class="col-sm-10">
												<select  name="cargo_500__option" id="cargo_500__option" class="form-control" required>
													<option>Selecione um novo cargo</option>
                                                    <?php 
                                                        $id = $this->session->userdata('user')->id_inst_pw;

                                                        $this->db->select('id_cg, nome_cg, fk_employer_cg');
                                                        $this->db->from('tbl_cargos');
                                                        $this->db->where('fk_employer_cg', $id);
                                                        $new_tt = $this->db->get(); 

                                                        foreach ($new_tt->result() as $tur)
                                                        {
                                                            ?>
                                                                <option value="<?php  echo $tur->id_cg; ?>"><?php  echo $tur->nome_cg; ?></option>
                                                            <?php
                                                        }                                                   
                                                    ?>
												</select>
											</div>
										</div>


										<div class="form-group">
											<label for="inputTextarea" class="col-sm-2 control-label">Justificar: <span class="elusive icon-align-left"></span></label>
											<div class="col-sm-10">
												<textarea name="500_justifica" id="500_justifica" class="form-control" rows="3" placeholder="Digite aqui..." required></textarea>
											</div>
										</div>
                                        
                                        <input type="hidden" name="500_id_tbl" id="500_id_tbl">
                                        <input type="hidden" name="500_id_funcionario" id="500_id_funcionario">

										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-lg btn-success">
                                                <span class="elusive icon-refresh"></span>&nbsp;Alterar</button>
											</div>
										</div>
									</form>

                                    <br>
                                    <div class="alert alert-danger print-error-msg_500" style="display:none"></div>

								</div>
								<!-- /Tab #horizontal -->
							</section>
							<footer>
								<p class="text-center">Só serão alterados os conteúdos que foram adicionados novas opções ao clicar em salvar.</p>
							</footer>
						</div>
					
								
       <!-- Tabela lista dados do funcionario do registro do ponto -->
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <span class="elusive icon-remove"></span> Fechar
            </button>
      </div>
    </div>
  </div>
</div>

<script>
/**get funcionario e modal turno do funcionario adiciona */
$(document).on('click', '.view__turno_func', function(){  
    let id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>turno_funcionario/get_funcionario_and_rh/" + id,  
        method:"POST",  
        data:{id:id},  
        dataType:"json",  
        success:function(data)  
        {  
              $('.bd-turno_funcionario-modal-lg').modal('show');  
              $('#my_name_rh').val(data.name_rh);  
              $('#my_id_funcionario').val(data.id_func);
              $('#id_fun_rh_empresa').val(data.empr_id);  
              $('#id_rh').val(id);   
        }  
    })  
}); 

/**adicionando o funcionario ao turno */
$('#add_turno_fufuci').submit(function(e) {
	e.preventDefault();
  var str = $("#add_turno_fufuci").serialize();
    
      $.ajax({
          url:"<?php echo base_url(); ?>turno_funcionario/add_turno_funcionario",  
          type:'POST',
          dataType: "json",
          data: str,
          success: function(data) {
              if($.isEmptyObject(data.error)){
                $(".print-error-msg_fun_tur").css('display','none');
                swal("Parabéns!", data.success, "success");
                $('#add_turno_fufuci')[0].reset();
              }else{
                $(".print-error-msg_fun_tur").css('display','block');
                $(".print-error-msg_fun_tur").html(data.error);
              }
          }
      });
  });
 /** Visualiza o modal funcionários nos tr=urnos cadastrados */
 $(document).on('click', '.view_turno_funcionario_cadastro', function(){  
      let user_id = $(this).attr("id");  
      $.ajax({  
          url:"<?php echo base_url(); ?>turno_funcionario/get_all_turno_cadastro/" + user_id,  
          method:"POST",  
          data:{user_id:user_id},  
          dataType:"json",  
          success:function(data)  
          {  
                $('.bd-view_fun_turno-modal-lg').modal('show');  
                $('#id_user_rh_01').val(data.veryfy_id_rh);   
          }  
      })  
});  

/**Visualiza os dados para serem alterados no formulário altera turno cadastrado */
$(document).on('click', '.view_turno_fum_update_', function(){  
    let id_500 = $(this).attr("id");  
  
    $.ajax({  
        url:"<?php echo base_url(); ?>turno_funcionario/lista_une_turno_500/" + id_500,  
        method:"POST",  
        data:{id_500:id_500},  
        dataType:"json",  
        success:function(data)  
        {  
                $('.bd-view_list_funcionario_e_turno-modal-lg').modal('show');  
                $('.bd-view_fun_turno-modal-lg').modal('hide'); 

                let text_500_nome = data['name_500_fun'];
                $('#text_500_nome1').text(text_500_nome); 

                let text_500_matri = data['matr_500_fun'];
                $('#text_500_matri2').text(text_500_matri); 

                $('#500_sal').val(data.sal_500_fun);  
                $('#500_add').val(data.add_500_fun);  

                $('#500_justifica').val(data.justifica_500_fun); 
                $('#500_id_tbl').val(data.id_tbl_500_fun);  

                $('#500_id_funcionario').val(id_500);  

                /**nome do cargo */
                $('#cargo_500__option').val(data.nome_tbl_500_fun);  
                /**nome do turno */
                $('#turno_500_option').val(data.turno_tbl_500_fun);  
        }, 
        error: function (er, xhr) {
            alert("Erro ao se conectar: " + xhr.status + " - " + xhr-statusText + " Tipo:" + er);
        }
        
    })  
});  

/**Faz a alteração do modal turno cadastrado, altera  funcionario e dados do turno */
$(document).on('submit', '#altera_500_funcinario_turno', function(event){  
    event.preventDefault(); 

    var str_500 = $( "#altera_500_funcinario_turno" ).serialize();

    let id_table = $("input[name='500_id_tbl']").val();
    var last_name = $("input[name='last_name']").val();
  

    $.ajax({
        url:"<?php echo base_url() . 'turno_funcionario/update_500_turno_fun/'; ?>" + id_table, 
        type:'POST',
        dataType: "json",
        data: str_500,
        success: function(data) {
            if($.isEmptyObject(data.error)){
                $(".print-error-msg_500").css('display','none');
                swal("Parabéns!", data.success, "success");
            }else{
                $(".print-error-msg_500").css('display','block');
                $(".print-error-msg_500").html(data.error);
            }
        }
    });

}); 
</script>

<script>
load_data();

  function load_data(query)
  {
    $.ajax({
        url:"<?php echo base_url(); ?>turno_funcionario/busca_funcionario",
        method:"POST",
        data:{query:query},
        success:function(data){
        $('#result').html(data);
        }
    })
  }

  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();
    }
});
</script>

<script>
 load_data2();

 function load_data2(query)
  {
    $.ajax({
      url:"<?php echo base_url(); ?>turno_funcionario/list_tabel_fun_turno",
      method:"POST",
      data:{query:query},
      success:function(data){
        $('#result2').html(data);
      }
    })
  }

 $('#search_text2').keyup(function(){
  var search2 = $(this).val();
    if(search2 != '')
    {
      load_data2(search2);
    }
    else
    {
      load_data2();
    }
 });
</script>