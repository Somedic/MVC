<?php
use Core\Config;
App::getInstance()->title =$article->titre.' | '. App::getInstance()->title;
$config = Config::getInstance(ROOT.'/config/config.php');
$this->pdo = new \PDO('mysql:dbname='.$config->get('db_name').';host='.$config->get('db_host').'', ''.$config->get('db_user').'',''.$config->get('db_pass').'');

require ROOT.'/app/Vote/Vote.php';


$vote = false;
if(isset($_SESSION['user_id'])){
    $req = $this->pdo->prepare('SELECT * FROM votes WHERE ref = ? AND ref_id = ? AND user_id = ?');
    $req->execute(['articles', $_GET['id'],$_SESSION['user_id']]);
    $vote = $req->fetch();
}

?>
<!-- style pour image du titre -->
<style>
    .rightimg, .leftimg, .centreimg img {

        background-color:#E9E9E9;
        padding:3px;
        margin: 6px;

    }
    .rightimg {float:right;}
    .leftimg {float:left;}
    div.centreimg {
        text-align:center;
    }
</style>


<div class="jumbotron">
    <div class="container">
        <?php if(!empty($article->logo)):;?>
           <p> <img class="leftimg" src="img/2015-04/<?= $article->logo;?>" width="40%"> </img></p> <h1><?=$article->titre?></h1>
            <?php else: ?>
            <h1><?=$article->titre?></h1>
        <?php endif;?>
        <i class="fa fa-thumbs-up"></i> <span id="like_count"></span><?= $article->like_count ?>
        <i class="fa fa-thumbs-down"></i> <span id="dislike_count"></span><?= $article->dislike_count ?>
        <p><em class="btn btn-xs btn-info"><strong><?= $article->categorie;?></em></strong></p>
    </div>

    </div>
</div> <!-- /.entete -->

<div class="container">
    <div class="starter-template">
        <p><?=$article->contenu?></p>

    </div>

    <div class="vote <?= App\Vote\Vote\Vote::getClass($vote);?> ">
        <div class="vote_bar">
            <div class="vote_progress" style="width:<?= ($article->like_count + $article->dislike_count) == 0 ? 100 : round(100 * ($article->like_count / ($article->like_count + $article->dislike_count))); ?>%;"></div>
        </div>
        <div class="vote_loading">
            Chargement...
        </div>

        <div class="vote_btns">
            <form action="index.php?p=users.like&ref=articles&ref_id=<?=$article->id?>&vote=1" method="post">
                <button type="submit" class="vote_btn vote_like"><i class="fa fa-thumbs-up"></i> <span id="like_count"><?= $article->like_count;?></button>
            </form>
            <form action="index.php?p=users.like&ref=articles&ref_id=<?=$article->id?>&vote=-1" method="post">
                <button type="submit" class="vote_btn vote_dislike"><i class="fa fa-thumbs-down"></i> <span id="dislike_count"></span><?= $article->dislike_count ?></button>
            </form>
        </div>

    </div>


</div><!-- /.contenu -->

<div class="container">
    <p>&nbsp;</p>
    <h2>$_SESSION</h2>
    <?php var_dump($_SESSION); ?>
    </div>
