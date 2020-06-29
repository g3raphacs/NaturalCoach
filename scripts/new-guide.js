let form= document.getElementById("new-guide-form");
let message= document.getElementById("message");
let msg1= document.getElementById("msg1");
let msg2= document.getElementById("msg2");
let msg3= document.getElementById("msg3");
let inputs= document.getElementsByClassName('form-control');
form.addEventListener('submit', (e)=>{
    e.preventDefault();
    console.log(form);
    msg1.style.display='none';
    msg2.style.display='none';
    msg3.style.display='none';
    const formData = new FormData(form);
    fetch( 'scripts/new-guide.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            if(data.ok==true){
                message.innerHTML='<span class="fas fa-check-circle"></span>&nbsp;'+data.message;
                if(data.editMode==false){
                    for(let i=0 ; i<inputs.length ; i++){
                        inputs[i].value='';
                    }
                }
                message.style.display='block';
                setTimeout(messageHide, 1500);
            }
            else{
                if(data.msg1!=''){
                    msg1.style.display='block';
                    msg1.innerHTML='<span class="fas fa-exclamation-triangle"></span>&nbsp;'+data.msg1;
                }
                if(data.msg2!=''){
                    msg2.style.display='block';
                    msg2.innerHTML='<span class="fas fa-exclamation-triangle"></span>&nbsp;'+data.msg2;
                }
                if(data.msg3!=''){
                    msg3.style.display='block';
                    msg3.innerHTML='<span class="fas fa-exclamation-triangle"></span>&nbsp;'+data.msg3;
                }
            }
        });
    })

function messageHide() {
    message.style.display='none';
    return;
  }