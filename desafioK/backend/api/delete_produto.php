<?php

    //headers
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    //allow request to have data
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    //initializing API
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Produto($db);

    //get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    $post->IDProduto = $data->IDProduto;

    //update post
    if($post->delete()){
        echo json_encode(
            array('message' => 'Post deleted.')
        );
    }else{
        echo json_encode(
            array('message' => 'Post not deleted.')
        );
    }

?>