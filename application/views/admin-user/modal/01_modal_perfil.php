<!-- Large modal -->
<div class="modal fade bd-dados_perfil-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Perfíl</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form perfil -->
        <div class="data-block">
							<header>
								<h2>Configurações de perfil de usuário</h2>
							</header>
							<section>
								<div class="row">
									<div class="col-sm-6">
										<form class="form-horizontal" role="form" id="UP_perfil_user">
											<div class="form-group">
												<label class="col-sm-3 control-label">Usuário</label>
												<div class="col-sm-5">
													<p class="form-control-static" id="text_nome2"></p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Imagem do perfíl</label>
												<div class="col-sm-9">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="fileupload-preview fileupload-small thumbnail"><img src="<?=base_url();?>stylus/img/sample_content/upload-50x50.png"></div>
														<div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-new">Selecione uma imagem</span>
																<span class="fileupload-exists">Change</span>
																<input type="file" name="user_up_perfil" id="user_up_perfil">
															</span>
															<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<p class="help-block">
                                                        Formato permitido jpeg, png ou jpg.
                                                    </p>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Nome:</label>
												<div class="col-sm-8">
													<input class="form-control" type="text" name="myPerf_nome" id="myPerf_nome" required="">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">E-mail:</label>
												<div class="col-sm-8">
													<input class="form-control" type="email" name="myPerf_email" id="myPerf_email" required="">
												</div>
											</div>

                                            <input type="hidden" name="myPerf_id" id="myPerf_id">

											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-10">
													<button class="btn btn-lg btn-info" type="submit">
                                                        <span class="elusive icon-refresh"></span> Alterar perfíl
                                                    </button>
												</div>
											</div>
										</form>
									</div>
									<div class="col-sm-6">
										<h4>Alteração de senha</h4>
										<p>
                                        Essa alteração é de forma permanente, por gentileza digite uma senha que possa recordar.
                                         </p>
										<form class="form-horizontal" role="form" id="form_up_password">
											<div class="form-group">
												<label class="col-sm-3 control-label">Nova senha</label>
												<div class="col-sm-9">
													<input class="form-control" type="password" name="new_pd_user" id="new_pd_user">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Confirme a Senha</label>
												<div class="col-sm-9">
													<input class="form-control" type="password" name="reapeti_new_pw" id="reapeti_new_pw">
												</div>
											</div>
                                            <input type="hidden" name="pw_new" id="pw_new" value="<?php echo $this->session->userdata('user')->id_inst_pw;?>">
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-10">
													<button class="btn btn-lg btn-warning" type="submit">
                                                        <span class="elusive icon-refresh"></span> Alterar a senha
                                                    </button>
												</div>
											</div>
										</form>
                                        <br>
                                        <div class="alert alert-danger print-error-msgPW_new" style="display:none"></div>
									</div>
								</div>
							</section>
							<footer>
								<p class="text-center">
                                painel de dados do usuário.
                                 </p>
							</footer>
						</div>
        <!-- form perfil -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="myFunction()">Fechar</button>
      </div>
    </div>
  </div>
</div>







<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Dados da empresa %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

<div class="modal fade bd-dados_empresa-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados cadastrais da empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form dados empresa -->
        <form id="form_altera_dados_empresa">

            <div class="form-row">

                <div class="form-group col-md-6">
                <label for="inputEmail4">Nome fantasia:</label>
                <input type="text" class="form-control" name="emplo_nome" id="emplo_nome">
                </div>

                <div class="form-group col-md-6">
                <label for="inputPassword4">Insc. Estadual:</label>
                <input type="text" class="form-control" name="emplo_inse" id="emplo_inse">

                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                <label for="inputEmail4">Razão social:</label>
                <input type="text" class="form-control"name="emplo_raza" id="emplo_raza">
                </div>

                <div class="form-group col-md-6">
                <label for="emplo_cnpj">CNPJ:</label>
                <input type="text" class="form-control" name="emplo_cnpj" id="emplo_cnpj">

                </div>
            </div>

           <div class="form-row">

                <div class="form-group col-md-6">
                <label for="emplo_ende">Endereço:</label>
                <input type="text" class="form-control" name="emplo_ende" id="emplo_ende">
                </div>

                <div class="form-group col-md-6">
                <label for="emplo_comp">Complemento:</label>
                <input type="text" class="form-control" name="emplo_comp" id="emplo_comp">

                </div>
            </div>
                      
            <div class="form-row">

                <div class="form-group col-md-2">
                    <label for="emplo_nume">Número:</label>
                    <input type="text" class="form-control" name="emplo_nume" id="emplo_nume">
                </div>

                <div class="form-group col-md-4">
                    <label for="emplo_cida">Cidade:</label>
                    <input type="text" class="form-control" name="emplo_cida" id="emplo_cida">
                </div>

                <div class="form-group col-md-2">
                    <label for="emplo_esta">Estado:</label>
                    <input type="text" class="form-control" name="emplo_esta" id="emplo_esta">
                </div>

                <div class="form-group col-md-4">
                    <label for="emplo_cepe">Cep:</label>
                    <input type="text" class="form-control" name="emplo_cepe" id="emplo_cepe">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="emplo_emai">E-mail:</label>
                    <input type="text" class="form-control" name="emplo_emai" id="emplo_emai">
                </div>

                <div class="form-group col-md-3">
                    <label for="emplo_tele">Telefone:</label>
                    <input type="text" class="form-control" name="emplo_tele" id="emplo_tele">
                </div>

                <div class="form-group col-md-3">
                    <label for="emplo_celu">Celular:</label>
                    <input type="text" class="form-control" name="emplo_celu" id="emplo_celu">
                </div>

            </div>

            <input type="hidden" name="emplo_id" id="emplo_id">
<!-- fim form dados da empresa  -->
            <button type="submit" class="btn btn-primary">
                <span class="elusive icon-check"></span> Alterar
            </button>
        </form>
        <!-- fim form dados da empresa  -->
        <br>
        <div class="alert alert-danger print-error-msgEMPW" style="display:none"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).on('click', '.nome_inst', function(){  
    var user_id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>perfil/view_one_perfil/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        {   
            $('#emplo_nome').val(data.employer_nome);  
            $('#emplo_inse').val(data.employer_ins_est);
            $('#emplo_raza').val(data.employer_razao_social_inst);
            $('#emplo_cnpj').val(data.employer_cnpj_inst);
            $('#emplo_ende').val(data.employer_endereco_inst);
            $('#emplo_comp').val(data.employer_complemento_inst);
            $('#emplo_nume').val(data.employer_numero_inst);
            $('#emplo_cida').val(data.employer_cidade_inst);
            $('#emplo_esta').val(data.employer_estado_inst);
            $('#emplo_cepe').val(data.employer_cep_inst);
            $('#emplo_emai').val(data.employer_email_inst);
            $('#emplo_tele').val(data.employer_telefone_inst);
            $('#emplo_celu').val(data.employer_celular_inst);
            $('#emplo_id').val(data.employer_id_inst);
        }  
    })  
});

/**Altera dados do usuários */
$(document).on('submit', '#form_altera_dados_empresa', function(event){  
	event.preventDefault();  
	var id = $("input[name='emplo_id']").val();
	var str = $( "#form_altera_dados_empresa" ).serialize();

	swal({
    title: "Deseja alterar?",
    text: "Essa alteração será de forma permanente!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

			$.ajax({
			url:"<?php echo base_url() . 'perfil/update_one_emplower/'?>" + id, 
            type:'POST',
            dataType: "json",
            data: str,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msgEMPW").css('display','none');
                    swal(data.success, {
                        icon: "success",
                    });
                }else{
                    $(".print-error-msgEMPW").css('display','block');
                    $(".print-error-msgEMPW").html(data.error);
                }
            }
		});
		} else {
			swal("Você desistiu de altera os dados da empresa!");
		}
	});
}); 

/**visualizando o menu perfíl */
$(document).on('click', '.my_perfil', function(){  
    var user_id = $(this).attr("id"); 
    $.ajax({  
        url:"<?php echo base_url(); ?>perfil/view_one_perfil/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        {   
            $('#myPerf_nome').val(data.fk_user_name); 
            $('#myPerf_email').val(data.fk_user_email);
            $('#myPerf_id').val(user_id);  
            let text_nome = data['fk_user_name'];
            $('#text_nome2').text(text_nome); 
        }  
    })  
});

/**alterando os dados do perfil de acesso */
$(document).on('submit', '#UP_perfil_user', function(event){  
    event.preventDefault();
    var id = $('#myPerf_id').val();  
    var myPerf_nome = $('#myPerf_nome').val();  
    var myPerf_email = $('#myPerf_email').val();  
    var extension = $('#user_up_perfil').val().split('.').pop().toLowerCase();  
    if(extension != '')  
    {  
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
        {  
                swal("Ops!", "Formato de imagem não permitido!", "error");
                $('#user_up_perfil').val('');  
                return false;  
        }  
    }       
    if(myPerf_nome != '' && myPerf_email != '')  
    {  
        $.ajax({  
                url:"<?php echo base_url() . 'perfil/rename_dado_perfil/'?>" + id,  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data)  
                {   
                    swal("Ok!", data, "success");
                }  
        });  
    }  
    else  
    {  
        swal("Ops!", "Todos os campos devem está selecionado!", "error"); 
    }  
}); 

/**Altera dados do login senha do perfil*/
$(document).on('submit', '#form_up_password', function(event){  
    event.preventDefault();

    var id = $("input[name='pw_new']").val();
    var str = $( "#form_up_password" ).serialize();

    swal({
    title: "Alterar a senha?",
    text: "Al confirmar você será redirecionado ao um novo login!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {

        $.ajax({
            url:"<?php echo base_url() . 'perfil/new_password/'?>" + id,  
            type:'POST',
            dataType: "json",
            data: str,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msgPW_new").css('display','none');
                    swal(data.success, {
                        icon: "success",
                    });
                }else{
                    $(".print-error-msgPW_new").css('display','block');
                    $(".print-error-msgPW_new").html(data.error);
                }
            }
        });

    } else {
        swal("Você desistiu de alterar a senha de acesso!");
    }
    });
}); 
</script>

<script>
    function myFunction() {
        location.reload();
    }
</script>