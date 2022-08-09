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
    if (isAlreadyFriend($result[$i]['id'])) {
        echo '<a href="#" class="possibleFriend col-md-7">@'.$result[$i]['usuario'].'</a>';
        echo '<button type="button" id='.$result[$i]['id'].' class="following btn btn-secondary btn-sm col-md-5" data-id_user='.$result[$i]['id'].'>Following</button>';
        echo '<hr/><br/>';
    } else {
        echo '<a href="#" class="possibleFriend col-md-7">@'.$result[$i]['usuario'].'</a>';
    echo '<button type="button" id='.$result[$i]['id'].' class="follow btn btn-primary btn-sm col-md-5" data-id_user='.$result[$i]['id'].'>Follow</button>';
    echo '<hr/><br/>';
    }
    
 }

 function isAlreadyFriend($possibleFriend) {
    return false;
    //TODO
 }

?>