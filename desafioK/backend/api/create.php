<?php

    //headers
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    //allow request to have data
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    //initializing API
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    //get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // $post->IDCliente = null;
    $post->Nome = $data->Nome;
    $post->CPF = $data->CPF;
    $post->Telefone = $data->Telefone;
    $post->Email = $data->Email;
    $post->Tipo = $data->Tipo;

    //create post
    if($post->create()){
        echo json_encode(
            array('message' => 'Post created.')
        );
    }else{
        echo json_encode(
            array('message' => 'Post not created.')
        );
    }

?>