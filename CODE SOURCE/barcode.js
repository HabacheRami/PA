var char=' !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
var charId = [
 '212222','222122','222221','121223','121322','131222','122213','122312','132212','221213',
 '221312','231212','112232','122132','122231','113222','123122','123221','223211','221132',
 '221231','213212','223112','312131','311222','321122','321221','312212','322112','322211',
 '212123','212321','232121','111323','131123','131321','112313','132113','132311','211313',
 '231113','231311','112133','112331','132131','113123','113321','133121','313121','211331',
 '231131','213113','213311','213131','311123','311321','331121','312113','312311','332111',
 '314111','221411','431111','111224','111422','121124','121421','141122','141221','112214',
 '112412','122114','122411','142112','142211','241211','221114','413111','241112','134111',
 '111242','121142','121241','114212','124112','124211','411212','421112','421211','212141',
 '214121','412121','111143','111341','131141','114113','114311','411113','411311','113141',
 '114131','311141','411131','211412','211214','211232','23311120'];



  const idCard = document.getElementById('code').value;
  let bar;
  let sum = 104;  //variable de total des positions
  let pos; //variable de position


  bar = charId[sum]; //barre de début (réference)

 for(var x=0; x<idCard.length; x++){  //Pour faire les barres du milieu
   if (!((pos = char.indexOf(idCard[x])) === false )){ //Ignorer les caractères introuvable
     bar = bar.concat(charId[pos]);   //connaitre les traits a faire (fin, epais,...)
     sum = sum + (x+1)*pos;
   }
  }

//barre de fin (référence)
  bar = bar.concat(charId[sum % 103]);
  bar = bar.concat(charId[106]);

// Affichage dans un table des barres

  const html = document.getElementById('barcode');
  var body = "<table cellpadding=0 cellspacing=0><tr>";


  for(x=0;x<bar.length;x+=2){ // Affichage de toutes les barres

    body = body.concat("<td><div class=\"b128\" style=\"border-left-width:",bar[x],";width:", bar[x+1], "\"></div></td>");
  }

  body = body.concat("<tr><td colspan=",bar.length," align=left><font family=arial size=2>",idCard,"</td></tr></table>");

  html.innerHTML = body;
