<?php

require_once 'database.php';

class Usuario extends Database {

    private $table = 'usuario';
    private $nome;
    private $cpf;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (nome, cpf) VALUES (:nome, :cpf);";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($cpf) {
        $sql = "UPDATE $this->table SET nome = :nome WHERE cpf = $cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($cpf) {
        $sql = "DELETE FROM $this->table WHERE cpf = :cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        return $stmt->execute();
    }   
}
