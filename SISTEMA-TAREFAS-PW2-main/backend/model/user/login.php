<?php

include('../../connection/conn.php');

$sql = "SELECT *, count(ID) as achou FROM user WHERE email = ? AND PASSWORD = ? GROUP BY = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['EMAIL'],
    $_POST['PASSWORD']
]);
while ($resultado = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    if ($resultado['achou'] == '1') {
        session_start();
        $_SESSION['name'] = $resultado['name'];
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['level'] = $resultado['level'];
        $_SESSION['id'] = $resultado['id'];
        $dados = array(
            "type" => "Success",
            "mensege" => "Login realizado com sucesso !"
        );
    } else {
        $dados = array(
            "type" => "Error",
            "mensege" => "Email ou senha incorreta !"
        );
    }
}



$pdo = null;
echo json_encode($dados);