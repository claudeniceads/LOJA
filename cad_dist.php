<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO distribuidora (nome, cnpj, celular)
    VALUES (:nome, :cnpj, :celular)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':celular', $celular);

    $nome           = $_POST['nome'];
    $cnpj           = $_POST['cnpj'];
    $celular        = $_POST['celular'];

    $stmt->execute();


    echo "Distribuidora cadastrada com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_dist.php');
?> 