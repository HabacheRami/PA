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
    var $script = document.createElement("script");
   $script.addEventListener("load", function( ){});

   $script.src = '/Langues/FR.js';
   document.head.appendChild($script);
  }

  if(langue==2){
    var $script = document.createElement("script");
   $script.addEventListener("load", function( ){});

   $script.src = './Langues/En.js';
   document.head.appendChild($script);
  }

  if(langue==3){
    var $script = document.createElement("script");
   $script.addEventListener("load", function( ){});

   $script.src = './Langues/Es.js';
   document.head.appendChild($script);
  }

  if(langue==4){
    var $script = document.createElement("script");
   $script.addEventListener("load", function( ){});

   $script.src = './Langues/ALL.js';
   document.head.appendChild($script);
  }
}

//faire un fichier par langue
