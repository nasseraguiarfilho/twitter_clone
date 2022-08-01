<?php

    $error = isset($_GET['erro']) ? $_GET['erro'] : "0";

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>Twitter clone</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <style>
    <?php include 'style.css';
    ?>
    </style>

    <script>
    <?php include 'script.js'; ?>
    </script>
</head>




<body>
    <!-- < !-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle
                        navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span
                        class="icon-bar"></span></button>
                <div style="padding: 4px 0px 4px 0px"><img src="imagens/icone_twitter.png"></div>
            </div>
            <div id=" navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right navbaritems">
                    <li><a href="inscrevase.php">New User</a></li>
                    <li class="<?= $error == "1" ? 'open' : '' ?>"><a id="entrar" name="entrar" data-target="#" href="#"
                            data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In</a>
                        <ul class="dropdown-menu loginMenu" aria-labelledby="entrar">
                            <div class="col-md-12">
                                <p>
                                <h4>Do you have an account?</h4>
                                </p>
                                <form method="post" action="validateUser.php" id="formLogin" name="formLogin">
                                    <div class="form-group"><input type="text" class="form-control" id="campo_usuario"
                                            name="usuario" placeholder="Username" /></div>
                                    <div class="form-group"><input type="password" class="form-control red"
                                            id="campo_senha" name="senha" placeholder="Password" /></div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="btn_login">Login</button>
                                        <span class="attention"></span>
                                    </div>
                                </form>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- < !--/.nav-collapse -->
        </div>
    </nav>
    <div class="container welcome">
        <h1>Welcome to Twitter!</h1>
        <p>
        <h4>See what's going on right now..</h3>
            </p>
            <div class="clearfix"></div>
    </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>