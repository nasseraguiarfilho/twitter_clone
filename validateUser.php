<?php

require_once 'Db.php';
    
$db = new Db();
$db->connect();

//protection variables from injection by quoting them
$usuario = $db -> quote($_POST['usuario']);
$senha = $db -> quote($_POST['senha']);

    if(loginSuccessful()) {
        echo "Login realizado com sucesso";
    } else {
        echo "Login não realizado";
    }

    function loginSuccessful() {
        global $db, $usuario, $senha;
        $result = $db -> query("SELECT * FROM usuarios WHERE usuario = $usuario AND senha = $senha");
        if($result -> num_rows > 0) {
            return true;
        }
        return false;
    }

?>