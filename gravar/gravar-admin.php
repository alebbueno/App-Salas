<?php

  include('../includes/mysql.php');

  // Tabela destino
  $AD_Nome=$_POST['nome'];
  $AD_UsuarioLogin=$_POST['login'];
  $AD_Password=$_POST['senha'];
  $AD_Id = $_POST['id'];
  
  if ($AD_Id > 0){
	  
	  $query_gravar = "UPDATE administrador SET AD_Nome='".$AD_Nome."', AD_UsuarioLogin='".$AD_UsuarioLogin."', AD_Password='".$AD_Password."' WHERE AD_Id = '".$AD_Id."'";	   
    $sql = mysqli_query($conexao, $query_gravar);
				  		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi atualizado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo"<script type='text/JavaScript'>
                   alert('Atualizacao efetuada com sucesso. Obrigado!');
				   location.href='../view-admin.php'
                  </script>  
                 ";
      }
	  
  }else {
	  $query_gravar = "insert into administrador (AD_Nome, AD_UsuarioLogin, AD_Password)          
			values('$AD_Nome','$AD_UsuarioLogin','$AD_Password')";		
    $sql = mysqli_query($conexao, $query_gravar);
				
				 		 
      if (!$sql) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi efetuado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo'<script type="text/JavaScript">
                   alert("Cadastro efetuado com sucesso. Obrigado!");
				   location.href="../view-admin.php"
                  </script>  
                 ';
      }
  }

?>