
CREATE TABLE entregas (
    id INT IDENTITY(1,1) PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_entrega DATE NOT NULL,
    observacoes VARCHAR(MAX) NULL,     
    created_at DATETIME DEFAULT GETDATE() -- Data e hora da criação do registro
);

SELECT * FROM entregas;



