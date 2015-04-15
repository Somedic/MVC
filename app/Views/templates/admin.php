
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Lionel Walder">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
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
                <li><a href="index.php?p=admin.categories.index">Categories</a></li>
                <li><a href="index.php?p=admin.posts.index">Articles</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?= App::getInstance()->login()?>
            </ul>
        </div>

    </div>
</nav>



<?= $content;?>



    <hr>

    <footer>
        <p>&copy; Somedic.ch - conception de site web  2015</p>
    </footer>
</div>

</body>
    <script src="js/jQuery/jQuery.js"></script>
    <script src="js/app.js"></script>
</html>
