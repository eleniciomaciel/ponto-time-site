<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Painel usuário</title>
		<meta name="description" content="Sistemas de ponto, Ponto digital, Ponto Time">
		<meta name="author" content="Elenicio Maciel | www.c8sistemas.com">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url();?>stylus/img/favicos/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url();?>stylus/img/favicos/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>stylus/img/favicos/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>stylus/img/favicos/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>stylus/img/favicos/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url();?>stylus/img/favicos/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url();?>stylus/img/favicos/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url();?>stylus/img/favicos/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url();?>stylus/img/favicos/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url();?>stylus/img/favicos/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url();?>stylus/img/favicos/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url();?>stylus/img/favicos/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<!-- PrettyCheckable Styles -->
		<link rel='stylesheet' type='text/css' href='<?=base_url();?>stylus/css/plugins/prettycheckable/prettyCheckable.css'>

		<!-- Styles -->
		<link rel="stylesheet" href="<?=base_url();?>stylus/css/sangoma-blue.css">

		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?=base_url();?>stylus/js/libs/jquery.js"><\/script>')</script>
		<script src="<?=base_url();?>stylus/js/libs/modernizr.js"></script>

        <!-- Fileupload plugin -->
		<script src="<?=base_url();?>stylus/js/plugins/fileupload/bootstrap-fileupload.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<!-- DataTables -->
		
		<!-- IE8 support of media queries and CSS 2/3 selectors -->
		<!--[if lt IE 9]>
			<script src="js/libs/respond.min.js"></script>
			<script src="js/libs/selectivizr.js"></script>
		<![endif]-->
		
		<script>
			$(document).ready(function(){
				
				// Tooltips
				$('[title]').tooltip();

				// Tabs
				$('.demoTabs a, .demoTabs2 a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
					$('.fullcalendar, .full-calendar-gcal').fullCalendar('render'); // Refresh jQuery FullCalendar for hidden tabs
				})
				
			});
		</script>
		
	</head>
	<body>