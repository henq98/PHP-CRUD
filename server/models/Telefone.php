<?php

require_once 'database.php';

class Telefone extends Database {

    private $table = 'telefone';
    private $cpf;
    private $celular;
    private $residencial;
    private $profissional;

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }
    
    public function setResidencial($residencial) {
        $this->residencial = $residencial;
    }

    public function setProfissional($profissional) {
        $this->profissional = $profissional;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (usuario_cpf, celular, residencial, profissional)
                VALUES (:cpf, :celular, :residencial, :profissional);";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':celular', $this->celular, PDO::PARAM_INT);
        $stmt->bindParam(':residencial', $this->residencial, PDO::PARAM_INT);
        $stmt->bindParam(':profissional', $this->profissional, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($cpf) {
        $sql = "UPDATE $this->table 
                SET celular = :celular, residencial = :residencial, profissional = :profissional
                WHERE usuario_cpf = $cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':celular', $this->celular, PDO::PARAM_INT) ;
        $stmt->bindParam(':residencial', $this->residencial, PDO::PARAM_INT);
        $stmt->bindParam(':profissional', $this->profissional, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($cpf) {
        $sql = "DELETE FROM $this->table WHERE usuario_cpf = :cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
