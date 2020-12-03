class ModalLogin extends Modal{
    //  This class creates a modal window to be used for the SignIn and SignUp functions
    //  It is created so that it can get a HTML element (rendered during loading) and
    //  insert it in the modal window
   //constructor that set the member variable
   constructor(inContent){
    super(inContent);

        //Delete any modal already opened
        let tmpModalDiv = document.querySelector(".modalLoginMainDiv");
        if(tmpModalDiv){
            tmpModalDiv.click();
        }
    }

    generate(callbackCloseModal){
        let modalLoginMainDiv = document.createElement("div");
        modalLoginMainDiv.className="modalLoginMainDiv";

        let modalSubDiv = document.createElement("div");
        modalSubDiv.className="modalSubDiv";
        modalSubDiv.addEventListener('click', function(e){
            e.stopPropagation();
        })

        let modalButtonClose = document.createElement("button");
        modalButtonClose.className="modalButtonClose";
        modalButtonClose.innerHTML="<i class='fas fa-times'></i>";
        modalButtonClose.addEventListener('click', function(){
            callbackCloseModal();
            document.body.removeChild(modalLoginMainDiv);
        })

        // content of the modal
        let modalDivContent =  document.createElement("div");
        modalDivContent.className="modalDivContent";
        modalDivContent.innerHTML = this.modalContent;

        let modalDivButtons = document.createElement("div");
        modalDivButtons.className="modalDivButtons";

        modalLoginMainDiv.className="modalLoginMainDiv";
        modalSubDiv.appendChild(modalButtonClose);
        modalSubDiv.appendChild(modalDivContent);
        modalSubDiv.appendChild(modalDivButtons);
        modalLoginMainDiv.appendChild(modalSubDiv);
        document.body.appendChild(modalLoginMainDiv);

    }

    addExternalButton(parentElementId,childElementId,attributeValue){
        let tmpElement = document.querySelector(childElementId);

        let parentElement = document.querySelector(parentElementId);
        let childElement = tmpElement.parentNode.removeChild(tmpElement);

        if (parentElement && childElement){
            childElement.style.position = "static";
            childElement.style.top = "auto";
            childElement.style.left = "auto";
            childElement.classList.remove("signin");
            childElement.classList.remove("signup");
            childElement.classList.add(attributeValue);
            parentElement.appendChild(childElement);
        }

    }

}