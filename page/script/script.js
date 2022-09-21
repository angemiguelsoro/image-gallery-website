const modale = document.getElementById("inscription_modale");

const inscription_button = document.querySelector(".js_modal");

const closeButton = document.querySelector("span.close")

const showInscriptionModale = () => {
    modale.style.display = "block";
}

const hideInscriptionModale = () => {
    modale.style.display = "none";
}

inscription_button.addEventListener("click", showInscriptionModale);

modale.addEventListener("click", (event)=>{
    if(event.target == modale){
        hideInscriptionModale();
    }
});

closeButton.addEventListener("click", hideInscriptionModale);


const modale2 = document.getElementById("connexion_modale");

const connexion_button = document.querySelector(".connexion");

const closeButton2 = document.querySelector("span.close2")

const showConnexionModale = () => {
    modale2.style.display = "block";
}

const hideConnexionModale = () => {
    modale2.style.display = "none";
}

connexion_button.addEventListener("click", showConnexionModale);

modale2.addEventListener("click", (event)=>{
    if(event.target == modale2){
        hideConnexionModale();
    }
});

closeButton2.addEventListener("click", hideConnexionModale);