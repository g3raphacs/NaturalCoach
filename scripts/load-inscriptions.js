const contentBox = document.getElementById('contentBox');
const searchBar = document.getElementById('search');
const mainID = document.getElementById('mainID').value;


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

    xhr.open('POST', 'scripts/load-inscriptions.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + mainID);
}