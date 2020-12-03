<?php ob_start();?>
<link rel="stylesheet" href="./public/css/eventsListOnProfile.css">
<link rel="stylesheet" href="./public/css/petsListOnProfile.css">
<style>
    body {
        margin:0;
        padding:0;
        background-color: rgb(245, 245, 245);
    }
    footer {
        background-color: rgb(245, 245, 245);
    }

    .accountBox, .petItem, .eventItem {
        background-color: white;
    }

    /* Empty box for the area of header */
    section>div:first-child {
        height: 65px;
    }

    /* Page Layout */
    #profilePageContent{
        display: flex;
    }
    #profilePageContent>div:first-child {
        width: 40%;
        padding: 2%;
        padding-right: 0;
    }
    #profilePageContent>div:last-child {
        width: 60%;
        padding: 2%;
    }

    @media (max-width: 850px) {
        #profilePageContent{
            width: 96%;
            flex-direction: column
        }
        #profilePageContent>div:first-child {
            width: 100%;
            margin-bottom: 20px;
        }
        #profilePageContent>div:last-child {
            width: 100%;
        }
    }

    #petWrapper {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }
    #petsList {
        width: 100%;
    }

    /* Account */
    .accountWrapper {
        text-align: center;
        margin-bottom: 5%;
    }

    .accountBox {
        box-shadow: 2px 2px 3px 2px lightgrey;
        border-radius: 15px;
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
        /* width: 200px; */
    }
    .profilePic {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
    }
    .modalDivContent .profilePic {
        padding-top:20px;
    }
    #profileName {
        padding: 10px;
        font-size: 2.0em;
        font-family: "MontserratBold", sans-serif;
    }
    button.manageAccount {
        height: 46px;
        padding: 0 20px;
    }
    
    @media (max-width : 1000px) {
        .profilePic {
            width: 120px;
            height: 120px;
        }
        #profileName {
            font-size: 1.5em;
        }
        .accountWrapper {
            margin-bottom: 5%;
        }
    }
</style>


<?php $style = ob_get_contents();?>

<?php 
$profileImageURL = isset($profilePicURL['profileImage']) ? 
                        "./private/profile/".$profilePicURL['profileImage'] :
                        "./private/defaultProfile.png"; 
ob_start();
?>

<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<section>
    <div></div>
    <div id="profilePageContent">
        <div>
            <div class="accountWrapper">
                <div class="accountBox">
                    <div class="proPicContainer">
                        <img class="profilePic" src="<?= $profileImageURL;?>" alt="Profile Pic">
                    </div>
                    <div id="profileName"><?= $_SESSION['name'];?></div>
                    <button class="manageAccount">Manage Account</button>
                </div>
            </div>
            <div id="petWrapper">
                <div id="myPetsHeader">
                    <span>My Pets</span>&nbsp;&nbsp;&nbsp;
                    <button id="addPetButton">+</button>
                </div>
                <div id="petsList">
                    <?php require("./view/petsListOnProfile.php"); ?>
                </div>
            </div>
        </div>
        <div>
            <div id="myEventsWrapper">
                <div id="myEventsHeader">
                    <div id="myEvents"><span>My Events</span></div>
                    <div id="attendingEvents"><span>Attending Events</span></div>
                </div>
                <div id="eventsList">
                    <?php require("./view/eventsListOnProfile.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
{
// DELETE PET FUNCTION, PULLS PET ID AND ERASES FROM DB
    function delPet (petId){
        if (confirm('Are you sure you want to delete?')) { 
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?action=delPet&petId="+petId);
            let params = new FormData();
            params.append("petId",petId);
            xhr.send(params);
            location.reload();
        }
    }

//SAME FUNCTION USED FOR EDITNG AND ADDING PETS.
    function addEditPet() {
        let addPetForm = document.querySelector('#addPetForm');
        let petName = document.querySelector('#name');
        let petType = document.querySelector('#type');
        let petBreed = document.querySelector('#breed');
        let petAge = document.querySelector('#age');
        let genderButtons = document.querySelectorAll('input[name="gender"]');
        let genderLabel = document.querySelector('#genderLabel');
        let description = document.querySelector('#descriptionInput');
        let selectedValue;
            for (button of genderButtons) {
                if (button.checked) {
                    selectedValue = button.value;
                    break;
                }
            }
        
        if (petName.value.length < 2 || petType.value.length < 2 || petBreed.value.length < 2 || parseInt(petAge.value) < 0 || selectedValue == null || description.value.length > 150) {
            petName.value.length < 2 ? petName.style.borderColor = 'red' : petName.style.borderColor = 'lightgrey'
            petType.value.length < 2 ? petType.style.borderColor = 'red' : petType.style.borderColor = 'lightgrey' ;
            petBreed.value.length < 2 ? petBreed.style.borderColor = 'red' : petBreed.style.borderColor = 'lightgrey' ;
            parseInt(petAge.value) < 0 || petAge.value === '' ? petAge.style.borderColor = 'red' : petAge.style.borderColor = 'lightgrey' ;
            selectedValue == null ? genderLabel.style.color = 'red' : genderLabel.style.color = 'lightgrey';
            return null;
        } else {
            let xhr = new XMLHttpRequest();
            let addPetForm = document.querySelector('#addPetForm');
            let params = new FormData(addPetForm);
            xhr.open("POST", "index.php");
            xhr.onload = function() {
                console.log(xhr.responseText)
                if (xhr.responseText.trim() === 'success') {
                    location.reload();
                } else if (xhr.responseText.trim() === 'fileError') {
                    let fileError = document.querySelector('#fileError');
                    fileError.style.display = 'inherit';
                } else {
                    let errorMsg = document.querySelector('#formError')
                    errorMsg.style.display = 'inherit';
                }
            }

            // TO-DO: ADD ERROR MESSAGING UPON FAILURE TO POST TO DB
            xhr.send(params);
        }
    }
// FUNCTION TO DISPLAY THE INPUT IN A MODAL
    function addEditFormDisplay(petId) {
        let xhr = new XMLHttpRequest();
        if (petId) {
            xhr.open('GET', 'index.php?action=addEditInput&petId='+petId);
        } else {
            xhr.open('GET', 'index.php?action=addEditInput');
        }
        xhr.onload = function () {
            if(xhr.status == 200) {
                let modalPetObj = {
                    Submit : addEditPet,
                }

                let petView = new Modal(xhr.responseText);
                petView.generate(modalPetObj, allowCancel=false);
                new FormCheck().formCheck(3);
                let photoInput = document.querySelector('#file');
                let petPhoto = document.querySelector('#imagePreview')
                photoInput.addEventListener("change",  function() {
                        const file = this.files[0];
                        if(file) {
                            if (file['type'] == 'image/jpeg' || file['type'] == 'image/png' || file['type'] == 'image/jpg') {
                                const reader = new FileReader();
                                reader.addEventListener("load", function() {
                                    petPhoto.setAttribute("src", this.result);
                                });
                                reader.readAsDataURL(file);
                            } else {
                                let fileError = document.querySelector('#fileError');
                                fileError.style.display = 'inherit';
                            }
                        }
                })
            }
        }
        xhr.send(null);
    }

    let addPetButton = document.querySelector('#addPetButton');
    addPetButton.addEventListener('click', function(e) {
        let petId = e.target.getAttribute("data-petId");
        addEditFormDisplay(petId);
    }); 

    let elements = document.getElementsByClassName("petItem");
    for(i=0; i<elements.length; i++){
        elements[i].addEventListener('click', function(e){
            let target  = e.target;
            let petId = target.getAttribute("data-petId");
            let params = new FormData();
            params.append("petId", petId);
            target  = e.target;
            while (!petId) {
                target = target.parentNode;
                petId = target.getAttribute("data-petId");
            }
            
            // AJAX
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php?action=petprofile&petid='+petId);
            xhr.onload = function () {
                if(xhr.status == 200){
                    let modalPetObj = {
                        EDIT : function () {
                            let modalDiv =document.querySelector('.modalMainDiv');
                            document.body.removeChild(modalDiv);
                            addEditFormDisplay(petId);
                        },
                        DELETE : function() {
                            delPet(petId);
                        },
                    }
                    let petView = new Modal(xhr.responseText);
                    petView.generate(modalPetObj, allowCancel=false);
                }


            }
            xhr.send(null);
        
        });
    }

    // --------------------------ACCOUNT FUNCTIONS---------------------------------

    function saveAccountChanges () {
        console.log("clicked");
        const nameInput = document.querySelector("#nameInput").value;
        const emailInput = document.querySelector("#emailInput").value;
        const imgInput = document.querySelector("#imageInput");
        const file = imgInput.files[0];

        const url = "index.php?action=checkChangeAccount";
        const params = new FormData();

        params.append("nameInput", nameInput);
        params.append("emailInput", emailInput);
        params.append("file", file);

        // console.log(params);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.addEventListener("load", () => {
            // console.log(xhr.status)
            if (xhr.status === 200) {
                response = xhr.responseText;
                console.log(response);
                let accountEmpty = document.querySelector("#accountEmpty");
                let notAnImage = document.querySelector('#notAnImage');

                if (response.trim() == "emptyField") {
                    accountEmpty.removeAttribute("hidden");
                    notAnImage.setAttribute("hidden", true);
                }
                if (response.trim() == "success") {
                    // turn reload off for testing
                    location.reload();
                } 
                if (response.trim() == 'imageTypeFail') {
                    accountEmpty.setAttribute("hidden", true);
                    notAnImage.removeAttribute("hidden");
                }
                    
            }
        })
        xhr.send(params);
    }

    [document.querySelector('.profilePic'), document.querySelector('.manageAccount')].forEach(item => {
        item.addEventListener('click', event => {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php?action=accountView');
            xhr.onload = function () {
                if(xhr.status == 200){
                    let modalPetObj = {
                        save : function () {
                            saveAccountChanges()
                        },
                    }
                    let accountView = new Modal(xhr.responseText);
                    accountView.generate(modalPetObj, allowCancel=true);   
                        
                    
                    // Image Event listener Buttons
                    let imageDropBtn = document.querySelector('.imageDropBtn');
                    let imgInput = document.querySelector("#imageInput");
                    let imgRemove = document.querySelector("#removeImageBtn");

                    // Image Divs
                    let dropdownContent = document.querySelector('.dropdownContent')
                    let modalWindow = document.querySelector('.modalSubDiv');
                    let imagePreview = document.querySelector('.imagePreview');
                    let profilePicManage = document.querySelector('.profilePicManage');
                    let profilePic = document.querySelector('.profilePic');
                    let profilePicRemoved = document.querySelector('#profilePicRemoved');
                    let notAnImage = document.querySelector('#notAnImage');



                    // Image Dropdown Button
                    imageDropBtn.addEventListener("click", event => {
                        event.stopPropagation();
                        document.querySelector(".dropdownContent").classList.toggle("show");
                        profilePicRemoved.setAttribute("hidden", true);
                        notAnImage.setAttribute("hidden", true);
                        // dropdownContent.setAttribute("hidden", true);
                    })

                    // Remove Dropdown on click inside modal
                    modalWindow.addEventListener("click", event => {
                        document.querySelector(".dropdownContent").classList.remove("show");
                    })


                    // Preview Image
                    imgInput.addEventListener("change",  function() {
                        const file = this.files[0];

                        if(file) {
                            console.log(file);
                            if (file['type'] == 'image/jpeg' || file['type'] == 'image/png') {
                                const reader = new FileReader();

                                imagePreview.style.display = "block";
                                profilePicManage.style.display = "none";

                                reader.addEventListener("load", function() {
                                    imagePreview.setAttribute("src", this.result);
                                });

                                reader.readAsDataURL(file);
                            } else {
                                notAnImage.removeAttribute("hidden");
                                profilePicManage.style.display = "block";
                                imagePreview.setAttribute("src", "");
                                imagePreview.style.display = "none";
                            }    
                        } else {
                            console.log('nothing')
                            imagePreview.style.display = "none";
                            profilePicManage.style.display = "block";
                            imagePreview.setAttribute("src", "");
                            notAnImage.setAttribute("hidden", true);
                        }
                    })

                    // REMOVE PROFILE PICTURE
                    imgRemove.addEventListener("click", function () {
                        let xhr = new XMLHttpRequest();
                        
                        xhr.open('GET', 'index.php?action=removeProfilePic');
                        xhr.onload = function () {
                            if(xhr.status === 200){
                                let response = xhr.responseText;
                                console.log(response);
                                if (response.trim() == "success") {
                                    userImage = document.querySelectorAll(".userImage")
                                    profilePic.setAttribute("src", "./private/defaultProfile.png");
                                    profilePicManage.setAttribute("src", "./private/defaultProfile.png");
                                    imagePreview.style.display = "none";
                                    profilePicManage.style.display = "block";
                                    profilePicRemoved.removeAttribute("hidden");
                                    userImage.forEach((item) => {
                                        item.setAttribute("src", "./private/defaultProfile.png");
                                    })
                                } else {
                                    alert("remove failed.");
                                }
                            } else {
                                alert("remove failed.");
                            }
                        }
                        xhr.send(null);
                    });


                    // PW Event Listener BUtttons
                    let changePassword = document.querySelector("#changePassword");
                    let cancelPW = document.querySelector('#cancelPW');

                    // PW Message Divs
                    let passwordDefault = document.querySelector(".passwordDefault");
                    let changePW = document.querySelector('.changePW');
                    let saveBtn = document.querySelector(".modalButton");
                    let successPW = document.querySelector(".successPW");
                    let needDiffPW = document.querySelector(".needDiffPW");
                    let failedPW = document.querySelector(".failedPW");
                    let cancelBtn = document.querySelector(".modalCancel");
                    let emptyPW = document.querySelector(".emptyPW");
                    let matchPW = document.querySelector(".matchPW");
                    let accountForm = document.querySelector(".accountForm");

                    // PW Inputs
                    let currentInput = document.querySelector("#currentPW");
                    let newInput = document.querySelector("#newPW");
                    let confirmInput = document.querySelector("#confirmPW");

                    
                    // PW event listeners
                    changePassword.addEventListener('click', event => {
                        changePW.removeAttribute("hidden");
                        passwordDefault.setAttribute("hidden", true);
                        saveBtn.setAttribute("hidden", true);
                        successPW.setAttribute("hidden", true);
                        cancelBtn.setAttribute("hidden", true);
                        emptyPW.setAttribute("hidden", true);
                        accountForm.setAttribute("hidden", true);
                    });

                    cancelPW.addEventListener('click', event => {
                        changePW.setAttribute("hidden", true);
                        passwordDefault.removeAttribute("hidden");
                        saveBtn.removeAttribute("hidden");
                        currentInput.value = "";
                        newInput.value = "";
                        confirmInput.value = "";
                        successPW.setAttribute("hidden", true);
                        needDiffPW.setAttribute("hidden", true);
                        failedPW.setAttribute("hidden", true);
                        emptyPW.setAttribute("hidden", true);
                        cancelBtn.removeAttribute("hidden");
                        accountForm.removeAttribute("hidden");
                    });

                    const pwSubmitButton = document.querySelector("#changePWSubmit");
                    pwSubmitButton.addEventListener("click", event => {
                        const currentPW = document.querySelector("#currentPW").value;
                        const confirmPW = document.querySelector("#confirmPW").value;
                        const newPW = document.querySelector("#newPW").value;

                        const url = "index.php?action=checkChangePassword";
                        // Send URL through index PHP
                        const params = new FormData();
                        params.append("currentPW", currentPW);
                        params.append("confirmPW", confirmPW);
                        params.append("newPW", newPW);

                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", url);
                        xhr.addEventListener("load", () => {
                            if (xhr.status === 200) {
                                response = xhr.responseText;
                                if (response.trim() == "emptyPW") {
                                    emptyPW.removeAttribute("hidden"); 
                                    needDiffPW.setAttribute("hidden", true);
                                    failedPW.setAttribute("hidden", true);
                                    emptyPW.setAttribute("hidden", true);
                                    matchPW.setAttribute("hidden", true);
                                }
                                if (response.trim() == "matchPW") {
                                    matchPW.removeAttribute("hidden"); 
                                    emptyPW.setAttribute("hidden", true); 
                                    needDiffPW.setAttribute("hidden", true);
                                    failedPW.setAttribute("hidden", true);
                                    emptyPW.setAttribute("hidden", true);
                                }
                                if (response.trim() == "success") {
                                    changePW.setAttribute("hidden", true);
                                    passwordDefault.removeAttribute("hidden"); 
                                    saveBtn.removeAttribute("hidden");
                                    currentInput.value = "";
                                    newInput.value = "";
                                    confirmInput.value = "";
                                    successPW.removeAttribute("hidden");
                                    needDiffPW.setAttribute("hidden", true);
                                    failedPW.setAttribute("hidden", true);
                                    emptyPW.setAttribute("hidden", true);
                                    matchPW.setAttribute("hidden", true);
                                    accountForm.removeAttribute("hidden");
                                } 
                                if (response.trim() == "needDiffPW") {
                                    currentInput.value = "";
                                    newInput.value = "";
                                    confirmInput.value = "";
                                    needDiffPW.removeAttribute("hidden");
                                    failedPW.setAttribute("hidden", true);
                                    emptyPW.setAttribute("hidden", true);
                                    matchPW.setAttribute("hidden", true);
                                } 
                                if (response.trim() == "failedPW") {
                                    failedPW.removeAttribute("hidden");
                                    needDiffPW.setAttribute("hidden", true);
                                    emptyPW.setAttribute("hidden", true);
                                    matchPW.setAttribute("hidden", true);
                                }
                            }
                        });
                        xhr.send(params);
                    });

                    let deleteAccountBtn = document.querySelector('#deleteAccountBtn');
                    deleteAccountBtn.addEventListener("click", function () {
                        if (confirm("Are you sure you want to delete your account?")) {
                            let xhr = new XMLHttpRequest();
                            xhr.open('GET', 'index.php?action=deleteAccountCheck');
                            xhr.addEventListener("load", () => {
                                if (xhr.status === 200) {
                                    response = xhr.responseText;
                                    if (response.trim() == "success"){
                                        window.location.replace("index.php?action=landing&account=deleted");
                                    } else {
                                        alert("Delete account Failed at DB")
                                    }
                                } else {
                                    alert("Ajax Failed")
                                }
                            })
                            xhr.send(null);
                        } else {
                            return null;
                        }
                    })
                    new FormCheck().formCheck();// Marie ugly way of calling

                }

            }
            xhr.send(null);
        })
    })

    /********* Events List ***********/ 
    const myEventsBtn = document.querySelector("#myEvents");
    myEventsBtn.addEventListener("click", () => loadMyEvents());

    const attendingEventsBtn = document.querySelector("#attendingEvents");
    attendingEventsBtn.addEventListener("click", () => loadAttendingEvents());

    const setItemsEventListener = () => {
        const items = document.querySelectorAll(".eventItem");
        items.forEach(item => {
            item.addEventListener("click", () => {
                const eventId = item.querySelector(".eventId").value;
                if (eventId) {
                    const url = `index.php?action=showEventDetail&eventId=${eventId}`;
                    window.location.href = url;
                }
            });
        });
    };

    const updateEventsList = (htmlEventsList) => {
        const eventsList = document.querySelector("#eventsList");
        if (eventsList) {
            eventsList.innerHTML = htmlEventsList;
            adjustFooter();
            setItemsEventListener();
        } else {
            //TODO: Error: loading my events failed!!!");
            alert("Error: loading my events failed!!!");
        }
    };

    const loadEvents = (url, callback) => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.addEventListener("load", () => {
            if (xhr.status === 200) {
                callback(xhr.responseText);    
            } else {
                //TODO: Error: loading events failed!!!");
                alert("Error: loading events failed!!!");
            }
        });
        xhr.send();
    };

    const loadMyEvents = () => {
        const url = "index.php?action=myEvents";
        loadEvents(url, (htmlEventsList) => {
            updateEventsList(htmlEventsList);

            const hosts = document.querySelectorAll(".host");
            hosts.forEach(host => host.classList.add("hidden"));
        });
    
        myEventsBtn.className = "selected";
        attendingEventsBtn.classList.remove(...attendingEventsBtn.classList);
    };

    const loadAttendingEvents = () => {
        const url = "index.php?action=attendingEvents";
        loadEvents(url, (htmlEventsList) => {
            updateEventsList(htmlEventsList);
        });
        
        attendingEventsBtn.className = "selected";
        myEventsBtn.classList.remove(...myEventsBtn.classList);
    };

    loadMyEvents();
}
</script>
<?php $content = ob_get_clean();
require("template.php");
?>
