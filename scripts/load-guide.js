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

    xhr.open('POST', 'scripts/load-guide.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("search=" + search + "&page=" + page);
}

searchBar.addEventListener("input", () => {
    search=searchBar.value;
    loadPage();
});



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