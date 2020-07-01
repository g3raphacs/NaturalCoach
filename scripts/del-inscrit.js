
let message= document.getElementById("message");
let elementList = document.getElementsByClassName("elementBox");

let elementObjects =[];
let init=false;


function clickDelete(ID){
    
    // console.log(ID);
    if(!init){
        initElements();
        init=true;
    }
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

function DeleteGuide(excursion , guide){

    const formData = new FormData();
    formData.append('excursion', JSON.stringify(excursion));
    formData.append('guide', JSON.stringify(guide));

    fetch( 'scripts/del-insc-guide.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
            message.style.display='block';
            setTimeout(messageHide, 1500);
        });

    for (let i = 0; i < elementObjects.length; i++) {
        if(elementObjects[i].input.value==guide){
            let obj = elementObjects[i].box;
            obj.remove();
        }
    }
}

function DeleteRando(excursion , randonneur){

    const formData = new FormData();
    formData.append('excursion', JSON.stringify(excursion));
    formData.append('randonneur', JSON.stringify(randonneur));

    fetch( 'scripts/del-insc-rando.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
            message.style.display='block';
            setTimeout(messageHide, 1500);
        });

    for (let i = 0; i < elementObjects.length; i++) {
        if(elementObjects[i].input.value==randonneur){
            let obj = elementObjects[i].box;
            obj.remove();
        }
    }
}

function messageHide() {
    message.style.display='none';
    return;
  }