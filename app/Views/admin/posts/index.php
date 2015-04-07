<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">
        <h1>Administrer les articles</h1>
        <p>unique.</p>

    </div>
</div>
<div class="container">
    <p>
        <a href="?p=admin.posts.add" class="btn btn-success">Ajouter un nouvel article</a>
    </p>


    <table class="table">
        <thead>
        <tr>
            <td>id</td>
            <td>online</td>
            <td>Titre</td>
            <td>Catégorie</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($posts as $post):?>
        <tr>
            <td><?= $post->id;?></td>
            <td><?php if($post->online == 0){echo '<span class="label label-warning">Hors ligne</span>';}else{echo '<span class="label label-success">En ligne</span>';}?></td>
            <td><?= $post->titre;?></td>
            <td><?= $post->category_id;?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id;?>">Editer</a>
                <form action="?p=admin.posts.delete" method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $post->id;?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>




