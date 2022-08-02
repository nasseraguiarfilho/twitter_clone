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

$sql = "SELECT * FROM usuarios AS u WHERE id <> $userId";

$result = $db -> select($sql);


//populating timeline with the tweets on database
 for ($i=0; $i < count($result); $i++) { 
    echo '<a href="#" class="list-group-item"> ';
        echo '<h4 class="list-group-item-heading">'.$result[$i]['usuario'].' <small></small> </h4> ';
    echo '</a>';
 }

?>