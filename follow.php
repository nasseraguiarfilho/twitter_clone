<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require_once 'Db.php';

$db = new Db();
$db->connect();

$user = $_SESSION['usuario'];
$friendId = $_POST['id'];

//getting id from the user
$userId = $db -> select("SELECT id FROM usuarios WHERE usuario = $user");
$userId = $userId[0]['id'];

$sql = "SELECT u.*, uf.* FROM usuarios AS u LEFT JOIN user_followers AS uf ON (uf.id_usuario = $userId AND u.id = uf.id_follower) WHERE u.usuario like $possibleFriend AND u.id <> $userId order by usuario";

$result = $db ->select($sql);


$addFriend = $db -> query("INSERT INTO user_followers (id_usuario, id_follower) VALUES ($userId, $friendId)");


echo $addFriend;

?>