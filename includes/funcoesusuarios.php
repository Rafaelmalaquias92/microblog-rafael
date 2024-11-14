<?php
require "conecta.php";

// Função para inserir novos usuarios
function inserirUsuario($conexao, $nome, $email, $senha, $tipo)
{
    // Montando o comando SQL para fazer o INSERT dos dados
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo)
VALUES('$nome', '$email', '$senha', '$tipo')";


    // Executando o comando no banco via php
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}
