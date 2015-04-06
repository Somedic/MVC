<div class="jumbotron" style="padding-top: 2cm;">
    <div class="container">
        <h1>Administrer les catégories</h1>
        <p>Trouver comment faire une arborescennce avec des enfants et des petits enfants.</p>
    </div>
</div>
<div class="container">
    <p>
        <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
    </p>


    <table class="table">
        <thead>
        <tr>
            <td>id</td>
            <td>Titre</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($items as $categorie):?>
        <tr>
            <td><?= $categorie->id;?></td>
            <td><?= $categorie->name;?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $categorie->id;?>">Editer</a>
                <form action="?p=admin.categories.delete" method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $categorie->id;?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>


