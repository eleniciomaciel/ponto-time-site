<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<!-- Bootstrap scripts -->
		<script src="<?=base_url();?>stylus/js/bootstrap/bootstrap.min.js"></script>
		<script>
		var takePicture = document.querySelector("#registra_photo");
		takePicture.onchange = function (event) {
			// Obtenha uma referencia para a imagem capturada ou escolha um arquivo
			var files = event.target.files,
				file;
			if (files && files.length > 0) {
				file = files[0];
			}
		};
		</script>
		

	</body>
</html>
