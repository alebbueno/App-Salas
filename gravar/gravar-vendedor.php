<?php

  include('../includes/mysql.php');

  // Tabela destino
  $vd_nome = $_POST['nome'];
  $vd_id = $_POST['id'];
  
  if ($vd_id > 0){
	  
	  $sql = mysqli_query($conexao, "UPDATE vendedor SET vd_nome = '".$vd_nome."' WHERE vd_id = '".$vd_id."'");
				  		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi atualizado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo"<script type='text/JavaScript'>
                   alert('Atualizacao efetuada com sucesso. Obrigado!');
				   location.href='../view-vendedores.php'
                  </script>  
                 ";
      }
	  
  }else {
	  $sql = mysqli_query($conexao, "insert into vendedor (vd_nome, vd_status)          
			values('$vd_nome', '0')");				 
				
				 		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi efetuado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo'<script type="text/JavaScript">
                   alert("Cadastro efetuado com sucesso. Obrigado!");
				   location.href="../view-vendedores.php"
                  </script>  
                 ';
      }
  }

?>