<?php

session_start();

require_once 'Db.php';
    
$db = new Db();
$db->connect();

//protect variables from injection by quoting them
$usuario = $db -> quote($_POST['usuario']);
$senha = md5($_POST['senha']);
$senha = $db -> quote($senha);



    if(loginSuccessful()) {
        header('Location: home.php');
    } else {
        echo $senha;
    }

    function loginSuccessful() {
        global $db, $usuario, $senha;
        $result = $db -> select("SELECT * FROM usuarios WHERE usuario = $usuario AND senha = $senha");
        populateSession();
        return check($result);
    }

    function populateSession() {
        global $db, $usuario, $senha;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
    }

    function check($result) {
        if ($result) return true;
        return false;
    }

?>