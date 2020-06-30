
let message= document.getElementById("message");
let elementList = document.getElementsByClassName("elementBox");

let elementObjects =[];
let init=false;


function clickDelete(ID){
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

    for (let i = 0; i < elementObjects.length; i++) {
        console.log(elementObjects[i].input.value);
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
    console.log('delete function launch')

    const formData = new FormData();
    formData.append('id', JSON.stringify(ID));

    fetch( 'scripts/del-region.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
            message.style.display='block';
            setTimeout(messageHide, 1500);
        });

    for (let i = 0; i < elementObjects.length; i++) {
        if(elementObjects[i].input.value==ID){
            let obj = elementObjects[i].box;
            obj.remove();
        }
    }
}

function messageHide() {
    message.style.display='none';
    return;
  }