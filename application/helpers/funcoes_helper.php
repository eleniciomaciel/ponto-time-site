<?php defined('BASEPATH') OR exit('No direct script access allowed');

function reais($decimal)
{
    return "R$" .number_format($decimal, 2, ",", ".");
}

function dataBr_to_dataMYSQL($data) 
{
    $campo = explode("/", $data);
    return date("Y-m-d", strtotime($campo[2]."/".$campo[1]."/".$campo[0]));
}

function item_data($date) 
{
    if(empty($date)) {
        return "0:00";
    }else {
        return date("H:i",strtotime($date));
    }
}

/** ========================================================    Conversão de horas  =============================================================================================*/

/*converte hora em segundos*/
function converte_horas_segundos($horas) 
{
    list($hora, $minuto, $segundo) = explode(':', $horas);
    return $hora * 3600 + $minuto * 60 + $segundo;
 }
 /*converte segundo em horas*/
 function converte_segundos_horas($segundos)
 {
    $horas   = floor($segundos / 3600);
    $minutos = floor($segundos % 3600 / 60);
    $segundo = $segundos % 60;
    return sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos);
 }

 function getFullHour($input) {
    $seconds = intval($input); //Converte para inteiro

    $negative = $seconds < 0; //Verifica se é um valor negativo

    if ($negative) {
        $seconds = -$seconds; //Converte o negativo para positivo para poder fazer os calculos
    }

    $hours = floor($seconds / 3600);
    $mins = floor(($seconds - ($hours * 3600)) / 60);
    $secs = floor($seconds % 60);

    $sign = $negative ? '-' : ''; //Adiciona o sinal de negativo se necessário

    return $sign . sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
}

