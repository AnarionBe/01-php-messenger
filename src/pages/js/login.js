document.addEventListener("DOMContentLoaded", function(e) {
    let email = password = firstname = lastname = false;

    if(document.getElementById("signup").checked) {
        document.getElementById("inscription").style = "display: block";
        document.getElementById("button").value = "S'inscrire";
    }
    
    //affiche le formulaire adapté à la demande de l'utilisateur
    document.getElementById("signup").addEventListener("input", function(e) {
        if(document.getElementById("signup").checked) {
            document.getElementById("inscription").style = "display: block";
            document.getElementById("button").value = "S'inscrire";
        } else {
            document.getElementById("inscription").style = "display: none";
            document.getElementById("button").value = "Se connecter";
        }
    });
    
    //vérifie la saisie donnée
    function validateString(string, type) {
        switch(type) {
            case "mail":
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(string).toLowerCase());

            case "pass":
                var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                return re.test(String(string));
        }
    }
    
    //saisie d'un mail
    emailInput = document.getElementById("email");
    emailInput.addEventListener("input", function(e) {
        if(!(email = validateString(emailInput.value, "mail"))) emailInput.className = "error";
        else emailInput.className = "correct";
    });

    //saisie d'un mdp
    passInput = document.getElementById("password");
    passInput.addEventListener("input", function(e) {
        if(!(password = validateString(passInput.value, "pass"))) passInput.className = "error";
        else passInput.className = "correct";
    });
});