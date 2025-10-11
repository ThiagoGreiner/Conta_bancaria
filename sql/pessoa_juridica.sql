CREATE TABLE pessoa_juridica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conta_id INT NOT NULL,
    razao_social VARCHAR(150) NOT NULL,
    cnpj CHAR(14) NOT NULL UNIQUE,
    nome_fantasia VARCHAR(150),
    FOREIGN KEY (conta_id) REFERENCES conta(id)
);