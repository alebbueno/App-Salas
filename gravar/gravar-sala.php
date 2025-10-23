<?php

  include('../includes/mysql.php');

  // Tabela destino
  $sl_nome=$_POST['nome'];
  $sl_id = $_POST['id'];
  
  if ($sl_id > 0){
	  
	  $sql = mysqli_query($conexao, "UPDATE salas SET sl_nome='".$sl_nome."' WHERE sl_id = '".$sl_id."'");
				  		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi atualizado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo"<script type='text/JavaScript'>
                   alert('Atualizacao efetuada com sucesso. Obrigado!');
				   location.href='../view-salas.php'
                  </script>  
                 ";
      }
	  
  }else {
	  $sql = mysqli_query($conexao, "insert into salas (sl_nome, sl_status)          
			values('$sl_nome', '0')");				 
				
				 		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi efetuado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo'<script type="text/JavaScript">
                   alert("Cadastro efetuado com sucesso. Obrigado!");
				   location.href="../view-salas.php"
                  </script>  
                 ';
      }
  }

?>