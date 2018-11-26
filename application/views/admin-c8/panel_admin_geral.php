<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$this->load->view('style-admin/header-admin');
?>
<!-- Full height wrapper -->
<div id="wrapper">

    <!-- Main page header -->
    <header id="header" class="container">

        <h1>
            <!-- Main page logo -->
            <a href="#">Ponto Time</a>
        </h1>

        <!-- User profile -->
        <div class="user-profile">
            <figure>

                <!-- User profile avatar -->
                <?php
                if ($this->session->userdata('user')->file_pw != '') {
                    echo '<img src="' . base_url() . 'stylus/img/files_user/' . $this->session->userdata('user')->file_pw . '" class="img-responsive" width="60" height="60" />';
                } else {
                    echo '<img alt="John Pixel avatar" src="http://placekitten.com/60/60">';
                }
                ?>
                <!-- User profile info -->
                <figcaption>
                    <?php
                    if (null != $this->session->userdata('logado')) {
                        ?>
                        <strong><a href="#"> <?php echo $this->session->userdata('user')->nome_user_pw; ?></a></strong>
                        <?php
                    } else {
                        //$this->load->view('login_access');
                        redirect('/welcome/index/');
                    }
                    ?>
                    <ul>
                        <li>
                            <a href="#" title="Configurações de perfíl" class="login_dados_user" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>">Perfíl</a>
                        </li>
                        <li><a href="<?php echo site_url('sair'); ?>" title="Sair">Sair</a></li>
                    </ul>
                </figcaption>
                <!-- /User profile info -->

            </figure>
        </div>
        <!-- /User profile -->

        <!-- Main navigation -->

        <!-- /Main navigation -->

    </header>
    <!-- /Main page header -->
    <section class="container">
        <div class="col-sm-12">

            <!-- Grid row -->
            <div class="row">

                <!-- Widget block -->
                <div class="col-sm-4 col-xs-6">
                    <a class="data-block widget-block" href="#"  data-toggle="modal" data-target=".bd-example-modal-lg">
                        <span class="badge"><?php echo $this->db->count_all('tbl_dados_instituicao'); ?></span>
                        <span class="widget-icon elusive icon-file-new-alt"></span>
                        <strong>Adicionar Instituição</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-4 col-xs-6">
                    <a class="data-block widget-block" href="#" data-toggle="modal" data-target="#add_User">

                        <span class="widget-icon elusive icon-address-book-alt"></span>
                        <strong>Cadastrar usuários</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block -->
                <div class="col-sm-4 col-xs-6">
                    <a href="#" class="data-block widget-block"  data-toggle="modal" data-target=".bd-novo_modal_26-modal-lg">
                        <span class="badge"><?php echo $this->db->count_all('tbl_dados_inst_pw_instuicao'); ?></span>
                        <span class="widget-icon elusive icon-group-alt"></span>
                        <strong>Usuários</strong>
                    </a>
                </div>
                <!-- /Widget block -->

                <!-- Widget block 
                        <div class="col-sm-3 col-xs-6">
                            <a class="data-block widget-block" href="#">
                                <span class="widget-icon elusive icon-globe-alt"></span>
                                <strong>Cidades usuários</strong>
                            </a>
                        </div>
                        /Widget block -->

            </div>
        </div>
    </section>
    <!-- Main page container -->
    <section class="container" role="main">
        <!-- Grid row -->
        <div class="row">

            <!-- Data block -->
            <article class="table-responsive-sm col-sm-12">
                <div class="dark data-block">
                    <header>
                        <h2>Empresas cadastradas</h2>
                    </header>
                    <section>

                        <table class="datatable table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>CNPJ</th>
                                    <th>Telefone(s)</th>
                                    <th>E-mail</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('tbl_dados_inst_pw_instuicao');
                                $this->db->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw');
                                $this->db->where('nivel_user_pw !=', 1);
                                $this->db->group_by("id_inst");
                                $query = $this->db->get();

                                // $query = $this->db->get('tbl_dados_instituicao');

                                foreach ($query->result() as $row) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row->nome_inst; ?></td>
                                        <td><?php echo $row->cnpj_inst; ?></td>
                                        <td><?php echo $row->celular_inst; ?></td>
                                        <td><?php echo $row->email_inst; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="view_emp btn btn-sm" title="Visualizar" id="<?php echo $row->id_inst; ?>">
                                                    <span class="elusive icon-eye-open"></span>
                                                </button>
                                                <button class="update_empre btn btn-sm" title="Alterar" id="<?php echo $row->id_inst; ?>">
                                                    <span class="elusive icon-pencil"></span>
                                                </button>
                                                <button class="delete_empre btn btn-sm" title="Deletar" id="<?php echo $row->id_inst; ?>">
                                                    <span class="elusive icon-trash"></span>
                                                </button>
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

        </div>
        <!-- /Grid row -->

    </section>
    <!-- /Main page container -->

</div>
<!-- /Full height wrapper -->
<!-- /Modais -->
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar instituição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- //form -->
                <form id="add_empresa_admin_005">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nome fantasia:</label>
                            <input type="text" class="form-control" name="cadast_fantasy" id="cadast_fantasy" placeholder="Ex.: C8 - Sistemas" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cadast_instituicao">Inscrição estadual:</label>
                            <input type="text" class="form-control" name="cadast_instituicao" id="cadast_instituicao" data-mask="00.000.000.0" placeholder="Ex.: 02.232.335.5" required>
                        </div>
                    </div><!-- //fim form -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cadast_razao">Razão social:</label>
                            <input type="text" class="form-control" name="cadast_razao" id="cadast_razao" placeholder="Ex.: C8 - Sistemas" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cadast_cnpj">CNPJ:</label>
                            <input type="text" class="form-control" name="cadast_cnpj" id="cadast_cnpj" data-mask="00.000.000/0001-00" selectonfocus="true" placeholder="Ex.: 65.454.863/0001-84" required>
                        </div>
                        <!-- //fim form -->
                    </div>

                    <div class="form-group col-md-12">
                        <label for="cadast_endereco">Endereço:</label>
                        <input type="text" class="form-control" name="cadast_endereco" id="cadast_endereco" placeholder="1234 Main St" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Complemento:</label>
                            <input type="text" class="form-control" name="cadast_compl" id="cadast_compl" placeholder="Ex.: Apartamento A" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cadast_numero">Nº.:</label>
                            <input type="number" class="form-control" name="cadast_numero" id="cadast_numero" placeholder="Ex.: 84" required>
                        </div>
                    </div><!-- //fim form -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cadast_City">Cidade:</label>
                            <input type="text" class="form-control" name="cadast_City" id="cadast_City" placeholder="Ex.: Salvador" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cadast_Statess">Estado:</label>
                            <select class="form-control" name="cadast_State" id="cadast_State" required>
                                <option selected="" disabled="" value="">Selecione aqui...</option>
                                <?php
                                $query = $this->db->get('tbl_estados_brasil');
                                foreach ($query->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->sigla; ?>"><?php echo $row->nome; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cadast_Zip">CEP</label>
                            <input type="text" class="form-control" name="cadast_Zip" id="cadast_Zip" data-mask="00.000-000" placeholder="Ex.: 58.000-000" required>
                        </div>

                    </div><!-- //fim form -->

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="input_mail">Email:</label>
                            <input type="email" class="form-control" name="input_mail" id="input_mail" placeholder="Ex.: ana@mail.com" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input_tel">Telefone:</label>
                            <input type="tel" class="form-control" name="input_tel" id="input_tel" data-mask="(00) 0000-0000" placeholder="Ex.: (00) 3232-3232" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input_cel">Celeular</label>
                            <input type="tel" class="form-control" name="input_cel" id="input_cel" data-mask="(00) 9.0000-0000" placeholder="Ex.: (00) 9.1234-1234" required>
                        </div>

                    </div><!-- //fim form -->

                    <div id="the-message"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
                <br>
                <div class="alert alert-danger print-error-msg_empresa_005" style="display:none"></div>
                <!-- //fim form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="location.reload(true);" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal usuarios ===========================================================================================-->

<div class="modal fade" id="add_User" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //add form user -->
                <form method="post" id="adicionando_rh_da_empresa_006">

                    <div class="form-group">
                        <label for="input_nome_user">Nome completo:</label>
                        <input type="text" class="form-control" name="input_nome_user" id="input_nome_user" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">Nome completo do usuário.</small>
                    </div>

                    <div class="form-group">
                        <label for="email_rh">Email:</label>
                        <input type="email" class="form-control" name="email_rh" id="email_rh" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">Digite um email válido.</small>
                    </div>

                    <div class="form-group">
                        <label for="key_words">Chave de acesso:</label>
                        <input type="text" class="form-control" name="key_words" id="key_words" aria-describedby="emailHelp" placeholder="Ex.: MeuAcesso">
                        <small id="accs" class="form-text text-muted">digite um frase para acesso dos usuários.</small>
                    </div>

                    <div class="form-group">
                        <label for="password_rh">Senha:</label>
                        <input type="text" class="form-control" name="password_rh" id="password_rh" placeholder="Digite uma senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                        <small id="emailHelp" class="form-text text-danger">A senha deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres.</small>
                    </div>

                    <div class="form-group">
                        <label for="instituicaoSelect1">Selecione uma instituição</label>
                        <select class="form-control" name="instituicaoSelect1" id="instituicaoSelect1">
                            <option value="" selected disabled>Selecione aqui...</option>
                        <?php
                        $query = $this->db->get('tbl_dados_instituicao');

                        foreach ($query->result() as $row) {
                            ?>
                                <option value="<?php echo $row->id_inst; ?>"><?php echo $row->nome_inst; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nivelControlSelect1">Selecione um nível</label>
                        <select class="form-control" name="nivelControlSelect1" id="nivelControlSelect1">
                            <option value="" selected disabled>Selecione aqui...</option>
                            <option value="1">Administrador C8</option>
                            <option value="2">Usuário C8</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
                <!-- //fim add form user -->
                <br>
                <div class="alert alert-danger print-error-msg_dd_rh_006" style="display:none"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="location.reload(true);" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>



<!--  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!   Novo modal 26/10/2018 - 07:43  Ver RH cacastrados !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<div class="modal fade bd-novo_modal_26-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="" id="exampleModalLabel">Listagem dos RH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- inicio Tabela listagem dos RG -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nomes</th>
                            <th>Empresa</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_dados_inst_pw_instuicao');
                    $this->db->join('tbl_dados_instituicao', 'tbl_dados_instituicao.id_inst = tbl_dados_inst_pw_instuicao.fk_user_pw');
                    $this->db->where('nivel_user_pw !=', 1);
                    $query = $this->db->get();

                    foreach ($query->result() as $row)
                    {
                        ?>
                        <tr>
                        <th><?php echo $row->id_inst_pw;?></th>
                            <th><?php echo $row->nome_user_pw;?></th>
                            <td><?php echo $row->nome_inst;?></td>
                            <td>
                                <?php 
                            if ($row->status_user_pw == 1) {
                                echo $row->status_user_pw = "<span class='label label-success'>Ativa(o)</span>";
                            } else {
                                echo $row->status_user_pw = "<span class='label label-danger'>Acesso suspenso</span>";
                            }
                            
                                ?>
                            </td>
                            <td>
                            
                            <div class="btn-group dropup">
                                <button class="btn btn-info">Opções</button><button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-blue pull-right">
                                    <li>
                                        <a href="#" class="ver_usuario_001" id="<?php echo $row->id_inst_pw;?>">
                                            <span class="elusive icon-eye-open"></span>&nbsp;Visualizar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="ver_usuario_up_002" id="<?php echo $row->id_inst_pw;?>">
                                            <span class="elusive icon-pencil"></span>&nbsp;Alterar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="permission_status_ver" id="<?php echo $row->id_inst_pw;?>">
                                            <span class="elusive icon-check"></span>&nbsp;Permissão de acesso
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="ver_usuario_altera_password" id="<?php echo $row->id_inst_pw;?>">
                                            <span class="elusive icon-refresh"></span>&nbsp;Alterar senha
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" class="delete_rh_user_given" id="<?php echo $row->id_inst_pw;?>">
                                            <span class="elusive icon-trash"></span>&nbsp;Deletar
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
            </div>
        <!-- Fim tabela listagem do RH -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span>&nbsp;Fechar
        </button>
      </div>
    </div>
  </div>
</div>
<!-- final modal rh 26/10/2018 07:43 -->

<!-- //modal ver rh cadastrado -->
<div class="modal fade" id="ver_rh_cadastrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do RH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- //form dados do rh só ver-->
        <div class="dark data-block">
            <header>
                <h2><span class="elusive icon-check"></span> Dados do cadastro</h2>
            </header>
            <section>

    

                <!-- Form validation demo -->
                <form>
                    <div class="form-group">
                        <label for="view_new_001_v_name">Nome</label>
                        <input type="email" class="form-control" id="view_new_001_v_name" name="view_new_001_v_name" disabled="">
                    </div>

                    <div class="form-group">
                        <label for="view_new_001_v_emai">Email</label>
                        <input type="email" class="form-control" name="view_new_001_v_emai" id="view_new_001_v_emai" disabled="">
                    </div>

                    <div class="form-group">
                        <label for="view_new_001_v_nive">Nível</label>
                        <input type="text" class="form-control" name="view_new_001_v_nive" id="view_new_001_v_nive" disabled="">
                    </div>

                    <div class="form-group">
                        <label for="view_new_001_v_empr">Instituição</label>
                        <input type="text" class="form-control" name="view_new_001_v_empr" id="view_new_001_v_empr" disabled="">
                    </div> 

                    <div class="form-group">
                        <label for="view_new_001_v_key">Chave de acesso</label>
                        <textarea class="form-control" name="view_new_001_v_key" id="view_new_001_v_key" rows="3" readonly="readonly"></textarea>
                    </div>

                </form>
                <!-- /Form validation demo -->
            </section>
        </div>
        <!-- fim form dados do rh só ver -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="elusive icon-remove"></span>&nbsp;Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal ver rh cadastrado -->

<!-- //modal ver e altera o rh cadastrado -->
<div class="modal fade" id="up_rh_cadastrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  -->
        <!-- //form dados do rh só ver-->
        <div class="dark data-block">
            <header>
                <h2><span class="elusive icon-check"></span> Dados do cadastro</h2>
            </header>
            <section>

                <!-- Form validation demo     view_new_up_001_v_empr  id_up_002_v-->
                <form id="altera_dados_rh">
                    <div class="form-group">
                        <label for="view_new_up_001_v_name">Nome</label>
                        <input type="text" class="form-control" name="view_new_up_001_v_name" id="view_new_up_001_v_name"  placeholder="Nome completo..." required>
                        
                    </div>

                    <div class="form-group">
                        <label for="view_new_up_001_v_emai">Email</label>
                        <input type="email" class="form-control" name="view_new_up_001_v_emai" id="view_new_up_001_v_emai" placeholder="E-mail pessol..." required>
                    </div>

                    <div class="form-group">
                        <label for="view_new_up_001_v_key">Nova chave</label>
                        <textarea class="form-control" name="view_new_up_001_v_key" id="view_new_up_001_v_key" rows="3" required></textarea>
                        <small id="emailHelp" class="form-text text-muted">Digite qualquer texto sem acentos e no mínimo 3 e no maxmo 10 caracter.</small>
                    </div>

                    <div class="form-group">
                        <label for="view_new_up_001_v_empr">Selecione uma instituição</label>
                        <select class="form-control" name="view_new_up_001_v_empr" id="view_new_up_001_v_empr" required>
                            <option value="" selected disabled>Selecione aqui...</option>
                            <?php
                            $query_cons = $this->db->get('tbl_dados_instituicao');

                            foreach ($query_cons->result() as $row_cons) {
                                ?>
                                <option value="<?php echo $row_cons->id_inst; ?>"><?php echo $row_cons->nome_inst; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="view_new_up_001_v_nive">Selecione um novo nível</label>
                        <select class="form-control" name="view_new_up_001_v_nive" id="view_new_up_001_v_nive" required>
                            <option value="" selected disabled>Selecione aqui...</option>
                            <option value="1">Administrador C8</option>
                            <option value="2">Usuário RH</option>
                        </select>
                    </div> 

                    <input type="hidden" name="id_up_002_v" id="id_up_002_v">

                    <button type="submit" class="btn btn-primary">
                        <span class="elusive icon-refresh"></span>&nbsp;Alterar
                    </button>
                    
                </form>
                <br>
                    <div class="alert alert-danger print-error-msg_rh" style="display:none"></div>
                <!-- /Form validation demo -->
            </section>
        </div>
        <!-- fim form dados do rh só ver -->
        <!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="elusive icon-remove"></span>&nbsp;Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal ver e altera o rh cadastrado -->






<!-- Mini modal alpera permissão do usuário    -->

<div class="modal fade bd-permissao_user_mini-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altera pemissão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--  formulario permissãi-->
        <div class="well">
            <strong id="status_name_user003"></strong>
        </div>

        <form role="form" id="altera_status_user">
            <fieldset>

                <div class="form-group">
                    <label for="status_user_ver_04">Status do acesso</label>
                    <select class="form-control" name="status_user_ver_04" id="status_user_ver_04" required>
                        <option value="" selected disabled>Selecione aqui...</option>
                            <option value="1">Ativo</option>
                            <option value="0">Acesso suspenso</option>
                    </select>
                </div>
                <input type="hidden" name="id_up_004_v" id="id_up_004_v">
                
                <button type="submit" class="btn btn-primary">Alterar status</button>

            </fieldset>
        </form>
        <br>
        <div class="alert alert-danger print-error-msg_status" style="display:none"></div>
        <!-- //fim form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span class="elusive icon-remove"></span>&nbsp;Fechar
        </button>
      </div>
    </div>
  </div>
</div>
<!-- fim mini modal altera permissão ,do usuário 28/10/2018 : 02:48 madrugada -->






<!-- //modal update na senha -->
<div class="modal fade" id="up_pass_rh_cadastrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar senha de acesso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Dados Nova senha -->
        <div class="orange data-block">
            <header>
                <h2>Nova senha</h2>
            </header>
            <section>
                

                <!-- Inline form -->
                <form class="form-inline" role="form" id="up_senha_passord_nova_user">
                <p>Usuário atual: <b id="pw_name_user003"> </b> </p>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="elusive icon-envelope"></span></button>
                        </span>
                        <input type="email" class="form-control" name="view_new_001_pw_emai" id="view_new_001_pw_emai" placeholder="Novo email">
                    </div>
<br>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="elusive icon-unlock"></span></button>
                        </span>
                        <input type="text" class="form-control" name="new_passord_ppw_003" id="new_passord_ppw_003" placeholder="Nova senha">
                    </div> 
                    <small id="emailHelp" class="form-text text-muted">A nova senha deve conter uma ou mais letras maíuscula e minusculas, deve conter números.Total de 8 ou mais caracteres.</small>    
                    <br>              
                    <button type="submit" class="btn btn-info">
                        <span class="elusive icon-refresh"></span>&nbsp;Alterar
                    </button>
                    <input type="hidden" name="id_up_003_v" id="id_up_003_v">
                </form>
                <br>
                <div class="alert alert-danger print-error-msg_pw_new" style="display:none"></div>
                <!-- /Inline form -->

            </section>
        </div>
        <!-- //fim dados nova senha -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="elusive icon-remove"></span>&nbsp;Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal ver e altera o rh cadastrado -->

<!-- Listagem dos usuários do modal ==============================================================================-->
<div class="modal fade bd-list_user-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuários cadastrados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- //tabela listagem usuários -->
                <div class="table-responsive">
                    <div id="lerEventos"></div>				
                </div>
                <!-- //fim tabela listagem dos usuários -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('style-admin/footer-admin');
?>
<script>
/**
Novos dados 27/10/2018 23:04
 */


/**Adicionando instituição novo cadastro 28/10/2018 11:02 */

$(document).on('submit', '#add_empresa_admin_005', function(event){  
    event.preventDefault();  
    var str_dd_empresa = $( "form" ).serialize();

        $.ajax({
            url:"<?php echo base_url(); ?>usuarios_admin/add_novos_usuarios_005",  
            type:'POST',
            dataType: "json",
            data: str_dd_empresa,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg_empresa_005").css('display','none');

                    swal("OK", "Empresa inserida com sucesso!", "success");
                    $('#add_empresa_admin_005')[0].reset();
                    /*
                    swal({title: "OK", text: "Empresa inserida com sucesso!", type: 
                        "success"}).then(function(){ 
                        location.reload();
                        }
                    );
                    */

                }else{
                    $(".print-error-msg_empresa_005").css('display','block');
                    $(".print-error-msg_empresa_005").html(data.error);
                }
            }
        });
}); 


/**Inserindo usuário na empresa tipo dados rh */
$(document).on('submit', '#adicionando_rh_da_empresa_006', function(event){  
    event.preventDefault();  
    var str_dd_rh = $( "form" ).serialize();

        $.ajax({
            url:"<?php echo base_url(); ?>usuarios_admin/add_rh_usuarios_006",  
            type:'POST',
            dataType: "json",
            data: str_dd_rh,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msg_dd_rh_006").css('display','none');
                    swal("OK", "Usuário inserido com sucesso!", "success");
                    $('#adicionando_rh_da_empresa_006')[0].reset();
                }else{
                    $(".print-error-msg_dd_rh_006").css('display','block');
                    $(".print-error-msg_dd_rh_006").html(data.error);
                }
            }
        });
}); 

 /**Busca os dados do usuário para mostrar no modal, apenas visualização */
 $(document).on('click', '.ver_usuario_001', function(){  
           let id_001 = $(this).attr("id"); 
           $.ajax({  
                url:"<?php echo base_url(); ?>usuarios_admin/ver_usuarios__rh/" + id_001,  
                method:"GET",  
                data:{id_001:id_001},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#ver_rh_cadastrado').modal('show');  
                     $('#view_new_001_v_name').val(data.user_001_v_nome);  
                     $('#view_new_001_v_emai').val(data.user_001_v_emai);  
                     $('#view_new_001_v_nive').val(data.user_001_v_nive);  
                     $('#view_new_001_v_empr').val(data.user_001_v_empr); 
                     $('#view_new_001_v_key').val(data.user_001_v_key); 
                     
                }, 
                error: function(er, xhr){
                    alert("Error de acesso: " + xhr.status + " - " + xhr.statusText + "- Tpo de error = " + er);
                } 
           })  
      }); 

 /**Busca os dados do usuário para mostrar no modal, visualização para update*/
 
 $(document).on('click', '.ver_usuario_up_002', function(){  
           let id_002 = $(this).attr("id"); 
           $.ajax({  
                url:"<?php echo base_url(); ?>usuarios_admin/ver_usuarios__rh/" + id_002,  
                method:"GET",  
                data:{id_002:id_002},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#up_rh_cadastrado').modal('show');  
                     $('#view_new_up_001_v_name').val(data.user_001_v_nome);  
                     $('#view_new_up_001_v_emai').val(data.user_001_v_emai);  
                     $('#view_new_up_001_v_nive').val(data.user_001_v_nive_up);  
                     $('#view_new_up_001_v_empr').val(data.user_001_v_empr_up); 
                     $('#view_new_up_001_v_key').val(data.user_001_v_key); 
                     $('#id_up_002_v').val(id_002);  
                }, 
                error: function(er, xhr){
                    alert("Error de acesso: " + xhr.status + " - " + xhr.statusText + "- Tpo de error = " + er);
                } 
           })  
      });  

/**Envia os dados para serem alterados do rh */
$(document).on('submit', '#altera_dados_rh', function(event){  
    event.preventDefault(); 

    let str = $( "#altera_dados_rh" ).serialize();
    let id = $("input[name='id_up_002_v']").val();

alert(id);
    $.ajax({
        url:"<?php echo base_url() . 'usuarios_admin/altera_usuario_rh/'?>" + id, 
        type:'POST',
        dataType: "json",
        data: str,
        success: function(data) {
            if($.isEmptyObject(data.error)){
                $(".print-error-msg_rh").css('display','none');
                swal("Parabéns!", data.success, "success");
            }else{
                $(".print-error-msg_rh").css('display','block');
                $(".print-error-msg_rh").html(data.error);
            }
        }
    });
}); 

/**get nos dados do usuário para altera status 28/10/2018/ 03:02*/
 
$(document).on('click', '.permission_status_ver', function(){  
    let id_004 = $(this).attr("id"); 
    $.ajax({  
        url:"<?php echo base_url(); ?>usuarios_admin/ver_usuarios__rh/" + id_004,  
        method:"GET",  
        data:{id_004:id_004},  
        dataType:"json",  
        success:function(data)  
        {  
            $('.bd-permissao_user_mini-modal-sm').modal('show');    
            $('#status_user_ver_04').val(data.status_user_v);   

            let status_name_user = data['user_001_v_nome'];
            $('#status_name_user003').text(status_name_user); 

                $('#id_up_004_v').val(id_004);  
        }, 
        error: function(er, xhr){
            alert("Error de acesso: " + xhr.status + " - " + xhr.statusText + "- Tpo de error = " + er);
        } 
    })  
}); 




/**Busca os dados do usuário para mostrar no modal, visualização para alterar a senha*/
 
$(document).on('click', '.ver_usuario_altera_password', function(){  
    let id_003 = $(this).attr("id"); 
    $.ajax({  
        url:"<?php echo base_url(); ?>usuarios_admin/ver_usuarios__rh/" + id_003,  
        method:"GET",  
        data:{id_003:id_003},  
        dataType:"json",  
        success:function(data)  
        {  
                $('#up_pass_rh_cadastrado').modal('show');    
                $('#view_new_001_pw_emai').val(data.user_001_v_emai);   

            let pw_name_user = data['user_001_v_nome'];
            $('#pw_name_user003').text(pw_name_user); 

                $('#id_up_003_v').val(id_003);  
        }, 
        error: function(er, xhr){
            alert("Error de acesso: " + xhr.status + " - " + xhr.statusText + "- Tpo de error = " + er);
        } 
    })  
}); 

/**Altera a senha e o email do novo usuário */
$(document).on('submit', '#up_senha_passord_nova_user', function(event){  
        event.preventDefault();
        let str_003 = $( "#up_senha_passord_nova_user" ).serialize();
        let id_003 = $('#id_up_003_v').val();


        swal({
        title: "Deseja alterar?",
        text: "Ao confirmar essa ação será de forma permante!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {

            $.ajax({
            url:"<?php echo base_url(); ?>usuarios_admin/up_rh_user_pw/" + id_003, 
            type:'POST',
            dataType: "json",
            data: str_003,
            success: function(data) {
                if($.isEmptyObject(data.error)){

                    $(".print-error-msg_pw_new").css('display','none');
                        swal(data.success, {
                        icon: "success",
                    });

                }else{
                    $(".print-error-msg_pw_new").css('display','block');
                    $(".print-error-msg_pw_new").html(data.error);
                }
            }
        });

        } else {
            swal("Você desistiu de alterar!");
        }
        });
}); 

/**Altera o status do ujsuário, suspende ou permite acesso 28/10/2018 10:07 */
$(document).on('submit', '#altera_status_user', function(event){  
    event.preventDefault(); 

    let str_sttus = $( "#altera_status_user" ).serialize();
    let id_str = $('#id_up_004_v').val();

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
            url:"<?php echo base_url() . 'usuarios_admin/altera_status_do_usuario/'?>" + id_str,
            type:'POST',
            dataType: "json",
            data: str_sttus,
            success: function(data) {
                if($.isEmptyObject(data.error)){

                    swal({title: "OK", text: "Status alterado com sucesso!", type: 
                        "success"}).then(function(){ 
                        location.reload();
                        }
                    );

                }else{
                    $(".print-error-msg_status").css('display','block');
                    $(".print-error-msg_status").html(data.error);
                }
            }
        });

    } else {
        swal("Ops.: Você desistiu de alterar!");
    }
    });

});


/**Deleta usuário do sistema */
$(document).on('click', '.delete_rh_user_given', function(){  
    let id_del_rh = $(this).attr("id");  

    swal({
    title: "Deseja deletar?",
    text: "Essa ação será de forma permanente ao você confirmar!",
    icon: "error",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {

        $.ajax({  
                url:"<?php echo base_url(); ?>usuarios_admin/delete_rh/" + id_del_rh,  
                method:"POST",  
                data:{id_del_rh:id_del_rh},  
                success:function(data)  
                {  
                    swal({title: "OK", text: "Usuário deletado com sucesso!", type: 
                        "success"}).then(function(){ 
                        location.reload();
                        }
                    );  
                }  
        }); 

        
    } else {
        swal("Ops.: Você desistiu de deletar!");
    }
    });


});  
</script>







































































<script>
/**Inseri ods dados no banco da empresa */
$('#form_dd_inst').submit(function (e) {
    e.preventDefault();
    var me = $(this);
    $.ajax({
    url: me.attr('action'),
            type:'post',
            data:me.serialize(),
            dataType:'json',
            success: function (response) {
            if (response.success == true) {
            swal("Parabéns!", "Dados incluido com sucesso!", "success");
                    $('.form-group').removeClass('has-error')
                    .removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();
            } else{
            $.each(response.mensagem, function (key, value) {
            var element = $('#' + key);
                    element.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    element.after(value);
            });
            }
            }
    });
});


/**Adicionar usuários na instituição */
$(document).on('submit', '#form_add_user', function(event){
    event.preventDefault();
    var str = $("#form_add_user").serialize();
    $.ajax({
    url:"<?php echo base_url(); ?>usuarios/add_user",
            type:'POST',
            dataType: "json",
            data: str,
            success: function(data) {
            if ($.isEmptyObject(data.error)){
            $(".print-error-msgUser").css('display', 'none');
                    swal("Parabéns!", data.success, "success");
                    $('#form_add_user')[0].reset();
            } else{
            $(".print-error-msgUser").css('display', 'block');
                    $(".print-error-msgUser").html(data.error);
            }
            }
    });
});


/**Ler dados da tabela */
$('.list_company').click(function() {
    $.ajax({
    url:"<?php echo base_url(); ?>usuarios/list_view_user_company",
            type:"GET",
            dataType:'json',
            success:function(data){
            $('#lerEventos').html(data);
                    $('.bd-list_user-modal-lg').modal('show');
            },
            error:function(xhr, er){
            alert('Sem mensagens no momento! ' + xhr.statusText + ' - ' + xhr.status);
            }
    });
});


/** 777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777 */
$(document).on('click', '.access_released', function(){
    var user_id = $(this).attr("id");
    swal({
    title: "Altera status?",
            text: "Deseja Ativar o status desse usuário!",
            icon: "info",
            buttons: true,
            dangerMode: true,
    })
    .then((willDelete) = > {
    if (willDelete) {
    $.ajax({
    url:"<?php echo base_url(); ?>usuarios/status_level/" + user_id,
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
            error: function (xhr, er) {
            alert('Conexao negada: ' + xhr.statusText + ' - ' + xhr.status);
            }
    });
    } else {
        swal("Você desistiu de alterar o status!");
    }
    });
});


$(document).on('click', '.access_denied', function(){
    var user_id = $(this).attr("id");
    swal({
    title: "Altera status?",
            text: "Deseja desativar o status desse usuário!",
            icon: "info",
            buttons: true,
            dangerMode: true,
    })
    .then((willDelete) = > {
    if (willDelete) {
        $.ajax({
        url:"<?php echo base_url(); ?>usuarios/status_level_denied/" + user_id,
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
                error: function (xhr, er) {
                alert('Conexao negada: ' + xhr.statusText + ' - ' + xhr.status);
                }
        });
    } else {
        swal("Você desistiu de alterar o status!");
    }
    });
});
</script>