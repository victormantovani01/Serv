<?php
// Configurações do banco de dados
$servername = "localhost";       // Geralmente "localhost"
$username   = "root";       // Usuário do banco de dados
$password   = "";         // Senha do banco de dados
$dbname     = "cadastro";     // Nome do banco de dados


//"localhost";       
//"seu_usuario";       
//"sua_senha";         
//"nome_do_banco"

// Cria a conexão com o MySQL
$conn = new mysqli($servername, $username, $password, $dbname); //($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados enviados pelo formulário via método POST
$nome         = $_POST['nome'];
$telefone     = $_POST['telefone'];
$email        = $_POST['email'];
$endereco     = $_POST['endereco'];
$data_entrega = $_POST['data_entrega'];
$observacoes  = $_POST['observacoes'];

// Prepara a consulta SQL para inserir os dados na tabela "entregas"
// Usamos prepared statements para evitar SQL Injection
$stmt = $conn->prepare("INSERT INTO serv_festa (nome, telefone, email, endereço, data_entrega, observacoes) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Erro na preparação: " . $conn->error);
}

// Associa os parâmetros (s - string) aos valores recebidos
$stmt->bind_param("ssssss", $nome, $telefone, $email, $endereco, $data_entrega, $observacoes);

// Executa a consulta
if ($stmt->execute()) {
    echo "Entrega cadastrada com sucesso!";
} else {
    echo "Erro ao Cadastrar entrega: " . $stmt->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
