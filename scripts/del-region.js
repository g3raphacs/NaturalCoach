
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
        // audio component
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