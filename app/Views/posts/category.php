<?= App::getInstance()->title =$categorie->name.' | '. App::getInstance()->title;?>
<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">
        <h1><?= $categorie->name;?></h1>
        <p><?= $categorie->Description;?></p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>


        <?php foreach($articles as $post):?>
            <div class="col-xs-6 col-lg-4">
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




        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item active">Dans cette section:<span class="badge"><?=$nbArticleCat[0]->compte;?> </span> </a>

                <?php foreach($categories as $categorie):?>

                    <a class="list-group-item" href="<?= $categorie->url;?>"> <?=$categorie->name?><span class="badge"></span></a>
                <?php endforeach;?>
            </div>
        </div><!--/.sidebar-offcanvas-->




    </div>