<?php

include('includes/mysql.php');

$query = "SELECT vd_nome, ht_cliente, sl_nome, ht_entrada, ht_saida FROM historico 
INNER JOIN salas ON (ht_slid = sl_id)
INNER JOIN vendedor ON (ht_vdid = vd_id) ORDER BY vd_nome ASC";
$executar_query = mysqli_query($conexao, $query);
$contar = mysqli_num_rows($executar_query);
	
for($i=0;$i<1;$i++){   
$html[$i] = "";
	$html[$i] .= "<table>";
	$html[$i] .= "<tr>";
	$html[$i] .= "<td><b>Vendedor</b></td>";
	$html[$i] .= "<td><b>Cliente</b></td>";
	$html[$i] .= "<td><b>Sala</b></td>";
	$html[$i] .= "<td><b>Entrada</b></td>";
	$html[$i] .= "<td><b>Saida</b></td>";
	$html[$i] .= "</tr>";
	$html[$i] .= "</table>";
}
//cd_nome, cd_cel, cd_fone, cd_email, cd_local, cd_tipo, cd_convidados, cd_data, cd_horario, cd_opcoes, cd_cidade, cd_estado, cd_mensagem
	
$i = 1;
while($ret = mysqli_fetch_array($executar_query)){
	$nome = $ret['vd_nome'];
	$cliente = $ret['ht_cliente'];
	$sala = $ret['sl_nome'];
	$entrada = $ret['ht_entrada'];
	$saida = $ret['ht_saida'];
	
	$html[$i] .= "<table>";
	$html[$i] .= "<tr>";
	$html[$i] .= "<td>$nome</td>";
	$html[$i] .= "<td>$cliente</td>";
	$html[$i] .= "<td>$sala</td>";
	$html[$i] .= "<td>$entrada</td>";
	$html[$i] .= "<td>$saida</td>";
	$html[$i] .= "</tr>";
	$html[$i] .= "</table>";
	$i++;
}
	
$arquivo = 'controle.xls';
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename={$arquivo}" );
header ("Content-Description: PHP Generated Data" );
	
for($i=0;$i<=$contar;$i++){  
	echo $html[$i];
}
	  
  
?>