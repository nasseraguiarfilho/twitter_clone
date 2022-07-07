<?php

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    $user = $_SESSION['usuario'];
    $user = str_replace(['"',"'"], "", $user);
    

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

</head>

<body>

    <!-- < !-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <div style="padding: 4px 0px 4px 0px"><img src="imagens/icone_twitter.png"></div>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo "<h4>@$user</h4>"; ?>
                    <hr />
                    <div class="col-md-6">
                        TWEETS <br /> 1
                    </div>
                    <div class="col-md-6">
                        FOLLOWERS <br /> 1
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="What's going on right now?"
                            maxlength="140">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Tweet</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><a href="#">Friends</a></h4>
                </div>
            </div>
        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>