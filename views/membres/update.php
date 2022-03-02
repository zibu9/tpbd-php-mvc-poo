<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Editer Membre</h1>
            <form method="POST" action="<?=BASE_URL?>editer-membre/<?=$params['personne']->numero ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?=$params['personne']->nom ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Postnom</label>
                    <input type="text" name="postnom" class="form-control" value="<?=$params['personne']->postnom ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" value="<?=$params['personne']->prenom ?>" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" required name="sexe">
                        <option selected disabled value="">--Sexe--</option>
                        <option value="M" <?= $params['personne']->sexe=='M' ? 'selected' :''  ?>>M</option>
                        <option value="F" <?= $params['personne']->sexe=='F' ? 'selected' :''  ?>>F</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naissance" class="form-control" value="<?=$params['personne']->date_naissance ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="<?=$params['personne']->adresse ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telephone</label>
                    <input type="text" name="tel" class="form-control" value="<?=$params['personne']->tel ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Soumettre</button>
            </form>
        </div>
    </div>
</div>