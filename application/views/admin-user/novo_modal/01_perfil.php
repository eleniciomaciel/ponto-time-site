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

<script>
/**Pega dados do perfil do usuário */
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