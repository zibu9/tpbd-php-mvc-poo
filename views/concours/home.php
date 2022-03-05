<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="<?=BASE_URL?>nouveau-concour" class="btn btn-success mt-1">Nouveau Concour</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Date Concour</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Type de prix</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i =1; foreach($params['concours'] as $concours) :?>
                        <tr>
                            <th scope="row"><?=$i ?></th>
                            <th scope="row"><?=date_format(date_create($concours->date_concours), 'd/m/Y') ?></th>
                            <td scope="col"><?=$concours->ville ?></td>
                            <td scope="col"><?=$concours->type_prix ?></td>
                        </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>