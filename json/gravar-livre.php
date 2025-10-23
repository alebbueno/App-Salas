<?php

  include('../includes/mysql.php');

  // Tabela destino
  $sl_id = $_GET['sl_id'];
  		 
  $sql = mysql_query("UPDATE salas SET sl_status = '0' WHERE sl_id = '".$sl_id."'");	
  						 
  if (mysql_error()) {
		 echo'0';	
  }else{
		 echo'1';
  }
  

?>