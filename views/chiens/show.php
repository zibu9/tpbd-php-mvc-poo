<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center"><?= $params['chien']->sexe=='M' ? 'Chien ' : 'Chienne '?><?= $params['chien']->nom ?></h1>
            <h3 class="text-center"> addresse : <?= $params['chien']->race?></h3>
            <h3 class="text-center"> Date de naissance : <?= $params['chien']->date_naissance?></h3>
            <?php foreach($params['chien']->vueNaitre() as $personne) :?>
                <h3 class="text-center"> Vue Naitre par : <?=$personne->prenom." ".$personne->nom ?></h3>
                <?php endforeach;?>

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-10">
            <h2>Proprietaire</h2>
            <table class="table">
                <thead>
                  <tr>
                  <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Postnom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Telephone</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($params['chien']->getPersonne() as $membre) :?>
                        <tr>
                            <th scope="row"><?=$membre->numero ?></th>
                            <td scope="col"><?=$membre->nom ?></td>
                            <td scope="col"><?=$membre->postnom ?></td>
                            <td scope="col"><?=$membre->prenom ?></td>
                            <td scope="col"><?=$membre->sexe=='M'? 'Masculin' : 'feminin' ?></td>
                            <td scope="col"><?=$membre->adresse ?></td>
                            <td scope="col"><?=$membre->tel ?></td>
                            <td scope="col">
                                <a href="<?=BASE_URL?>membre/<?=$membre->numero ?>" class="btn btn-primary">Voir</a>                
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