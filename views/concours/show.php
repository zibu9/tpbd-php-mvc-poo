<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Date Concour</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Type de prix</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?=date_format(date_create($params['concour']->date_concours), 'd/m/Y') ?></th>
                        <td scope="col"><?=$params['concour']->ville ?></td>
                        <td scope="col"><?=$params['concour']->type_prix ?></td>
                    </tr>
                </tbody>
            </table>
            <?php if($params['concour']->date_concours >= date('Y-m-d')) : ?>
                <a href="<?=BASE_URL?>ajouter-participation/<?=$params['concour']->id?>" class="btn btn-success mt-1">Ajouter les participants</a>
        </div>
        <div class="col-md-12">
            <table class="table">
                <h2>les participants</h2>
                <thead>
                    <tr>
                        <th>Matricule Chien</th>
                        <th>Nom Chien</th>
                        <th>Race</th>
                        <th>Proprietaire</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <?php foreach ($params['concour']->getParticipants() as $participant) : ?>
                <tbody>
                    <th><?= $participant->matricule ?></th>
                    <td><?= $participant->cnom ?></td>
                    <td><?= $participant->race ?></td>
                    <td><?= $participant->prenom." ".$participant->pnom." ".$participant->postnom ?></td>
                    <td><?= $participant->adresse ?></td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <?php else: ?>   
        </div> 
        <div class="col-md-12">
            <table class="table">
                <h2>les participants</h2>
                <thead>
                    <tr>
                        <th>Matricule Chien</th>
                        <th>Nom Chien</th>
                        <th>Race</th>
                        <th>Proprietaire</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <?php foreach ($params['concour']->getParticipants() as $participant) : ?>
                <tbody>
                    <th><?= $participant->matricule ?></th>
                    <td><?= $participant->cnom ?></td>
                    <td><?= $participant->race ?></td>
                    <td><?= $participant->prenom." ".$participant->pnom." ".$participant->postnom ?></td>
                    <td><?= $participant->adresse ?></td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-12">
            <table class="table">
                <h2>le vainqueur</h2>
                <thead>
                    <tr>
                        <th>Matricule Chien</th>
                        <th>Nom Chien</th>
                        <th>Race</th>
                        <th>Proprietaire</th>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <?php foreach ($params['concour']->getWinner() as $gagnant) : ?>
                <tbody>
                    <th><?= $gagnant->matricule ?></th>
                    <td><?= $gagnant->cnom ?></td>
                    <td><?= $gagnant->race ?></td>
                    <td><?= $gagnant->prenom." ".$gagnant->pnom." ".$gagnant->postnom ?></td>
                    <td><?= $gagnant->adresse ?></td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>        
        <?php endif; ?>
    </div>
</div>