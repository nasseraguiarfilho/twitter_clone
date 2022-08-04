<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require_once 'Db.php';

$db = new Db();
$db->connect();

$user = $_SESSION['usuario'];
$possibleFriend = $db->quoteContains($_POST['input']); //protecting var against sql injection

//getting id from the user
$userId = $db -> select("SELECT id FROM usuarios WHERE usuario = $user");
$userId = $userId[0]['id'];

$sql = "SELECT * FROM usuarios AS u WHERE id <> $userId AND usuario LIKE $possibleFriend order by usuario";

$result = $db -> select($sql);

 for ($i=0; $i < count($result); $i++) { 
    echo '<a href="#" class="possibleFriend">@'.$result[$i]['usuario'].'</a><br>';
 }

?>