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

            let p = document.createElement("p"); //modified

            //Configuration des éléments à insérer
            cancel.innerHTML = "Annuler";
            cancel.style.width = "100%";
            cancel.addEventListener("click", function(e) {
                e.preventDefault();
                location.reload();
            });

            p.setAttribute("class", "emoji-picker-container"); //modified


            commit.setAttribute("type", "submit");
            commit.setAttribute("value", "Confirmer");
            commit.style.width = "100%";

            input.setAttribute("class", "msgToSend");
            input.setAttribute("name", "modification");

            input.setAttribute("data-emojiable", "true"); //modified

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

            p.appendChild(input); //modified
            form.appendChild(p); //modified

            form.appendChild(div);
            form.appendChild(id);
            form.appendChild(conv);

            affichageEmojis();

        });
    });

    //SCRIPT pour afficher le choix des emojis 

    function affichageEmojis() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '/lib/img/',
            popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
    };

    affichageEmojis();

});