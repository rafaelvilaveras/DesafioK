<?php

    class Produto{

        //BDD E TABLE
        private $conn;
        private $table = 'produto';

        // COLUNAS
        public $IDProduto;
        public $Nome;
        public $Descricao;
        public $Valor;

        //constructor with db connection

        public function __construct($db){
            
            $this->conn = $db;

        }

        //getting posts from database
        public function read(){

            //create query
            $query = 'SELECT IDProduto, Nome, Descricao, Valor';
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
                p.Nome, p.Descricao, p.Valor, 
                e.ID_Produto, e.Quantidade, e.Valor ';
            $query .= ' FROM '.$this->table . ' AS p ';
            $query .= ' LEFT JOIN entrada AS e ON p.IDProduto = e.ID_Produto ';
            $query .= ' WHERE p.IDProduto = ? LIMIT 1';
            
            //prepare statement
            $stmt = $this->conn->prepare($query);
            //bind param
            $stmt->bindParam(1, $this->IDProduto);
            //execute the query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->Nome = $row['Nome'];
            $this->Descricao = $row['Descricao'];
            $this->Valor = $row['Valor'];
            
        }

        public function create() {

            //create query
            $query = 'INSERT INTO '. $this->table . ' SET Nome = :Nome, Descricao = :Descricao, Valor = :Valor ';
            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->Nome         = htmlspecialchars(strip_tags($this->Nome));
            $this->Descricao          = htmlspecialchars(strip_tags($this->Descricao));
            $this->Valor     = htmlspecialchars(strip_tags($this->Valor));

            //binding of parameters
            $stmt->bindparam(':Nome', $this->Nome);
            $stmt->bindparam(':Descricao', $this->Descricao);
            $stmt->bindparam(':Valor', $this->Valor);

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
            $query = 'UPDATE '. $this->table . ' SET Nome = :Nome, Descricao = :Descricao, Valor = :Valor 
            WHERE IDProduto = :IDProduto';

            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->IDProduto      = htmlspecialchars(strip_tags($this->IDProduto)); 
            $this->Nome           = htmlspecialchars(strip_tags($this->Nome));
            $this->Descricao      = htmlspecialchars(strip_tags($this->Descricao));
            $this->Valor          = htmlspecialchars(strip_tags($this->Valor));

            //binding of parameters
            $stmt->bindparam(':IDProduto', $this->IDProduto);
            $stmt->bindparam(':Nome', $this->Nome);
            $stmt->bindparam(':Descricao', $this->Descricao);
            $stmt->bindparam(':Valor', $this->Valor);

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
            $query = 'DELETE FROM ' . $this->table . ' WHERE IDProduto = :IDProduto';

            //prepare statement
            $stmt = $this->conn->prepare($query);

            //clean the data
            $this->IDProduto = htmlspecialchars(strip_tags($this->IDProduto));

            //biding params
            $stmt->bindparam(':IDProduto', $this->IDProduto);

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