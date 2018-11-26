<!-- Modal lista menu dos relatórios -->
<div class="modal fade" id="relatoriosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="" id="exampleModalLabel">
            <span class="elusive icon-list-alt"></span>&nbsp;Relatórios
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    <!-- Modal -->
    <a href="#"  class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#pesquisaFuncionarioIndividual">
        Relatório de presença individual
    </a>
    <br>
    <a href="#" class="btn btn-success btn-lg btn-block">
        Relatório geral
    </a>
    <br>
    <a href="#" class="btn btn-warning btn-lg btn-block">
    Relatório de fotos
    </a>  
    <!-- Modal -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <span class="elusive icon-remove"></span>&nbsp;Sair</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Busca funcionario da empresa para ver relatório-->
<div class="modal fade" id="pesquisaFuncionarioIndividual" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="" id="exampleModalLongTitle">
            <span class="elusive icon-address-book"></span>&nbsp;Buscar funcionário
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

        <label for=""><span class="elusive icon-adult"></span>&nbsp;Nome:</label>
      <div class="input-group">
            <span class="input-group-addon">
            <span class="elusive icon-pencil"></span>&nbsp;
            </span>
            <input type="text" id="search_data" name="search-term" onkeyup="liveSearch()" autocomplete="off" class="form-control" placeholder="Digite o nome do funcionário ou cpf...">
            
            <input type="hidden" name="id_fufu" id="id_fufu" value="<?php echo $this->session->userdata('user')->id_inst_pw;?>">
        </div>
        <br>
        <div id="suggestions">
              <div id="autoSuggestionsList">
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span>&nbsp;Sair</button>
        </button>
      </div>
    </div>
  </div>
</div>



<!-- listagen de todos os dados do funcionário para consultar -->
<div class="modal fade" id="modalAllData" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="">Dados do funcionário</h4>
      </div>
      <div class="modal-body">
        <!-- form consulta dados -->
      <form>
        <div class="form-row">

        <div class="input-group col-md-12">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Buscar</button>
          </span>
          <input type="text" class="form-control">
        </div>

<br>
        <div class="form-row">

          <div class="form-group col-md-4">
            <label for="inputCity">Funcionário</label>
            <input type="text" class="form-control" id="inputCity">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">CTPS</label>
            <input type="text" class="form-control" id="inputCity">
          </div>

          <div class="form-group col-md-4">
            <label for="inputZip">CPF</label>
            <input type="text" class="form-control" id="inputZip">
          </div>

          <div class="form-group col-md-4">
            <label for="inputCity">PIS</label>
            <input type="text" class="form-control" id="inputCity">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">Cargo</label>
            <input type="text" class="form-control" id="inputCity">
          </div>

          <div class="form-group col-md-4">
            <label for="inputZip">Telefone</label>
            <input type="text" class="form-control" id="inputZip">
          </div>

        </div>

        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>
      </form> 

<!-- fim form consulta dados -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
/**Busca o nome ou o cpf do funcionário */
function liveSearch() {
  let id = $('#id_fufu').val();
  var input_data = $('#search_data').val();
  if (input_data.length === 0) {
    $('#suggestions').hide();
  } else {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>relatorios/busca_funcionario/" + id,
        data: {search_data: input_data},
        success: function (data) {
        // return success
          if (data.length > 0) {
            $('#suggestions').show();
            $('#autoSuggestionsList').addClass('auto_list');
            $('#autoSuggestionsList').html(data);
          }
        }
    });
  }
 }  
</script>

<script>
 //** busca os dados do funcionário e mostra na lista */
 $(document).on('click', '.dados_relatorio_fun', function(){  
           let user_id = $(this).attr("id"); 
           $.ajax({  
                url:"<?php echo base_url(); ?>relatorios/busca_dados_all_one/" + user_id,  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#modalAllData').modal('show');  
                     $('#first_name').val(data.first_name);  
                     $('#last_name').val(data.last_name);  
                     $('.modal-title').text("Dados do funcionário");  
                     $('#user_id').val(user_id);  
                     $('#user_uploaded_image').html(data.user_image);  
                     $('#action').val("Edit");  
                }  
           })  
      });
</script>