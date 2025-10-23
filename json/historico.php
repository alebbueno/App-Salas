<?php
include('../includes/mysql.php');

$sql="SELECT ht_id, vd_nome, ht_cliente, vd_id, sl_id, ht_status FROM historico 
										INNER JOIN salas ON (ht_slid = sl_id AND ht_status = sl_status)
										INNER JOIN vendedor ON (ht_vdid = vd_id)";

$res = mysql_query($sql) or die(mysql_error());

mysql_close();

$resultado = array();

while ($r = mysql_fetch_assoc($res)){
	$resultado[] = $r;
}

echo json_encode($resultado);
	
?>