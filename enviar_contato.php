<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua as informações de conexão conforme necessário)
    $servername = "localhost:4306";
    $username = "root";
    $password = "";
    $dbname = "mensagem";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Prepara e executa a inserção no banco de dados
    $sql = "INSERT INTO Contatos (Nome, Email, Telefone, Assunto, Mensagem) VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
} else {
    echo "Erro: o formulário não foi enviado corretamente.";
}
?>
