CREATE DATABASE hospital;

USE hospital;


CREATE TABLE paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    tipo_sanguineo VARCHAR(10) NOT NULL
);


CREATE TABLE medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL
);


CREATE TABLE Consulta (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    observacoes VARCHAR(100) NOT NULL,
    data_hora DATE NOT NULL,
    medico_id INT,
    paciente_id INT,
    FOREIGN KEY (paciente_id) REFERENCES paciente(id),
    FOREIGN KEY (medico_id) REFERENCES medico(id) 
);