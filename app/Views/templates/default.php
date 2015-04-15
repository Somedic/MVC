<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Blog">
    <meta name="author" content="Lionel Walder">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title?></title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">


</head>
<style>
    .profil{
        margin-top: 5px; ;
    }
</style>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">

        <div class="navbar-header">
            <a class="navbar-brand" href="#">Project name</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="index.php?user=1">User 1</a></li>
                <li><a href="index.php?user=2">User 2</a></li>
                <li><a href="index.php?user=3">User 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <!-- fonction image de profil -->
                <?= App::getInstance()->login()?>
            </ul>

        </div><!--/.nav-collapse -->

    </div>

</nav>

<?php
if(isset($_GET['user'])){
    $_SESSION['user_id'] = $_GET['user'];
}
?>

<?= $content;?>


<?php




/*
setcookie('cookiecancel', null, -1);
setcookie('cookiebar', null, -1);
*/
$_SESSION['IP']= $_SERVER["REMOTE_ADDR"];
var_dump($_COOKIE);?>



<hr>

<footer>
    <p>&copy; Somedic.ch - conception de site web  2015</p>
</footer>



<script src="js/jQuery/jQuery.js"></script>
<script src="js/app.js"></script>

<script src="js/jQuery/jQuery.cookie.js"></script>
<script src="js/cookie.js"></script>
</body>
</html>
