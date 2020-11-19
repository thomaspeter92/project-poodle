// Franco @TODO To add this js to the Event page instead of Template
{
    var step=1;
    const createAddEditEventModal = () =>{
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=addEditEvent');
        xhr.onload = function () {
            if(xhr.status == 200){
                let addEditEventModal = new Modal(xhr.responseText);
                let addEditEventObj = {

                }
                addEditEventModal.generate(addEditEventObj,allowCancel=false);

                //Create event listener for the buttons inside the modal form

                var eventPreviousBut =  document.querySelector("#eventPreviousButton");
                if (eventPreviousBut) {
                    eventPreviousBut.addEventListener("click", movePreviousStep);  
                }
                var eventNextBut =  document.querySelector("#eventNextButton");
                if (eventNextBut) {
                    eventNextBut.addEventListener("click", moveNextStep);  
                }
                showEventStep("eventStep1");

            }
        }
        xhr.send(null);
    }

    // TODO to change the location of the add Event button
    var addEventBut =  document.querySelector("#addEvent");
    if (addEventBut) {
        addEventBut.addEventListener("click", createAddEditEventModal);  
    }


    function moveNextStep(){
        step +=1;
        let currentStep="eventStep"+step;
        showEventStep(currentStep);
    }

    function movePreviousStep(){
        step -=1;
        let currentStep="eventStep"+step;
        showEventStep(currentStep);
    }
    function showEventStep(currentStep){
        switch (currentStep){
            case "eventStep1":
                document.getElementById("eventStep1").style.display = "block";
                document.getElementById("eventStep2").style.display = "none";
                document.getElementById("eventStep3").style.display = "none";
                document.getElementById("eventPreviousButton").style.display = "none";
                document.getElementById("eventNextButton").style.display = "block";
                document.getElementById("eventSubmitButton").style.display = "none";
                document.getElementById("lblStepIndicator").innerHTML="Step 1 of 3";
                document.getElementById("stepIndicator").value = "33";
                break;
            case "eventStep2":
                document.getElementById("eventStep1").style.display = "none";
                document.getElementById("eventStep2").style.display = "block";
                document.getElementById("eventStep3").style.display = "none";
                document.getElementById("eventPreviousButton").style.display = "block";
                document.getElementById("eventNextButton").style.display = "block";
                document.getElementById("eventSubmitButton").style.display = "none";
                document.getElementById("lblStepIndicator").innerHTML="Step 2 of 3";
                document.getElementById("stepIndicator").value = "66";
                break;
            case "eventStep3":
                document.getElementById("eventStep1").style.display = "none";
                document.getElementById("eventStep2").style.display = "none";
                document.getElementById("eventStep3").style.display = "block";
                document.getElementById("eventPreviousButton").style.display = "block";
                document.getElementById("eventNextButton").style.display = "none";
                document.getElementById("eventSubmitButton").style.display = "block";
                document.getElementById("lblStepIndicator").innerHTML="Step 3 of 3";
                document.getElementById("stepIndicator").value = "100";
                break;
            default:
                break;
        }
    }
}