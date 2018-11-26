<!-- Button trigger modal -->

<div class="modal fade bd-lista_employees-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listagem dos funcionários</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- lista e ações dos funcionários -->
<!-- Data block -->
<article class="col-sm-12">
						<div class="dark data-block">
							<header>
								<h2> <span class="elusive icon-address-book"></span> Funcionários cadastrados</h2>
							</header>
							<section>

								<table class="datatable_014 table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Nº da matrícula</th>
											<th>CTPS (nº de série)</th>
											<th>Telefone</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>

									<?php
									$id = $this->session->userdata('user')->id_inst_pw;
									$this->db->select('*');
									$this->db->from('tbl_dados_inst_pw_instuicao');
									$this->db->join('tbl_funcionario', 'tbl_funcionario.fk_emplower_fun = tbl_dados_inst_pw_instuicao.id_inst_pw');
									$this->db->where('fk_emplower_fun', $id);
									$query = $this->db->get();

									foreach ($query->result() as $row)
									{
										?>
											<tr class="odd gradeX">
												<td><?php echo $row->nome_fun;?></td>
												<td><?php echo $row->matri_fun;?></td>
												<td><?php echo $row->ctps_fun;?></td>
												<td><?php echo $row->tele_fun;?></td>
												<td>
													<div class="btn-group open">
														<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Opções <span class="caret"></span></button>

														<!-- Note: Dropdowns have color variants too -->
														<ul class="dropdown-menu dropdown-red">
															<li>
																<a href="#" class="view_my_fun" id="<?php echo $row->id_fun;?>">
																	<span class="elusive icon-eye-open"></span> Visualizar
																</a>
															</li>
															<li>
																<a href="#" class="update_my_fun" id="<?php echo $row->id_fun;?>">
																	<span class="elusive icon-refresh"></span> Alterar
																</a>
															</li>
															<li>
																<a href="#" class="generate_key_employer" id="<?php echo $row->id_fun;?>">
																	<span class="elusive icon-key"></span> Gerar Senha
																</a>
															</li>
															<li class="divider"></li>

															<li>
																<a href="#" class="altera_status_employer" id="<?php echo $row->id_fun;?>" tittle="Acesso liberado">
																	
																	<?php
																	if ($row->status_fun == '1') {
																		echo "<span class='elusive icon-unlock'></span> Acesso liberado";
																	} else {
																		echo "<span class='elusive icon-lock'></span> Acesso negado";
																	}
																	
																	?>
																</a>
															</li>

															<li>
																<a href="#" class="delete_my_fun" id="<?php echo $row->id_fun;?>">
																	<span class="elusive icon-trash"></span> Deletar
																</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
										<?php
									}
									?>


									</tbody>
								</table>

							</section>
						</div>
					</article>
					<!-- /Data block -->

       <!-- lista e ações dos funcionários -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span>  Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- visualizar usuario funcionário -->

<div class="modal fade" id="eyeDadoFunc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informações do funcionário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Dados do usuario -->
		<div class="data-block">
			<header>
				<h2><span class="elusive icon-address-book"> Dados do funcionário</h2>
			</header>
			<section>
				<dl class="dl-horizontal">
					<dt>Nome:</dt>
					<dd id="text_func_nome1"></dd>

					<dt>Nº da matrícula:</dt>
					<dd id="text_func_matr2"></dd>
					
					<dt>Endereço:</dt>
					<dd id="text_func_ende3"></dd>

					<dt>Bairro:</dt>
					<dd id="text_func_bair3"></dd>

					<dt>Complemento:</dt>
					<dd id="text_func_comp4"></dd>

					<dt>Cidade:</dt>
					<dd id="text_func_cida5"></dd>

					<dt>RG:</dt>
					<dd id="text_func_rg6"></dd>

					<dt>CPF:</dt>
					<dd id="text_func_cpf7"></dd>

					<dt>CTPS:</dt>
					<dd id="text_func_ctps8"></dd>

					<dt>Pis:</dt>
					<dd id="text_func_pis9"></dd>

					<dt>Telefone:</dt>
					<dd id="text_func_tele10"></dd>

					<dt>E-mail:</dt>
					<dd id="text_func_emai11"></dd>
					<dt>Senha:</dt>
					<dd id="text_func_pw_pw2"></dd>
					
				</dl>
			</section>
		</div>
		<!-- Dados do usuario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
			<span class="elusive icon-remove"> Fechar</span>
		</button>
      </div>
    </div>
  </div>
</div>


<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Adicionando funcionários %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<div class="modal fade bd-view_UP_funcionario-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
         <span class="elusive icon-address-book"></span> Colaborador
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form add colaborador -->
        <div class="dark data-block">
            <header>
                <h2><span class="elusive icon-user"></span> Alterar dados do colaborador</h2>
            </header>
            <section>

                <!-- Form validation demo -->
				<form id="form_altera_you_employer">
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="employer_eye_nome">Nome completo</label>
                            <input type="text" class="form-control" name="employer_eye_nome" id="employer_eye_nome" placeholder="Ex.: Ana Dias" >
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_matr">Nº da matrícula</label>
                            <input type="text" class="form-control" name="employer_eye_matr" id="employer_eye_matr" placeholder="Ex.: 123654" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="employer_eye_enfr">Endereço:</label>
                            <input type="text" class="form-control" name="employer_eye_enfr" id="employer_eye_enfr" placeholder="Ex.: Rua Cidade Sol" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_cida">Cidade:</label>
                            <input type="text" class="form-control" name="employer_eye_cida" id="employer_eye_cida" placeholder="Ex.: Salvador" required="">
                        </div>

                    </div>
										
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="employer_eye_bair">Bairro:</label>
                            <input type="text" class="form-control" name="employer_eye_bair" id="employer_eye_bair" placeholder="Ex.: Santa Clara" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_comp">Complemento:</label>
                            <input type="text" class="form-control" name="employer_eye_comp" id="employer_eye_comp" placeholder="Ap.: 125-A" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="employer_eye_rg">RG:</label>
                            <input type="text" class="form-control" name="employer_eye_rg" id="employer_eye_rg" placeholder="Ex.: 12312345-88" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_ctps">CTPS (nº de série):</label>
                            <input type="text" class="form-control" name="employer_eye_ctps" id="employer_eye_ctps" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_pis">Pis:</label>
                            <input type="text" class="form-control" name="employer_eye_pis" id="employer_eye_pis" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="employer_eye_cpf">CPF:</label>
                            <input type="text" class="form-control" name="employer_eye_cpf" id="employer_eye_cpf" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_tele">Telefone:</label>
                            <input type="tel" class="form-control" name="employer_eye_tele" id="employer_eye_tele" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="employer_eye_email">E-mail:</label>
                            <input type="email" class="form-control" name="employer_eye_email" id="employer_eye_email" placeholder="Ex.: eu@gmail.com" required="">
                        </div>

                    </div>

					<input type="hidden" name="employe_eye_id" id="employe_eye_id">

                    <button type="submit" class="btn btn-warning">
                        <span class="elusive icon-refresh"></span> Alterar
                    </button>
                </form>
                <!-- /Form validation demo -->
<br>
<div class="alert alert-danger print-error-msgYOU_emplower" style="display:none"></div>
            </section>
        </div>
        <!-- form add colaborador -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="myReloadAdd()">
            <span class="elusive icon-remove"></span>  Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Gerar senha do usuário funcionário do sistema @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<div class="modal fade" data-backdrop="static" id="password_key_employer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gerar acesso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form gerar senha employer -->
		<div class="orange data-block">
			<header>
				<h2><span class="elusive icon-unlock"></span> Cadastrar senha</h2>
			</header>
			<section>
				
				<!-- Inline form -->
				<p><b>Funcionário:</b> <i id="text_name_func_new_senha1">Antonio Marcos</i></p>
				<form class="form-inline" role="form" id="inseri_update_password">

					<div class="form-group">
						<p class="form-control-static" id="text_func_new_senha_email2">email@example.com</p>
					</div>

					<div class="form-group">
						<label class="sr-only" for="add_password_new_fun01">Senha</label>
						<input type="password" class="form-control" name="add_password_new_fun01" id="add_password_new_fun01" placeholder="Ex.: Ele123456">
					</div>
					
					<input type="hidden" name="id_new_pw" id="id_new_pw">
					<button type="submit" class="btn btn-success">
						<span class="elusive icon-lock"></span> Gerar senha
					</button>
				</form>
				<br><br>
				<div class="alert alert-danger print-error-msgPW_fun" style="display:none"></div>
				<!-- /Inline form -->
			</section>
		</div>
		<!-- form gerar senha employer -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
			<span class="elusive icon-remove"></span>  Fechar
		</button>
      </div>
    </div>
  </div>
</div>




<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@    Alterando o status do funcionário @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  -->

<div class="modal fade bd-altera_status_employer-modal-sm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alter status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form update status -->
		<p><b>Funcionário:</b> <i id="text_name_status1">Antonio Marcos</i></p>
		<form id="altera_status_form">
				<div class="input-group">
					<select name="text_func_new_status" id="text_func_new_status" class="form-control">
						<option selected="" disabled="">Selecione aqui</option>
						<option value="1" <?php echo  set_select('text_func_new_status', '1'); ?>>Ativado</option>
						<option value="0" <?php echo  set_select('text_func_new_status', '0'); ?>>Desativado</option>
					</select>
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Salvar</button>
					</span>
				</div>
				<input type="hidden" name="id_status_pw" id="id_status_pw">
		</form>
		<br><br>
		<div class="alert alert-danger print-error-msg_status" style="display:none"></div>
		<!-- form update status -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
			<span class="elusive icon-remove"></span> Fechar
		</button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery DataTable -->
<script src="<?=base_url();?>stylus/js/plugins/dataTables/jquery.datatables.min.js"></script>

<script>

/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
} );

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}

/* Sangoma style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"sangoma": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};
			
			$(nPaging).addClass('pagination-right').append(
				'<ul class="pagination">'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},
		
		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
			
			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}
			
			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();
				
				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}
				
				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}
				
				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
});

/* Table #example */
$(document).ready(function() {
	$('.datatable_014').dataTable( {
		"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
		"sPaginationType": "sangoma",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Registros por página"
		}
	});
});

</script>
<script>
      $(document).on('click', '.view_my_fun', function(){  
           let user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>funcionarios/lista_dados_funcionario/" + user_id,  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                    $('#eyeDadoFunc').modal('show');  

/**======================================================================================== */
let text_func_nome = data['eye_fun_nome'];
$('#text_func_nome1').text(text_func_nome); 

let text_func_matr = data['eye_fun_matr'];
$('#text_func_matr2').text(text_func_matr); 
/**======================================================================================== */

/**======================================================================================== */
let text_func_ende = data['eye_fun_ende'];
$('#text_func_ende3').text(text_func_ende); 

let text_func_bair = data['eye_fun_bair'];
$('#text_func_bair3').text(text_func_bair); 
/**======================================================================================== */
 
/**======================================================================================== */
let text_func_comp = data['eye_fun_comp'];
$('#text_func_comp4').text(text_func_comp); 

let text_func_cida = data['eye_fun_cida'];
$('#text_func_cida5').text(text_func_cida); 
/**======================================================================================== */

/**======================================================================================== */
let text_func_rg = data['eye_fun_rg'];
$('#text_func_rg6').text(text_func_rg); 

let text_func_cpf = data['eye_fun_cpf'];
$('#text_func_cpf7').text(text_func_cpf); 
/**======================================================================================== */

/**======================================================================================== */
let text_func_ctps = data['eye_fun_ctps'];
$('#text_func_ctps8').text(text_func_ctps); 

let text_func_pis = data['eye_fun_pis'];
$('#text_func_pis9').text(text_func_pis); 
/**======================================================================================== */

/**======================================================================================== */
let text_func_tele = data['eye_fun_tele'];
$('#text_func_tele10').text(text_func_tele); 

let text_func_emai = data['eye_fun_emai'];
$('#text_func_emai11').text(text_func_emai); 

let text_func_pw_pw = data['eye_fun_pw_pw'];
$('#text_func_pw_pw2').text(text_func_pw_pw); 
/**======================================================================================== */
                    $('#user_id').val(user_id);  
                }  
           })  
      });

$(document).on('click', '.update_my_fun', function(){  
	let employe_eye_id = $(this).attr("id");  
	$.ajax({  
		url:"<?php echo base_url(); ?>funcionarios/lista_dados_funcionario/" + employe_eye_id,  
		method:"POST",  
		data:{employe_eye_id:employe_eye_id},  
		dataType:"json",  
		success:function(data)  
		{  
			$('.bd-view_UP_funcionario-modal-lg').modal('show');  
			$('#employer_eye_nome').val(data.eye_fun_nome);  
			$('#employer_eye_matr').val(data.eye_fun_matr); 
			$('#employer_eye_enfr').val(data.eye_fun_ende);  
			$('#employer_eye_bair').val(data.eye_fun_bair); 
			$('#employer_eye_comp').val(data.eye_fun_comp);  
			$('#employer_eye_cida').val(data.eye_fun_cida); 
			$('#employer_eye_rg').val(data.eye_fun_rg);  
			$('#employer_eye_cpf').val(data.eye_fun_cpf); 
			$('#employer_eye_ctps').val(data.eye_fun_ctps);  
			$('#employer_eye_pis').val(data.eye_fun_pis); 
			$('#employer_eye_tele').val(data.eye_fun_tele);  
			$('#employer_eye_email').val(data.eye_fun_emai); 
			$('#employe_eye_id').val(employe_eye_id);  
		}  
	})  
}); 

/**alterando os dados do form_altera_you_employer */
$(document).on('submit', '#form_altera_you_employer', function(event){  
	event.preventDefault();     	
	var str = $( "#form_altera_you_employer" ).serialize();
	let id = $("input[name='employe_eye_id']").val();

	swal({
	title: "Confirmar alteração?",
	text: "Essa alteração será efetuada de forma permanente!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) 
		{
		
			$.ajax({
				url:"<?php echo base_url() . 'funcionarios/you_employer/'?>" + id,
				type:'POST',
				dataType: "json",
				data: str,
				success: function(data) {
					if($.isEmptyObject(data.error)){
						$(".print-error-msgYOU_emplower").css('display','none');
						swal(data.success, {
						icon: "success",
						});
					}else{
						$(".print-error-msgYOU_emplower").css('display','block');
						$(".print-error-msgYOU_emplower").html(data.error);
					}
				}
			});

		} else {
			swal("Você desistiu de alterar os dados do colaborador!");
		}
	});
});

/**Deleta funcionario */
$(document).on('click', '.delete_my_fun', function(){  
	let id = $(this).attr("id");  

	swal({
	title: "Deseja deletar?",
	text: "Essa ação será efetuada de forma permanente!",
	icon: "error",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

			$.ajax({  
				url:"<?php echo base_url() . 'funcionarios/you_employer_delete/'?>" + id,
				method:"POST",  
				data:{id:id},  
				success:function(data)  
				{  
					swal({title: "Ok", text: "Empregado deletado com sucesso!", type: 
					"success"}).then(function(){ 
					location.reload();
					});
				}  
			}); 

			
		} else {
			swal("Você desistiu de deletar os dados do colaborador!");
		}
	});  
}); 

/**Chama modal adiciona senha do funcionário */
$(document).on('click', '.generate_key_employer', function(){  
           let id_new_pw = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>funcionarios/lista_dados_funcionario/" + id_new_pw,  
                method:"POST",  
                data:{id_new_pw:id_new_pw},  
                dataType:"json",  
                success:function(data)  
                {  
                    $('#password_key_employer').modal('show');  

/**======================================================================================== */
				let text_name_func_new_senha = data['eye_fun_nome'];
				$('#text_name_func_new_senha1').text(text_name_func_new_senha); 


				let text_func_new_senha_email = data['eye_fun_emai'];
				$('#text_func_new_senha_email2').text(text_func_new_senha_email); 
/**======================================================================================== */
                    $('#id_new_pw').val(id_new_pw);  
                }  
           })  
      });

/** &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&  insere altera a senha do funcionário &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */

$(document).on('submit', '#inseri_update_password', function(event){  
	event.preventDefault();  

	var add_password_new_fun01 = $("input[name='add_password_new_fun01']").val();
	var id_up_pw = $("input[name='id_new_pw']").val();


	$.ajax({
		url:"<?php echo base_url(); ?>funcionarios/add_update_senha/" + id_up_pw,
		type:'POST',
		dataType: "json",
		data: {add_password_new_fun01:add_password_new_fun01, id_up_pw:id_up_pw},
		success: function(data) {
			if($.isEmptyObject(data.error)){
				$(".print-error-msgPW_fun").css('display','none');
				swal("Parabéns!", data.success, "success");
				$('#inseri_update_password')[0].reset();  
			}else{
				$(".print-error-msgPW_fun").css('display','block');
				$(".print-error-msgPW_fun").html(data.error);
			}
		}
	});


});


/**Chama modal altera status do funcionário*/
$(document).on('click', '.altera_status_employer', function(){  
	let id_status_pw = $(this).attr("id");  
	$.ajax({  
		url:"<?php echo base_url(); ?>funcionarios/lista_dados_funcionario/" + id_status_pw,  
		method:"POST",  
		data:{id_status_pw:id_status_pw},  
		dataType:"json",  
		success:function(data)  
		{  
			$('.bd-altera_status_employer-modal-sm').modal('show');  

/**======================================================================================== */
		let text_name_status = data['eye_fun_nome'];
		$('#text_name_status1').text(text_name_status); 

		$('#text_func_new_status').val(data.eye_fun_status);  

/**======================================================================================== */
			$('#id_status_pw').val(id_status_pw);  
		}  
	})  
});

/**Altera o status do usuário, liberado ou não altera_status_form*/
$(document).on('submit', '#altera_status_form', function(event){  
	event.preventDefault();  

	let text_func_new_status = $("select[name='text_func_new_status']").val();
	let id_status_pw = $("input[name='id_status_pw']").val();

	swal({
	title: "Muda acesso?",
	text: "Você está prestes a alterar o status de acesso!",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

				$.ajax({
				url:"<?php echo base_url(); ?>funcionarios/altera_status_acesso/" + id_status_pw, 
				type:'POST',
				dataType: "json",
				data: {id_status_pw:id_status_pw, text_func_new_status:text_func_new_status},
				success: function(data) {
						if($.isEmptyObject(data.error)){
							$(".print-error-msg_status").css('display','none');
							swal({title: "Ok", text: data.success, type: 
							"success"}).then(function(){ 
							location.reload();
							});
						}else{
							$(".print-error-msg_status").css('display','block');
							$(".print-error-msg_status").html(data.error);
						}
					}
				});

		} else {
			swal("Você desistiu de altera o status de acesso!");
		}
	});

}); 
</script>

