<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
 $this->load->view('style/header');
 ?>	
<!-- Main page container -->
<section class="container" role="main">

	<!-- Login header -->
	<div class="login-logo">
		<a href="login.html">Sangoma</a>
	</div>
	<!-- /Login header -->

	<!-- Login form -->
	<?php echo form_open('access_user') ?>
	<?php
		if ($this->session->flashdata('item')) {
		?>
			<div class="alert alert-warning alert-block alert-dismissable fade in">
				<button class="close" type="button" data-dismiss="alert">×</button>
				<h4 class="alert-heading">Atenção!</h4>
				<p><?php echo $this->session->flashdata('item')?></p>
			</div>
		<?php
		}
	?>
		<div class="form-group">
		<span for="" class="text-danger"><?php echo form_error('pw_login'); ?></span>
			<div class="input-group">
				<span class="input-group-addon"><span class="elusive icon-user"></span></span>
				<input class="form-control" type="text" name="pw_login" placeholder="Entre com seu login" name="login" value="<?php echo set_value('pw_login'); ?>">
			</div>
		</div>
		<div class="form-group">
		<span for="" class="text-danger"><?php echo form_error('pw_senha'); ?></span>
			<div class="input-group">
				<span class="input-group-addon"><span class="elusive icon-key"></span></span>
				<input class="form-control" type="password" name="pw_senha" placeholder="Digite a sua senha" name="password" value="<?php echo set_value('pw_senha'); ?>">
			</div>
		</div>
		<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
		<a class="lost-password" href="<?php echo site_url('recuperar-senha')?>">Esqueceu a sua senha?</a>
	</form>
	<!-- /Login form -->
	
</section>
<?php
 $this->load->view('style/footer');
 ?>	
