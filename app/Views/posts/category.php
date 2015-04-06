<?= App::getInstance()->title =$categorie->name.' | '. App::getInstance()->title;?>
<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">
        <h1><?= $categorie->name;?></h1>
        <p><?= $categorie->Description;?></p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php foreach($articles as $post):?>
                <div class="col-md-4">
                   <?php if(!empty($post->logo)):;?>
                         <img src="img/2015-04/<?= $post->logo;?>" width="100%"> </img></p>
                        <?php else :?>
                        <h2><a href ="<?= $post->url ?>"><?=$post->titre;?></a></h2>
                    <?php endif ;?>
                    <p><em><a href="index.php?p=posts.category&id=<?=$categorie->id;?>" class="btn btn-xs btn-info"><strong><?= $categorie->name;?></strong></a></em>

                    <?= $post->extrait ?>
                </div>
            <?php endforeach;?>
        </div>

        <div class="col-sm-4">
            <ul>
                <?php foreach($categories as $categorie):?>
                    <li><a href="<?= $categorie->url;?>"><?=$categorie->name;?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>