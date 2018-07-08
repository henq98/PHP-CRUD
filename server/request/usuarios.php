<?php

require_once '../models/Query.php';

try {
    $query = new Query();

    echo json_encode($query->findUsers(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    echo json_encode('Erro: ' . $e->getMessage());
}