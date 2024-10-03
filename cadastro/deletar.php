<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Obtém o ID do aluno a ser excluído - 03/10 às 09:00
    $id = $_GET['id'];
    
    // Prepara o comando SQL para deletar o aluno - 03/10 às 09:05
    $sql = "DELETE FROM alunos WHERE id=$id";

    // Verifica se a exclusão foi bem-sucedida e exibe um alerta
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página principal após a exclusão - 03/10 às 09:10
        echo "<script>alert('Aluno excluído com sucesso!'); window.location.href='index.php';</script>";
    } else {
        // Exibe mensagem de erro caso a exclusão falhe - 03/10 às 09:10
        echo "Erro ao excluir o aluno: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados - 03/10 às 09:15
    $conn->close();
}
?>
