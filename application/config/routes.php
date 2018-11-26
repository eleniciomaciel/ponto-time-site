<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['recuperar-senha'] = 'welcome/recuperar_password';
$route['access_user'] = 'login/access_user';
$route['sair'] = 'login/logaut';
$route['funcionario-ponto'] = 'access_funcionario/painel_login_geral';
$route['acesso-registro-do-ponto'] = 'access_funcionario/login_ponto';
$route['logout'] = 'access_funcionario/logout';
$route['ajaxpro'] = 'relatorios/busca_funcionario';
$route['dados-funcionario-registro'] = 'busca_consulta_funcionario/consulta_acesso';