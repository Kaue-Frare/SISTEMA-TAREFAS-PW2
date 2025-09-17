<?php

include('../../connection/conn.php');

if(empty($_POST['NAME']) || empty($_POST['EMAIL']) || empty($_POST['PASSWORD']) || empty($_POST['LEVEL'])){
    $dados = array(
        "type"=>"Error",
        "mensege"=>"existe(m) caompo(s) obrigatorio(s) não preenchido(s)."
    );
}else{
    try{
        $sql = "INSERT INTO user (NAME, EMAIL, PASSWORD, LEVEL) VALUES (?, ?, ?, ?)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['NAME'],
            $_POST['EMAIL'],
            $_POST['PASSWORD'],
            $_POST['LEVEL']
        ]);
        $dados=array(
            "type" => "Success",
            "mensege" => "Registro salvo com sucesso" 
        );
    }catch (PDOException $e) {
        $dados=array(
            "type" => "Error",
            "mensege" => "Erro ao salvar registro: ".$e->getMessage()
        ); 
    }
}

$conn=null;
echo json_encode($dados);