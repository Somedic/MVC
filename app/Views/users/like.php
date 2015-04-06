<?php
use Core\Config;
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(403);
    die();
}
$config = Config::getInstance(ROOT.'/config/config.php');
$this->pdo = new \PDO('mysql:dbname='.$config->get('db_name').';host='.$config->get('db_host').'', ''.$config->get('db_user').'',''.$config->get('db_pass').'');

require ROOT.'/app/Vote/vote.php';
$vote = new \App\Vote\Vote\Vote($this->pdo);

if($_GET['vote'] == 1){
    $vote->like(
        $_GET['ref'],
        $_GET['ref_id'],
        $_SESSION['user_id']);


}else{
    $vote->dislike(
        $_GET['ref'],
        $_GET['ref_id'],
        $_SESSION['user_id']);
}
header('Location: index.php?p=posts.show&id='.$_GET['ref_id']);
?>


<div class="jumbotron">
    <div class="container">

    </div>


</div>  </div> <!-- /.entete -->
<div class="container">
    <div class="starter-template">
        <?php $vote->updateCount('articles',20);
        var_dump($vote);?>
    </div>
