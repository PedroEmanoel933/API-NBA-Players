<?php
    namespace Model;

    use PDO;
    use PDOException;

    require_once __DIR__ . "/../Config/configuration.php";

    class connection{
        public static function connect(){
            try{
                return new PDO('mysql:host=' . DB_HOST . ";port=" . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            } catch (PDOException $erro) {
                die("Erro de conexão: " . $erro->getMessage());
            }
        }
    }
?>