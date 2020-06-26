let form= document.getElementById("new-guide-form");
let message= document.getElementById("message");
let inputs= document.getElementsByClassName('form-control');
console.log(inputs);
form.addEventListener('submit', (e)=>{
    e.preventDefault();

    const formData = new FormData(form);
    fetch( 'scripts/new-guide.php', { method : "post" , body : formData } )
        .then( res => res.json() ).then( data =>{
            let reponse = data.message;
            if(reponse == "success"){
                message.classList.add('alert-success');
                message.classList.remove('alert-danger');
                message.innerText='Nouveau Guide ajouté !';
                for(let i=0 ; i<inputs.length ; i++){
                    console.log(inputs[i]);
                    inputs[i].value='';
                }
            }
            else{
                message.classList.add('alert-danger');
                message.classList.remove('alert-success');
                message.innerText="Erreur lors de l'ajout";
            }
            message.style.display='block';
            setTimeout(messageHide, 1500);
        });
})

function messageHide() {
    message.style.display='none';
  }