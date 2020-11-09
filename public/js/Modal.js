class Modal{
    //constructor that set the member variable
    constructor(inContent){
        this.modalContent = inContent;
        this.buttonMethods = {
            add : null,
            edit : null,
            del : null,
        }
    }



    generate (methods){
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
        console.log(this.buttonMethods);
        if(this.buttonMethods.add) {
            let modalButtonAdd = document.createElement("button");
            modalButtonAdd.className="modalButtonAdd";
            modalButtonAdd.textContent="Add";
            modalButtonAdd.addEventListener("click", this.buttonMethods.add);
            modalDivButtons.appendChild(modalButtonAdd);
        }
        
        if(this.buttonMethods.del) {
            let modalButtonDelete = document.createElement("button");
                modalButtonDelete.className="modalButtonDelete";
                modalButtonDelete.textContent="Delete";
                modalButtonDelete.addEventListener("click", this.buttonMethods.del);
                modalDivButtons.appendChild(modalButtonDelete);
        }
        if(this.buttonMethods.edit) {
            let modalButtonEdit = document.createElement("button");
                modalButtonEdit.className="modalButtonEdit";
                modalButtonEdit.textContent="Edit";
                modalButtonEdit.addEventListener("click", this.buttonMethods.edit);
                modalDivButtons.appendChild(modalButtonEdit);
        }
       

        modalSubDiv.appendChild(modalButtonClose);
        modalSubDiv.appendChild(modalDivContent);
        modalSubDiv.appendChild(modalDivButtons);
        
        modalMainDiv.appendChild(modalSubDiv);
        document.body.appendChild(modalMainDiv);
    }
}