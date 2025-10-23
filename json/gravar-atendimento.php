<?php

  include('../includes/mysql.php');

  // Tabela destino
  $sl_id = $_GET['sl_id'];
  $vd_id = $_GET['vd_id'];
  $cliente = $_GET['cliente'];
  $timestamp = mktime(date("H")-2, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
  $time1 = gmdate("H:i:s", $timestamp);
  
  //$result1 = "select * from salas where sl_id = '".$sl_id."' and sl_status = '1'";
  $sql_sala="select * from salas where sl_id = '".$sl_id."' and sl_status = '1'";
	$result_sala=mysql_query($sql_sala);
	$sala=mysql_fetch_array($result_sala);
	
  $sql_vendedor="select * from vendedor where vd_id = '".$vd_id."' and vd_status = '1'";
	$result_vendedor=mysql_query($sql_vendedor);
	$vendedor=mysql_fetch_array($result_vendedor);
	
  $status = $sala['sl_status'];
  $status2 = $vendedor['vd_status'];
  
  if ($status == 1) {
	  echo'0';
  }else if ($status2 == 1) {
	   echo'0';
  }else {
	 
	 $sql = mysql_query("insert into historico (ht_slid, ht_vdid, ht_cliente, ht_status, ht_data, ht_entrada)          
		values('$sl_id', '$vd_id', '$cliente', '1', NOW(), '$time1')");					 
	
  $sql = mysql_query("UPDATE salas SET sl_status = '1' WHERE sl_id = '".$sl_id."'");	
  $sql = mysql_query("UPDATE vendedor SET vd_status = '1' WHERE vd_id = '".$vd_id."'");			
			 
  	if (mysql_error()) {
		 echo'0';	
  	}else {
		 echo'1';
  	}	
	  
  }

?>