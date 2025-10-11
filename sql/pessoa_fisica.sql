CREATE TABLE pessoa_fisica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conta_id INT NOT NULL,
    nome_completo VARCHAR(150) NOT NULL,
    cpf CHAR(11) NOT NULL UNIQUE,
    data_nascimento DATE,
    FOREIGN KEY (conta_id) REFERENCES conta(id)
);