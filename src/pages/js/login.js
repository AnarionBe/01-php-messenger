document.addEventListener("DOMContentLoaded", function(e) {
    document.getElementById("signup").addEventListener("input", function(e) {
        if(document.getElementById("signup").checked) {
            document.getElementById("inscription").style = "display: block";
            document.getElementById("button").value = "S'inscrire";
        } else {
            document.getElementById("inscription").style = "display: none";
            document.getElementById("button").value = "Se connecter";
        }
    });
    
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    
    emailInput = document.getElementById("email");
    emailInput.addEventListener("input", function(e) {
        if(!validateEmail(emailInput.value)) emailInput.className = "error";
        else emailInput.className = "correct";
    });
});