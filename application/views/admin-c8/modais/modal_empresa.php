<!-- modal visualiza dados para alterar 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-view_dados_update-modal-lg">Large modal</button>
-->
<div class="modal fade bd-view_dados_update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados da empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- .//modal form -->
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome fantasia:</label>
                    <input type="text" class="form-control" name="get_data_empresa" id="get_data_empresa" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Inscrição estadual:</label>
                    <input type="text" class="form-control" name="get_data_inscric" id="get_data_inscric" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Razão social:</label>
                    <input type="text" class="form-control" name="get_data_razao" id="get_data_razao" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">CNPJ:</label>
                    <input type="text" class="form-control" name="get_data_cnpj" id="get_data_cnpj" disabled>
                </div>
            </div>
                 
            <div class="form-group col-md-12">
                <label for="inputAddress">Endereço:</label>
                <input type="text" class="form-control" name="get_data_endere" id="get_data_endere" disabled>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Número:</label>
                    <input type="number" class="form-control" name="get_data_numer" id="get_data_numer" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Complemento:</label>
                    <input type="text" class="form-control" name="get_data_comple" id="get_data_comple" disabled>
                </div>
            </div>
                  
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Cidade:</label>
                <input type="text" class="form-control" name="get_data_cidade" id="get_data_cidade" disabled>
                </div>

                <div class="form-group col-md-3">
                <label for="inputState">Estado:</label>
                    <select name="get_data_estado" id="get_data_estado" class="form-control" disabled>
                        <option selected>Selecione aqui...</option>
                        <?php
                            $query = $this->db->get('tbl_estados_brasil');
                            foreach ($query->result() as $row)
                            {
                                ?>
                                <option value="<?php echo $row->sigla;?>"><?php echo $row->nome;?></option>
                                <?php  
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputZip">CEP:</label>
                    <input type="text" class="form-control" name="get_data_cepe" id="get_data_cepe" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Email:</label>
                <input type="text" class="form-control" name="get_data_email" id="get_data_email" disabled>
                </div>
                <div class="form-group col-md-3">
                <label for="inputState">Telefone:</label>
                <input type="text" class="form-control" name="get_data_telefone" id="get_data_telefone" disabled>
                </div>
                <div class="form-group col-md-3">
                <label for="inputZip">Celeular:</label>
                <input type="text" class="form-control" name="get_data_celeular" id="get_data_celeular" disabled>
                </div>
            </div>

            <input type="hidden" name="user_id" id="user_id">

            <button type="submit" class="btn btn-primary" disabled>Salvar</button>
        </form> 
        <!-- .//modal fom fim -->
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>


<!-- modal altera dados da empresa 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-view_update_ok-modal-lg">Large modal</button>
-->
<div class="modal fade bd-view_update_ok-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar dados da empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- .//modal form -->
        <form method="post" id="update_form_empresa">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome fantasia:</label>
                    <input type="text" class="form-control" name="update_data_empresa" id="update_data_empresa" placeholder="Nome fantasia...">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Inscrição estadual:</label>
                    <input type="text" class="form-control" name="update_data_inscric" id="update_data_inscric" placeholder="Inscrição estadual...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Razão social:</label>
                    <input type="text" class="form-control" name="update_data_razao" id="update_data_razao" placeholder="Razão social:">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">CNPJ:</label>
                    <input type="text" class="form-control" name="update_data_cnpj" id="update_data_cnpj" data-mask="00.000.000/0001-00" selectonfocus="true" placeholder="CNPJ....">
                </div>
            </div>
                 
            <div class="form-group col-md-12">
                <label for="inputAddress">Endereço:</label>
                <input type="text" class="form-control" name="update_data_endere" id="update_data_endere" >
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Número:</label>
                    <input type="number" class="form-control" name="update_data_numer" id="update_data_numer">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Complemento:</label>
                    <input type="text" class="form-control" name="update_data_comple" id="update_data_comple">
                </div>
            </div>
                  
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Cidade:</label>
                <input type="text" class="form-control" name="update_data_cidade" id="update_data_cidade">
                </div>

                <div class="form-group col-md-3">
                <label for="inputState">Estado:</label>
                    <select name="update_data_estado" id="update_data_estado" class="form-control">
                        <option selected>Selecione aqui...</option>
                        <?php
                            $query = $this->db->get('tbl_estados_brasil');
                            foreach ($query->result() as $row)
                            {
                                ?>
                                <option value="<?php echo $row->sigla;?>"><?php echo $row->nome;?></option>
                                <?php  
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputZip">CEP:</label>
                    <input type="text" class="form-control" name="update_data_cepe" id="update_data_cepe">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">Email:</label>
                <input type="text" class="form-control" name="update_data_email" id="update_data_email">
                </div>
                <div class="form-group col-md-3">
                <label for="inputState">Telefone:</label>
                <input type="text" class="form-control" name="update_data_telefone" id="update_data_telefone">
                </div>
                <div class="form-group col-md-3">
                <label for="inputZip">Celeular:</label>
                <input type="text" class="form-control" name="update_data_celeular" id="update_data_celeular">
                </div>
            </div>

            <input type="hidden" name="user_id" id="user_id">

            <button type="submit" class="btn btn-primary">Alterar</button>
        </form> 
        <!-- .//modal fom fim -->
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="location.reload(true);" data-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>
<script>
 $(document).on('click', '.view_emp', function(){  
    var user_id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>adminSuper/getDadosEmpresa/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        { 
            $('.bd-view_dados_update-modal-lg').modal('show');  
            $('#get_data_empresa').val(data.dado_emp_nome);  
            $('#get_data_inscric').val(data.dado_emp_insc); 
            $('#get_data_razao').val(data.dado_emp_raza);  
            $('#get_data_cnpj').val(data.dado_emp_cnpj); 
            $('#get_data_endere').val(data.dado_emp_ende);  
            $('#get_data_comple').val(data.dado_emp_comp); 
            $('#get_data_numer').val(data.dado_emp_nume);  
            $('#get_data_cidade').val(data.dado_emp_cida); 
            $('#get_data_estado').val(data.dado_emp_esta);  
            $('#get_data_cepe').val(data.dado_emp_cepe); 
            $('#get_data_email').val(data.dado_emp_emai);
            $('#get_data_telefone').val(data.dado_emp_tele); 
            $('#get_data_celeular').val(data.dado_emp_celu);  
            $('#user_id').val(user_id);   
        }, 
        error: function () {
            alert('Error ao acessar');
        }
    })  
}); 

 $(document).on('click', '.update_empre', function(){  
    var user_id = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url(); ?>adminSuper/getDadosEmpresa/" + user_id,  
        method:"POST",  
        data:{user_id:user_id},  
        dataType:"json",  
        success:function(data)  
        { 
            $('.bd-view_update_ok-modal-lg').modal('show');  
            $('#update_data_empresa').val(data.dado_emp_nome);  
            $('#update_data_inscric').val(data.dado_emp_insc); 
            $('#update_data_razao').val(data.dado_emp_raza);  
            $('#update_data_cnpj').val(data.dado_emp_cnpj); 
            $('#update_data_endere').val(data.dado_emp_ende);  
            $('#update_data_comple').val(data.dado_emp_comp); 
            $('#update_data_numer').val(data.dado_emp_nume);  
            $('#update_data_cidade').val(data.dado_emp_cida); 
            $('#update_data_estado').val(data.dado_emp_esta);  
            $('#update_data_cepe').val(data.dado_emp_cepe); 
            $('#update_data_email').val(data.dado_emp_emai);
            $('#update_data_telefone').val(data.dado_emp_tele); 
            $('#update_data_celeular').val(data.dado_emp_celu);  
            $('#user_id').val(user_id);   
        }, 
        error: function () {
            alert('Error ao acessar');
        }
    })  
}); 

$(document).on('submit', '#update_form_empresa', function(event){  
    event.preventDefault(); 
    var update_data_empresa = $('#update_data_empresa').val();  
    var update_data_inscric = $('#update_data_inscric').val();
    var update_data_razao   = $('#update_data_razao').val();  
    var update_data_cnpj    = $('#update_data_cnpj').val();
    var update_data_endere  = $('#update_data_endere').val();  
    var update_data_comple  = $('#update_data_comple').val();
    var update_data_numer   = $('#update_data_numer').val();  
    var update_data_cidade = $('#update_data_cidade').val();
    var update_data_estado = $('#update_data_estado').val();  
    var update_data_cepe = $('#update_data_cepe').val();
    var update_data_email = $('#update_data_email').val();  
    var update_data_telefone = $('#update_data_telefone').val();
    var update_data_celeular = $('#update_data_celeular').val(); 
    var id = $('#user_id').val();
    swal({
        title: "Deseja alterar?",
        text: "Ao confirma os dados serão alterado de forma permanente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({  
                url:"<?php echo base_url(); ?>adminSuper/updateDadosEmpresa/" + id,  
                method:'POST',  
                data:new FormData(this),  
                contentType:false,  
                processData:false,   
                success:function(data)  
                {  
                    swal(data, {
                        icon: "success",
                    });  
                },
                error: function(xhr, er) {
                    alert('Error ao conectar dados: ' + xhr.statusText + ' - ' + xhr.status);
                }
        });
        } else {
            swal("Ops! Você desistiu de alterar.");
        }
    });

}); 
/**Deleta dados da empresa */
$(document).on('click', '.delete_empre', function(){  
    var user_id = $(this).attr("id"); 

    swal({
    title: "Deseja deletar?",
    text: "Ao confirmar essa ação será concluida de forma pemanente!",
    icon: "error",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        $.ajax({  
                url:"<?php echo base_url(); ?>adminSuper/delete_single_company/" + user_id,  
                method:"POST",  
                data:{user_id:user_id},  
                success:function(data)  
                {  
                    swal(data, {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    })
                },  
            });  
    } else {
        swal("Ops! Você desistiu de deletar!");
    }
    }); 
});  
</script>