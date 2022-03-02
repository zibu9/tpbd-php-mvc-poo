<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="<?=BASE_URL?>nouveau-membre" class="btn btn-success mt-1">Nouveau Membre</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">N°</th>
                    <th scope="col">numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Postnom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Telephone</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i =1; foreach($params['membres'] as $membre) :?>
                        <tr>
                            <th scope="row"><?=$i ?></th>
                            <th scope="row"><?=$membre->numero ?></th>
                            <td scope="col"><?=$membre->nom ?></td>
                            <td scope="col"><?=$membre->postnom ?></td>
                            <td scope="col"><?=$membre->prenom ?></td>
                            <td scope="col"><?=$membre->sexe=='M'? 'Masculin' : 'feminin' ?></td>
                            <td scope="col"><?=$membre->adresse ?></td>
                            <td scope="col"><?=$membre->tel ?></td>
                            <td scope="col">
                                <a href="<?=BASE_URL?>membre/<?=$membre->numero ?>" class="btn btn-primary">Voir</a>                
                                <a href="<?=BASE_URL?>editer-membre/<?=$membre->numero ?>" class="btn btn-warning">Modifier</a>                
                                <form action="<?=BASE_URL?>membre/delete/<?=$membre->numero ?>" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>