<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a href="<?=BASE_URL?>nouveau-chien" class="btn btn-success mt-1">Nouveau Chien</a>
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
                    <?php foreach($params['chiens'] as $chien) :?>
                        <tr>
                            <th scope="row"><?=$chien->matricule ?></th>
                            <td scope="col"><?=$chien->nom ?></td>
                            <td scope="col"><?=$chien->sexe=='M' ? 'Chien' : 'Chienne' ?></td>
                            <td scope="col"><?=$chien->race ?></td>
                            <td scope="col"><?=$chien->date_naissance ?></td>
                            <td scope="col"><?=is_null($chien->date_deces) ? 'Non' : 'Oui' ?></td>
                            <td scope="col">
                                <a href="<?=BASE_URL?>chien/<?=$chien->matricule ?>" class="btn btn-primary">Voir</a>                
                                <a href="" class="btn btn-warning">Modifier</a>                
                                <form action="<?=BASE_URL?>chien/delete/<?=$chien->matricule ?>" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>