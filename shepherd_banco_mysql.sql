
CREATE TABLE IF NOT EXISTS planilha (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        rotulo VARCHAR(400), 
        arquivo VARCHAR(400), 
        data_upload  DATETIME
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS aluno (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        matricula VARCHAR(400), 
        cpf_discente VARCHAR(400), 
        campus_curso VARCHAR(400), 
        codigo_curso VARCHAR(400), 
        nome_curso VARCHAR(400), 
        qtd_disciplinas2021 INT, 
        cidade_moradia VARCHAR(400), 
        estado_moradia VARCHAR(400), 
        cep VARCHAR(400), 
        endereco VARCHAR(400), 
        renda_per_capta REAL, 
        faixa_renda VARCHAR(400), 
        codigo_chip VARCHAR(400)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS usuario (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        email VARCHAR(400), 
        login VARCHAR(400), 
        senha VARCHAR(400), 
        nivel INT
)ENGINE = InnoDB;

ALTER TABLE aluno ADD COLUMN  id_planilha  INT ;
                        
ALTER TABLE aluno
    ADD CONSTRAINT
    fk_planilha_alunos FOREIGN KEY (id_planilha)
    REFERENCES planilha (id);
