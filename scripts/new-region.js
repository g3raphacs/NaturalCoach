let form= document.getElementById("form");
let message= document.getElementById("message");
let msg1= document.getElementById("msg1");
let inputs= document.getElementsByClassName('form-control');
form.addEventListener('submit', (e)=>{
    e.preventDefault();
    console.log(form);
    msg1.style.display='none';
    const formData = new FormData(form);
    fetch( 'scripts/new-region.php', { method : "post" , body : formData } )
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
            }
        });
    })

function messageHide() {
    message.style.display='none';
    return;
  }