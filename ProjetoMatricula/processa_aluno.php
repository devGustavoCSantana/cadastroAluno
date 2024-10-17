<?php
    require 'conexao.php';

    $nome_aluno = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $modalidade = $_POST['modalidade'];
    $planos = $_POST['planos'];
    $periodo = $_POST['periodo'];
    $pacoteaula = $_POST['pacoteaula'];

    $insere_aluno = "INSERT INTO aluno(nome_aluno, senha, email, modalidade ,planos, periodo, pacoteaula)
                VALUES (:nome_aluno, :senha, :email, :modalidade, :planos, :periodo, :pacoteaula)
    ";

    $exc = $conexao->prepare($insere_aluno);
    $exc->bindParam(":nome_aluno", $nome_aluno);
    $exc->bindParam(":senha", $senha);
    $exc->bindParam(":email", $email);
    $exc->bindParam(":modalidade", $modalidade);
    $exc->bindParam(":planos", $planos);
    $exc->bindParam(":periodo", $periodo);
    $exc->bindParam(":pacoteaula", $pacoteaula);
    $exc->execute();
    header('location: ver_aluno.php');
?>