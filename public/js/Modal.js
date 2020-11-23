class Modal{
    //constructor that set the member variable
    constructor(inContent){
        this.modalContent = inContent;
        this.buttonMethods = {}
    }



    generate (methods, allowCancel=false){
        this.buttonMethods = methods;
        let modalMainDiv = document.createElement("div");
        modalMainDiv.className="modalMainDiv";

        modalMainDiv.addEventListener('click', function(){
            document.body.removeChild(modalMainDiv);
        })

        let modalSubDiv = document.createElement("div");
        modalSubDiv.className="modalSubDiv";

        modalSubDiv.addEventListener('click', function(e){
            e.stopPropagation();
        })

        let modalButtonClose = document.createElement("button");
        modalButtonClose.className="modalButtonClose";

        modalButtonClose.innerHTML="<i class='fas fa-times'></i>";

        modalButtonClose.addEventListener('click', function(){
            document.body.removeChild(modalMainDiv);
        })

        // content of the modal
        let modalDivContent =  document.createElement("div");
        modalDivContent.className="modalDivContent";
        modalDivContent.innerHTML = this.modalContent;

        let modalDivButtons = document.createElement("div");
        modalDivButtons.className="modalDivButtons";
        // console.log(this.buttonMethods);



        for (let addedButton in this.buttonMethods){
                let modalButton = document.createElement("button");
                modalButton.className="modalButton";
                modalButton.textContent=addedButton;
                modalButton.addEventListener("click", this.buttonMethods[addedButton]);
                modalDivButtons.appendChild(modalButton);
        }
        



        
        
       
       

        modalSubDiv.appendChild(modalButtonClose);
        modalSubDiv.appendChild(modalDivContent);
        modalSubDiv.appendChild(modalDivButtons);

        if(allowCancel) {
            let buttonCancel = document.createElement("button");
            buttonCancel.className="modalCancel";
            buttonCancel.textContent="Cancel";
            buttonCancel.addEventListener("click", function(){document.body.removeChild(modalMainDiv)
            });
            let cancelDiv = document.createElement("div");
            cancelDiv.className="modalCancelDiv";
            cancelDiv.appendChild(buttonCancel);
            modalSubDiv.appendChild(cancelDiv);
        }
        
        modalMainDiv.appendChild(modalSubDiv);
        document.body.appendChild(modalMainDiv);
    }
}