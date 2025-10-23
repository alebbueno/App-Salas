<?php

  include('includes/mysql.php');
  // Tabela participantes
  
  $nome=$_POST['nome'];
  $foto=$_POST['foto']; 
  $ra=$_POST['ra'];  
  $escola=$_POST['escola'];
  $pai=$_POST['pai']; 
  $nivel=$_POST['nivel'];
  $login=$_POST['login'];
  $senha=$_POST['senha']; 
  
  $sql1 = mysql_query("SELECT 1 FROM aluno WHERE al_registro = '".$ra."' ");

  $resultado = mysql_num_rows($sql1);

  if($resultado > 0) {
    echo'<script type="text/JavaScript">
          alert("O aluno já esta cadastrado.");
              </script>
		';	
  }else{

   $sql2 = ("insert into aluno (al_nome, al_foto, al_registro, al_esid, al_data, al_nvid, al_login, al_senha)
                       value ('$nome','$foto','$ra','$escola','$data','$nivel','$login','$senha')") ;			   
   $sql = mysql_query($sql2);
    if (mysql_error()) {
  	    echo'<script type="text/JavaScript">
               alert("Cadastro não foi efetuado. Contate o Administrador!");
			   Location: javascript:history.back(1);
              </script>
		     ';	
    }else{
		$sqlaux = ("select al_id from aluno where al_nome = '".$nome."' and al_registro = '".$ra."' ") ;			   
        $sqlaux1 = mysql_query($sqlaux);
		$Res_Aluno = mysql_fetch_array($sqlaux1);
		$sqlaux = ("insert into pai_aluno (pa_paiid, pa_alid) values('$pai','".$Res_Aluno['al_id']."')") ;			   
		$Res_pai = mysql_query($sqlaux);
		
	}
  }
?>

</body>
</html>
