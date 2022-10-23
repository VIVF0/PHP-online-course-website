CREATE TABLE usuarios (
  codusuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(250) NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(45) NULL,
  usuario VARCHAR(50) NULL,
  senha VARCHAR(150) NULL,
  foto VARCHAR(100) NULL,
  PRIMARY KEY (codusuario));