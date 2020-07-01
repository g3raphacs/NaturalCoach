
let message= document.getElementById("message");
let elementList = document.getElementsByClassName("elementBox");

let elementObjects =[];
let init=false;


function clickInscription(ID){
    if(!init){
        initElements();
        init=true;
    }
    showInscMsg(ID);
}

function initElements(){

    for (let i = 0; i < elementList.length; i++) {
        let newElement = new Object();
        newElement.box = elementList[i];
        newElement.msg = elementList[i].querySelector(".msgInsc");
        newElement.input = elementList[i].querySelector("input");
        elementObjects.push(newElement);
    }
}

function showInscMsg(ID){
    for (let i = 0; i < elementObjects.length; i++) {
        if(elementObjects[i].input.value==ID){
            elementObjects[i].msg.style.display='block';
        }
        else{
            elementObjects[i].msg.style.display='none';
        }
    }
}
function hideInscMsg(){
    for (let i = 0; i < elementObjects.length; i++) {
        elementObjects[i].msg.style.display='none';
    }
}

function Inscription(excursion,randonneur){

    const formData = new FormData();
    formData.append('id-excursion', JSON.stringify(excursion));
    formData.append('id-randonneur', JSON.stringify(randonneur));

    fetch( 'scripts/inscription-randonneur.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
            message.style.display='block';
            setTimeout(messageHide, 1500);

            hideInscMsg()
        });
}

function messageHide() {
    message.style.display='none';
    return;
  }