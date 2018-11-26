<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main page container -->
<section class="container" role="main">

    <!-- Login header -->
    <div class="login-logo">
        <a href="#">Sangoma</a>
        <h1>Registrar Ponto</h1>
    </div>
    <!-- /Login header -->

    <!-- Login form -->
    <?php 
    echo form_open('access_funcionario/login_ponto');
    ;?>
    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable fade in">', '</div>'); 
    if ($this->session->flashdata('erro_conect')) {
        ?>
            <div class="alert alert-warning alert-block alert-dismissable fade in">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <h4 class="alert-heading">Atenção!</h4>
                <p>
                <?php echo $this->session->flashdata('erro_conect');?>
                </p>
            </div>
        <?php
    }
    ?>
    
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="elusive icon-user"></span></span>
                <input class="form-control" type="text" name="login_collaborator" value="<?php echo set_value('login_collaborator'); ?>" placeholder="Matricula do colaborador">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="elusive icon-key"></span></span>
                <input class="form-control" type="password" name="senha_collaborator" value="<?php echo set_value('senha_collaborator'); ?>" placeholder="Senha do colaborador">
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
    </form>
    <!-- /Login form -->
    
</section>
<!-- /Main page container -->
