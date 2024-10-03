<?php
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Estrutura da tabela de alunos - início do desenvolvimento em 01/10 às 9:25 -->
    <div class="container">
        <h1>Cadastro de Alunos</h1>
        
        <!-- Formulário de cadastro de alunos - desenvolvido em 01/10 às 10:10 -->
        <form action="cadastro.php" method="POST" class="form-cadastro">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" required>

            <button type="submit">Cadastrar</button>
        </form>

        <!-- Formulário de pesquisa - ajustado em 01/10 às 10:30 -->
        <form method="GET" action="" class="form-pesquisa">
            <?php
            // Verifica se foi feita uma pesquisa e armazena o termo
            $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
            ?>
            <input type="text" name="pesquisa" placeholder="Pesquisar por nome ou curso" value="<?php echo htmlspecialchars($pesquisa); ?>">
            <button type="submit">Pesquisar</button>
        </form>

        <!-- Tabela de Alunos - completada em 01/10 às 10:40 -->
        <h2>Alunos Cadastrados</h2>
        <table class="table-alunos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta com ou sem pesquisa - implementado em 01/10 às 11:00
                if ($pesquisa) {
                    // Prepara a consulta de pesquisa com base no nome ou curso
                    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' OR curso LIKE '%$pesquisa%'";
                } else {
                    // Consulta padrão para listar todos os alunos
                    $sql = "SELECT * FROM alunos";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Exibe os alunos cadastrados - desenvolvimento em 01/10 às 11:20
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['idade']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['curso']}</td>
                                <td><a href='deletar.php?id={$row['id']}' class='btn-delete'>Excluir</a></td>
                              </tr>";
                    }
                } else {
                    // Caso não haja alunos cadastrados ou encontrados
                    echo "<tr><td colspan='6'>Nenhum aluno encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
