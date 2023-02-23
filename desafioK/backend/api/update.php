<?php

    //headers
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    //allow request to have data
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    //initializing API
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    //get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    $post->IDCliente = $data->IDCliente;
    $post->Nome = $data->Nome;
    $post->CPF = $data->CPF;
    $post->Telefone = $data->Telefone;
    $post->Email = $data->Email;
    $post->Tipo = $data->Tipo;

    //update post
    if($post->update()){
        echo json_encode(
            array('message' => 'Post updated.')
        );
    }else{
        echo json_encode(
            array('message' => 'Post not updated.')
        );
    }

?>