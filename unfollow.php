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

$result = $db -> query("DELETE FROM user_followers WHERE id_usuario = $userId AND id_follower = $friendId");

var_dump( $result);

?>