<?php
	$host = "mysql03.pertra.com.br";
	$user = "pertra1";
  	$pass = "pertra2006";
  	$banco = "pertra1";
	$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($banco) or die(mysql_error());
?>


<?php
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	$sql = mysql_query("select AD_UsuarioLogin,AD_Password from administrador where AD_UsuarioLogin = '$email' and AD_Password = '$senha'") or die(mysql_error());
	$row = mysql_num_rows($sql);
	if ($row > 0) {
		session_start();
		$_SESSION['email']=$_POST['email'];
		$_SESSION['senha']=$_POST['senha'];	
		echo "<center>Usuario Logado! Aguarde redirecionamento...</center>";
		echo "<script>loginsuccessfully()</script>";
	} else {
		echo "<center> dados incorretos</center>";
		echo "<script>loginfailed()</script>";	
	}
?>
