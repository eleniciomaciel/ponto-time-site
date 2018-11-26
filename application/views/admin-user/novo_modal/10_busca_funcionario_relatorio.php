
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
              <div id="autoSuggestionsList"></div>
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

<script>
/**Busca o nome ou o cpf do funcionário */
function liveSearch() {
  let user_adm = "<?php echo $this->session->userdata('user')->id_inst_pw; ?>";
  let id = $('#id_fufu').val();
  var input_data = $('#search_data').val();
  if (input_data.length === 0) {
    $('#suggestions').hide();
  } else {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>relatorios/busca_funcionario/" + id,
        data: {search_data: input_data, user_adm:user_adm},
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