<?php
    
    session_start();
    require_once 'Db.php';
    
    $db = new Db();
    $db->connect();


    $text_tweet = $db -> quote($_POST['text_tweet']);
    $user = $_SESSION['usuario'];

    //getting id from the user in order to save the tweet associated with his id
    $userId = $db -> select("SELECT id FROM usuarios WHERE usuario = $user");
    $userId = $userId[0]['id'];

    $result = $db -> query("INSERT INTO tweet (id_usuario, tweet) VALUES ($userId, $text_tweet)");
    
    
    if ($result == 1) {
        echo $text_tweet;
    } else {
        echo 'error consulting database';
    }
    

?>