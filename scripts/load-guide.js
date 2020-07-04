const contentBox = document.getElementById('contentBox');
const pages = document.getElementById('pages');
const searchBar = document.getElementById('search');
const searchBox = document.getElementById('searchBox');

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

    xhr.open('POST', 'scripts/load-guide.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search=" + search + "&page=" + page + "&maxBricks=" + maxBricks);
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

    fetch( 'scripts/pages-guides.php', { method : "post" , body : formData } )
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

let message= document.getElementById("message");
let elementList = document.getElementsByClassName("elementBox");

let elementObjects =[];


function clickDelete(ID){
    initElements();
    showDelMsg(ID);
}

function initElements(){

    for (let i = 0; i < elementList.length; i++) {
        let newElement = new Object();
        newElement.box = elementList[i];
        newElement.msg = elementList[i].querySelector(".msgDel");
        newElement.input = elementList[i].querySelector("input");
        elementObjects.push(newElement);
    }
}

function showDelMsg(ID){
    for (let i = 0; i < elementObjects.length; i++) {
        if(elementObjects[i].input.value==ID){
            elementObjects[i].msg.style.display='block';
        }
        else{
            elementObjects[i].msg.style.display='none';
        }
    }
}
function hideDelMsg(){
    for (let i = 0; i < elementObjects.length; i++) {
        elementObjects[i].msg.style.display='none';
    }
}

function Delete(ID){

    const formData = new FormData();
    formData.append('id', JSON.stringify(ID));

    fetch( 'scripts/del-guide.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
            message.style.display='block';
            setTimeout(messageHide, 1500);
            loadPage();
        });
}

function messageHide() {
    message.style.display='none';
    return;
  }