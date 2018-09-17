<?php 

class Historico {

    private $pdo;

    public function __construct(){
        try{
        $this->pdo = new PDO("mysql:dbname=projeto_logeventos;host=localhost", "root", "");
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    public function registrar($acao){

        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO historico SET ip = :ip, data_action = NOW(), action = :acao ";

        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":acao", $acao);
        $sql->execute();


    }




}

?>