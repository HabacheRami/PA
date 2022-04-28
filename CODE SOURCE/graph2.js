const graph2 = document.getElementById("graph2").getContext('2d');



const alimentaire1 = document.getElementById("Alimentaire").value;
const electronique1 = document.getElementById("Electronique").value;
const electromenager1 = document.getElementById("Electromenager").value;
const divertissement1 = document.getElementById("Divertissement").value;
const autre1 = document.getElementById("Autre").value;



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
          alimentaire1,
          electronique1,
          electromenager1,
          divertissement1,
          autre1],
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
