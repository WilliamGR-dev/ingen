let search = document.getElementById('searchDiv');
let inputSearch = document.getElementById('search');

function extendSearch() {
    width = parseInt(inputSearch.offsetWidth);
    if (width !== 0){
        inputSearch.style.width = "0px";
        inputSearch.style.paddingLeft = "0px";
        inputSearch.style.backgroundColor = "none";
        if (parseInt(window.screen.width) <= 1250){
            search.style.justifyContent = "center";
        }


    }
    else {
        inputSearch.style.width = "240px";
        inputSearch.style.paddingLeft = "30px";
        inputSearch.style.backgroundColor = "rgba(255, 255, 255, 0.15)";
        if (parseInt(window.screen.width) <= 1250){
            search.style.setProperty('justify-content', "center");
            search.style.justifyContent = "end";
        }
    }
}








