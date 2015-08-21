CREATE TABLE mem_abordagem (
  idAbordagem INT(2) NOT NULL AUTO_INCREMENT,
  abordagem VARCHAR(15) NULL,
  PRIMARY KEY(idAbordagem)
);

CREATE TABLE mem_area (
  idArea INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  area INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idArea)
);

CREATE TABLE mem_contexto (
  idContexto INT(5) NOT NULL AUTO_INCREMENT,
  mem_area_idArea INTEGER UNSIGNED NOT NULL,
  mem_local_idLocal INT(2) NOT NULL,
  mem_responsavel_idResponsavel INT(3) NOT NULL,
  mem_abordagem_idAbordagem INT(2) NOT NULL,
  atividade VARCHAR(120) NOT NULL,
  dataInicio DATE NOT NULL,
  dataFinal DATE NOT NULL,
  descricao VARCHAR(500) NOT NULL,
  acesso BOOL NOT NULL,
  conservacao LONGTEXT NOT NULL,
  historico LONGTEXT NOT NULL,
  PRIMARY KEY(idContexto),
  INDEX mem_contexto_FKIndex2(mem_abordagem_idAbordagem),
  INDEX mem_contexto_FKIndex4(mem_responsavel_idResponsavel),
  INDEX mem_contexto_FKIndex3(mem_local_idLocal),
  INDEX mem_contexto_FKIndex4(mem_area_idArea)
);

CREATE TABLE mem_formato (
  idFormato INT(2) NOT NULL AUTO_INCREMENT,
  formato VARCHAR(30) NOT NULL,
  PRIMARY KEY(idFormato)
);

CREATE TABLE mem_identificacao (
  idIdentificacao INT(5) NOT NULL AUTO_INCREMENT,
  mem_contexto_idContexto INT(5) NOT NULL,
  mem_url_idUrl INT(4) NOT NULL,
  mem_medicao_idMedicao INT(4) NOT NULL,
  mem_formato_idFormato INT(2) NOT NULL,
  mem_suporte_idSuporte INT(2) NOT NULL,
  mem_tecnica_idTecnica INT(2) NOT NULL,
  mem_tipo_idTipo INT(2) NOT NULL,
  mem_notacao_idNotacao INT(2) NOT NULL,
  dataInicio DATE NOT NULL,
  dataFinal DATE NOT NULL,
  PRIMARY KEY(idIdentificacao),
  INDEX mem_identificacao_FKIndex1(mem_notacao_idNotacao),
  INDEX mem_identificacao_FKIndex2(mem_tipo_idTipo),
  INDEX mem_identificacao_FKIndex3(mem_tecnica_idTecnica),
  INDEX mem_identificacao_FKIndex4(mem_suporte_idSuporte),
  INDEX mem_identificacao_FKIndex5(mem_formato_idFormato),
  INDEX mem_identificacao_FKIndex6(mem_medicao_idMedicao),
  INDEX mem_identificacao_FKIndex7(mem_url_idUrl),
  INDEX mem_identificacao_FKIndex8(mem_contexto_idContexto)
);

CREATE TABLE mem_local (
  idLocal INT(2) NOT NULL AUTO_INCREMENT,
  nomeLocal VARCHAR(50) NOT NULL,
  PRIMARY KEY(idLocal)
);

CREATE TABLE mem_log (
  idLog INT(2) NOT NULL AUTO_INCREMENT,
  dataLog DATETIME NOT NULL,
  descricao LONGTEXT NOT NULL,
  idUsuario INT(2) NULL,
  PRIMARY KEY(idLog)
);

CREATE TABLE mem_medicao (
  idMedicao INT(4) NOT NULL AUTO_INCREMENT,
  exemplar VARCHAR(60) NOT NULL,
  paginas VARCHAR(10) NULL,
  altura VARCHAR(10) NULL,
  larguraComprimento VARCHAR(20) NULL,
  profundidade VARCHAR(10) NULL,
  duracao VARCHAR(10) NULL,
  tamanhoDigital VARCHAR(20) NULL,
  dimensaoDigital VARCHAR(20) NULL,
  PRIMARY KEY(idMedicao)
);

CREATE TABLE mem_notacao (
  idNotacao INT(2) NOT NULL AUTO_INCREMENT,
  primeiroSegmento LONGTEXT NULL,
  segundoSegmento LONGTEXT NULL,
  terceiroSegmento LONGTEXT NULL,
  PRIMARY KEY(idNotacao)
);

CREATE TABLE mem_responsabilidade (
  idResponsabilidade INT(2) NOT NULL AUTO_INCREMENT,
  responsabilidade VARCHAR(30) NOT NULL,
  PRIMARY KEY(idResponsabilidade)
);

CREATE TABLE mem_responsavel (
  idResponsavel INT(3) NOT NULL AUTO_INCREMENT,
  mem_responsabilidade_idResponsabilidade INT(2) NOT NULL,
  nome VARCHAR(80) NOT NULL,
  telefoneContato VARCHAR(10) NOT NULL,
  email VARCHAR(60) NOT NULL,
  instituicao VARCHAR(30) NOT NULL,
  PRIMARY KEY(idResponsavel),
  INDEX mem_responsavel_FKIndex1(mem_responsabilidade_idResponsabilidade)
);

CREATE TABLE mem_suporte (
  idSuporte INT(2) NOT NULL AUTO_INCREMENT,
  suporte VARCHAR(20) NULL,
  PRIMARY KEY(idSuporte)
);

CREATE TABLE mem_tecnica (
  idTecnica INT(2) NOT NULL AUTO_INCREMENT,
  tecnica VARCHAR(20) NOT NULL,
  PRIMARY KEY(idTecnica)
);

CREATE TABLE mem_tipo (
  idTipo INT(2) NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(20) NOT NULL,
  PRIMARY KEY(idTipo)
);

CREATE TABLE mem_url (
  idUrl INT(4) NOT NULL AUTO_INCREMENT,
  link VARCHAR(150) NULL,
  PRIMARY KEY(idUrl)
);

CREATE TABLE mem_usuario (
  idUsuario INT(2) NOT NULL AUTO_INCREMENT,
  mem_log_idLog INT(2) NOT NULL,
  nome VARCHAR(60) NULL,
  telefoneContato VARCHAR(10) NULL,
  email VARCHAR(60) NULL,
  senha VARCHAR(8) NULL,
  PRIMARY KEY(idUsuario),
  INDEX mem_usuario_FKIndex1(mem_log_idLog)
);


