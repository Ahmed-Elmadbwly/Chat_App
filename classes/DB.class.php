<?php
class DB{
    private $pdo;

    private function connect(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=chatbot","root","");
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }
    
    public function select($sql){
       $this->connect();
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function selectrow($sql){
        $this->connect();
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
     }

    public function quar($sql){
        $this->connect();
       $this->pdo->exec($sql);
    }
}