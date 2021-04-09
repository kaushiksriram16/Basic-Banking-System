var i = 0;
var txt = "BASIC BANKING SYSTEM";
var speed = 100;

function typeWriter() {
    if (i < txt.length) {
    document.getElementById("type-text").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }

}

function loading(id){
    var myVar;
    myVar = setTimeout(
        function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById(id).style.display = "block";
        }, 900);
}
