<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
 $this->load->view('style/header_recupera-login');
 ?>	
		
		<!-- Main page container -->
		<section class="container" role="main">

			<div class="row">
				<div class="col-sm-offset-2 col-sm-8">

					<!-- Header -->
					<h1>Recuperar a senha</h1>
					<!-- /Header -->

					<!-- Form -->
					<form method="post" action="index.html">
						<p>Por favor, digite o seu endereço de e-mail que você usou para configurar sua conta Ponto Time.</p>
						<div class="form-group">
							<label>Endereço de Email</label>
							<input class="form-control" type="email" placeholder="Digite o seu email">
						</div>
						<button class="btn btn-primary" type="submit">Enviar</button>
					</form>
					<!-- /Form -->

				</div>
			</div>
			
		</section>
<?php
    $this->load->view('style/footer');
 ?>	
