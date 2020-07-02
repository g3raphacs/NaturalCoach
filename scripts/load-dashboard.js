const contentBox = document.getElementById('contentBox');
const searchBar = document.getElementById('search');

let search = '';
let page = 1;
window.onload = function(){
    loadPage();
}

function loadPage(){

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange  = function(){
        if (this.readyState == 4 && this.status == 200){
            contentBox.innerHTML = xhr.responseText;
        }
    };

    xhr.open('POST', 'scripts/load-dashboard.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search=" + search + "&page=" + page);
}

searchBar.addEventListener("input", () => {
    search=searchBar.value;
    loadPage();
});