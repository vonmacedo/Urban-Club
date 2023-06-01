function confereSenha() {

    const senha= document.querySelector(['input[id=senha]']);
    const confirmar= document.querySelector(['input[id=confirmar]']);
 
    if(confirmar.value === senha.value){
        confirmar.setCustomValidity('');
    } else {
        confirmar.setCustomValidity('As senhas não correspondem')
    }
}


