const graph3 = document.getElementById("graph3").getContext('2d');
const entreprise = document.getElementById("Entreprise").value;
const client = document.getElementById("Client").value;
const partenaire = document.getElementById("Partenaire").value;

let myChart3 = new Chart(graph3, {
  type: "bar",
  data:
  {
  labels:
  [
    "Entreprise",
    "Client",
    "Partenaire"
  ],
  datasets:
  [
    {
      backgroundColor:[
        'red',
        'blue',
        'orange'
      ],
      borderColor: 'purple',
      borderWidth: 10,
      data: [
        entreprise,
        client,
        partenaire,0]
    },
  ],
  },
  options: {
    title: {
      display: true,
      text: "Nombre d'utilisateurs en fonction de leur statut :",
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
