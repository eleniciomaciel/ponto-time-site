<?php
$row = $gg->row_array();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h4>Empresa: '.$row['nome_inst'].'</h4>');
$html = '
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;width: 100%}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-ps7z{font-weight:bold;background-color:#dae8fc;text-align:center}
</style>

<table class="tg">
  <tr>
    <th class="tg-qpru" colspan="3">Dados da empresa</th>
  </tr>
  <tr>
    <td class="tg-kehx"><span style="font-weight:bold">Nome/Razão social:</span><br>'.$row['razao_social_inst'].'</td>
    <td class="tg-kehx"><span style="font-weight:bold">CNPJ/CPF:</span><br>'.$row['cnpj_inst'].'</td>
    <td class="tg-kehx">I<span style="font-weight:bold">nscrição Estadual:</span><br>'.$row['inscri_estadual_inst'].'</td>
  </tr>
  <tr>
    <td class="tg-6jxd"><span style="font-weight:bold">Endereço:</span><br>'.$row['endereco_inst'].'-'.$row['complemento_inst'].'</td>
    <td class="tg-6jxd"><span style="font-weight:bold">Complemento:</span><br>'.$row['complemento_inst'].'</td>
    <td class="tg-6jxd"><span style="font-weight:bold">CEP:</span><br>'.$row['cep_inst'].'</td>
  </tr>
  <tr>
    <td class="tg-6jxd"><span style="font-weight:bold">Município:</span><br>'.$row['cidade_inst'].'</td>
    <td class="tg-6jxd"><span style="font-weight:bold">UF:</span><br>'.$row['estado_inst'].'</td>
    <td class="tg-6jxd"><span style="font-weight:bold">Fone:</span><br>'.$row['telefone_inst'].'</td>
  </tr>
</table>

<br><br>

<table class="tg">
  ';
  if ($lfunc->num_rows() > 0) {

      $jota = 0;
      
      foreach ($lfunc->result() as $row_fun)
      {
        

        $bb_f1 = strtotime($row_fun->hora_entrada_n);//entrada
        $bb_i1 = strtotime($row_fun->hora_intervalo_n);//intervalo

        $total_um_turno1 = $bb_i1  - $bb_f1; // aqui voce já tem o intervalo, agora é tratar !
        $pri_turno_tot1 = round($total_um_turno1/60/60, 2); //ou $teste = $teste/3600

        /**Somando retorno e saida */
        $bb_r = strtotime($row_fun->hora_retorno_n);//retorno
        $bb_s = strtotime($row_fun->hora_saida_n);//saida

        $total_seg_turno = $bb_s  - $bb_r; // aqui voce já tem o intervalo, agora é tratar !
        $seg_turno_total = round($total_seg_turno/60/60, 2); //ou $teste = $teste/3600

        $tot  = $seg_turno_total + $pri_turno_tot1;//somando a linha
        $total_linhas += $tot;
        
        $html .='
          <tr>
            <th class="tg-ps7z">Nome</th>
            <th class="tg-ps7z">CTPS (nº série)</th>
            <th class="tg-ps7z">Cargo</th>
          </tr>
          <tr>
            <td class="tg-s6z2">'.$row_fun->nome_fun.'</td>
            <td class="tg-s6z2">'.$row_fun->ctps_fun.'</td>
            <td class="tg-s6z2">'.$row_fun->nome_cg.'</td>
          </tr>
          <tr>
            <td class="tg-ps7z">Horas trabalhada</td>
            <td class="tg-ps7z">Horas extras</td>
            <td class="tg-ps7z">Faltas</td>
          </tr>
          <tr>
            <td class="tg-baqh">'.$total_linhas.' hs</td>
            <td class="tg-baqh">'.$this->db->affected_rows().' hs</td>
            <td class="tg-baqh">1</td>
          </tr>

        ';
      }
    } else {
      $html .= '
      <tr>
        <td colspan="5" style="text-align: center;"><h5>Sem registro para a busca correspondente, veja com outras datas por gentileza.</h5></td>
      </tr>';
    }
  $html .='
</table>
';
$mpdf->WriteHTML($html);
$mpdf->Output();