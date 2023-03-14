<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Ajouter Participants</h1>
            <form method="POST" action="<?= BASE_URL ?>participants">
                <div class="mb-3">
                    <select class="form-select" required name="concour_id">
                        <option selected value="<?=$params['concour']->id?>"><?=$params['concour']->ville."(".$params['concour']->type_prix .")"?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <select multiple class="form-select" required name="chien_matricule[]">
                        <option disabled value="">--Participants--</option>
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