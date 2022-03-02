<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Nouveau Chien</h1>
            <form method="POST" action="<?= BASE_URL ?>chien/create">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" required name="sexe">
                        <option selected disabled value="">--Sexe--</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Race</label>
                    <input type="text" name="race" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naissance" class="form-control" required>
                </div>
                <div class="mb-3">
                    <select multiple class="form-select" required name="numero_personne[]">
                        <option disabled value="">--Personnes qui l'a vu naitre--</option>
                        <?php foreach($params['personnes'] as $personne) :?>
                            <option value="<?=$personne->numero?>"><?=$personne->prenom." ".$personne->nom." ".$personne->postnom?></option>
                        <?php endforeach;?>
                        
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" required name="proprietaire">
                        <option selected disabled value="">--Proprietaire Actuel--</option>
                        <?php foreach($params['personnes'] as $personne) :?>
                            <option value="<?=$personne->numero?>"><?=$personne->prenom." ".$personne->nom." ".$personne->postnom?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date Acquisition</label>
                    <input type="date" name="date_acquisition" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prix</label>
                    <input type="text" name="prix" class="form-control" required>
                </div>
                <div class="mb-3">
                    <select multiple class="form-select" required name="chiens_parente[]">
                        <option disabled value="">--Chien Parente--</option>
                        <?php foreach($params['chiens'] as $chien) :?>
                            <option value="<?=$chien->matricule?>"><?=$chien->nom?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </div>
    </div>
</div>