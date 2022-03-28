function ask(){
  if(document.getElementById("part").checked===true){

    document.getElementById("check").innerHTML = "<form  action='verif_demande_p.php' method='POST'><label> Nom :</label><div class='name'>  <input type='text' name='name' placeholder='Nom'><div class='bouton'><input class='envoie' type='submit' value='Envoyer demande'></div>  </form>";




  }else if (document.getElementById("ent").checked===true) {

    document.getElementById("check").innerHTML = "<form  action='verif_demande_p.php' method='POST'></div><label> Prénom :</label><div class='name'> <input type='text' name='firstname' placeholder='Prénom'></div><label> Email :</label><div class='email'>  <input type='email' name='email' placeholder='inconnu@toi.fr'></div><label>Téléphone :</label><br><div class='number'>  <input class='number' name='phone' type='number' min='0' max='9999999999' placeholder='XXXXXXXXXX'></div><label>Ville :<label><br><div class='country'>  <input type='text' name='country' placeholder='Paris'></div><label>Adresse :</label><br><div class='street'>  <input type='text' name='addresse' placeholder='23 Rue Erard'></div><label>Code Postale :</label><br><div class='codepostale'>  <input type='number' name='codepostale' min='0' max='99999' placeholder='00000'></div>   <label>Mot de passe :</label>   <br>   <div class='password'><input type='password' name='password' placeholder='Votre mot de passe'></div><label>Vérifiez le mot de passe : </label> <br><div class='passwordcheck'> <input type='password' name='passwordcheck' placeholder='Confirmation mot de passe'>   </div> <div class='bouton'><input class='envoie' type='submit' value='Enregistrer'></div>  </form>";

  }
}
