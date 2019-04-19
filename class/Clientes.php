<?php

    class Clientes
    {
        private $nome;
        private $email;
        private $sexo;
        private $idade;
        private $rg;

        // GETTERS AND SETTERS

        // NOME
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($value)
        {
            $this->nome = $value;
        }

        // EMAIL
        public function getEmail()
        {
            return $this->email;
        }        
        public function setEmail($value)
        {
            $this->email = $value;
        }

        // SEXO
        public function getSexo()
        {
            return $this->sexo;
        }
        public function setSexo($value)
        {
            $this->sexo = $value;
        }

        // IDADE
        public function getIdade()
        {
            return $this->idade;
        }
        public function setIdade($value)
        {
            $this->idade = $value;
        }

        //  RG
        public function getRg()
        {
            return $this->rg;
        }
        public function setRg($value)
        {
            $this->rg = $value;
        }

        public function selectClientes()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM clientes"); 
        }

        public function insereCliente($dados)
        {   
            $sql = new Sql();
            $sql->query("INSERT INTO clientes (nome, email, sexo, idade, rg) VALUES (:NOME, :EMAIL, :SEXO, :IDADE, :RG)", array(
                ':NOME' => $dados['nome'],
                ':EMAIL' => $dados['email'],
                ':SEXO' => $dados['sexo'],
                ':IDADE' => $dados['idade'],
                ':RG' => $dados['rg']
            ));
        }

        public function deletaUsuario($table, $id)
        {
            $sql = new Sql();
            $result = $sql->query("DELETE FROM $table WHERE idcliente = :ID", array(
                ':ID' => $id
            ));

           if($result->rowCount()):
                echo "Exclusao realizada com sucesso";
                header('Location: index.php');
           else:
                echo "Exclusão não realizada";
           endif;

            
        }

    }

?>