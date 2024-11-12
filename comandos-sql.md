# Operações CRUD usando SQL

## Resumo

- C: CRias/Inserir dados --->  INSERT
- R: Ler dados           --->  SELECT
- U: Atualizar dados     --->  UPDATE
- D: Excluir dados       --->  DELETE

## Exemplos para tabela "usuarios"

### Inserindo usuarios

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Rafaelmalaquiassantos','rafaelmalaquiassantos@gmail','ATECUBANOS1234','editor');

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES ('Goku','kakaroto@gmail','BULMAS4F4D4','editor');

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
    'Eu vou li pegar',
    'Tu vai ver só',
    'pegou',
    'surra.jpg',
    2
);

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'tira, tira que eu vou...',
    'Problemas estomacais',
    '💩',
    'tira.jpg',
    3
);

INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUES (
    'Normal',
    'lavar a louça que é bom nada ',
    '🏳‍🌈',
    'lavar.jpg',
    4
);

## Leitura de dados da tabela "noticias"

SELECT data, titulo FROM noticias;

## Leitura de dados da tabela "usuarios"

SELECT nome, email, tipo FROM usuarios;  
SELECT nome, email, tipo FROM usuarios WHERE tipo = 'editor';  

## Atualização de dados dos usuários

UPDATE usuarios SET email = 'rafael@gmail.com'
WHERE id = 1;

## Excluindo dados da tabela "noticias"

DELETE FROM noticias WHERE id = 1;