<?php

    class Post{

        //BDD E TABLE
        private $conn;
        private $table = 'cliente';

        // COLUNAS
        public $IDCliente;
        public $Nome;
        public $CPF;
        public $Telefone;
        public $Email;
        public $Tipo;

        //constructor with db connection

        public function __construct($db){
            
            $this->conn = $db;

        }

        //getting posts from database
        public function read(){

            //create query
            $query = 'SELECT IDCliente, Nome, CPF, Telefone, Email, Tipo';
            $query .= ' FROM '.$this->table;


            //prepare statement
            $stmt = $this->conn->prepare($query);

            //execute query
            $stmt->execute();

            return $stmt;

        }

        public function read_single() {

            //create query
            $query = 'SELECT 
                c.Nome, c.CPF, c.Telefone, c.Email, c.Tipo, 
                e.ID_Produto, e.Quantidade, e.Valor ';
            $query .= ' FROM '.$this->table . ' c ';
            $query .= ' LEFT JOIN entrada AS e ON c.IDCliente = e.ID_Cliente ';
            $query .= ' WHERE c.IDCliente = ? LIMIT 1';
            
            //prepare statement
            $stmt = $this->conn->prepare($query);
            //bind param
            $stmt->bindParam(1, $this->IDCliente);
            //execute the query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->Nome = $row['Nome'];
            $this->CPF = $row['CPF'];
            $this->Telefone = $row['Telefone'];
            $this->Email = $row['Email'];
            $this->Tipo = $row['Tipo'];
            
        }

        public function create() {

            //create query
            $query = 'INSERT INTO '. $this->table . ' SET Nome = :Nome, CPF = :CPF, Telefone = :Telefone, Email = :Email, Tipo = :Tipo ';
            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->Nome         = htmlspecialchars(strip_tags($this->Nome));
            $this->CPF          = htmlspecialchars(strip_tags($this->CPF));
            $this->Telefone     = htmlspecialchars(strip_tags($this->Telefone));
            $this->Email        = htmlspecialchars(strip_tags($this->Email));
            $this->Tipo         = htmlspecialchars(strip_tags($this->Tipo));

            //binding of parameters
            $stmt->bindparam(':Nome', $this->Nome);
            $stmt->bindparam(':CPF', $this->CPF);
            $stmt->bindparam(':Telefone', $this->Telefone);
            $stmt->bindparam(':Email', $this->Email);
            $stmt->bindparam(':Tipo', $this->Tipo);

            //execute query
            if($stmt->execute()){
                return true;
            }

            //print error
            printf("Error %s. \n", $stmt->error);
            return false;

        }

        //update post func
        public function update() {

            //create query
            $query = 'UPDATE '. $this->table . ' SET Nome = :Nome, CPF = :CPF, Telefone = :Telefone, Email = :Email, Tipo = :Tipo 
            WHERE IDCliente = :IDCliente';

            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->IDCliente    = htmlspecialchars(strip_tags($this->IDCliente));
            $this->Nome         = htmlspecialchars(strip_tags($this->Nome));
            $this->CPF          = htmlspecialchars(strip_tags($this->CPF));
            $this->Telefone     = htmlspecialchars(strip_tags($this->Telefone));
            $this->Email        = htmlspecialchars(strip_tags($this->Email));
            $this->Tipo         = htmlspecialchars(strip_tags($this->Tipo));

            //binding of parameters
            $stmt->bindparam(':IDCliente', $this->IDCliente);
            $stmt->bindparam(':Nome', $this->Nome);
            $stmt->bindparam(':CPF', $this->CPF);
            $stmt->bindparam(':Telefone', $this->Telefone);
            $stmt->bindparam(':Email', $this->Email);
            $stmt->bindparam(':Tipo', $this->Tipo);

            //execute query
            if($stmt->execute()){
                return true;
            }

            //print error
            printf("Error %s. \n", $stmt->error);
            return false;

        }

        public function delete(){

            //create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE IDCliente = :IDCliente';

            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean the data
            $this->IDCliente = htmlspecialchars(strip_tags($this->IDCliente));

            //biding params
            $stmt->bindparam(':IDCliente', $this->IDCliente);

            //execute query
            if($stmt->execute()){
                return true;
            }

            //print error
            printf("Error %s. \n", $stmt->error);
            return false;

        }


    }

?>