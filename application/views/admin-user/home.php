<?php
$this->load->view('admin-user/style-user/header');
?>

<!-- Full height wrapper -->
<div id="wrapper">

    <!-- Main page header -->
    <header id="header" class="container">

        <h1>
            <!-- Main page logo -->
            <a href="#">Ponto Time</a>
            <!-- Main page headline -->
        </h1>

        <!-- User profile -->
        <div class="user-profile">
            <figure>

                <!-- User profile avatar -->
                <?php
                if ($this->session->userdata('user')->file_pw != '') {
                    echo '<img src="' . base_url() . 'stylus/upload/perfil_user/' . $this->session->userdata('user')->file_pw . '" class="img-responsive" width="60" height="60" />';
                } else {
                    echo '<img alt="John Pixel avatar" src="http://placekitten.com/60/60">';
                }
                ?>

                <!-- User profile info -->
                <figcaption>
                    <?php
                    if (NULL != $this->session->userdata('logado')) {
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
                            <a href="#" title="Dados do perfíl"  class="my_perfil" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>" data-toggle="modal" data-target=".bd-dados_perfil-modal-lg">Perfíl</a>
                        </li>
                        <li>
                            <a href="#" title="Dados cadastrais da instituição" class="nome_inst" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>" data-toggle="modal" data-target=".bd-dados_empresa-modal-lg">
                                Dados da empresa
                            </a>
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

    <!-- Main page container -->
    <section class="container" role="main">

        <!-- Grid row -->
        <div class="row">

            <!-- Multi-level scaffolding example -->
            <div class="col-sm-12">

                <!-- Grid row -->
                <div class="row">

                    <!-- Widget block -->
                    <div class="col-sm-2 col-xs-6">
                        <a class="data-block widget-block" href="#" data-toggle="modal" data-target="#exampleModal">
                            <span class="widget-icon elusive icon-file-edit"></span>
                            <strong>Cadastros</strong>
                        </a>
                    </div>
                    <!-- /Widget block -->

                    <!-- Widget block -->
                    <div class="col-sm-2 col-xs-6">
                        <a href="#" class="view_lista_employer_05 data-block widget-block" id="<?php echo $this->session->userdata('user')->id_inst_pw; ?>" data-toggle="modal" data-target=".bd-lista_employees-modal-lg">
                            <span class="widget-icon elusive icon-group"></span>
                            <strong>Funcionários</strong>
                        </a>
                    </div>
                    <!-- /Widget block -->

                    <!-- Widget block -->
                    <div class="col-sm-4 col-xs-6">
                        <a class="data-block widget-block" href="#"  data-toggle="modal" data-target="#relatoriosModal">
                            <span class="badge">3</span>
                            <span class="widget-icon elusive icon-list-alt"></span>
                            <strong>Relatórios</strong>
                        </a>
                    </div>
                    <!-- /Widget block -->

                    <!-- Widget block -->
                    <div class="col-sm-2 col-xs-6">
                        <a class="data-block widget-block" href="#">
                            <span class="widget-icon elusive icon-check"></span>
                            <strong>Observações</strong>
                        </a>
                    </div>
                    <!-- /Widget block -->

                    <!-- Widget block -->
                    <div class="col-sm-2 col-xs-6">
                        <a class="data-block widget-block" href="#">
                            <span class="widget-icon elusive icon-time"></span>
                            <strong>Banco de horas</strong>
                        </a>
                    </div>
                    <!-- /Widget block -->

                </div>
                <!-- /Grid row 
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Entrada</th>
                                <th>Intervalo</th>
                                <th>Retorno</th>
                                <th>Saída</th>
                                <th>Horas trab.</th>
                                <th>Horas extr.</th>
                                <th>Obs.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1983</td>
                                <td>4 562 tons</td>
                                <td>3 564 tons</td>
                                <td>9 tons</td>
                                <td>4 562 tons</td>
                                <td>3 564 tons</td>
                                <td>9 tons</td>
                                <td class="toolbar">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm"><span class="elusive icon-download-alt"></span></button>
                                        <button class="btn btn-primary btn-sm"><span class="elusive icon-wrench"></span></button>
                                        <button class="btn btn-primary btn-sm"><span class="elusive icon-remove"></span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            /Grid row -->
            </div>

        </div>

    </section>
    <!-- /Main page container -->

</div>
<!-- /Full height wrapper -->

<?php
$this->load->view('admin-user/style-user/footer-hrml');
$this->load->view('admin-user/style-user/footer');
?>


