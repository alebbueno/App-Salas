<?php

  include('../includes/mysql.php');

  // Tabela destino
  $ht_id = $_GET['ht_id'];
  $sl_id = $_GET['sl_id'];
  $vd_id = $_GET['vd_id'];
  $timestamp = mktime(date("H")-2, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
  $time1 = gmdate("H:i:s", $timestamp);
  
  $sql = mysql_query("UPDATE historico SET ht_status = '9', ht_saida = '".$time1."' WHERE ht_id = '".$ht_id."'");			 
  $sql = mysql_query("UPDATE salas SET sl_status = '2' WHERE sl_id = '".$sl_id."'");
  $sql = mysql_query("UPDATE vendedor SET vd_status = '0' WHERE vd_id = '".$vd_id."'");	
  						 
  if (mysql_error()) {
		 echo'0';	
  }else{
		 echo'1';
  }
  

?>