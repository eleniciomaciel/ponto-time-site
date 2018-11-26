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

</script>