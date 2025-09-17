<?php

include('../../connection/conn.php');

if(empty($_POST['ID'])){
    $dados = array(
        "type"=>"Error",
        "mensege"=>"existe(m) caompo(s) obrigatorio(s) não preenchido(s)."
    );
}else{
    try{
        $sql = "DELETE FROM USER WHERE ID = ?"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['ID']
        ]);
        $dados=array(
            "type" => "Success",
            "mensege" => "Registro excluido com sucesso." 
        );
    }catch (PDOException $e) {
        $dados=array(
            "type" => "Error",
            "mensege" => "Erro ao excluir registro ".$e->getMessage()
        ); 
    }
}

$conn = null;
echo json_encode($dados);