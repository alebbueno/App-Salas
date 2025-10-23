<?php

include('../includes/mysql.php');
 
  
$id = $_GET['id'];  // MUDEI AQUI

$sql = mysqli_query($conexao, "DELETE from administrador WHERE AD_Id = '".$id."'");

if (!$sql) {
      echo'<script type="text/JavaScript">
            alert("Cadastro não foi excluido. Contate o Administrador!");
                  Location: javascript:history.back(1);
      </script>
';	
}else{
      echo'<script type="text/JavaScript">
            alert("Cadastro excluido com sucesso. Obrigado!");
                  location.href="../view-admin.php"
            </script>  
      ';
}
?>