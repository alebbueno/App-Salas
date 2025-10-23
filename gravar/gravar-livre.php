<?php

  include('../includes/mysql.php');

  // Tabela destino
  $sl_id = $_GET['sl_id'];
  		 
  $sql = mysqli_query($conexao, "UPDATE salas SET sl_status = '0' WHERE sl_id = '".$sl_id."'");	
  						 
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