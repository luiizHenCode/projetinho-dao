<?php
    class Sql extends PDO
    {
        private $conn;

        function __construct()
        {
            $this->conn = new PDO('Mysql:host=localhost;dbname=projetinho', 'root', '');
        }
    }
?>