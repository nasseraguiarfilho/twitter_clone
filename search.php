<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

require_once 'Db.php';

$db = new Db();
$db->connect();

$user = $_SESSION['usuario'];

echo '<a href="#" class="list-group-item"> '. $_POST['find']. '</a>';


?>