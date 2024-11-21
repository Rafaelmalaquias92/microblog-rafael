<?php
require "conecta.php";

function executarQuery($conexao, $sql){
    $consulta = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return $consulta;
}

// Função para inserir novos usuarios
function inserirUsuario($conexao, $nome, $email, $senha, $tipo)
{
    // Montando o comando SQL para fazer o INSERT dos dados
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo)
VALUES('$nome', '$email', '$senha', '$tipo')";


    // Executando o comando no banco via php
    executarQuery($conexao, $sql);
}

function listarUsuarios($conexao){
    $sql = "SELECT nome, email, tipo, id FROM usuarios";

    // Executando o comando no banco via php
    // obtendo resultado ("bruto") da consulta/comando.

   $resultado = executarQuery($conexao, $sql);

   // Extraindo do resultado "bruto" os dados da consulta em formato de ARRAY ASSOCIATIVO.
   
   return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function listarUmUsuario($conexao, $id){
// Comando SELECT para carregar dados de UMA PESSOA atraves do ID 
$sql = "SELECT * FROM usuarios WHERE id = $id";

// Execução e Verificação do comando SQL
$resultado = executarQuery($conexao, $sql);

// Extração dos dados de UMA PESSOA como ARRAY Associativo
return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET
    nome = '$nome',
    email = '$email',
    senha = '$senha',
    tipo = '$tipo'
    WHERE id = $id"; // NÃO ESQUEÇA NUNCA ESSA BAGAÇA!

// Execução e Verificação do comando SQL
$resultado = executarQuery($conexao, $sql);
    
}

function excluirUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    executarQuery($conexao, $sql);
}

function buscarUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = executarQuery($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}