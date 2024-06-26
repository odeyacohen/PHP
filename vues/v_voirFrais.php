<?php

?>
<div class="row">    
    <h2>Valider la fiche de frais du mois 
        <?php echo $numMois . '-' . $numAnnee ?>
    </h2>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFrais&action=majFraisForfait"               
              role="form">
            <fieldset>       
                <?php                
                    foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite']; ?>
                    <div class="form-group">
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control"> 
    
                    </div>
                    <?php
                }           
                ?>
                
                <button class="btn btn-success" type="submit">Modifier</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>

        </form>
    </div>
</div>
<?php

?>
<hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 
                </tr>
            </thead>  
            <tbody>
            <?php
            //le onclik c du javascript = ne reactulise aps la page on reste sur la meme page
        
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id']; ?>           
                <tr>
                    <td> <?php echo $date ?></td>
                    <td> <?php echo $libelle ?></td>
                    <td><?php echo $montant ?></td>
                    
                    <td><a href="index.php?uc=validerFrais&action=majFraisHorsForfait&idFrais=<?=$id?>"  
                    
                           onclick="return confirm('Voulez-vous vraiment modifier ce frais?');">Modifier ce frais</a></td>
                           
                </tr>
                
                <?php
            }
       
            ?>


            </tbody>  
        
        </table>
    </div>
    

    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=validerFrais&action=validerFiche" 
              
              role="form">
            
              <button class="btn btn-success" type="submit">Valider la fiche</button>
              
            </fieldset>
        </form>
    </div>