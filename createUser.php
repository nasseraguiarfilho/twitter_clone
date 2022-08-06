<?php
    
    require_once 'Db.php';
    
    $db = new Db();
    $db->connect();

    //protect variables from injection by quoting them
    $usuario = $db -> quote($_POST['usuario']);
    $email = $db -> quote($_POST['email']);
    $senha = md5($_POST['senha']);
    $senha = $db -> quote($senha);



    if(usernameFreeToUse($usuario) && emailFreeToUse($email)) {
        echo "user created successfully!"; 
    } else {
        echo "User already exists";
    }
    

    function sendQuery() {
        global $db, $usuario, $senha, $email;
        $result = $db -> query("INSERT INTO usuarios (usuario, senha, email) VALUES ($usuario, $senha, $email)");
        return $result;
    }


    function usernameFreeToUse($usuario) {
        global $db, $usuario;
        $result = $db -> query("SELECT * FROM usuarios WHERE usuario = $usuario");
        if($result -> num_rows > 0) {
            return false;
        }
        return true;
    }

    function emailFreeToUse($email) {
        global $db, $email;
        $result = $db -> query("SELECT * FROM usuarios WHERE email = $email");
        if($result -> num_rows > 0) {
            return false;
        }
        return true;
    }
    

?>