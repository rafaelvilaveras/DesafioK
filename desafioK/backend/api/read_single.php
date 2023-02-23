<?php

    //headers
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //initializing API
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    $post->IDCliente = isset($_GET['IDCliente']) ? $_GET['IDCliente'] : die();
    $post->read_single();
    
    $post_arr = array(
        'id' => $post->IDCliente,
        'nome' => $post->Nome,
        'cpf' => $post->CPF,
        'telefone' => $post->Telefone,
        'email' => $post->Email,
        'tipo' => $post->Tipo
    );

    //make a JSON
    print_r(json_encode($post_arr));

?>