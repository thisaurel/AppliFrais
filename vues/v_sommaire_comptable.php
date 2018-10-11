    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				 <p>Bonjour Comptable : <br></p>  
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
           <li class="smenu">
              <a href="index.php?uc=validerFicheFrais&action=choisirVisiteur" title="Valider fiche de frais ">Valider fiche de frais</a>
           </li>
       
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    