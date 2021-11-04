
CREATE TABLE planilha (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    rotulo TEXT ,
    arquivo TEXT ,
    data_upload TEXT 
);

CREATE TABLE aluno (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    matricula TEXT ,
    cpf_discente TEXT ,
    campus_curso TEXT ,
    codigo_curso TEXT ,
    nome_curso TEXT ,
    qtd_disciplinas2021 INTEGER ,
    cidade_moradia TEXT ,
    estado_moradia TEXT ,
    cep TEXT ,
    endereco TEXT ,
    renda_per_capta NUMERIC ,
    faixa_renda TEXT ,
    codigo_chip TEXT 
);

CREATE TABLE usuario (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    email TEXT ,
    login TEXT ,
    senha TEXT ,
    nivel INTEGER 
);

ALTER TABLE aluno ADD COLUMN  id_planilha  INTEGER ;