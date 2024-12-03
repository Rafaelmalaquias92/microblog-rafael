# Operações CRUD usando SQL

## Resumo

- C: Criar/Inserir dados    -> INSERT
- R: (R) Ler dados          -> SELECT
- U: (U) Atualizar dados    -> UPDATE
- D: (D) Excluir dados      -> DELETE

## Exemplos para tabela "usuarios"

### Inserindo usuarios

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Tiago', 'tiago@gmail', '123senac', 'admin');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Chapolin', 'chapolin@gmail', '456', 'editor');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Didi Mocó', 'didi@msn', '000', 'editor');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Naruto', 'naruto@gmail.com', '000', 'editor');

### Inserindo noticias

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Meu pai ganhou na mega-sena',
    'To rico, tchau pra vcs',
    'Jogou e ganhou',
    'premio.jpg',
    1
);

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Corinthians classificado para a pré-libertadores',
    'Ganhamos todos os jogos finais',
    'Agora vai',
    'corinthians.png',
    4
);

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Inteligência Artificial revolucionou o mundo',
    'As IAs estão cada vez mais inseridas no nosso dia a dia',
    'Há opções gratuitas',
    'ia.jpg',
    1
);

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Lançada nossa versão do Office 365',
    'Agora há suporte nativo ao Copilot',
    'Tarefas simplificadas...',
    'office.jpg',
    2
);

## Leitura de dados da tabela "noticias"

SELECT data, titulo FROM noticias;

SELECT * FROM noticias;


## Leitura de dados da tabela "usuarios"

SELECT nome, email, tipo FROM usuarios;

SELECT nome, email, tipo FROM usuarios WHERE tipo = 'editor';

## Atualização de dados dos usuários

UPDATE usuarios SET email = 'tiago@gmail.com'
WHERE id = 1;

## Excluindo dados da tabela "noticias"

DELETE FROM noticias WHERE id = 1;





