<?php

require_once 'Db.php';
    
$db = new Db();
$db->connect();

//protect variables from injection by quoting them
$usuario = $db -> quote($_POST['usuario']);
$senha = $db -> quote($_POST['senha']);


    if(loginSuccessful()) {
        echo "Login realizado com sucesso";
    } else {
        header("Location: index.php?erro=loginUnsuccessful");
    }

    function loginSuccessful() {
        global $db, $usuario, $senha;
        $result = $db -> select("SELECT * FROM usuarios WHERE usuario = $usuario AND senha = $senha");
        return check($result);
    }

    function check($result) {
        if ($result) return true;
        return false;
    }

?>