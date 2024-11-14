<?php
// Parametros de acesso ao servidor
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_rafael";

// Acessar a função de conexão ao servidor de BD
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Definindo o charset UTF8 para a conexão
mysqli_set_charset($conexao, "UTF8"); 

// Verificando a conexao 
if($conexao === false){
    die("Erro:".mysqli_connect_error());
} else {
    echo "Beleza, segue o game 💥";
}
