CREATE DATABASE rt7 CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE rt7.eventos ( 
	evt_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	evt_data DATETIME NOT NULL,
	evt_descr VARCHAR(100) NOT NULL,
	evt_flg_ativo VARCHAR(1) NOT NULL
);

CREATE TABLE rt7.usuarios (
    usr_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usr_nome VARCHAR(200) NOT NULL,
    usr_email VARCHAR(200) UNIQUE NOT NULL,
    usr_senha VARCHAR(200) NOT NULL
);

CREATE TABLE rt7.tokens (
    tkn_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tkn_usr_id INT UNSIGNED NOT NULL,
    tkn_token VARCHAR(1000) NOT NULL,
    tkn_refresh_token VARCHAR(1000) NOT NULL,
    tkn_expired_at DATETIME NOT NULL,
    tkn_active TINYINT UNSIGNED NOT NULL DEFAULT 1,
    CONSTRAINT fk_tokens_usuarios_id_usuarios_id
        FOREIGN KEY (tkn_usr_id) REFERENCES usuarios(usr_id)
);

CREATE TABLE rt7.noticias (
   ntc_id INT NOT NULL PRIMARY KEY auto_increment,
   ntc_titulo VARCHAR(100) NOT NULL,
   ntc_subtitulo text NULL,
   ntc_texto text NOT NULL,
   ntc_imagem VARCHAR(255) default NULL,
   ntc_data DATETIME NOT NULL
);