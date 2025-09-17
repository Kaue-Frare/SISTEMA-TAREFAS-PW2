<?php

include('../../connection/conn.php');

if(empty($_POST['NAME']) || empty($_POST['EMAIL']) || empty($_POST['PASSWORD']) || empty($_POST['LEVEL']) || empty($_POST['ID'])){
    $dados = array(
        "type" => "Error",
        "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
} else {
    try {
        $sql = "UPDATE user SET NAME = ?, EMAIL = ?, PASSWORD = ?, LEVEL = ? WHERE ID = ?"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['NAME'],
            $_POST['EMAIL'],
            $_POST['PASSWORD'],
            $_POST['LEVEL'],
            $_POST['ID']
        ]);
        $dados = array(
            "type" => "Success",
            "message" => "Registro atualizado com sucesso." 
        );
    } catch (PDOException $e) {
        $dados = array(
            "type" => "Error",
            "message" => "Erro ao atualizar registro: " . $e->getMessage()
        ); 
    }
}

$pdo = null;
echo json_encode($dados);
