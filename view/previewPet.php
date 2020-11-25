<?php ob_start();?>

<style>
    
    body{
        margin:0;
        padding:0;
    }
           
    .profilePageContent{
        display: flex;
        width: 100vw;
    }

    #petWrapper {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        width: 75%;
    }

    #contentLeft {
        width: 90%;
    }
    .desktopColumn{
        display: flex;
        flex-direction: column;
        width: 25%;
        text-align: center;
        padding-left: 1em;  

    }
    .eventInfo{
        box-shadow: 3px 3px 3px lightgrey;
        border-radius: 15px;
        background-color: rgba(128, 147, 241, 0.3);
        padding: 1em;
        margin-bottom: 1em;
        color: black;
    }
    .petListElement{
        height: 200px;
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 3px 3px 3px lightgrey;
        border-radius: 15px;
        background-color: rgba(213, 253, 255, 0.3);
        margin-bottom: 5%;
        display: flex;
        justify-content: space-around;
    }

    .petPreviewContents{
        margin-bottom: 10%;
        width: 40%;
        height: 80%;
        font-size: 90%;
    }

    .petPreviewImage{
        margin: 3%;
        border-radius: 5px;
        height: 30%;
    }

    .petDivPreviewImage{
        width: 40%;
        margin-top: 15%;
    }

.accountWrapper {
    text-align: center;
    margin-bottom: 20px;
}

.accountBox {
    border-style: ridge;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
    /* width: 200px; */
}
    #addPetButton {
	background-color: #72ddf7;
	border-radius:42px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:13px 76px;
    text-decoration:none;
    border-style: none;
    box-shadow: 5px 10px 18px #acacac;
    margin-bottom: 20px;
    }

    #addPetButton:hover {
	background-color:#ff3864;
    }

    #addPetButton:focus {
        outline: none;
    }

    #addPetButton:active {
	position:relative;
	top:1px;
    }


    /* .proPicContainer {

    } */

    .profilePic {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
    }

    .modalDivContent .profilePic {
        padding-top:20px;
    }
    @media (max-device-width : 1020px) {
        .profilePageContent{
            display: block;
            justify-content: column;
            width: 100vw;
        }
        .desktopColumn{
            display: flex;
            flex-direction: column;
            width: 100vw;
            text-align: center;
            padding-right: 1em;

        }
        .petPreviewImage{
            margin-top: 8%;
            border-radius: 5px;
            width: 30% ;
            height: 65%;
        }
        .petListElement{
            width: 100vw;
        }


    }
    @media (max-device-width : 400px) {
        .petPreviewContents{
            margin-top: 4%;
            margin-bottom: 5%;
            margin-left: 5%;
            line-height: 10px;
            height: 80%;
            width: 70%;
        }

        .petPreviewImage{
            margin-top: 7%;
        }

        .petListElement{
            font-size: 0.8em;
            height: 20%;
        }
        .petPreviewImage{
            margin-top: 8%;
            border-radius: 5px;
            width: 30% ;
            height: 65%;
        }
        .petListElement{
            width: 100vw;
        }
        #petWrapper{
            display: flex;
            align-items: center;
            width: 100vw;
        }
}

</style>


<?php $style = ob_get_contents();?>

<?php ob_start();?>

<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<br><br><br><br><br><br><br><br>

<div class="profilePageContent">
    <div class="desktopColumn">
        <div class="accountWrapper">
            <div class="accountBox">
                <div class="proPicContainer">
                    <img class="profilePic" src="<?php if($profilePicURL['profileImage'] == NULL) { 
                        echo "./private/profile/defaultProfile.png"; 
                    } else { 
                        echo "./private/profile/".$profilePicURL['profileImage']; 
                    };?>" alt="Profile Pic">
                </div>
                <p><?= $_SESSION['name'];?></p>
                <button class="manageAccount">Manage Account</button>
            </div>
        </div>
        <!-- Events Section -->
        <div class="myEventsWrapper">
            <p><?= $_SESSION['name'];?>'s Events</p>
            <?php foreach($usersEvents as $eventsPreview):?>
                <a href="https://localhost/index.php?action=showEventDetail&eventId="+<?php $eventsPreview['id'];?>>
                    <div class="eventInfo">
                        <p><?= $eventsPreview['name'];?></p>
                        <p><?= $eventsPreview['eventDate'];?></p>
                        <p><?= $eventsPreview['location'];?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="petWrapper">
        <div id="contentLeft">
            <?php foreach($petPreviews as $preview):?>
                <div class = "petListElement" data-petId="<?=$preview['id']?>">
                    <div class="petPreviewContents">
                        <p>NAME <?=" : ".$preview['name'];?></p>
                        <p>BREED <?=" : ".$preview['breed'];?></p>
                        <p>AGE <?=" : ".$preview['age']." years";?></p>
                        <p>COLOR <?=" : ".$preview['color'];?></p>
                    </div>
                </div>
                <img class="petPreviewImage" src="./private/pet/<?=$preview['photo']?>" />
            <?php endforeach;?>
        </div>
    <!-- •••••••••••••••••••••••• ADD A NEW PET BUTTON •••••••••••••••••• -->
    <button id="addPetButton"> Add a Pet!</button>
</div>
<!-- <script src="./public/js/Modal.js"></script> -->

<script>
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
        let genderButtons = document.querySelectorAll('input[name="gender"]')
        let genderLabel = document.querySelector('#genderLabel')
        let selectedValue;
            for (button of genderButtons) {
                if (button.checked) {
                    selectedValue = button.value;
                    break;
                }
            }
        
        if (petName.value.length < 2 || petType.value.length < 2 || petBreed.value.length < 2 || parseInt(petAge.value) < 0 || selectedValue == null) {
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
            if(xhr.status == 200){
                let modalPetObj = {
                    Submit : addEditPet,
                }
                let petView = new Modal(xhr.responseText);
                petView.generate(modalPetObj, allowCancel=false);
            }
        }
        xhr.send(null);
    }

    let addPetButton = document.querySelector('#addPetButton');
    addPetButton.addEventListener('click', function(e) {
        let petId = e.target.getAttribute("data-petId");
        addEditFormDisplay(petId);
    }); 

    let elements = document.getElementsByClassName("petListElement");
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
                            addEditFormDisplay(petId);
                        },
                        DELETE : function() {
                            delPet(petId);
                        },
                    }
                    let petView = new Modal(xhr.responseText);
                    petView.generate(modalPetObj, allowCancel=true);
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
                    let petView = new Modal(xhr.responseText);
                    petView.generate(modalPetObj, allowCancel=true);   
                        
                    
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
                            const reader = new FileReader();

                            imagePreview.style.display = "block";
                            profilePicManage.style.display = "none";

                            reader.addEventListener("load", function() {
                                imagePreview.setAttribute("src", this.result);
                            });

                            reader.readAsDataURL(file);
                        } else {
                            imagePreview.style.display = "none";
                            profilePicManage.style.display = "block";
                            previewImage.setAttribute("src", "");
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
                                    profilePic.setAttribute("src", "./private/profile/defaultProfile.png");
                                    profilePicManage.setAttribute("src", "./private/profile/defaultProfile.png");
                                    imagePreview.style.display = "none";
                                    profilePicManage.style.display = "block";
                                    profilePicRemoved.removeAttribute("hidden");
                                    userImage.forEach((item) => {
                                        item.setAttribute("src", "./private/profile/defaultProfile.png");
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


</script>
<?php $content = ob_get_clean();
require("template.php");
?>
