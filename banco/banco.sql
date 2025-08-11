CREATE DATABASE hospital;

USE hospital;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);  

CREATE TABLE paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    tipo_sanguineo VARCHAR(10) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);


CREATE TABLE medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);


CREATE TABLE Consulta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    observacoes VARCHAR(100) NOT NULL,
    data_hora DATE NOT NULL,
    medico_id INT,
    paciente_id INT,
    FOREIGN KEY (paciente_id) REFERENCES paciente(id) ON DELETE SET NULL,
    FOREIGN KEY (medico_id) REFERENCES medico(id) ON DELETE SET NULL
);