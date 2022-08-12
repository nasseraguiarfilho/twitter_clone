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

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="padding: 4px 0px 4px 0px"><a href="index.php"><img src="imagens/icone_twitter.png"></a>
                </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right navbaritems">
                    <li><a href="index.php">Home</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>


    <div class="container">


        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="text-center welcome">
                <h3>Sign up to see the latest news!</h3>
            </div>
            <br />
            <form id="formCadastrarse">
                <div class="form-group">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username"
                        required="requiored">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        required="requiored">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Password"
                        required="requiored">
                </div>

                <button type="button" class="btn btn-primary form-control" id="createUser">Sign
                    up</button>

            </form>
        </div>

    </div>


    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>