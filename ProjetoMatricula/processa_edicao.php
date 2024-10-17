<?php
    include 'conexao.php'; // Inclui a conexão com o banco de dados usando PDO

    // Recebendo os dados do formulário
    $cod_aluno = $_POST['cod_aluno'];
    $nome_aluno = $_POST['nome_aluno'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $modalidade = $_POST['modalidade'];

    // Certifique-se de definir a variável $cpf, caso ela faça parte do formulário
    
    // Query SQL para atualizar o aluno
    $edita_aluno = "UPDATE aluno SET nome_aluno = :nome_aluno,
                                    senha = :senha,
                                    email = :email,
                                    modalidade = :modalidade
                                    WHERE cod_aluno = :cod_aluno";

    try {
        // Prepara a consulta
        $stmt = $conexao->prepare($edita_aluno);

        // Associa os parâmetros à consulta
        $stmt->bindParam(':nome_aluno', $nome_aluno);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_INT);
    
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':modalidade', $modalidade);
        $stmt->bindParam(':planos', $planos);
        $stmt->bindParam(':Periodo', $Periodo);
        $stmt->bindParam(':pacoteaula', $pacoteaula);
        $stmt->bindParam(':cod_aluno', $cod_aluno, PDO::PARAM_INT);

        // Executa a consulta
        $stmt->execute();

        // Redireciona para a página de visualização após a edição
        header('Location: ver_aluno.php');
    } catch (PDOException $e) {
        echo "Erro ao atualizar aluno: " . $e->getMessage();
    }
?>
