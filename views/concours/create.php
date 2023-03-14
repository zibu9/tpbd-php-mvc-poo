<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Ajouter Concours</h1>
            <form method="POST" action="<?=BASE_URL?>concours/create">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date Concours</label>
                    <input type="date" name="date_concours" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                    <input type="text" name="ville" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Type Prix</label>
                    <input type="text" name="type_prix" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </div>
    </div>
</div>