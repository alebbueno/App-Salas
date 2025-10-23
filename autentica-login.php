<?php
// Conexão com o banco de dados
require "includes/mysql.php";

// Inicia sessões
session_start();

// Recupera o login
$login = $_POST["email"];
// Recupera a senha, a criptografando em MD5
$senha = $_POST["senha"];

// Usuário não forneceu a senha ou o login
if(!$login || !$senha)
{
    echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
    exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/
$SQL = "SELECT ad_id, ad_nome, ad_usuariologin, ad_password
        FROM administrador
        WHERE ad_usuariologin = '" . $login . "'";
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
$total = @mysql_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
    $dados = @mysql_fetch_array($result_id);

    // Agora verifica a senha
    if(!strcmp($senha, $dados["ad_password"]))
    {
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["id_usuario"]   = $dados["ad_id"];
        $_SESSION["nome_usuario"] = stripslashes($dados["ad_nome"]);
        echo'<script type="text/JavaScript">
			  location.href="home.php"
             </script>  
            ';
        exit;
    }
    // Senha inválida
    else
    {
        echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
        exit;
    }
}
// Login inválido
else
{
    echo'<script type="text/JavaScript">location.href="index.php?erro=login"</script>';
    exit;
}
?>