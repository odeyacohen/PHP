
<div class="row">    
    
    <h3>Informations utilisateur</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=modifInfos&action=modifInfos" 
              role="form">
            <fieldset>       
            <div class="form-group">
                        <label> Id </label>
                        <input type="text" id="idVisiteur" 
                               name="idVisiteur"
                               size="10" maxlength="5"
                               value="<?= $information['id'] ?>" 
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" id="nom" 
                               name="nom"
                               size="15" maxlength="15"
                               value="<?= $information['nom'] ?>" 
                               class="form-control">
                <button class="btn btn-success" type="submit">Ajouter</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>
