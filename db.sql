CREATE DATABASE IF NOT EXISTS SafeClick;
USE SafeClick;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserir usuário de exemplo (senha: 123456)
INSERT INTO usuarios (nome, email, senha) VALUES 
('Admin', 'admin@exemplo.com', '123456');

-- Consultar usuários
SELECT * FROM usuarios;

-- Verificar login (exemplo de consulta)
SELECT * FROM usuarios WHERE email = 'admin@exemplo.com';