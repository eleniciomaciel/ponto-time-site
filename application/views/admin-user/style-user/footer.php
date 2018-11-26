<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- /Main page footer -->

		<!-- Bootstrap scripts -->
		<script src="<?=base_url();?>stylus/js/bootstrap/bootstrap.min.js"></script>

	

		<!-- PrettyCheckable checkbox and radio -->
		<script src="<?=base_url();?>stylus/js/plugins/prettyCheckable/prettyCheckable.js"></script>
		<script>
			$(document).ready(function() {

				$('.todo-block input').prettyCheckable();

			});
		</script>

		<!-- Block TODO list -->
		<script>
			$(document).ready(function() {
				
				$('.todo-block input[type="checkbox"], .todo-block .prettycheckbox').click(function(){
					$(this).closest('tr').toggleClass('done');
				});
				$('.todo-block input[type="checkbox"]:checked').closest('tr').addClass('done');
				
			});
		</script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- jQuery Flot Charts -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/flot/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?=base_url()?>stylus/js/jquery.mask.js"></script>
		<script src="<?=base_url();?>stylus/js/plugins/flot/jquery.flot.min.js"></script>
		<script src="<?=base_url();?>stylus/js/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$("#search_text_termo_busca").mask("00/0000");
		</script>
		<script>
			$(document).ready(function() {
				
				// Demo #1
				// we use an inline data source in the example, usually data would be fetched from a server
				var data = [], totalPoints = 300;
				function getRandomData() {
					if (data.length > 0)
						data = data.slice(1);
				
					// do a random walk
					while (data.length < totalPoints) {
						var prev = data.length > 0 ? data[data.length - 1] : 50;
						var y = prev + Math.random() * 10 - 5;
						if (y < 0)
							y = 0;
						if (y > 100)
							y = 100;
						data.push(y);
					}
				
					// zip the generated y values with the x values
					var res = [];
					for (var i = 0; i < data.length; ++i)
						res.push([i, data[i]])
					return res;
				}
				
				// setup control widget
				var updateInterval = 30;
				$("#updateInterval").val(updateInterval).change(function () {
					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
					if (updateInterval < 1)
						updateInterval = 1;
					if (updateInterval > 2000)
						updateInterval = 2000;
					$(this).val("" + updateInterval);
					}
				});
				
				// setup plot
				var options = {
					series: {
						shadowSize: 0,
						color: '#c0392b',
						lines: {
							fill: true
						}
					}, // drawing is faster without shadows
					yaxis: { min: 0, max: 100 },
					xaxis: { show: false },
					grid: { backgroundColor: '#ffffff', borderColor: 'transparent' },
				};
				var plot = $.plot($("#demo-1"), [ getRandomData() ], options);
				
				function update() {
					plot.setData([ getRandomData() ]);
					// since the axes don't change, we don't need to call plot.setupGrid()
					plot.draw();
					setTimeout(update, updateInterval);
				}
				
				update();
			
			});
		</script>


<?php 
		$this->load->view('admin-user/novo_modal/01_perfil');
		$this->load->view('admin-user/novo_modal/02_dados_empresa');
		$this->load->view('admin-user/novo_modal/03_menu');
		$this->load->view('admin-user/novo_modal/04_add_funcionario');
		$this->load->view('admin-user/novo_modal/05_add_turno');
        $this->load->view('admin-user/novo_modal/06_contabilidade');
        $this->load->view('admin-user/novo_modal/07_funcionario_turno');
        $this->load->view('admin-user/modal/05_modal_cadastrar_cargos');
        $this->load->view('admin-user/novo_modal/08_dados_funcionario');
        $this->load->view('admin-user/novo_modal/09_menu_relatorios');
        $this->load->view('admin-user/novo_modal/10_busca_funcionario_relatorio');
		$this->load->view('admin-user/novo_modal/11_funcionario_dados_relatorio');
		//$this->load->view('admin-user/novo_modal/12_consulta_simples');
		
?>
<?php 
	//$this->load->view('admin-user/modal/01_modal_deactivate_perfil');
	//$this->load->view('admin-user/modal/02_modal_deactivate_menu');
        //$this->load->view('admin-user/modal/03_modal_deactivate_contabilidade');
        //$this->load->view('admin-user/modal/04_modal_deactivate_turno_funcionario');
        //$this->load->view('admin-user/modal/05_modal_deactivate_cadastrar_cargos');
        //$this->load->view('admin-user/modal/07_modal_deactivate_turnos');
        //$this->load->view('admin-user/modal/08_modal_deactivate_relatorios');
?>

	</body>
</html>
