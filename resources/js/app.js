import './bootstrap';

const formSendSecret = document.getElementById("form-send-sceret");

formSendSecret.addEventListener("submit", e => {
    const validateSend = confirm("El secreto no va a poder ser cambiado ni modificado estas seguro de enviarlo?")
    if (!validateSend){
        e.preventDefault()
    }
});
