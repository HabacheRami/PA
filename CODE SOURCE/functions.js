// Fonction recherche
function search() {
    let input = document.getElementById('recherche').value;
    input=input.toLowerCase();
    let x = document.getElementsByClassName('contain');

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
          x[i].style.display="none";
      }
      else {
          x[i].style.display="block";

      }
    }
}
