<!-- Button trigger modal -->

<div class="modal fade bd-add_cargo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form add cargo -->
        <div class="data-block">
							<header>
								<h2><span class="elusive icon-cogs"></span> Cargo</h2>
							</header>
							<section>

								<form role="form" id="add_categoria">
									<!-- Input add nome do cargo -->
                  <label for="">Nome do cargo:</label>
									<div class="input-group">
										<span class="input-group-addon">
												<span class="elusive icon-wrench"></span>
										</span>
										<input type="text" class="form-control" name="add_nome_cat" id="add_nome_cat" placeholder="Ex.: Gerente">
									</div>
									<!-- /Input add nome do cargo -->
									<input type="hidden" name="id_user" id="id_user" value="<?php echo $this->session->userdata('user')->id_inst_pw;?>">
									<br>
									<button type="submit" class="btn btn-primary">
											<span class="elusive icon-ok"></span> Salvar
									</button>
								</form>
<br>
							<div class="alert alert-danger print-error-msgAdd_cat" style="display:none"></div>
							</section>
						</div>
        <!-- form add cargo -->
        <!-- dados da tabela -->
        <div class="table-responsive">
						<div id="view_list_cargo"></div>
				</div>
        <!-- dados da tabela -->
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

<!-- Modal -->
<div class="modal fade" id="alteraModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alterar cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form role="form" id="up_categoria">
					<!-- Input add nome do cargo -->
					<label for="">Nome do cargo:</label>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="elusive icon-wrench"></span>
						</span>
						<input type="text" class="form-control" name="new_up_cargo01" id="new_up_cargo01" placeholder="Ex.: Gerente">
					</div>
					<!-- /Input add nome do cargo -->
					<input type="hidden" name="new_up_id01" id="new_up_id01">
					<br>
					<button type="submit" class="btn btn-primary">
							<span class="elusive icon-refresh"></span> Alterar
					</button>
				</form>
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
$(document).on('submit', '#add_categoria', function(event){  
		event.preventDefault();  
		var add_nome_cat = $('#add_nome_cat').val();  
		var id_user = $('#id_user').val();       
		if(add_nome_cat != '' && id_user != '')  
		{  
				$.ajax({  
							url:"<?php echo base_url() . 'cargo/add_cargo'?>",  
	            type:'POST',
	            dataType: "json",
	            data: {add_nome_cat:add_nome_cat, id_user:id_user},
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
										$(".print-error-msgAdd_cat").css('display','none');
										swal("Parabéns!",data.success, "success");
										$('#add_categoria')[0].reset(); 
	                }else{
										$(".print-error-msgAdd_cat").css('display','block');
	                	$(".print-error-msgAdd_cat").html(data.error);
	                }
	            } 
				});  
		}  
		else  
		{  
				alert("Preencha todos os campos por favor");  
		}  
});

$('.viewCatColabore_003').click(function() {
	var id = $('#id_user').val(); 
	$.ajax({
		url:"<?php echo base_url();?>cargo/getDados/" + id,
		type:"GET",
		dataType:'json',
		success:function(data){
				$('#view_list_cargo').html(data);
				//$('.bd-modalLiscat-modal-lg').modal('show');
		}
	});
}); 

/**Sobe os dados do cargo quando recebe click */
$(document).on('click', '.view_nameUP', function(){  
	var user_id = $(this).attr("id");  
	$.ajax({  
			url:"<?php echo base_url(); ?>cargo/view_name_cargo/" + user_id,  
			method:"GET",  
			data:{user_id:user_id},  
			dataType:"json",  
			success:function(data)  
			{  
						$('.bd-add_cargo-modal-lg').modal('hide');  
						$('#new_up_cargo01').val(data.cg_nome_cg);  
						$('#new_up_id01').val(data.cg_id); 
			}  
	})  
}); 


/**Altera o nome do cargo */
$(document).on('submit', '#up_categoria', function(event){  
		event.preventDefault();  
		var new_up_cargo01 = $('#new_up_cargo01').val();  
		var new_up_id01 = $('#new_up_id01').val();   

		swal({
		title: "Deseja alterar?",
		text: "Essa ação será de forma permanente!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

					$.ajax({  
						url:"<?php echo base_url() . 'cargo/update_nome_caargo/'?>" + new_up_id01,  
						method:'POST',  
						data:new FormData(this),  
						contentType:false,  
						processData:false,  
						success:function(data)  
						{
							swal(data, {
								icon: "success",
							});       
						}  
					});
		} else {
			swal("Você desistiu de alterar!");
		}
	}); 
});

/**Deleta cargo */
$(document).on('click', '.del_car', function(){  
		var user_id = $(this).attr("id"); 

		swal({
			title: "Deseja Deletar?",
			text: "Essa ação será de forma permanente!",
			icon: "error",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

					$.ajax({  
							url:"<?php echo base_url(); ?>cargo/delete_cargo/" + user_id,  
							method:"POST",  
							data:{user_id:user_id},  
							success:function(data)  
							{  
								swal(data, {
									icon: "success",
								}); 
								$('.bd-add_cargo-modal-lg').modal('hide');   
							}  
				});  
			} else {
				swal("Você desistiu de deletar!");
			}
		});  
});
</script>
