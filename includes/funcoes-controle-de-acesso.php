 <?php

    // funcoes-controle-de-acesso.php



    /* Sessões (SESSIONS) no PHP
 
 Funcionalidade usada para o controle de acesso à determinadas
 páginas e/ou recursos do site.
 
 Exemplos: área administrativa, painel de controle, área de cliente/aluno etc.

 Nestas áreas o acesso se dá através de alguma forma de autenticação. Exemplos: login/senha, biometria, facial, 2- fatores etc...
 */

    // Verificação de sessão no PHP
    if (!isset($_SESSION)) {
        // Se não tiver, então iniciamos uma sessão
        session_start();
    }
    // Proteger o acesso ás páginas da area administrativa
    function verificarAcesso()
    {

        // Se não existir uma variavel de sessão chamada "id", então significa que o usuario não está logado
        if (!isset($_SESSION['id'])) {
            // Portanto destruimos qualquer resquicio de sessão
            session_destroy();
            // Fazemos o usuario ir para a pagina de login.php
            header("location:../login.php?acesso_negado");

            die();
        }
    }
    // Função que será usada pelo formulário login.php
    function login($id, $nome, $tipo)
    {
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
    }
    // Função que será usada quando clicar no link sair 
    function logout(){
        session_destroy();
        header("location:../login.php?saiu");
        die();
    }