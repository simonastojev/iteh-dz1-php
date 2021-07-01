
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function validateForm() {
  var naziv = document.forms["unosPorudzbine"]["naziv"].value;
  var cena = document.forms["unosPorudzbine"]["cena"].value;
  var tip_porudzbine = document.forms["unosPorudzbine"]["tip_porudzbine"].value;
  var datum_porucivanja = document.forms["unosPorudzbine"]["datum_porucivanja"].value;
  if (naziv == "" || cena == "" || tip_porudzbine == "" || datum_porucivanja == "") {
    alert("Ne smeju postojati prazna polja! ");
    return false;
  }
}

