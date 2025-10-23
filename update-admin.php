<?php

  include('includes/mysql.php');

  // Tabela destino
  $id=$_POST['id'];
  
  $AD_Nome=$_POST['AD_Nome'];
  $AD_UsuarioLogin=$_POST['AD_UsuarioLogin'];
  $AD_Password=$_POST['AD_Password'];
  $AD_Tipo=$_POST['AD_Tipo'];
  
  $sql = mysql_query("UPDATE administrador SET AD_Nome='".$AD_Nome."', AD_UsuarioLogin='".$AD_UsuarioLogin."', AD_Password='".$AD_Password."', AD_Tipo='".$AD_Tipo."' WHERE AD_Id = '".$id."'");
  
				
	 $yourURL="form_admin.php?id=".$id;
						  		 
      if (mysql_error()) {
  	         echo'<script type="text/JavaScript">
                   alert("Cadastro não foi atualizado. Contate o Administrador!");
				   Location: javascript:history.back(1);
                  </script>
		         ';	
      }else{
             echo"<script type='text/JavaScript'>
                   alert('Atualizacao efetuada com sucesso. Obrigado!');
				   location.href='$yourURL'
                  </script>  
                 ";
      }				
  
?>