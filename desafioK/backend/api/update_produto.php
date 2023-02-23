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
    $post = new Produto($db);

    //get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    $post->IDProduto = $data->IDProduto;
    $post->Nome = $data->Nome;
    $post->Descricao = $data->Descricao;
    $post->Valor = $data->Valor;

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