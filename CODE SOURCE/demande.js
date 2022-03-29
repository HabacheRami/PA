function ask(){
  if(document.getElementById("part").checked===true){

    document.getElementById("check").innerHTML = "<label> Nom :</label><div class='name'><input type='text' name='name' placeholder='Nom' required='required'><div class='bouton'><input class='envoie' type='submit' value='Envoyer demande'></div>";


  }else if (document.getElementById("ent").checked===true) {

    document.getElementById("check").innerHTML = "<label> Nom :</label><div class='name'><input type='text' name='name' placeholder='Nom' required='required'></div><label> Email :</label><div class='email'><input type='email' name='email' placeholder='inconnu@toi.fr' required></div><label>Téléphone :</label><br><div class='number'><input class='number' name='phone' type='number' max='9999999999' placeholder='XXXXXXXXXX' required></div><label>Ville :</label><br><div class='country'><input type='text' name='country' placeholder='Paris' required></div><label>Adresse :</label><br><div class='street'><input type='text' name='addresse' placeholder='23 Rue Erard' required></div><label>Code Postale :</label><br><div class='codepostale'><input type='number' name='codepostale' min='0' max='99999' placeholder='00000' required></div><label>CA :</label><br><div class='number'><input class='CA' name='CA' type='number' min='0' placeholder='45059845' required></div><label>Mot de passe :</label><br><div class='password'><input type='password' name='password' placeholder='Votre mot de passe' required></div><label>Vérifiez le mot de passe : </label><br><div class='passwordcheck'><input type='password' name='passwordcheck' placeholder='Confirmation mot de passe' required></div><div class='bouton'><center><input class='envoie' type='submit' value='Enregistrer'></center></div>";

  }
}
