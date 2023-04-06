@include('AdminPanel.head')
<div class="container ">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form class="shadow p-3 mb-5 bg-body rounded">
            <div class="row mb-3">
                <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control shadow-sm" id="nom" name="nomPatient" required>
                </div>
                <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control shadow-sm" id="prenom" name="prenomPatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">Adress :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control shadow-sm" id="adressPatient" name="adressPatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="telefonePatient" class="col-sm-2 col-form-label">telefone :</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control shadow-sm" id="telefonePatient" name="telefonePatient" required>
                </div>
                <label for="sex" class="col-sm-2 col-form-label">Sex :</label>
                <div class="col-sm-3 form-group">
                    <select class="form-select" aria-label="Default select example" id="sexePatient" name="sexePatient">
                        <option value="madame">Madame</option>
                        <option value="monsieur">Monsieur</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateNaissancePatient" class="col-sm-2 col-form-label">date de naissance :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control shadow-sm" id="dateNaissancePatient" name="dateNaissancePatient" required>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
</div>
  @include('AdminPanel.footer')