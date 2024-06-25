
<div class="row">    
    
    <h3>Informations utilisateur</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=afficheInfos&action=informations" 
              role="form">
            <fieldset>     
            <?php  
            foreach ($information as $infos){ ?>
            
                    <div class="form-group">
                        <label> Nom </label>
                        <input type="text" id="nom" 
                               name="nom"
                               size="15" maxlength="15"
                               value="<?= $infos['nom'] ?>" 
                               class="form-control">
                               </div>
                    <div class="form-group">
                        <label> Prenom </label>
                        <input type="text" id="prenom" 
                               name="prenom"
                               size="15" maxlength="15"
                               value="<?= $infos['prenom'] ?>" 
                               class="form-control"> 
                               </div>

                    <div class="form-group">
                        <label> Login </label>
                        <input type="text" id="login" 
                               name="login"
                               size="15" maxlength="15"
                               value="<?= $infos['login'] ?>" 
                               class="form-control">  
                               </div>

                    <div class="form-group">
                        <label> Adresse </label>
                        <input type="text" id="adresse" 
                               name="adresse"
                               size="15" maxlength="15"
                               value="<?= $infos['adresse'] ?>" 
                               class="form-control">
                               </div>

                    <div class="form-group">
                        <label> Ville </label>
                        <input type="text" id="ville" 
                               name="ville"
                               size="15" maxlength="15"
                               value="<?= $infos['ville'] ?>" 
                               class="form-control">  
                               </div>

                    <div class="form-group">
                        <label> Code Postale </label>
                        <input type="text" id="cp" 
                               name="cp"
                               size="15" maxlength="15"
                               value="<?= $infos['cp'] ?>" 
                               class="form-control">    
                               </div>

                    <div class="form-group">
                        <label> Date Embauche </label>
                        <input type="text" id="dateembauche" 
                               name="dateembauche"
                               size="15" maxlength="15"
                               value="<?= $infos['dateembauche'] ?>" 
                               class="form-control">
                                       
          <?php   } ?>

                
            </fieldset>
        </form>
    </div>
</div>
