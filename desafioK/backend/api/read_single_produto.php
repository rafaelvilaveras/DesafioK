<?php

    //headers
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //initializing API
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Produto($db);

    $post->IDProduto = isset($_GET['IDCliente']) ? $_GET['IDCliente'] : die();
    $post->read_single();
    
    $post_arr = array(
        'id' => $post->IDProduto,
        'nome' => $post->Nome,
        'descricao' => $post->Descricao,
        'valor' => $post->Valor
    );

    //make a JSON
    print_r(json_encode($post_arr));

?>