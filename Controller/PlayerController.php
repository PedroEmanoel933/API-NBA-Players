<?php

namespace Controller;

use Model\Players;

class PlayerController{
    public function getPlayers(){
    $id = $_GET['id'] ?? null;
    $team = $_GET['team'] ?? null;
    $status = $_GET['status'] ?? null;
    $position = $_GET['position'] ?? null;
    $player = new Players();

    if ($id){
        $byid = $player->getById($id);
        if ($byid) {
            header('Content-Type: application/json', true, 200);
            echo json_encode($byid);
        } else {
            header('Content-Type: application/json', true, 404);
            echo json_encode(["message" => "Player not found"]);
        }
    } else if ($team) {
        $byteam = $player->getByTeam($team);
        header('Content-Type: application/json', true, 200);
        echo json_encode($byteam);
    } else if ($status) {
        $bystatus = $player->getByStatus($status);
        header('Content-Type: application/json', true, 200);
        echo json_encode($bystatus);
    } else if($position){
        $byposition = $player->getByPosition($position);
        header('Content-Type: application/json', true, 200);
        echo json_encode($byposition);
    }else {
        $players = $player->readPlayers();
        if($players){
            header("Content-Type: application/json", true, 200);
            echo json_encode($players);
        } else {
            header("Content-Type: application/json", true, 404);
            echo json_encode(["message" => "Not found"]);
        }
    }

}

    public function addPlayer(){
        

        // Obtendo os dados da requisição 
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->player_fullname) && isset($data->height) && isset($data->status) && isset($data->team) && isset($data->titles) && isset($data->position)){   
            $player = new Players();

            // PARA REMOVER ESPAÇOS EXTRAS (TRIM) E TRANSFORMAR CARACTERES ESPECIAIS EM HTML (htmlspecialchars)
            $player->player_fullname = htmlspecialchars(trim($data->player_fullname));
            $player -> height = htmlspecialchars(trim($data->height));
            $player -> status = htmlspecialchars(trim($data->status));
            $player -> team = htmlspecialchars(trim($data->team));
            $player -> titles = htmlspecialchars(trim($data->titles));
            $player -> position = htmlspecialchars(trim($data->position));

            if($player -> createPlayers()){
                header("Content-Type: application/json", true, 201);
                echo json_encode(["message" => "User created successfully"]);
            } else {
                header("Content-Type: application/json", true, 500);
                echo json_encode(["message" => "Failed to create user"]);
            }
        } else {
            header("Content-Type: application/json", true, 400); 
            echo json_encode(["message" => "Invalid input"]);
        }
    }

    public function editPlayer(){
     // Obtendo os dados da requisição 
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->player_fullname) && isset($data->height) && isset($data->status) && isset($data->team) && isset($data->titles)){   
            $player = new Players();

            // PARA REMOVER ESPAÇOS EXTRAS (TRIM) E TRANSFORMAR CARACTERES ESPECIAIS EM HTML (htmlspecialchars)
            $player->id = htmlspecialchars(trim($data->id));
            $player->player_fullname = htmlspecialchars(trim($data->player_fullname));
            $player -> height = htmlspecialchars(trim($data->height));
            $player -> status = htmlspecialchars(trim($data->status));
            $player -> team = htmlspecialchars(trim($data->team));
            $player -> titles = htmlspecialchars(trim($data->titles));
            $player -> position = htmlspecialchars(trim($data->position));

            if($player -> updatePlayer()){
                header("Content-Type: application/json", true, 200);
                echo json_encode(["message" => "Jogador editado com sucesso"]);
            } else {
                header("Content-Type: application/json", true, 500);
                echo json_encode(["message" => "Erro ao editar o jogador"]);
            }
        } else {
            header("Content-Type: application/json", true, 400);
            echo json_encode(["message"=> "Erro ao inserir dados"]);
        }
    }

    public function removePlayer(){
        $id = $_GET['id'] ?? null;

        if($id){
            $player = new Players();
            $player -> id = $id;

            if($player -> deletePlayer()){    
             header("Content-Type: application/json", true, 200);
                echo json_encode(["message" => "Jogador excluído com sucesso"]);
            } else {
                header("Content-Type: application/json", true, 500);
                echo json_encode(["message" => "Erro ao excluír o jogador"]);
            }
        } else {
            header("Content-Type: application/json", true, 400);
            echo json_encode(["message" => "Entrada Inválida"]);
        }
    }
}
?>