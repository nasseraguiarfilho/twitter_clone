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

    <script>
    <?php include 'scriptHome.js'; ?>
    </script>


</head>

<body>

    <!-- < !-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <div style="padding: 4px 0px 4px 0px"><a href="home.php"><img src="imagens/icone_twitter.png"></a></div>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Logout</a></li>
            </ul>
        </div>

    </nav>

    <div class="container">

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo "<h4>@$user</h4>"; ?>
                    <hr />
                    <div class="col-md-6">
                        TWEETS <br />
                        <div id="countTweets"></div>
                    </div>
                    <div class="col-md-6">
                        FOLLOWERS <br />
                        <div id="countFollowers">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="form_tweet" class="input-group">
                        <input type="text" class="form-control" placeholder="Whats going on right now?" maxlength="140"
                            id="text_tweet" name="text_tweet">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="button_tweet">Tweet</button>
                        </span>
                    </form>
                </div>
            </div>
            <div id="tweets" class="list-group">
            </div>

        </div>



        <div class="col-md-3">
            <form method="post" name="form-search" class="form" id="form-search">
                <input type="text" placeholder="Search for friends!" class="search-field" id="find" name="find">
                <div class="search-button">
                    <img src="imagens/zoom.png">
                </div>
            </form>
            <div id="newSearchField"></div>
        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>