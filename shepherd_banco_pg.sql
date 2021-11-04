
CREATE TABLE planilha (
        id serial NOT NULL, 
        CONSTRAINT pk_planilha PRIMARY KEY (id), 
        rotulo character varying(400), 
        arquivo character varying(200), 
        data_upload timestamp without time zone
);

CREATE TABLE aluno (
        id serial NOT NULL, 
        CONSTRAINT pk_aluno PRIMARY KEY (id), 
        nome character varying(400), 
        matricula character varying(400), 
        cpf_discente character varying(400), 
        campus_curso character varying(400), 
        codigo_curso character varying(400), 
        nome_curso character varying(400), 
        qtd_disciplinas2021 integer, 
        cidade_moradia character varying(400), 
        estado_moradia character varying(400), 
        cep character varying(400), 
        endereco character varying(400), 
        renda_per_capta numeric(8,2), 
        faixa_renda character varying(400), 
        codigo_chip character varying(400)
);

CREATE TABLE usuario (
        id serial NOT NULL, 
        CONSTRAINT pk_usuario PRIMARY KEY (id), 
        nome character varying(400), 
        email character varying(400), 
        login character varying(400), 
        senha character varying(400), 
        nivel integer
);

ALTER TABLE aluno ADD COLUMN  id_planilha  integer ;

ALTER TABLE aluno 
    ADD CONSTRAINT
    fk_planilha_alunos FOREIGN KEY (id_planilha)
    REFERENCES planilha (id);
