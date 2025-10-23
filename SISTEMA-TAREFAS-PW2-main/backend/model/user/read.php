<?php

    include('../../connection/conn.php');

    $sql = "SELECT * FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    echo json_encode($dados);