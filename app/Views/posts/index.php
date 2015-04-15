<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">

        <p class="text-center"><img src="img/static/logo.png" width="100%">
        <p>Site dedié a mes passions, la vape, le sport extreme, la musique électronique </p>
        <p>botron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p>

        </p>
    </div>
</div>

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>

            <div class="row">
                <?php $row=0;?>
                <?php foreach($posts as $post):?>
                    <div class="col-xs-6 col-lg-4">
                        <?php if(!empty($post->logo)):;?>
                            <p> <a href="index.php?p=posts.show&id=<?= $post->id;?>"><img src="img/2015-04/<?= $post->logo;?>" width="100%"  alt=""/></a> </p>
                        <?php else :?>
                            <h2><a href ="<?= $post->url ?>"><?=$post->titre;?></a></h2>

                        <?php endif ;?>
                        <p><em><a href="index.php?p=posts.category&id=<?=$posts[0]->categorie;?>" class="btn btn-xs btn-info"><strong><?= $post->name;?></strong></a></em></p>
                        <?= $post->extrait ?>
                    </div>
                <?php endforeach;?>

        </div>
        </div>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item active">Nb total d'articles :<span class="badge"> <?=$nbArticleTotal[0]->compte;?></span> </a>
                <?php foreach($categories as $categorie):?>
                   <a class="list-group-item" href="<?= $categorie->url;?>"><?=$categorie->name;?> <span class="badge"> </span></a>
                <?php endforeach;?>
            </div>



        </div><!--/.sidebar-offcanvas-->


    </div>