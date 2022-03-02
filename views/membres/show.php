<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center"><?= $params['membre']->sexe ? 'Mr ': 'Mme '?><?= $params['membre']->prenom." ".$params['membre']->nom." ".$params['membre']->postnom ?></h1>
            <h3 class="text-center"> addresse : <?= $params['membre']->adresse?></h3>
            <h3 class="text-center"> Telephone : <?= $params['membre']->tel?></h3>
            <h3 class="text-center"> Date de naissance : <?= $params['membre']->date_naissance?></h3>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-10">
            <h2>Listes des Chiens</h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Race</th>
                    <th scope="col">Naissance</th>
                    <th scope="col">Decede</th>
                    <th scope="col">Prix</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($params['membre']->getChiens() as $chien) :?>
                        <tr>
                            <th scope="row"><?=$chien->matricule ?></th>
                            <td scope="col"><?=$chien->nom ?></td>
                            <td scope="col"><?=$chien->sexe=='M' ? 'Chien' : 'Chienne' ?></td>
                            <td scope="col"><?=$chien->race ?></td>
                            <td scope="col"><?=$chien->date_naissance ?></td>
                            <td scope="col"><?=is_null($chien->date_deces) ? 'Non' : 'Oui' ?></td>
                            <td scope="col"><?=$chien->prix."€" ?></td>
                            <td scope="col">
                                <a href="<?=BASE_URL?>chien/<?=$chien->matricule ?>" class="btn btn-primary">Voir</a>                
                                <a href="" class="btn btn-warning">Modifier</a>                
                                <form action="" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <a href="<?=BASE_URL?>gestion-des-membres" class="btn btn-secondary">Retourner en arrière</a>
        </div>
    </div>
</div>