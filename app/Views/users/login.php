<div class="jumbotron" style="padding-top: 2cm;">
            <div class="container">
                <?php if($errors): ?>

                    <div class="alert alert-danger">
                        Identifiant incorrect ou mot de passe incorect !
                    </div>
                <?php endif; ?>
        <form method="post">
            <?= $form->input('username','Pseudo');?>
            <?= $form->input('password','Mot de passe', ['type'=> 'password']);?>
            <?= $form->submit('Ce connecter')?>

        </form>
    </div>
</div>
