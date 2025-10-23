<?php

  include('../includes/mysql.php');

  // Tabela destino
  $sl_id = $_POST['sl_id'];
  $vd_id = $_POST['vd_id'];
  $cliente = $_POST['cliente'];
  $timestamp = mktime(date("H") - 2, date("i"), date("s"), date("m"), date("d"), date("Y"));
  $time1 = gmdate("H:i:s", $timestamp);
  
//echo $data_hora;

//  $time1 = date('H:i:s', time() - date('Z'));
  
  
  if($vd_id == 0) {
	  echo'<script type="text/JavaScript">
			   alert("Por favor escolher um Vendedor!");
			   Location: javascript:history.back(1);
			  </script>
			 ';	
  }else {
	  
	$query_gravar = "insert into historico (ht_slid, ht_vdid, ht_cliente, ht_status, ht_data, ht_entrada) values('$sl_id', '$vd_id', '$cliente', '1', NOW(), '$time1')";	
	$sql = mysqli_query($conexao, $query_gravar);			 	
	$sql_sala = mysqli_query($conexao, "UPDATE salas SET sl_status = '1' WHERE sl_id = '".$sl_id."'");				 
	//$sql_vendedor = mysqli_query($conexao, "UPDATE vendedor SET vd_status = '1' WHERE vd_id = '".$vd_id."'");						
					 
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
	  
  }

?>