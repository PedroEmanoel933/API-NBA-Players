<?php
namespace Model;

use PDO;
use Model\Connection;

class Players
{
    private $connect;

    public $id;
    public $player_fullname;
    public $height;
    public $titles;
    public $status;
    public $team;
    public $position;

    public function __construct()
    {
        $this->connect = Connection::connect();
    }

    //OPERAÇÕES CRUD

    //CREATE
    public function createPlayers()
    {
        $db = "INSERT INTO players (player_fullname, height, team, titles, status, position) VALUES (:player_fullname, :height, :team, :titles, :status, :position)";
        $stmt = $this->connect->prepare($db);
        
        $stmt->bindParam(":player_fullname", $this->player_fullname, PDO::PARAM_STR);
        $stmt->bindParam(":height", $this->height, PDO::PARAM_STR);
        $stmt->bindParam(":team", $this->team, PDO::PARAM_STR);
        $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
        $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
        $stmt->bindParam(":titles", $this->titles, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // READ
    public function readPlayers()
    {
    
            $bd = "SELECT * FROM players";

            $stmt = $this->connect->prepare($bd);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updatePlayer()
    {
            $bd = "UPDATE players SET id = :id, player_fullname = :player_fullname, height = :height, team = :team, position = :position, status = :status";
            $stmt = $this->connect->prepare($bd);

            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->bindParam(":player_fullname", $this->player_fullname, PDO::PARAM_STR);
            $stmt->bindParam(":height", $this->height, PDO::PARAM_STR);
            $stmt->bindParam(":team", $this->team, PDO::PARAM_STR);
            $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
            $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
            $stmt->bindParam(":titles", $this->titles, PDO::PARAM_STR);

            $stmt->execute();
            return true;
        
    }

    // DELETE
    public function deletePlayer()
    {
            $bd = "DELETE FROM players WHERE id = :id";
            $stmt = $this->connect->prepare($bd);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } 
}
?>