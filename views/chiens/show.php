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
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="col-md-10">
        <h2>Chiens parente</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Race</th>
                    <th scope="col">Naissance</th>
                    <th scope="col">Decede</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($params['chien']->chienParente() as $chien) :?>
                        <tr>
                            <th scope="row"><?=$chien->matricule ?></th>
                            <td scope="col"><?=$chien->nom ?></td>
                            <td scope="col"><?=$chien->sexe=='M' ? 'Chien' : 'Chienne' ?></td>
                            <td scope="col"><?=$chien->race ?></td>
                            <td scope="col"><?=$chien->date_naissance ?></td>
                            <td scope="col"><?=is_null($chien->date_deces) ? 'Non' : 'Oui' ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <a href="<?=BASE_URL?>gestion-des-chiens" class="btn btn-secondary">Retourner en arrière</a>
        </div>
        
    </div>
</div>