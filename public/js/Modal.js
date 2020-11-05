class Modal{
    //constructor that set the member variable
    constructor(inContent){
        this.modalContent = inContent;
    }



    generate (){
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
        modalButtonClose.textContent="x";

        modalButtonClose.addEventListener('click', function(){
            document.body.removeChild(modalMainDiv);
        })

        // content of the modal
        let modalDivContent =  document.createElement('div');
        modalDivContent.innerHTML = this.modalContent;

        let modalButtonAdd = document.createElement("button");
        modalButtonAdd.className="modalButtonAdd";
        modalButtonAdd.textContent="Add";
        let modalButtonDelete = document.createElement("button");
        modalButtonDelete.className="modalButtonDelete";
        modalButtonDelete.textContent="Delete";
        let modalButtonEdit = document.createElement("button");
        modalButtonEdit.className="modalButtonEdit";
        modalButtonEdit.textContent="Edit";

        
        modalSubDiv.appendChild(modalButtonClose);
        modalSubDiv.appendChild(modalDivContent);
        modalSubDiv.appendChild(modalButtonAdd);
        modalSubDiv.appendChild(modalButtonDelete);
        modalSubDiv.appendChild(modalButtonEdit);
        modalMainDiv.appendChild(modalSubDiv);
        document.body.appendChild(modalMainDiv);
    }
}