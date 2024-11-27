<?php
require "conecta.php";

// Usada em admin/noticia-insere.php
function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeDaImagem, $usuarioId)
{
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
    VALUES ('$titulo', '$texto', '$resumo', '$nomeDaImagem', $usuarioId)";

    executarQuery($conexao, $sql);
}


// Usada em admin/noticias.php
function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{

    if ($tipoUsuario === 'admin') {
        $sql = "SELECT 
                noticias.id, noticias.titulo, 
                noticias.data, usuarios.nome
            FROM noticias JOIN usuarios
            ON noticias.usuario_id = usuarios.id
            ORDER BY data DESC";
    } else {
        // Não é admin? Pode ver somente os dados dele/dela (EDITOR)
        $sql = "SELECT id, titulo, data FROM noticias
    WHERE usuario_id = $idUsuario
    ORDER BY data DESC";
    }

    $resultado = executarQuery($conexao, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// Usada em admin/noticia-atualiza.php
function lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario){
    if ($tipoUsuario === 'admin') {
        // Pode carregar/ver dados de qualquer noticia 
        $sql = "SELECT * FROM noticias WHERE id = $idNoticia";
    } else {
        // Senão, pode carregar/ver dados SOMENTE DAS SUAS PRÒPRIAS noticias
        $sql = "SELECT * FROM noticias 
    WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    $resultado = executarQuery($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}


// Usada em admin/noticia-atualiza.php
function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario) {
    if($tipoUsuario === 'admin'){
        // Pode atualizar QUALQUER noticia
        $sql = "UPDATE noticias SET 
        titulo = '$titulo', texto = '$texto',
        resumo = '$resumo', imagem = '$imagem'
        WHERE id = $idNoticia"; // NÂO ESQUECE DEU SAR WHERE
    } else {
        // Senão, pode atualizar SOMENTE SUAS PROPRIAS noticias
        $sql = "UPDATE noticias SET 
        titulo = '$titulo', texto = '$texto',
        resumo = '$resumo', imagem = '$imagem'
        WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    executarQuery($conexao, $sql);
}


// Usada em admin/noticia-exclui.php
function excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario ) {
    if($tipoUsuario === 'admin'){
        $sql = "DELETE FROM noticias WHERE id = $idNoticia";
    } else {
        $sql = "DELETE FROM noticias WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    executarQuery($conexao, $sql);
}

/* *********** */


/* Funções utilitárias */

function executarQuery($conexao, $sql)
{
    $consulta = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return $consulta;
}

function formataData($data)
{
    /* Pega a data/hora em formato ANO-MÊS-DIA HORA:MINUTO e 
	transforma em DIA/MÊS/ANO HORA:MINUTO */
    return date("d/m/Y H:i", strtotime($data));
}

function upload($arquivo)
{

    /* Array para validação dos tipos permitidos */
    $tiposValidos = [
        "image/png",
        "image/jpeg",
        "image/gif",
        "image/svg+xml"
    ];

    /* Verificando se o tipo do arquivo NÃO É 
    um dos existentes no array tiposValidos */
    if (!in_array($arquivo['type'], $tiposValidos)) {
        // Se não for para tudo, dá um alerta e volta pra página anterior
        echo "<script> 
                alert('Formato inválido!');
                history.back();
            </script>";
        exit; // mesma coisa que o die()
    }

    /* Pegando apenas o nome/extensão do arquivo */
    $nome = $arquivo['name'];

    /* Obtendo do servidor o local/nome temporário
    para o processo de upload */
    $temporario = $arquivo['tmp_name'];

    /* Definindo da pasta de destino + nome do arquivo da imagem */
    $destino = "../imagens/" . $nome;

    /* Movendo o arquivo/imagem da área temporária
    para a pasta de destino indicada (imagens) */
    move_uploaded_file($temporario, $destino);
}
