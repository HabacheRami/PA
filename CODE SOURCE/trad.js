function trad() {
  var langue = document.getElementById('lan').value;

  if (document.getElementById('parte')!=null){
    var partenaire = document.getElementById('parte');
  }
  if (document.getElementById('con')!=null){
    var con = document.getElementById('con');
  }
  if (document.getElementById('cat')!=null){
    var catalogue = document.getElementById('cat');
  }
  if (document.getElementById('uti')!=null){
    var utilisaeteur = document.getElementById('uti');
  }
  if (document.getElementById('pot')!=null){
    var entrepot = document.getElementById('pot');
  }
  if (document.getElementById('ent')!=null){
    var entreprise = document.getElementById('ent');
  }
  if (document.getElementById('dec')!=null){
    var deconnexion = document.getElementById('dec');
  }
  if (document.getElementById('pro')!=null){
    var produit = document.getElementById('pro');
  }
  if (document.getElementById('his')!=null){
    var historique = document.getElementById('his');
  }
  if (document.getElementById('red')!=null){
    var reduction = document.getElementById('red');
  }
  if (document.getElementById('prof')!=null){
    var profil = document.getElementById('prof');
  }
  if (document.getElementById('demande')!=null){
    var demande = document.getElementById('demande');
  }


  var fr = document.getElementById('fr');
  var en = document.getElementById('en');
  var all = document.getElementById('all');
  var es = document.getElementById('es');

  if(langue==1){

    if (document.getElementById('parte')!=null){
      partenaire.innerHTML="Partenaire";
    }
    if (document.getElementById('parte')!=null){
      con.innerHTML="Connexion";
    }
    if (document.getElementById('cat')!=null){
      catalogue.innerHTML = "Catalogue";
    }
    if (document.getElementById('uti')!=null){
      utilisaeteur.innerHTML = "Utilisteurs";
    }
    if (document.getElementById('pot')!=null){
      entreprise.innerHTML = "Entreprot";
    }
    if (document.getElementById('dec')!=null){
      deconnexion.innerHTML = "Déconnexion";
    }
    if (document.getElementById('pro')!=null){
      produit .innerHTML = "Produits"
    }
    if (document.getElementById('his')!=null){
      historique.innerHTML = "Historique";
    }
    if (document.getElementById('red')!=null){
      reduction.innerHTML = "Rédcution";
    }
    if (document.getElementById('ent')!=null){
      entreprise.innerHTML = "Entreprise";
    }
    if (document.getElementById('prof')!=null){
      profil.innerHTML = "Profil";
    }
    if (document.getElementById('demande')!=null){
      demande.innerHTML = "Demande";
    }


    fr.innerHTML="Français";
    en.innerHTL="Anglais";
    es.innerHTML="Espagnol";
    all.innnerHTML="Allemand";
  }

  if(langue==2){
    if (document.getElementById('parte')!=null){
      partenaire.innerHTML="Partner";
    }
    if (document.getElementById('con')!=null){
      con.innerHTML="Connection";
    }
    if (document.getElementById('cat')!=null){
      catalogue.innerHTML = "Catalog";
    }
    if (document.getElementById('uti')!=null){
      utilisaeteur.innerHTML = "Users";
    }
    if (document.getElementById('ent')!=null){
      entreprise.innerHTML = "Companies";
    }
    if (document.getElementById('pot')!=null){
      entrepot.innerHTML = "Warehouses";
    }
    if (document.getElementById('dec')!=null){
      deconnexion.innerHTML = "Disconnection";
    }
    if (document.getElementById('pro')!=null){
      produit .innerHTML = "Products"
    }
    if (document.getElementById('his')!=null){
      historique.innerHTML = "History";
    }
    if (document.getElementById('red')!=null){
      reduction.innerHTML = "Reduction";
    }
    if (document.getElementById('prof')!=null){
      profil.innerHTML = "Profile";
    }
    if (document.getElementById('demande')!=null){
      demande.innerHTML = "Demand";
    }

    fr.innerHTML="French";
    en.innerHTL="English";
    es.innerHTML="Spanish";
    all.innnerHTML="German";
  }

  if(langue==3){
    if (document.getElementById('parte')!=null){
      partenaire.innerHTML="Pareja";
    }
    if (document.getElementById('con')!=null){
      con.innerHTML="Acceso";
    }
    if (document.getElementById('cat')!=null){
      catalogue.innerHTML = "Catálogo";
    }
    if (document.getElementById('uti')!=null){
      utilisaeteur.innerHTML = "Usuarios";
    }
    if (document.getElementById('ent')!=null){
      entreprise.innerHTML = "Empresas";
    }
    if (document.getElementById('pot')!=null){
      entrepot.innerHTML = "Almacenes";
    }
    if (document.getElementById('dec')!=null){
      deconnexion.innerHTML = "Desconexión";
    }
    if (document.getElementById('pro')!=null){
      produit .innerHTML = "Productos"
    }
    if (document.getElementById('his')!=null){
      historique.innerHTML = "Historia";
    }
    if (document.getElementById('red')!=null){
      reduction.innerHTML = "Reducción";
    }
    if (document.getElementById('prof')!=null){
      profil.innerHTML = "Perfil";
    }
    if (document.getElementById('demande')!=null){
      demande.innerHTML = "Demanda";
    }

    fr.innerHTML="Francia";
    en.innerHTL="Inglés";
    es.innerHTML="Español";
    all.innnerHTML="Alemán";
  }


  if(langue==4){
    if (document.getElementById('parte')!=null){
      partenaire.innerHTML="Partner";
    }
    if (document.getElementById('con')!=null){
      con.innerHTML="Anmeldung";
    }
    if (document.getElementById('cat')!=null){
      catalogue.innerHTML = "Katalog";
    }
    if (document.getElementById('uti')!=null){
      utilisaeteur.innerHTML = "Benutzer";
    }
    if (document.getElementById('ent')!=null){
      entreprise.innerHTML = "Unternehmen";
    }
    if (document.getElementById('pot')!=null){
      entrepot.innerHTML = "Lager";
    }
    if (document.getElementById('dec')!=null){
      deconnexion.innerHTML = "Trennung";
    }
    if (document.getElementById('pro')!=null){
      produit .innerHTML = "Produkte"
    }
    if (document.getElementById('his')!=null){
      historique.innerHTML = "Geschichte";
    }
    if (document.getElementById('red')!=null){
      reduction.innerHTML = "Reduzierung";
    }
    if (document.getElementById('prof')!=null){
      profil.innerHTML = "Profil";
    }
    if (document.getElementById('demande')!=null){
      demande.innerHTML = "Anforderung";
    }

    fr.innerHTML="Frankreich";
    en.innerHTL="Englisch";
    es.innerHTML="Spanisch";
    all.innnerHTML="Deutsch";
  }
}
