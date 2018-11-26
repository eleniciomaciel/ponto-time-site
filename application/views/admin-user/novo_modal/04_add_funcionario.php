<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Adicionando funcionários %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<div class="modal fade bd-add_funcionario-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
         <span class="elusive icon-address-book"></span> Adicionar colaborador
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form add colaborador -->
        <div class="dark data-block">
            <header>
                <h2><span class="elusive icon-user"></span> Dados do colaborador</h2>
            </header>
            <section>

                <!-- Form validation demo -->
                <?php echo form_open('funcionarios/add_funcionario', array('id'=>'form_funcionario'));?>
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="fun_name">Nome completo</label>
                            <input type="text" class="form-control" name="fun_name" id="fun_name" placeholder="Ex.: Ana Dias" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_matric">Nº da matrícula</label>
                            <input type="text" class="form-control" name="fun_matric" id="fun_matric" placeholder="Ex.: 123654" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="fun_endere">Endereço:</label>
                            <input type="text" class="form-control" name="fun_endere" id="fun_endere" placeholder="Ex.: Rua Cidade Sol" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_cida">Cidade:</label>
                            <input type="text" class="form-control" name="fun_cida" id="fun_cida" placeholder="Ex.: Salvador" required="">
                        </div>

                    </div>
										
                    <div class="form-row">

                        <div class="form-group col-md-8">
                            <label for="fun_bair">Bairro:</label>
                            <input type="text" class="form-control" name="fun_bair" id="fun_bair" placeholder="Ex.: Santa Clara" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_compl">Complemento:</label>
                            <input type="text" class="form-control" name="fun_compl" id="fun_compl" placeholder="Ap.: 125-A" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="fun_rg">RG:</label>
                            <input type="text" class="form-control" name="fun_rg" id="fun_rg" placeholder="Ex.: 12312345-88" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_ctps">CTPS (nº de série):</label>
                            <input type="text" class="form-control" name="fun_ctps" id="fun_ctps" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_pis">Pis:</label>
                            <input type="text" class="form-control" name="fun_pis" id="fun_pis" required="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="fun_cpf">CPF:</label>
                            <input type="text" class="form-control" name="fun_cpf" id="fun_cpf" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_tele">Telefone:</label>
                            <input type="tel" class="form-control" name="fun_tele" id="fun_tele" required="">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="fun_email">E-mail:</label>
                            <input type="email" class="form-control" name="fun_email" id="fun_email" placeholder="Ex.: eu@gmail.com" required="">
                        </div>

                    </div>

										<input type="hidden" name="id_company" id="id_company" value="<?php echo $this->session->userdata('user')->id_inst_pw;?>">

                    <input type="hidden" name="empresa_id" id="empresa_id">

                    <button type="submit" class="btn btn-primary">
                        <span class="elusive icon-ok"></span> Salvar
                    </button>
                </form>
                <!-- /Form validation demo -->

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

<script>
$('#fun_tele').mask("(00) 9.0000-0000", {placeholder: "(00) 9.0000-0000"});
$('#fun_cpf').mask("000.000.000-00", {placeholder: "000.000.000-00"});
$('#fun_pis').mask('000.00000.00-00',{placeholder: "000.000.000-00"});
$('#search_text').mask('000.00000.00-00',{placeholder: "000.000.000-00"});

/**Levanta modal adiciona funcionário com id da empresa via ajax */
$(document).on('click', '.view_add_fun_com_empresa', function(){  
    var user_id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>funcionarios/levanta_dados_modal/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        {  
              $('.bd-add_funcionario-modal-lg').modal('show');  
              $('#empresa_id').val(data.id_da_empresa); 
        },
        error: function (xht, er) {
          alert('Error na conecxão: ' + xht.status + ' - ' + xhr.statusText + ' Tipo de error-> ' + er);
        }  
    });  
}); 

$('#form_funcionario').submit(function(e) {
	e.preventDefault();
	var me  = $(this);
	$.ajax({
		url: me.attr('action'),
		type: 'post',
		data: me.serialize(),
		dataType: 'json',
		success: function(response) {
			if (response.success === true) {
				swal("Parabéns!", "Cadastro efetuado com sucesso!", "success");
				$('#form_funcionario')[0].reset();
			} else {
					$.each(response.messages, function(key, value) {
						var element = $('#' + key);

						element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger')
						.remove();

						element.after(value);
				});
			}
		}
	});
});
</script>