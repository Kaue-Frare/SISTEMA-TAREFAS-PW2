<?php

include('../../connection/conn.php');

if(empty($_POST['ID']) || empty($_POST['DATETIME']) || empty($_POST['TITLE']) || empty($_POST['DESCRIPTION']) || empty($_POST['USERID'])){
    $dados = array(
        "type" => "Error",
        "mensege" => "existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
} else {
    try {
        $sql = "INSERT INTO task (ID, DATETIME, TITLE, DESCRIPTION, USERID) VALUES (?, ?, ?, ?, ?)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['ID'],
            $_POST['DATETIME'],
            $_POST['TITLE'],
            $_POST['DESCRIPTION'],
            $_POST['USERID']
        ]);
        $dados = array(
            "type" => "Success",
            "mensege" => "Registro salvo com sucesso"
        );
    } catch (PDOException $e) {
        $dados = array(
            "type" => "Error",
            "mensege" => "Erro ao salvar registro: " . $e->getMessage()
        );
    }
}

$pdo = null;
echo json_encode($dados);
