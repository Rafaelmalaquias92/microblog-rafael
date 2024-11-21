<?php
require "../includes/funcoes-usuarios.php";
verificarAcesso();

require "../includes/funcoes-usuarios.php";

// Pegando o ID passado via URL
$id = $_GET['id'];

// Chamando a função de excluir passando o ID do usuario
excluirUsuario($conexao, $id);

// Redirecionamento para a página com todos os usuarios
header("location:usuarios.php");