<h2>Mes fiches de frais</h2>
<div class="row">
    <div class="col-md-4">
        <h3>Sélectionner un visiteur et un mois : </h3>
    </div>
    <form action="index.php?uc=modifInfos&action=modifInfos" 
              method="POST" role="form">
    <div class="col-md-4">
        
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n">Visiteurs : </label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($listeVisiteur as $user) {  ?>  
                       <option  value= <?= $user['id'] ?> > <?= $user['nom'] ?> <?= $user ['prenom'] ?></option>  
                    <?php } ?>
                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            
        </form>
    </div>
</div>