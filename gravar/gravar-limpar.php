<?php

  include('../includes/mysql.php');

  // Tabela destino
  $ht_id = $_GET['ht_id'];
  $sl_id = $_GET['sl_id'];
  $vd_id = $_GET['vd_id'];
  $timestamp = mktime(date("H") - 2, date("i"), date("s"), date("m"), date("d"), date("Y"));
  $time1 = gmdate("H:i:s", $timestamp);
  
  $sql = mysqli_query($conexao, "UPDATE historico SET ht_status = '9', ht_saida = '".$time1."' WHERE ht_id = '".$ht_id."'");				 
  $sql = mysqli_query($conexao, "UPDATE salas SET sl_status = '2' WHERE sl_id = '".$sl_id."'");	
  //$sql = mysqli_query($conexao, "UPDATE vendedor SET vd_status = '0' WHERE vd_id = '".$vd_id."'");	
  						 
  if (!$sql) {
		 echo'<script type="text/JavaScript">
			   alert("Cadastro não foi efetuado. Contate o Administrador!");
			   Location: javascript:history.back(1);
			  </script>
			 ';	
  }else{
		 echo'<script type="text/JavaScript">
			   alert("Cadastro efetuado com sucesso. Obrigado!");
			   location.href="../home.php"
			  </script>  
			 ';
  }
  

?>