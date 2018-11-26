<?php
/*
$pdf = new \Mpdf\Mpdf();

$pdf->SetTitle($registro);

$pdf->WriteHTML('<h2 style="text-align: center;">Minha empre</h2>');

$pdf->SetAuthor('C8-sistemas');
$pdf->WriteHTML('<h1>Hello world!</h1>');

$pdf->Bookmark('Start of the document');

$pdf->SetSubject('Consulta dos acessos do funcionário');

$pdf->Output();
*/


//$row = $usuario->row();
$mpdf_pdf = new \Mpdf\Mpdf();

$html ='

<!DOCTYPE html>
<html>
<head>
<title>'.$mpdf_pdf->SetTitle($registro).'</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body>
'.$mpdf_pdf->WriteHTML('<h2 style="text-align: center;">Empresa: '.$news['nome_inst'].'</h2><br>').'
<style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #ffcc00;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 2px;
  border-color: #ffcc00;
  border-style: solid;
  padding: 3px;
}

table.GeneratedTable thead {
  background-color: #ffcc00;
}



.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-7ryv{font-weight:bold;background-color:#ecf4ff;text-align:left;vertical-align:top}
.tg .tg-15vm{font-size:13px;font-family:serif !important;;text-align:left}
.tg .tg-hgcj{font-weight:bold;text-align:center}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-s268{text-align:left}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-0qe0{background-color:#ecf4ff;text-align:left;vertical-align:top}
</style>

<table class="tg">
  <tr>
    <th class="tg-s268">Nome/Razão social:<br>'.$news['nome_inst'].'<br></th>
    <th class="tg-s268">CNPJ/CPF:<br>'.$news['cnpj_inst'].'<br></th>
    <th class="tg-s268">Inscrição Estadual:<br>'.$news['inscri_estadual_inst'].'<br></th>
  </tr>
  <tr>
    <td class="tg-s268">Endereço:<br>'.$news['endereco_inst'].'<br></td>
    <td class="tg-s268">Bairro:<br>'.$news['complemento_inst'].'<br></td>
    <td class="tg-s268">CEP:<br>'.$news['cep_inst'].'<br></td>
  </tr>
  <tr>
    <td class="tg-s268">Município:<br>'.$news['cidade_inst'].'<br></td>
    <td class="tg-s268">UF:<br>'.$news['estado_inst'].'<br></td>
    <td class="tg-s268">Fone:<br>'.$news['telefone_inst'].'<br></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="3">Dados do funcionário:</td>
  </tr>
  <tr>
    <td class="tg-0lax">Nome:</td>
    <td class="tg-0lax" colspan="2">&nbsp; '.$news['nome_fun'].'</td>
  </tr>
  <tr>
    <td class="tg-0lax">Turno:&nbsp; '.$news['nome_tn'].'</td>
    <td class="tg-0lax">CPTS:&nbsp; '.$news['ctps_fun'].'</td>
    <td class="tg-0lax">Cargo:&nbsp; '.$news['nome_cg'].'</td>
  </tr>
  <tr>
    <td class="tg-0lax">CPF:&nbsp; '.$news['cpf_fun'].'</td>
    <td class="tg-0lax">PIS: &nbsp; '.$news['pis_fun'].'</td>
    <td class="tg-0lax">Telefone: &nbsp; '.$news['tele_fun'].'</td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="3">E-mail:&nbsp; '.$news['email_fun'].'</td>
  </tr>
</table>

<br><br>
<!-- Dados da empresa e funpcionário -->

<table class="tg">

  <tr>
    <th class="tg-1wig">Data</th>
    <th class="tg-1wig">Entrada</th>
    <th class="tg-1wig">Intervalo</th>
    <th class="tg-1wig">Retorno</th>
    <th class="tg-1wig">Saída</th>
    <th class="tg-1wig">Horas Trabalhada</th>
    <th class="tg-1wig">Horas extras</th>
  </tr>

  ';
    if ($list_hours->num_rows() > 0) {

      $ver_total  = 0;
      $j = 0;
      foreach ($list_hours->result() as $vv) {

        $bb_f = strtotime($vv->hora_entrada_n);//entrada
        $bb_i = strtotime($vv->hora_intervalo_n);//intervalo

        $total_um_turno = $bb_i  - $bb_f; // aqui voce já tem o intervalo, agora é tratar !
        $pri_turno_tot = round($total_um_turno/60/60, 2); //ou $teste = $teste/3600

        
         /**Somando retorno e saida */
        $bb_r = strtotime($vv->hora_retorno_n);//retorno
        $bb_s = strtotime($vv->hora_saida_n);//saida

        $total_seg_turno = $bb_s  - $bb_r; // aqui voce já tem o intervalo, agora é tratar !
        $seg_turno_total = $total_seg_turno/60/60; //ou $teste = $teste/3600

        $tot  =  $seg_turno_total + $pri_turno_tot;
        

        $tat = empty($vv->hora_intervalo_n) ?  "1 registro" : $tat = round($tot, 2);
        $ver_total += $tat;

        ;
        
        if ( $tat <= 8) 
        {
            $extra = "Sem extra";
        } else {
            $extra = $tat - 8 ." seg.";
        }
       
        
        $j+=1;//incrementa um ao laço para opter o total de linhas consultadas
        $conf_hour = $j*8;//$j(com o total de linhas) vezes o total de horas de um trabalhador 8 horas|| total de linhas * as horas trabalhadas
        $tot_conf =   $ver_total - $conf_hour; //$ver_total = soma da linha - (menos o total de horas trabalhada)
      $html .= '
      <tr>
        <td class="tg-s268">'.date("d/m/Y",strtotime($vv->data_n)).'</td>
        <td class="tg-s268">'.date("H:i",strtotime($vv->hora_entrada_n)).' hs</td>
        <td class="tg-s268">'.item_data($vv->hora_intervalo_n).' hs</td>
        <td class="tg-0lax">'.item_data($vv->hora_retorno_n).' hs</td>
        <td class="tg-0lax">'.item_data($vv->hora_saida_n).' hs</td>
        <td class="tg-0lax">'.$tat.' hs</td>
        <td class="tg-0lax">'.$extra.' hs</td>
      </tr>

      ';
          }
            
        } else {
          $html .= '
          <tr>
            <td colspan="5" style="text-align: center;"><h5>Sem registro para a busca correspondente, veja com outras datas por gentileza.</h5></td>
        </tr>';
        }
    $html .= '

    <tr>
      <td class="tg-1wig" colspan="5">Total de horas trabalhada:</td>
      <td class="tg-0lax">'.$ver_total.' hs</td>
      <td class="tg-0lax">'.$tot_conf.' hs</td>
    </tr>

</table>

</body>
</html>
';


$mpdf_pdf->WriteHTML($html);
$mpdf_pdf->Output();