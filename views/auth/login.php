<?php
    if ((isset($_SESSION['auth'])) && $_SESSION['auth']== 1) {
        header('Location:'. BASE_URL);
    }
?>
<div class="container">
    
    <?php if (isset($_SESSION['errors'])):?>
        <?php $errors = array_pop($_SESSION['errors']);  ?>
    <?php endif ?>

    <div class="row justify-content-center">
        <h1 class="text-center">Association Francaise des Chiens</h1>
        <div class="col-lg-4">
            <div class="mt-5">
                <h1 class="text-center">Connexion</h1>

                <form action="<?=BASE_URL ?>login" method="POST">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username">
                        <?php if (isset($errors['username'])): ?>

                        <?php foreach($errors['username'] as $username): ?>
                            <li class="text-danger"><?= $username ?></li>
                        <?php endforeach ?>

                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        <?php if (isset($errors['password'])): ?>

                        <?php foreach($errors['password'] as $password): ?>
                            <li class="text-danger"><?= $password ?></li>
                        <?php endforeach ?>

                        <?php endif ?>                        
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 form-control">Se connecter</button>
                </form>
            </div>
        </div>
    </div>

</div>