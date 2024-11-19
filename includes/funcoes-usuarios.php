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

function listarUsuarios($conexao){
    $sql = "SELECT nome, email, tipo, id FROM usuarios";

    // Executando o comando no banco via php
    // obtendo resultado ("bruto") da consulta/comando.

   $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

   // Extraindo do resultado "bruto" os dados da consulta em formato de ARRAY ASSOCIATIVO.
   
   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function listarUmUsuario($conexao, $id){
// Comando SELECT para carregar dados de UMA PESSOA atraves do ID 
$sql = "SELECT * FROM usuarios WHERE id = $id";

// Execução e Verificação do comando SQL
$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

// Extração dos dados de UMA PESSOA como ARRAY Associativo
return mysqli_fetch_assoc($resultado);
}