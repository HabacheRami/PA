const graph = document.getElementById("graph1").getContext('2d');


if (document.getElementById("entrepot1")!=null){
  var entrepot1 = document.getElementById("entrepot1").value;
}else {
  var entrepot1 = 0;
}
if (document.getElementById("entrepot2")!=null){
  var entrepot2 = document.getElementById("entrepot2").value;
}else {
  var entrepot2 = 0;
}
if (document.getElementById("entrepot3")!=null){
  var entrepot3 = document.getElementById("entrepot3").value;;
}else {
  var entrepot3 = 0;
}
if (document.getElementById("entrepot4")!=null){
  var entrepot4 = document.getElementById("entrepot4").value;
}else {
  var entrepot4 = 0;
}
if (document.getElementById("entrepot5")!=null){
  var entrepot5 = document.getElementById("entrepot5").value;
}else {
  var entrepot5 = 0;
}


let myChart = new Chart(graph, {
  type: "bar",
  data: {
    labels:
    [
      "Entrepot 1",
      "Entrepot 2",
      "Entrepot 3",
      "Entrepot 4",
      "Entrepot 5"
    ],
    datasets:
    [
      {
        label: "Quantité",
        data: [
          entrepot1,
          entrepot2,
          entrepot3,
          entrepot4,
          entrepot5,0],
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
      text: "Total Stock par entrepot :",
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
