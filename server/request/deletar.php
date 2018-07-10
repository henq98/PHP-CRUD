<?php

function __autoload($class) {
    require_once '../models/' . $class . '.php';
}

try {
    $data = json_decode(file_get_contents('php://input'));

    $user = new Usuario();
    $tel = new Telefone();
    $email = new Email();
    $query = new Query();

    if ($query->findCPF($data->cpf)) {

        $query->disableKeyChecks();

        $user->delete($data->cpf);
        $tel->delete($data->cpf);
        $email->delete($data->cpf);

        $query->enableKeyChecks();

        echo json_encode('Usuário apagado com sucesso');

    } else {
        echo json_encode('Usuário não encontrado');
    }

} catch (PDOException $e) {
    echo json_encode($e->getMessage());
}


