function cambio() {
  var imagen = document.getElementById("img");
  if (imagen.src.match("a.jpg")) {
    imagen.src = "../img/b.jpg";
  } else if (imagen.src.match("b.jpg")) {
    imagen.src = "../img/c.jpg";
  } else if (imagen.src.match("c.jpg")) {
    imagen.src = "../img/d.jpg";
  } else if (imagen.src.match("d.jpg")) {
    imagen.src = "../img/a.jpg";
  }
}
function bienvenidaesp() {
  alert("Bienvenido");
}
function bienvenidarus() {
  alert("добро пожаловать");
}
function bienvenidaeng() {
  alert("Welcome");
}
