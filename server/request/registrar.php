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

    try {
        $user->setNome($data->nome);

        $tel->setCelular($data->tel_mob);
        $tel->setResidencial($data->tel_res);
        $tel->setProfissional($data->tel_pro);
        // Tive de mudar o 'email_type' pois o valor estava voltando nulo para o DB
        $email->setPessoal($data->pessoal);
        $email->setProfissional($data->profissional);

    } catch (PDOException $e) {
        echo json_encode('Erro: ' . $e->getMessage());
    }
    // CASO O CPF AINDA NÃO EXISTE, ELE CADASTRARÁ
    if(!$query->findCPF($data->cpf)) {
        
        $user->setCpf($data->cpf);
        $user->insert();
        
        $tel->setCpf($data->cpf);
        $tel->insert();    

        $email->setCpf($data->cpf);
        $email->insert();

        echo json_encode($data->nome . ' cadastrado com sucesso');
    // SE EXISTE, SÓ ATUALIZARÁ OS DADOS
    }else if ($query->findCPF($data->cpf)) {

        $user->update($data->cpf);
        $tel->update($data->cpf);
        $email->update($data->cpf);
        
        echo json_encode($data->nome . ' atualizado com sucesso');

    } else {
        echo json_encode('Ocorreu um erro no registro, tente novamente');
    }

} catch (PDOException $e) {
    echo json_encode('Erro: ' . $e->getMessage());
}
