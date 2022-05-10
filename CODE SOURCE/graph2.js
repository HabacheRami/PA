const graph2 = document.getElementById("graph2").getContext('2d');


if (document.getElementById("Alimentaire")!=null){
  var alimentaire = document.getElementById("Alimentaire").value;
}else {
  var alimentaire = 0;
}
if (document.getElementById("Electronique")!=null){
  var electronique = document.getElementById("Electronique").value;
}else {
  var electronique = 0;
}
if (document.getElementById("Electromenager")!=null){
  var electromenager = document.getElementById("Electromenager").value;;
}else {
  var electromenager = 0;
}
if (document.getElementById("Divertissement")!=null){
  var divertissement = document.getElementById("Divertissement").value;
}else {
  var divertissement = 0;
}
if (document.getElementById("Autre")!=null){
  var autre = document.getElementById("Autre").value;
}else {
  var autre = 0;
}



let myChart1 = new Chart(graph2, {
  type: "polarArea",
  data: {
    labels:
    [
      "Alimentaire",
      "Éléctronique",
      "Électroménager",
      "Divertissement",
      "Autres"
    ],
    datasets:
    [
      {
        label: "Quantité",
        data: [
          alimentaire,
          electronique,
          electromenager,
          divertissement,
          autre,0],
        backgroundColor:[
          'red',
          'blue',
          'green',
          'yellow',
          'purple'
        ],
        hoverBorderWidth: 3,
      },
    ],
  },
  options:{
    title: {
      display: true,
      text: "Total Stock de la societé :",
      fontFamily: "Viga",
      fontSize: 35,
      fontColor: "black",
    },
    legend: {
      display: false,
    },
    layout: {
      padding: {
        top: 20,
      },
    },
  },
});
