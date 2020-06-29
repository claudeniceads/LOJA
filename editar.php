<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE distribuidora SET nome=:nome, cnpj=:cnpj, 
    celular=:celular WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':celular', $celular);

    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $cnpj           = $_POST['cnpj'];
    $celular        = $_POST['celular'];

    $stmt->execute();


    echo "Distribuidora atualizada com sucesso!<br>";
    echo $id;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    //header('Location: index_dist.php');
?> 