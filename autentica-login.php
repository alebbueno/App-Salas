<?php
// Conex�o com o banco de dados
require "includes/mysql.php";

// Inicia sess�es
session_start();

// Recupera o login
$login = $_POST["email"];
// Recupera a senha, a criptografando em MD5
$senha = $_POST["senha"];

// Usu�rio n�o forneceu a senha ou o login
if(!$login || !$senha)
{
    echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
    exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o n�mero de linhas retornadas seja 1 o login � v�lido,
* caso 0, inv�lido.
*/
$SQL = "SELECT ad_id, ad_nome, ad_usuariologin, ad_password
        FROM administrador
        WHERE ad_usuariologin = '" . $login . "'";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
if($total)
{
    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
    $dados = @mysql_fetch_array($result_id);

    // Agora verifica a senha
    if(!strcmp($senha, $dados["ad_password"]))
    {
        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
        $_SESSION["id_usuario"]   = $dados["ad_id"];
        $_SESSION["nome_usuario"] = stripslashes($dados["ad_nome"]);
        echo'<script type="text/JavaScript">
			  location.href="home.php"
             </script>  
            ';
        exit;
    }
    // Senha inv�lida
    else
    {
        echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
        exit;
    }
}
// Login inv�lido
else
{
    echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
    exit;
}
?>