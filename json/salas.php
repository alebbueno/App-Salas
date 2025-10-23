<?php
include('../includes/mysql.php');

$sql="SELECT * FROM vendedor";

$res = mysql_query($sql) or die(mysql_error());

mysql_close();

$resultado = array();

while ($r = mysql_fetch_assoc($res)){
	$resultado[] = $r;
}

echo json_encode($resultado);
	
?>