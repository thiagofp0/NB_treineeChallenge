create table tbPessoa(
	idPessoa integer not null auto_increment,
    nmPessoa varchar (100),
    cargo varchar (25),
    email varchar(75),
    idGrupoAcesso integer not null,
    primary key(idPessoa),
    foreign key(idGrupoAcesso) references tbGrupoAcesso(idgrupoAcesso)
);

create table tbAtividade(
	idAtividade integer not null auto_increment,
    desAtividade varchar(50),
    dataAtividade date,
    pontos integer not null,
	primary key(idAtividade)
);

create table tbPessoaAtividade(
	idPessoa integer not null,
    idAtividade integer not null,
    foreign key(idPessoa) references tbPessoa(idPessoa),
    foreign key(idAtividade) references tbAtividade(idAtividade)
);

create table tbGrupoAcesso(
	idGrupoAcesso integer not null,
    nmGrupoAcesso varchar(50),
    primary key(idGrupoAcesso)
);

CREATE TABLE `login`(
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));

INSERT INTO `login` (`usuario_id`,`usuario`,`senha`) VALUES (1,'canalti','10f722b5984a49bce67d434464fae37e');
INSERT INTO `login` (`usuario_id`,`usuario`,`senha`) VALUES (2,'pedrinho','202cb962ac59075b964b07152d234b70');
insert into login values(3, 'admin', 'admin');

alter table tbpessoa add idGrupoAcesso integer not null;
alter table tbpessoa add  foreign key(idGrupoAcesso) references tbGrupoAcesso(idGrupoAcesso);
alter table tbpessoaatividade add idpessoaatividade integer not null auto_increment primary key;

rename table login to tblogin;
insert into tbgrupoacesso values(0, 'Admin');
insert into tbgrupoacesso values(1, 'Diretor');
insert into tbpessoa (nmpessoa, cargo, email, idgrupoacesso) values('Sávio', 'Dev', 'email2@email.com', 1);
insert into tbatividade (desAtividade, dataAtividade, pontos) values ('aplicativo', '21/02/18', 500);
insert into tbpessoaatividade (idpessoa, idAtividade) values (2,2);

SELECT idpessoa from tbpessoa;

SELECT nmpessoa, email, sum(pontos) as Pontos FROM tbPessoa p INNER JOIN tbPessoaAtividade pa inner join tbatividade a on p.idPessoa = pa.idPessoa and pa.idatividade = a.idatividade where p.idPessoa = 1;

/*Select (desAtividade, pontos, idPessoaAtividade) from tbAtividade a inner join tbPessoaAtividade pa on a.idAtividade = pa.idAtividade inner join tbpessoa on pa.idPessoa = p.idPessoa where pa.idPessoa = 1;*/

select (desAtividade, pontos, idPessoaAtividade) from tbatividade a inner join tbpessoaatividade pa on a.idatividade = pa.idatividade where pa.idPessoa = 1;