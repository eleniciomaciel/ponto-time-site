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
                        <?php echo form_open('funcionarios/add_funcionario', array('id' => 'form_funcionario')); ?>
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

                        <input type="hidden" name="id_company" id="id_company" value="<?php echo $this->session->userdata('user')->id_inst_pw; ?>">

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

<!-- ##################################################  Turno do funcinário $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->

<div class="modal fade bd-turno_funcionario-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Turno do funcinário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- *******************  header campo de click para o modal dos cadastros *******************************-->
                <div class="data-block">
                    <header>
                        <h2>Adicionar funcionário ao turno</h2>
                        <ul class="data-header-actions">
                            <li>
                                <a href="#" class="view_turno_funcionario_cadastro" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>" >
                                    <span class="elusive icon-zoom-in"></span>&nbsp;Ver turnos
                                </a>
                            </li>
                        </ul>
                    </header>
                    <section>

                        <!--  -->
                        <form role="form" id="add_turno_fufuci">

                            <!-- Input group with left addon -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-zoom-in"></span> 
                                </span>
                                <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Buscar funcionário aqui...">
                            </div>
                            <p class="help-block">Digite o número do cpf do funcionário para fazer a busca!</p>
                            <!-- /@@@@@@@@@@@@@@@@@@@@@@   apresenta o resultado da busca @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

                            <div id="result"></div>
                            <br>
                            <div style="clear:both"></div>
                            <!-- /@@@@@@@@@@@@@@@@@@@@@@   apresenta o resultado da busca @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
                            <!-- Input group with dropdown -->
                            <label for="">Adicione o turno do funcionário:</label>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-cogs"></span> 
                                </span>
                                <select class="form-control" name="select_turno_fun" id="select_turno_fun" required>
                                    <option value="" selected="" disabled="">Selecione aqui...</option>
                                    <?php
                                    $is = $this->session->userdata('user')->id_inst_pw;
                                    $this->db->select('nome_tn, id_tn');
                                    $this->db->from('tbl_turno');
                                    $this->db->where('fk_user_rh_empresa_tn', $is);
                                    $query = $this->db->get();

                                    foreach ($query->result() as $row) {
                                        ?>
                                        <option value="<?php echo $row->id_tn; ?>"><?php echo $row->nome_tn; ?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- /Input group with dropdown -->

                            <br>

                            <!-- Input group with both addons -->
                            <label for="">Salário báse:</label>
                            <div class="input-group">
                                <span class="input-group-addon">R$</span>
                                <input type="number" name="salario_fun" id="salario_fun" class="form-control" required>
                                <span class="input-group-addon">.00</span>
                            </div>
                            <!-- /Input group with both addons -->

                            <br>

                            <label for="">Data da admissão:</label>
                            <!-- Masked input -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-calendar"></span> 
                                </span>
                                <input type="date" name="fun_data" id="fun_data" class="form-control" required>
                            </div>
                            <!-- /Masked input -->

                            <br>

                            <label for="">Selecione um cargo:</label>
                            <!-- Masked input -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="elusive icon-wrench"></span> 
                                </span>
                                <select class="form-control" name="select_cargo" id="select_cargo" required>
                                    <option value="" selected="" disabled="">Selecione aqui...</option>
                                    <?php
                                    $cg = $this->session->userdata('user')->id_inst_pw;
                                    $this->db->select('nome_cg,id_cg');
                                    $this->db->from('tbl_cargos');
                                    $this->db->where('fk_employer_cg', $cg);
                                    $cargo = $this->db->get();

                                    foreach ($cargo->result() as $cag) {
                                        ?>
                                        <option value="<?php echo $cag->id_cg; ?>"><?php echo $cag->nome_cg; ?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- /Masked input -->
                            <input type="hidden" name="id_rh" id="id_rh">
                            <input type="hidden" name="id_fun_rh_empresa" id="id_fun_rh_empresa">
                            <br>
                            <button type="submit" class="btn btn-lg btn-info">
                                <span class="elusive icon-ok"></span>  Salvar
                            </button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msg_fun_tur" style="display:none"></div>
                    </section>
                </div>
                <!-- form cadastro -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <span class="elusive icon-remove"></span> Fechar
                </button>
            </div>
        </div>
    </div>
</div>


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  Modal visualiza turnos cadastrados   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<div class="modal fade bd-view_fun_turno-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Turno dos funcionários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- tabela funcionarios no turno -->

                <div class="data-block">
                    <header>
                        <h2>Turnos e funcionários</h2>
                        <form class="header-search">
                            <input type="text" name="search_text2" id="search_text2" placeholder="Buscar...">
                        </form>
                    </header>
                    <section>
                        <div id="result2"></div>
                        <div style="clear:both"></div>
                    </section>
                    <footer>
                        <p>
<?php
$rh = $this->session->userdata('user')->id_inst_pw;
//$this->db->like('id_tf', 'match');
$this->db->from('tbl_turno_funcionario');
$this->db->where('fk_tblusuario_rh_instituicao_tf', $rh);
echo 'Você têm ' . $this->db->count_all_results() . ' turnos cadastrados.';
?>
                        </p>
                    </footer>
                </div>

                <!-- tabela funcionarios no turno -->
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
    function myReloadAdd() {
        location.reload();
    }
</script>
<script>
    /**ok */
    $('#fun_tele').mask("(00) 9.0000-0000", {placeholder: "(00) 9.0000-0000"});
    $('#fun_cpf').mask("000.000.000-00", {placeholder: "000.000.000-00"});
    $('#fun_pis').mask('000.00000.00-00', {placeholder: "000.000.000-00"});
    $('#search_text').mask('000.00000.00-00', {placeholder: "000.000.000-00"});

    /**Levanta modal adiciona funcionário com id da empresa via ajax */
    $(document).on('click', '.view_add_fun_com_empresa', function () {
        var user_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url(); ?>funcionarios/levanta_dados_modal/" + user_id,
            method: "POST",
            data: {user_id: user_id},
            dataType: "json",
            success: function (data)
            {
                $('.bd-add_funcionario-modal-lg').modal('show');
                $('#empresa_id').val(data.id_da_empresa);
            },
            error: function (xht, er) {
                alert('Error na conecxão: ' + xht.status + ' - ' + xhr.statusText + ' Tipo de error-> ' + er);
            }
        });
    });
    /**ok */
    $('#form_funcionario').submit(function (e) {
        e.preventDefault();
        var me = $(this);
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    swal("Parabéns!", "Cadastro efetuado com sucesso!", "success");
                    $('#form_funcionario')[0].reset();
                } else {
                    $.each(response.messages, function (key, value) {
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

    /**get funcionario e modal turno do funcionario adiciona */
    $(document).on('click', '.view__turno_func', function () {
        let
        id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>turno_funcionario/get_funcionario_and_rh/" + id,
                    method: "POST",
                    data: {id: id},
                    dataType: "json",
                    success: function (data)
                    {
                        $('.bd-turno_funcionario-modal-lg').modal('show');
                        $('#my_name_rh').val(data.name_rh);
                        $('#my_id_funcionario').val(data.id_func);
                        $('#id_fun_rh_empresa').val(data.empr_id);
                        $('#id_rh').val(id);
                    }
                })
    });

    /**adicionando o funcionario ao turno */
    $('#add_turno_fufuci').submit(function (e) {
        e.preventDefault();
        var str = $("#add_turno_fufuci").serialize();

        $.ajax({
            url: "<?php echo base_url(); ?>turno_funcionario/add_turno_funcionario",
            type: 'POST',
            dataType: "json",
            data: str,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg_fun_tur").css('display', 'none');
                    swal("Parabéns!", data.success, "success");
                    $('#add_turno_fufuci')[0].reset();
                } else {
                    $(".print-error-msg_fun_tur").css('display', 'block');
                    $(".print-error-msg_fun_tur").html(data.error);
                }
            }
        });
    });
    /** Visualiza o modal funcionários nos tr=urnos cadastrados */
    $(document).on('click', '.view_turno_funcionario_cadastro', function () {
        let
        user_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>turno_funcionario/get_all_turno_cadastro/" + user_id,
                    method: "POST",
                    data: {user_id: user_id},
                    dataType: "json",
                    success: function (data)
                    {
                        $('.bd-view_fun_turno-modal-lg').modal('show');
                        $('#id_user_rh_01').val(data.veryfy_id_rh);
                    }
                })
    });
</script>
<script>
    load_data();

    function load_data(query)
    {
        $.ajax({
            url: "<?php echo base_url(); ?>turno_funcionario/busca_funcionario",
            method: "POST",
            data: {query: query},
            success: function (data) {
                $('#result').html(data);
            }
        })
    }

    $('#search_text').keyup(function () {
        var search = $(this).val();
        if (search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();
        }
    });
</script>

<script>
    load_data2();

    function load_data2(query)
    {
        $.ajax({
            url: "<?php echo base_url(); ?>turno_funcionario/list_tabel_fun_turno",
            method: "POST",
            data: {query: query},
            success: function (data) {
                $('#result2').html(data);
            }
        })
    }

    $('#search_text2').keyup(function () {
        var search2 = $(this).val();
        if (search2 != '')
        {
            load_data2(search2);
        }
        else
        {
            load_data2();
        }
    });
</script>