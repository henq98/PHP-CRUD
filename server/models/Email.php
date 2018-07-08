<?php

require_once 'database.php';

class Email extends Database {

    private $table = 'email';
    private $cpf;
    private $pessoal;
    private $profissional;

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setPessoal($pessoal) {
        $this->pessoal = $pessoal;
    }

    public function setProfissional($profissional) {
        $this->profissional = $profissional;
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (usuario_cpf, pessoal, profissional) 
                VALUES (:cpf, :pessoal, :profissional);";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':pessoal', $this->pessoal);
        $stmt->bindParam(':profissional', $this->profissional);
        return $stmt->execute();
    }

    public function update($cpf) {
        $sql = "UPDATE $this->table SET pessoal = :pessoal, profissional = :profissional
                WHERE usuario_cpf = $cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':pessoal', $this->pessoal, PDO::PARAM_STR);
        $stmt->bindParam(':profissional', $this->profissional, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($cpf) {
        $sql = "DELETE FROM $this->table WHERE usuario_cpf = :cpf;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
