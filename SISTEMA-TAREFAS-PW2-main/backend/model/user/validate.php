<?PHP

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['level'])) {
    $dados = array(
        "type" => "Success",
        "mensege" => "usuario validado !"
    );
} else {
    $dados = array(
        "type" => "Error",
        "mensege" => "usuario não validado !"
    );
}

echo json_encode($dados);