CREATE DATABASE secrets_app;

use secrets_app;

CREATE TABLE users (
    id INT(255) AUTO_INCREMENT NOT NULL,
    name VARCHAR(100),
    last_name VARCHAR(200),
    nick VARCHAR(100),
    email VARCHAR(255),
    password VARCHAR(255),
    image VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    remember_token VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE secrets (
    id INT(255) AUTO_INCREMENT NOT NULL,
    secret TEXT NOT NULL,
    created_at DATE NOT NULL,
    secret_user_id INT(255) NOT NULL,
    CONSTRAINT pk_secrets PRIMARY KEY(id),
    CONSTRAINT fk_user_id FOREIGN KEY(secret_user_id) REFERENCES users(id)
)ENGINE=InnoDb;