<?php
date_default_timezone_set('America/Sao_Paulo');

include('../includes/mysql.php');

// Tabela destino
$bolacha = $_POST['bolacha'];
$vd_id = $_POST['vd_id'];
$cliente = $_POST['cliente'];
$vip = $_POST['vip'];
$time1 = date("Y-m-d H:i:s");
  
//echo $data_hora;

//  $time1 = date('H:i:s', time() - date('Z'));
  
  
  if($vd_id == 0) {
	  echo'<script type="text/JavaScript">
			   alert("Por favor escolher um Vendedor!");
			   Location: javascript:history.back(1);
			  </script>
			 ';	
  }else {
	  
	$query_gravar = "insert into espera (ep_vdid, ep_cliente, ep_bolacha, ep_inicio, ep_status, ep_vip) values ('$vd_id', '$cliente', '$bolacha', '$time1', 1, '$vip')";	
	$sql = mysqli_query($conexao, $query_gravar);			 	
	//$sql_sala = mysqli_query($conexao, "UPDATE salas SET sl_status = '1' WHERE sl_id = '".$sl_id."'");				 
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
			   location.href="../espera.php"
			  </script>  
		';
  }
	  
  }

?>