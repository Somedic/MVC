<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">
        <h1>Home!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-sm-8">
            <?php foreach($posts as $post):?>
                <div class="col-sm-6"><?php if(!empty($post->logo)):;?>
                        <p> <a href="index.php?p=posts.show&id=<?= $post->id;?>"><img src="img/2015-04/<?= $post->logo;?>" width="100%"  alt=""/></a> </p>
                    <?php else :?>
                        <h2><a href ="<?= $post->url ?>"><?=$post->titre;?></a></h2>
                    <?php endif ;?>
                    <p><em><a href="index.php?p=posts.category&id=<?=$posts[0]->categorie;?>" class="btn btn-xs btn-info"><strong><?= $post->name;?></strong></a></em></p>
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