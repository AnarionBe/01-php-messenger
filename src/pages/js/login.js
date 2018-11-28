document.getElementById("signup").addEventListener("input", function(e) {
    if(document.getElementById("signup").checked) {
        document.getElementById("inscription").style = "display: block";
        document.getElementById("button").value = "S'inscrire";
    } else {
        document.getElementById("inscription").style = "display: none";
        document.getElementById("button").value = "Se connecter";
    }
});