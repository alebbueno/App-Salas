<?php

date_default_timezone_set('America/Sao_Paulo');
include('../includes/mysql.php');

// Tabela destino
$ep_id = $_GET['id'];
$time1 = date("Y-m-d H:i:s");

$sql = mysqli_query($conexao, "UPDATE espera SET ep_status = '3', ep_final = '".$time1."' WHERE ep_id = '".$ep_id."'");				 
                        
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
  

?>