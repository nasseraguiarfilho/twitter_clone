<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require_once 'Db.php';

$db = new Db();
$db->connect();

$user = $_SESSION['usuario'];

//getting id from the user
$userId = $db -> select("SELECT id FROM usuarios WHERE usuario = $user");
$userId = $userId[0]['id'];

$sql = "SELECT DATE_FORMAT(t.data_inclusao, '%b %d %Y %T') AS dt, t.tweet, u.usuario, t.id_tweet FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id) 
WHERE id_usuario = $userId OR id_usuario IN (select id_follower FROM user_followers WHERE id_usuario = $userId)
 ORDER BY data_inclusao DESC";

$result = $db -> select($sql);


//populating timeline with the tweets on database
 for ($i=0; $i < count($result); $i++) { 
    echo '<text class="list-group-item"> ';
        echo '<h4 class="list-group-item-heading col-6">'.$result[$i]['usuario'].' <small>'.$result[$i]['dt'].' </small> <button class="button-more-options">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </button> </h4>';
        echo '<p id=tweet_'.$result[$i]['tweet'].' class="list-group-item-text" data-id_tweet='.$result[$i]['id_tweet'].'>'.$result[$i]['tweet'].'</p>';
    echo '</text>';
 }

?>