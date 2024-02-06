<?php

?>
<h2>Mes fiches de frais</h2>
<div class="row">
    <div class="col-md-4">
        <h3>Sélectionner un visiteur et un mois : </h3>
    </div>
    <form action="index.php?uc=suiviePaiement&action=voirFrais" 
              method="POST" role="form">
    <div class="col-md-4">
        
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n">Visiteurs : </label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lstVisiteur as $user) {  ?>  
                       <option  value= <?= $user['id'] ?> > <?= $user['nom'] ?> <?= $user ['prenom'] ?></option>  
                    <?php } ?>
                </select>
            </div>

        
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois" class="form-control">
                
                    <?php
                    foreach ($lstMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = substr( $unMois['mois'], 0, 4);
                        $numMois = substr( $unMois['mois'], 4, 2);
                        
                          ?>
                            <option value="<?= $unMois['mois'] ?>">
                            
                                <?= $numMois . '/' . $numAnnee ?> </option>
                            <?php } ?>   
                    
                    
                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
            
        </form>
    </div>
</div>