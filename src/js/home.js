document.addEventListener("DOMContentLoaded", function(e) {
    document.getElementById("msgList").scrollTop = 100000000;

    let url = new URL(document.URL);
    let conv = url.searchParams.get("conv");
    let tiles = Array.from(document.getElementsByClassName("conv_name"));
    tiles.forEach(x => {
        if(x.innerHTML === conv) x.parentElement.classList.add("selected");
    });
});