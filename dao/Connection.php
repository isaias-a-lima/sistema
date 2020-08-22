<?php

namespace dao;

use mysqli;

class Connection{
    
    private $conn;    

    public function __construct()
    {
        $xml = simplexml_load_file('../dao/config.xml');        
        $this->conn = new mysqli($xml->host, $xml->user, $xml->password, $xml->database);
        if($this->conn->connect_error){
            die("Erro de conexão" . $this->conn->connect_error);
        }
    }

    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }

    public function closeConn(){
        $this->conn->close();
    }
}

?>