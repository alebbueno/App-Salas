<?php

  include('../includes/mysql.php');

  	// Tabela destino
  	$pi_id=$_POST['id'];
  	$pi_texto=$_POST['texto'];  
	  
	$sql = mysqli_query($conexao, "UPDATE page_inicial SET pi_texto='".$pi_texto."' WHERE pi_id = '".$pi_id."'");
				  		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi atualizado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo"<script type='text/JavaScript'>
                   alert('Atualizacao efetuada com sucesso. Obrigado!');
				   location.href='../form-pageHome.php'
                  </script>  
                 ";
      }
	  

?>