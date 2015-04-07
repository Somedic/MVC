<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="index.php?p=admin.categories.index">Categories</a></li>
                <li><a href="index.php?p=admin.posts.index">Articles</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <!-- fonction image de profil -->

                <?php
                if(empty ($_SESSION['auth'])): ?>
                    <li><img src="http://iconbug.com/data/ca/128/99923a7ff69fc587d4357cf40957745a.png" width="40px"></li>
                    <li> <a href="index.php?p=users.login">Login </a> </li>

                <?php else:;?>
                    <?php
                    $email = $_SESSION['email'];
                    $default = "http://iconbug.com/data/ca/128/99923a7ff69fc587d4357cf40957745a.png";
                    $size = 10;
                    $avatar = "http://www.gravatar.com/avatar/" . md5($email). "&s=" . $size;?>

                    <li> <img src="<?= $avatar;?>" width="40px"></li>
                    <li> <a href="index.php?p=admin.posts.index">admin </a> </li>
                    <li> <a href="index.php?p=users.logout">Logout</a></li>
                <?php endif;?>
            </ul>

        </div><!--/

        </div><!--/.nav-collapse -->

    </div>

</nav>



<?= $content;?>



    <hr>

    <footer>
        <p>&copy; Somedic.ch - conception de site web  2015</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jQuery/jQuery.js"></script>
<script src="js/app.js"></script>


</body>
</html>
