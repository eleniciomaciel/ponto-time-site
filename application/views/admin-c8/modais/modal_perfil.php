<!-- Large modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-perfil-modal-lg">Large modal</button>
-->
<div class="modal fade bd-perfil-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar perfíl</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //painel perfil -->
        <div class="data-block">
							<header>
								<h2>Informe os seus novos dados de perfíl</h2>
							</header>
							<section>
								<div class="row">
									<div class="col-sm-6">
										<form class="form-horizontal" id="altera_dados_user" role="form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Usuário</label>
												<div class="col-sm-5">
													<p class="form-control-static"> <?php echo $this->session->userdata('user')->nome_user_pw;?></p>
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
																<input type="file" name="super_admin_file" id="super_admin_file">
															</span>
															<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<p class="help-block">Selecione um formato jpeg, png, gif, jpg.</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Nome</label>
												<div class="col-sm-8">
													<input class="form-control" type="text" name="my_perfil_name" id="my_perfil_name" placeholder="John Pixel">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">E-mail</label>
												<div class="col-sm-8">
													<input class="form-control" type="email" name="my_perfil_emai" id="my_perfil_emai" placeholder="example@domain.com">
												</div>
											</div>

											<input type="hidden" name="my_perfil_id" id="my_perfil_id">

											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-10">
													<button class="btn btn-lg btn-primary" type="submit">Salvar</button>
												</div>
											</div>
										</form>
									</div>
									<div class="col-sm-6">
										<h4>Alterar senha</h4>
										<p>
											Informe os seus novos dados de acesso.
										</p>
										<form class="form-horizontal" id="formUpdateSenha" role="form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Nova senha</label>
												<div class="col-sm-8">
													<input class="form-control" type="password" name="pw1" id="pw1">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Repetir senha</label>
												<div class="col-sm-8">
													<input class="form-control" type="password"  name="pw2" id="pw2">
												</div>
											</div>
											<input type="hidden" name="pwNew_id" id="pwNew_id">
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-10">
													<button class="btn btn-lg btn-primary" type="submit">Alterar</button>
												</div>
											</div>
										</form>
										<div class="alert alert-danger print-error-msgPW" style="display:none"></div>
									</div>
								</div>
							</section>
						</div>
        <!-- //painel perfil -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="location.reload(true);" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).on('click', '.login_dados_user', function(){  
			var user_id = $(this).attr("id");  
			$.ajax({  
					url:"<?php echo base_url(); ?>login/list_dado_one_perfil/" + user_id,  
					method:"GET",  
					data:{user_id:user_id},  
					dataType:"json",  
					success:function(data)  
					{  
								$('.bd-perfil-modal-lg').modal('show');  
								$('#my_perfil_name').val(data.perfil_name);  
								$('#my_perfil_emai').val(data.perfil_emai); 
								$('#my_perfil_id').val(user_id);  
								$('#pwNew_id').val(user_id);  
					},
					error: function(xhr, er)
					{
						alert('Conexão não realizada: ' + xhr.statusText + ' - ' + xhr.status)
					}  
			})  
});
/**Altera dados do perfilusuário */
$(document).on('submit', '#altera_dados_user', function(event){  
		event.preventDefault();  
		var my_perfil_name 	= $('#my_perfil_name').val();  
		var my_perfil_emai 	= $('#my_perfil_emai').val(); 
		var my_perfil_id   	= $('#my_perfil_id').val();  
		var extension 	= $('#super_admin_file').val().split('.').pop().toLowerCase();  
		if(extension != '')  
		{  
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
				{  
							alert("Invalid Image File");  
							$('#super_admin_file').val('');  
							return false;  
				}  
		}       
		if(my_perfil_name != '' && my_perfil_emai != '')  
		{  
				$.ajax({  
							url:"<?php echo base_url() . 'login/update_one_user/'?>" + my_perfil_id,  
							method:'POST',  
							data:new FormData(this),  
							contentType:false,  
							processData:false,  
							success:function(data)  
							{   
								swal("Muito bem!",data, "success");
							},
							error: function (xhr, er) {
								alert('Conexão não realizada: ' + xhr.statusText + ' - ' + xhr.status)
							} 
				});  
		}  
		else  
		{  
				alert("Preencha todos os campos por gentileza");  
		}  
}); 

/**Altera dados de login */
$(document).on('submit', '#formUpdateSenha', function(event){  
	event.preventDefault();  
	var id = $("input[name='pwNew_id']").val();
	var str = $( "#formUpdateSenha" ).serialize();

	swal({
  title: "Alterar senha?",
  text: "A senha será mudada permanentemente!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

					$.ajax({
			url:"<?php echo base_url() . 'login/update_one_password/'?>" + id, 
				type:'POST',
				dataType: "json",
				data: str,
				success: function(data) {
						if($.isEmptyObject(data.error)){
							$(".print-error-msgPW").css('display','none');
							swal(data.success, {
								icon: "success",
							});
						}else{
							$(".print-error-msgPW").css('display','block');
							$(".print-error-msgPW").html(data.error);
						}
				}
		});
		} else {
			swal("Você desistiu de deletar a sua senha!");
		}
	});
}); 
</script>

