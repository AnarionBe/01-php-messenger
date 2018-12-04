//Fonction qui permet d'afficher les emojis dans le texte lorsqu'ils sont sélectionnés

//Transformation des classes emojis en nodelist et puis en tableau afin d'avoir leurs informations
let nodelist = document.querySelectorAll('.emojis');
let nodelistToArray = Array.apply(null, nodelist);
console.log(nodelistToArray);

//application d'un évènement à chaque élément du tableau lorsqu'on click dessus
nodelistToArray.forEach(function(emoji) {
    emoji.addEventListener("click", function () {
        let emojiTitle = emoji.getAttribute("title");
        document.getElementById("message").value += emojiTitle;
        //document.getElementById("message").insertAdjacentText('afterbegin', emojiTitle);
    });
});


