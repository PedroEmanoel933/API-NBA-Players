<?php

namespace Controller;

use Model\Players;

class PlayerController{
    public function getPlayers(){
    
    $player = new Players();
    $players = $player->readPlayers();

    if($players){
        header("Content-Type: application/json", true, 200);
        echo json_encode($players);
    } else {
        header("Content-Type: application/json", true, 404);
        echo json_encode(["message" => "Not found"]);
    }
    }

    public function addPlayer(){

        // Obtendo os dados da requisição 
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->player_fullname) && isset($data->height) && isset($data->status) && isset($data->team) && isset($data->titles) && isset($data->position)){   
            $player = new Players();
            $player -> player_fullname = $data->player_fullname;
            $player -> height = $data->height;
            $player -> status = $data->status;
            $player -> team = $data->team;
            $player -> titles = $data->titles;
            $player -> position = $data->position;

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
            $player -> player_fullname = $data->player_fullname;
            $player -> height = $data->height;
            $player -> status = $data->status;
            $player -> team = $data->team;
            $player -> titles = $data->titles;
            $player -> position = $data->position;

            if($player -> updatePlayer()){
                header("Content-Type: application/json", true, 200);
                echo json_encode(["message" => "Jogador editado com sucesso"]);
            } else {
                header("Content-Type: application/json", true, 500);
                echo json_encode(["message" => "Erro ao editar o jogador"]);
            }
        } else {
            header("Contenty-Type: application/json", true, 400);
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