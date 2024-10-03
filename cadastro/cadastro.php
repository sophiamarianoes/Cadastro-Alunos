<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados enviados pelo formulário - 03/10 às 10:10
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara a inserção no banco de dados - 03/10 às 10:20
    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES ('$nome', $idade, '$email', '$curso')";

    // Verifica se o cadastro foi bem-sucedido e exibe um alerta
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página inicial após o cadastro - implementado em 03/10 às 10:25
        echo "<script>alert('Aluno cadastrado com sucesso!'); window.location.href='index.php';</script>";
    } else {
        // Exibe mensagem de erro em caso de falha - 03/10 às 10:25
        echo "Ocorreu um erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão com o banco de dados - 03/10 às 10:25
    $conn->close();
}
?>
