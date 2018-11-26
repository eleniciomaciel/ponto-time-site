<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro do ponto</title>
        <meta name="description" content="">
        <meta name="author" content="Walking Pixels | www.walkingpixels.com">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- PrettyCheckable Styles -->
        <link rel='stylesheet' type='text/css' href='<?= base_url(); ?>stylus/css/plugins/prettyCheckable/prettyCheckable.css'>

        <!-- Styles -->
        <link rel="stylesheet" href="<?= base_url(); ?>stylus/css/sangoma-red.css">

        <!-- JS Libs -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= base_url(); ?>stylus/js/libs/jquery.js"><\/script>')</script>
        <script src="<?= base_url(); ?>stylus/js/libs/modernizr.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- IE8 support of media queries and CSS 2/3 selectors -->
        <!--[if lt IE 9]>
                <script src="js/libs/respond.min.js"></script>
                <script src="js/libs/selectivizr.js"></script>
        <![endif]-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function () {

                // Tooltips
                $('[title]').tooltip();

            });
        </script>
<style>
input[type="checkbox"] {
  cursor: pointer;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: 0;
  background: lightgray;
  height: 26px;
  width: 26px;
  border: 1px solid white;
}

input[type="checkbox"]:checked {
  background: #2aa1c0;
}

input[type="checkbox"]:hover {
  filter: brightness(90%);
}

input[type="checkbox"]:disabled {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}

input[type="checkbox"]:after {
  content: '';
  position: relative;
  left: 40%;
  top: 20%;
  width: 15%;
  height: 40%;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  display: none;
}

input[type="checkbox"]:checked:after {
  display: block;
}

input[type="checkbox"]:disabled:after {
  border-color: #7b7b7b;
}
</style>
    </head>
    <body>

        <!-- Full height wrapper -->
        <div id="wrapper">

            <!-- Main page header -->
            <header id="header" class="container">

                <h1>
                    <!-- Main page logo -->
                    <a href="#">Sangoma</a>

                    <!-- Main page headline -->
                </h1>

                <!-- User profile -->
                <div class="user-profile">
                    <figure>

                        <!-- User profile avatar -->
                        <img alt="John Pixel avatar" src="http://placekitten.com/60/60">

                        <!-- User profile info -->
                        <figcaption>
                        <?php
                    if (null != $this->session->userdata('logado')) {
                        ?>
                        <strong><a href="#"> <?php echo $this->session->userdata('user')->nome_fun ?></a></strong>
                            <ul>
                                <li><a href="<?php echo site_url('logout'); ?>" title="Sair">Sair</a></li>
                            </ul>
                        <?php
                    } else {
                        //$this->load->view('login_access');
                        redirect('/welcome/index/');
                    }
                    ?>
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

                    <!-- Data block -->
                    <!-- Data block -->
                    <article class="col-sm-12">
                        <div class="data-block">
                            <header>
                                <h2 class="text-center">Empresa: <?php echo $this->session->userdata('user')->nome_inst ?></h2>
                            </header>
                            <section>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="text-center">Informações pessoais</h4>
                                        <div class="dark data-block">
                                            <header>
                                                <h2><span class="elusive icon-address-book"></span> Dados do colaborador</h2>
                                            </header>
                                            <section>
                                                <p>
                                                <form class="form-horizontal" role="form">

                                                    <div class="panel pricing-table">
                                                        <div class="panel-heading">
                                                            <h3>Hora do registro</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <strong><p id="demo"></p></strong>
                                                        </div>
                                                        <ul class="list-group">
                                                            <li class="list-group-item"><i class="elusive icon-ok-sign"></i> Funcionário: <?php echo $this->session->userdata('user')->nome_fun ?></li>
                                                            <li class="list-group-item"><i class="elusive icon-ok-sign"></i> Matrícula: <?php echo $this->session->userdata('user')->matri_fun ?></li>
                                                            <li class="list-group-item"><i class="elusive icon-ok-sign"></i> Cargo: <?php echo $this->session->userdata('user')->nome_cg; ?></li>
                                                        </ul>
                                                        <div class="panel-footer">
                                                            <a class="btn btn-lg btn-block btn-default" href="#"><p id="demonew"></p></a>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var today = new Date();
                                                        var dd = today.getDate();
                                                        var mm = today.getMonth() + 1; //January is 0!
                                                        var yyyy = today.getFullYear();
                                                        if (dd < 10) {
                                                            dd = '0' + dd
                                                        }

                                                        if (mm < 10) {
                                                            mm = '0' + mm
                                                        }

                                                        today = dd + '/' + mm + '/' + yyyy;
                                                        document.getElementById("demonew").innerHTML = today;
                                                        var myVar = setInterval(function () {
                                                            myTimer()
                                                        }, 1000);

                                                        function myTimer() {
                                                            var d = new Date();
                                                            document.getElementById("demo").innerHTML = d.toLocaleTimeString();
                                                        }
                                                    </script>
                                                </form>
                                                </p>
                                            </section>
                                            <footer>
                                                <p><span class="elusive icon-info-sign"></span> 
                                                    Dados cadastrais do colaborador.
                                                </p>
                                            </footer>
                                        </div>


                                        </form>
                                    </div>


                                    <div class="col-sm-6">
                                        <h4 class="text-center">Registrar ponto</h4>

                                        <div class="blue data-block">
                                            <header>
                                                <h2><span class="elusive icon-time"></span> Informar dados</h2>
                                            </header>
                                            <section>
<?php if ($this->session->flashdata('success_pt')): ?>
                                                    <script>


                                                        swal({
                                                            title: "Muito bem!",
                                                            text: "<?php echo $this->session->flashdata('success_pt'); ?>",
                                                            icon: "success",
                                                            button: "Confirma",
                                                        })//.then(function () {
                                                            //window.location = "<?php echo site_url('acesso-registro-do-ponto'); ?>";
                                                        //})
                                                        ;

                                                    </script>
                                                    <?php endif; ?>
                                                <p>
                                                <?php echo form_open_multipart('access_funcionario/add_new_regirtro/'.$this->session->userdata('user')->id_fun, array('class' => 'form-horizontal', 'role' => 'form')); ?>
                                                
                                                <div class="form-group exemplo-checkbox">
                                                    <label class="checkbox-inline"><input type="checkbox" name="inlineRadio1" id="inlineRadio1" value="Entrada">&nbsp; <span style="font-size: 1.8em;">Entrada</span> </label>
                                                    <label class="checkbox-inline"><input type="checkbox" name="inlineRadio2" id="inlineRadio2" value="Intervalo">&nbsp; <span style="font-size: 1.8em;">Intervalo</span></label>
                                                    <label class="checkbox-inline"><input type="checkbox" name="inlineRadio3" id="inlineRadio3" value="Retorno">&nbsp; <span style="font-size: 1.8em;">Retorno</span></label>
                                                    <label class="checkbox-inline"><input type="checkbox" name="inlineRadio4" id="inlineRadio4" value="Saida">&nbsp; <span style="font-size: 1.8em;">Saída</span></label>

                                                </div>

    

                                                <div class="form-group">
                                                    <p class="text-danger"><?php echo $error; ?></p>
                                                    <label class="col-sm-3 control-label">Foto do rosto</label>

                                                    <div class="col-sm-9">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-preview fileupload-small thumbnail"><img src="<?= base_url(); ?>stylus/img/sample_content/upload-50x50.png"></div>
                                                            <div>
                                                                <span class="btn btn-default btn-file">
                                                                    <span class="fileupload-new">
                                                                        <span class="elusive icon-camera"></span> Click aqui
                                                                    </span>
                                                                    <span class="fileupload-exists">
                                                                        <span class="elusive icon-camera"></span> Mudar
                                                                    </span>
                                                                    <input type="file" name="registra_photo" id="registra_photo" required/>

                                                                </span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                                                    <span class="elusive icon-remove"></span> Remover
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="id_funcionario_data" id="id_funcionario_data" value="<?php echo $this->session->userdata('user')->id_fun ?>">
                                                <input type="hidden" name="id_empresa_data" id="id_empresa_data" value="<?php echo $this->session->userdata('user')->id_inst ?>">
                                                <input type="hidden" name="email_fun" id="email_fun" value="<?php echo $this->session->userdata('user')->email_fun ?>">
                                                <input type="hidden" name="id_cargo" id="id_cargo" value="<?php echo $this->session->userdata('user')->id_cg; ?>">

                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-lg btn-primary">
                                                            <span class="elusive icon-arrow-right"></span> Cadastrar acesso
                                                        </button>
                                                    </div>
                                                </div>

                                                </form>
                                                
                                            </section>
                                            <footer>
                                                <p><span class="elusive icon-info-sign"></span> 
                                                    Preencha todas as solicitações para efetuar o ponto.
                                                </p>
                                            </footer>
                                        </div>




                                    </div>
                                </div>
                            </section>
                            <footer>
                                <p>
                                    Painel de cadastro do ponto de acesso dos funcionário.
                                    .</p>
                            </footer>
                        </div>
                    </article>
                    <!-- /Data block -->

                </div>
                <!-- /Grid row -->

            </section>
            <!-- /Main page container -->

        </div>
        <!-- /Full height wrapper -->

        <!-- Main page footer -->
        <footer id="footer">
            <div class="container">
                <!-- Footer info -->
                <p>&copy; 2018 todos os diretor reservados. <a href="#">Desnvolvido</a> by <a href="#">C8-Sistemas Tecnologia.</a></p>
                <!-- Footer back to top -->
                <a href="#top" class="btn btn-back-to-top" title="Back to top"><span class="elusive icon-arrow-up"></span></a>

            </div>
        </footer>

        <!-- /Main page footer -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap scripts -->
        <script src="<?= base_url(); ?>stylus/js/bootstrap/bootstrap.min.js"></script>

        <!-- Fileupload plugin -->
        <script src="<?= base_url(); ?>stylus/js/plugins/fileupload/bootstrap-fileupload.js"></script>

        <!-- Inputmask plugin -->
        <script src="<?= base_url(); ?>stylus/js/plugins/inputmask/bootstrap-inputmask.js"></script>

        <!-- Custom checkbox and radio -->
        <script src="<?= base_url(); ?>stylus/js/plugins/prettyCheckable/prettyCheckable.js"></script>
        <script>
                                                    $(document).on('submit', '#envia_registro', function (event) {
                                                        event.preventDefault();
                                                        var select_access = $('#select_access').val();
                                                        alert('ok clicou');
                                                        var extension = $('#registra_photo').val().split('.').pop().toLowerCase();
                                                        if (extension != '')
                                                        {
                                                            if (jQuery.inArray(extension, ['jpg', 'jpeg']) == -1)
                                                            {
                                                                alert("Invalid Image File");
                                                                $('#registra_photo').val('');
                                                                return false;
                                                            }
                                                        }
                                                        if (select_access != '')
                                                        {
                                                            $.ajax({
                                                                url: "<?php echo base_url() . 'crud/user_action' ?>",
                                                                method: 'POST',
                                                                data: new FormData(this),
                                                                contentType: false,
                                                                processData: false,
                                                                success: function (data)
                                                                {
                                                                    alert(data);
                                                                    $('#user_form')[0].reset();
                                                                    $('#userModal').modal('hide');
                                                                    dataTable.ajax.reload();
                                                                }
                                                            });
                                                        }
                                                        else
                                                        {
                                                            alert("Bother Fields are Required");
                                                        }
                                                    });
        </script>
<script>
	$("#inlineRadio1").click(function(){
    swal("Registrar entrada?", "Certifiquece que essa ação é a correta...");
	});
	$("#inlineRadio2").click(function(){
    swal("Registrar intevalo?", "Certifiquece que essa ação é a correta...");
	});
	$("#inlineRadio3").click(function(){
    swal("Registrar retorno?", "Certifiquece que essa ação é a correta...");
	});
	$("#inlineRadio4").click(function(){
    swal("Registrar saída?", "Certifiquece que essa ação é a correta...");
	}); 
</script>
    </body>
</html>
