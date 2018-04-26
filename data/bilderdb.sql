DROP DATABASE IF EXISTS bilderdb;

CREATE DATABASE bilderdb DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;

USE bilderdb;

CREATE TABLE users(
id				INT(11) 	NOT NULL AUTO_INCREMENT,
benutzername  	VARCHAR(32) NOT NULL,
email 			VARCHAR(32) NOT NULL,
passwort 		VARCHAR(64) NOT NULL,
PRIMARY KEY (id));

CREATE TABLE gallerien(
id				INT(11) 	NOT NULL AUTO_INCREMENT,
user_id			INT(11) 	NOT NULL,
galleriename 	VARCHAR(32) NOT NULL,
bescreibung		VARCHAR(32) NOT NULL,
PRIMARY KEY (id),
	CONSTRAINT FK_users FOREIGN KEY (user_id)
    REFERENCES users(id));

CREATE TABLE bilder(
id				INT(11) 	 NOT NULL AUTO_INCREMENT,
gallerie_id 	INT(11) 	 NOT NULL,
user_id 		INT(11) 	 NOT NULL,
titel			VARCHAR(32)  NOT NULL,
bescreibung		VARCHAR(128) NOT NULL,
bild_pfad 		VARCHAR(64)  NOT NULL,
 PRIMARY KEY (id),
    CONSTRAINT FK_gallerien FOREIGN KEY (gallerie_id)
    REFERENCES gallerien(id),
    FOREIGN KEY (user_id)
    REFERENCES users(id));
 