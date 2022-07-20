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

$sql = "SELECT t.data_inclusao, t.tweet, u.usuario FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id) WHERE id_usuario = $userId ORDER BY data_inclusao DESC";

$result = $db -> select($sql);


//populating timeline with the tweets on database
 for ($i=0; $i < count($result); $i++) { 
    echo '<a href="#" class="list-group-item"> ';
        echo '<h4 class="list-group-item-heading">'.$result[$i]['usuario'].' <small>'.$result[$i]['data_inclusao'].'</small> </h4> ';
        echo '<p class="list-group-item-text">'.$result[$i]['tweet'].'</p>';
    echo '</a>';
 }

?>