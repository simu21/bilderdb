DROP DATABASE IF EXISTS bilderdb;

CREATE DATABASE bilderdb DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;

USE bilderdb;

CREATE TABLE "user" (
id				INT(11) NOT NULL AUTO_INCREMENT,
benutzername  	VARCHAR(32) NOT NULL,
email 			VARCHAR(32) NOT NULL,
passwort 		VARCHAR(64) NOT NULL,
PRIMARY KEY (id));

CREATE TABLE "gallerie"(
id				INT(11) NOT NULL AUTO_INCREMENT,
user_id			INT(11) NOT NULL,
galleriename 	VARCHAR(32) NOT NULL,
bescreibung		VARCHAR(32) NOT NULL,
PRIMARY KEY (id),
	CONSTRAINT FK_user FOREIGN KEY (user_id)
    REFERENCES user(id));

CREATE TABLE "bilder"(
id				INT(11) NOT NULL AUTO_INCREMENT,
gallerie_id 	INT(11) NOT NULL,
user_id 		INT(11) NOT NULL,
titel			VARCHAR(32) NOT NULL,
bescreibung		VARCHAR(128) NULL,
bild_pfad 		VARCHAR(64) NOT NULL,
 PRIMARY KEY (id),
    CONSTRAINT FK_gallerie FOREIGN KEY (gallerie_id)
    REFERENCES gallerie(id),
    CONSTRAINT FK_user FOREIGN KEY (user_id)
    REFERENCES user(id));
 