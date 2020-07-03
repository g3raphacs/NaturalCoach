const contentBox = document.getElementById('contentBox');
const pages = document.getElementById('pages');
const searchBar = document.getElementById('search');
const searchBox = document.getElementById('searchBox');
const mainID = document.getElementById('mainID').value;

let search = '';
let page = 1;
let totalPages=4;
const maxBricks = 16;
window.onload = function(){
    loadPagination();
    loadPage();
}

function loadPage(){

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange  = function(){
        if (this.readyState == 4 && this.status == 200){
            contentBox.innerHTML = xhr.responseText;
        }
    };

    xhr.open('POST', 'scripts/load-inscription-randonneur.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search=" + search + "&page=" + page + "&maxBricks=" + maxBricks + "&mainID=" + mainID);
}

searchBar.addEventListener("input", () => {
    page = 1;
    search=searchBar.value;
    loadPagination();
    loadPage();
});

function loadPagination(){
    pages.innerHTML='';

    const formData = new FormData();
    formData.append('search', JSON.stringify(search));

    fetch( 'scripts/pages-randonneurs.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            totalPages=Math.ceil(data.count/maxBricks);
            if(totalPages>1){
                pages.style.display="flex"
                searchBox.classList.add("col-lg-10");
                searchBox.classList.remove("col-lg-12");

                const xhr = new XMLHttpRequest();

                xhr.onreadystatechange  = function(){
                    if (this.readyState == 4 && this.status == 200){
                        pages.innerHTML = xhr.responseText;
                    }
                };

                xhr.open('POST', 'scripts/crea-paging.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("pages=" + totalPages + "&current=" + page);

            }else{
                pages.style.display="none"
                searchBox.classList.add("col-lg-12");
                searchBox.classList.remove("col-lg-10");
            }
        });
}

function changePage(num){
    page=num;
    loadPagination();
    loadPage();
}