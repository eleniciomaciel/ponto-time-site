<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>C8 | Admin Ponto Time</title>
		<meta name="description" content="">
		<meta name="author" content="Walking Pixels | www.walkingpixels.com">
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
		<!-- DataTables -->
		<!-- This is optional and not required, uncommnet if need advanced dataTables functions -->
		<!--<link rel="stylesheet" href="css/plugins/datatables/jquery.dataTables.css"> -->

		<!-- Styles -->
		<link rel="stylesheet" href="<?=base_url()?>stylus/css/sangoma-green.css">

		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="<?=base_url()?>stylus/js/libs/modernizr.js"></script>

		<!-- IE8 support of media queries and CSS 2/3 selectors -->
		<!--[if lt IE 9]>
			<script src="js/libs/respond.min.js"></script>
			<script src="js/libs/selectivizr.js"></script>
		<![endif]-->
		
		<script>
			$(document).ready(function(){
				
				// Tooltips
				$('[title]').tooltip();
				
			});
		</script>
		
	</head>
	<body>