<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  EDITAR MODAL CONTABILIDADE @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<!-- fazendo chamada a partir do 02_modal_menu -->
<div class="modal fade bd-edit_contabil-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados da contabilidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- form contabil -->
<div class="dark data-block">
    <header>
        <h2><span class="elusive icon-check"></span> Cadastro da contabilidade</h2>
    </header>
    <section>

        <!-- Form validation demo -->
        <form id="altera_dados_contabil">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="view_cont_nome">Nome fantasia:</label>
                    <input type="text" class="form-control" name="view_cont_nome" id="view_cont_nome" placeholder="Nome fantasia">
                </div>

                <div class="form-group col-md-6">
                    <label for="view_cont_insc">Insc. Estadual:</label>
                    <input type="text" class="form-control" name="view_cont_insc" id="view_cont_insc" placeholder="Insc. Estadual">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="view_cont_ende">Endereço completo:</label>
                <input type="text" class="form-control" name="view_cont_ende" id="view_cont_ende" placeholder="1234 Main St">
            </div>

            <div class="form-row">

                <div class="form-group col-md-5">
                    <label for="view_cont_comp">Complemento:</label>
                    <input type="text" class="form-control" name="view_cont_comp" id="view_cont_comp">
                </div>

                <div class="form-group col-md-5">
                    <label for="view_cont_cida">Cidade:</label>
                    <input type="text" class="form-control" name="view_cont_cida" id="view_cont_cida">
                </div>

                <div class="form-group col-md-2">
                    <label for="view_cont_esta">Estado:</label>
                    <input type="text" maxlength="2" class="form-control" name="view_cont_esta" id="view_cont_esta">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="view_cont_emai">E-mail:</label>
                    <input type="email" class="form-control" name="view_cont_emai" id="view_cont_emai">
                </div>

                <div class="form-group col-md-4">
                    <label for="view_cont_fixo">Telefone:</label>
                    <input type="text" class="form-control" name="view_cont_fixo" id="view_cont_fixo">
                </div>

                <div class="form-group col-md-4">
                    <label for="view_cont_celu">Celular:</label>
                    <input type="text" class="form-control" name="view_cont_celu" id="view_cont_celu">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="view_cont_cont">Contador responsável:</label>
                    <input type="text" class="form-control" name="view_cont_cont" id="view_cont_cont">
                </div>

                <div class="form-group col-md-6">
                    <label for="view_cont_regi">Registro:</label>
                    <input type="text" class="form-control" name="view_cont_regi" id="view_cont_regi">
                </div>

            </div>

            <input type="hidden" name="view_cont_id" id="view_cont_id">

            <button type="submit" class="btn btn-primary">
                <span class="elusive icon-refresh"></span> Alterar
            </button>
        </form>
        <!-- /Form validation demo -->
<br>
<div class="alert alert-danger print-error-msg_up_contabil" style="display:none"></div>
    </section>
</div>
       <!-- form fim -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span> Sair
        </button>
      </div>
    </div>
  </div>
</div>
<script>
 $('#view_cont_insc').mask("00.000.000-0", {placeholder: "00.000.000-0"});
 $('#view_cont_celu').mask("(00) 9.0000-0000", {placeholder: "(00) 9.0000-0000"});
/**visualização dos dados da contabilidade */
$(document).on('click', '.view_contabil', function(){  
    let user_id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>contabilidade/vew_dados_contador/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        {  
                $('.bd-edit_contabil-modal-lg').modal('show');  
                $('#view_cont_nome').val(data.contabil_nome_cont);  
                $('#view_cont_insc').val(data.contabil_insc_cont);
                $('#view_cont_ende').val(data.contabil_ende_cont);

                $('#view_cont_comp').val(data.contabil_comp_cont);  
                $('#view_cont_cida').val(data.contabil_cida_cont);
                $('#view_cont_esta').val(data.contabil_esta_cont);

                $('#view_cont_emai').val(data.contabil_emai_cont);  
                $('#view_cont_fixo').val(data.contabil_fixo_cont);
                $('#view_cont_celu').val(data.contabil_celu_cont);

                $('#view_cont_cont').val(data.contabil_cont_cont);  
                $('#view_cont_regi').val(data.contabil_regi_cont);
                $('#view_cont_id').val(data.contabil_id_cont);
 
                $('#user_id').val(user_id);  
        }  
    })  
}); 

/** envia as alterações ao controlador para serem validados */
$(document).on('submit', '#altera_dados_contabil', function(event){  
    event.preventDefault(); 
    var str = $("form").serialize();
    let id = $("input[name='view_cont_id']").val();

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
            url:"<?php echo base_url() . 'contabilidade/update_contabil/'?>" + id,
            type:'POST',
            dataType: "json",
            data: str,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg_up_contabil").css('display','none');
                    swal( data.success, {
                        icon: "success",
                        });
                    //$('#add_form_horas')[0].reset();
                }else{
                    $(".print-error-msg_up_contabil").css('display','block');
                    $(".print-error-msg_up_contabil").html(data.error);
                }
            }
        });
        
    } else {
        swal("Você desistiu de alterar!");
    }
    });
}); 
</script>
