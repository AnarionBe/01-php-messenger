document.addEventListener("DOMContentLoaded", function(e) {
    document.getElementById("msgList").scrollTop = 100000000;

    let url = new URL(document.URL);
    let conv = url.searchParams.get("conv");
    let tiles = Array.from(document.getElementsByClassName("conv_name"));
    tiles.forEach(x => {
        if(x.innerHTML === conv) x.parentElement.classList.add("selected");
    });

    let editButtons = Array.from(document.getElementsByClassName("msgEditButton"));
    editButtons.forEach(x => {
        x.addEventListener("click", function(e) {
            //Création des variables
            let parent = e.target.parentElement;
            let input = document.createElement('textarea');
            let id = document.createElement("input");
            let form = document.createElement("form");
            let commit = document.createElement("input");
            let cancel = document.createElement("button");
            let div = document.createElement("div");
            let conv = document.createElement("input");

            //Configuration des éléments à insérer
            cancel.innerHTML = "Annuler";
            cancel.style.width = "100%";
            cancel.addEventListener("click", function(e) {
                e.preventDefault();
                location.reload();
            });

            commit.setAttribute("type", "submit");
            commit.setAttribute("value", "Confirmer");
            commit.style.width = "100%";

            input.setAttribute("class", "msgToSend");
            input.setAttribute("name", "modification");
            input.innerHTML = parent.children[2].innerHTML;

            id.value = parent.getAttribute("data-id");
            id.setAttribute("name", "id");
            id.style.display = "none";

            let url = new URL(document.URL);
            let conv_name = url.searchParams.get("conv");
            conv.value = conv_name;
            conv.setAttribute("name", "conv");
            conv.style.display = "none";

            form.style.padding = "5px";
            form.style.display = "flex";
            form.setAttribute("class", parent.getAttribute("class"));
            form.setAttribute("action", "./traitements/traitementMessageCreate.php");
            form.setAttribute("method", "post");

            //Maj de l'affichage
            div.appendChild(commit);
            div.appendChild(cancel);
            parent.parentElement.replaceChild(form, parent);
            form.appendChild(input);
            form.appendChild(div);
            form.appendChild(id);
            form.appendChild(conv);
        });
    });
});