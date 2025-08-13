<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Controller\PlayerController;
    $PlayerController = new PlayerController();

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'GET') {
        $PlayerController->getPlayers();
    } else if($method == 'POST') {
        $PlayerController->addPlayer();
    } else if($method == 'PUT') {
        $PlayerController-> editPlayer();
    } else if ($method == 'DELETE') {
        $PlayerController->removePlayer();
    } else{
        echo json_encode(["message" => "Method not allowed"]);
    }
?>
