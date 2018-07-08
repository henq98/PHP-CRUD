<?php

require_once 'database.php';

class Query extends Database {
   
    public function disableKeyChecks() {
        $sql = "SET foreign_key_checks = 0;";
        $stmt = Database::prepare($sql);
        return $stmt->execute();
    }

    public function enableKeyChecks() {
        $sql = "SET foreign_key_checks = 1;";
        $stmt = Database::prepare($sql);
        return $stmt->execute();
    }

    public function findCPF($cpf) {
		$sql = "SELECT * FROM usuario WHERE cpf = :cpf;";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
    }

    public function findUsers() {
        $sql = "SELECT u.cpf, u.nome, e.pessoal AS 'email_pes', 
                e.profissional AS 'email_pro', t.celular AS 'tel_mob', 
                t.residencial AS 'tel_res', t.profissional AS 'tel_pro'
                FROM usuario u
                LEFT JOIN email e ON e.usuario_cpf = u.cpf
                LEFT JOIN telefone t ON t.usuario_cpf = u.cpf
                ORDER BY u.nome;";
        $stmt = Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();        
    }
}
