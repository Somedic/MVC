
<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">

        <form method="post">
            <?= $form->select('category_id', 'Catégorie', $categories);?>
            <?= $form->input('titre','Titre de l\'article');?>
            <?= $form->input('contenu','Contenu', ['type'=> 'textarea']);?>
            <?= $form->input('date','Date', ['type'=> 'date']);?>
            <?= $form->submit('Enregister')?>

        </form>
    </div>
</div>

<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/app.js"></script>

<?php require 'tinyConf/tinyConf.php';?>