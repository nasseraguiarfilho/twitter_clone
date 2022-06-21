<?php
    
    require_once 'Db.php';
    
    $db = new Db();
    $db->connect();

    //protect variables from injection by quoting them
    $usuario = $db -> quote($_POST['usuario']);
    $senha = $db -> quote($_POST['senha']);
    $email = $db -> quote($_POST['email']);


    if(usernameFreeToUse($usuario)) {
      echo sendQuery();
    } else {
        echo "Usuário já existe";
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
    

?>