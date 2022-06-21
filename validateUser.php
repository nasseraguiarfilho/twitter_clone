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
        checkUserExists();
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

    function checkUserExists() {
        global $db, $usuario;
        $result = $db -> select("SELECT * FROM usuarios WHERE usuario = $usuario");
        if (isset($result[0]['usuario'])) {
            checkPassword();
        } else {
            echo "User does not exist";
        }
    }

    function checkPassword() {
        global $db, $usuario, $senha;
        $result = $db -> select("SELECT * FROM usuarios WHERE usuario = $usuario AND senha = $senha");
        if (!isset($result['senha'])) {
            echo "Password is incorrect";
        }
    }

?>