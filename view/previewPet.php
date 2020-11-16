<?php ob_start();?>
<link rel="stylesheet" href="./public/css/Modal.css"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    


    




    body{
        
        font-family: 'Montserrat', sans-serif;
        margin:0;
        padding:0;
        /* background-color: rgb(114, 221, 247); */
        /* background-color: rgb(255, 255, 255); */
        /* background-color: #f5b657; */
        font-weight: bolder;
        /* display: flex; */
        /* align: center; */
        /* background-image: url("./public/images/wallpaper.jpeg"); */
        /* background-size: cover; */
    }

    #wrapper {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
    }

    #contentLeft {
        width: 90%;
    }

    /* body: first-child{
        margin-top: 15%;
    } */

    .petListElement{
        height: 200px;
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        /* padding: auto; */
        /* border : 2px solid grey; */
        box-shadow: 3px 3px 3px lightgrey;
        border-radius: 15px;
        /* width: 80%; */
        /* margin-left: 3%; */
        /* padding-left: 3%; */
        background-color: rgba(213, 253, 255, 0.3);
        /* margin-top: 5%; */
        margin-bottom: 5%;
        display: flex;
        justify-content: space-around;
        
    }

    .petPreviewContents{
        margin-bottom: 10%;
        width: 40%;
        height: 80%;
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
}
</style>

<?php $style = ob_get_contents();?>

<?php ob_start();?>

<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<br><br><br><br>

<div id="wrapper">
    <div id="contentLeft">
        <?php foreach($petPreviews as $preview):?>
            <div class = "petListElement" data-petId="<?=$preview['id']?>">
                <div class="petPreviewContents">
                    <p>NAME <?=" : ".$preview['name'];?></p>
                    <p>BREED <?=" : ".$preview['breed'];?></p>
                    <p>AGE <?=" : ".$preview['age']." years";?></p>
                    <p>COLOR <?=" : ".$preview['color'];?></p>
                </div>
                <img class="petPreviewImage" src="./public/images/testImage<?=$preview['photo']?>.jpg" />
            </div>
        <?php endforeach;?>
    </div>
<!-- •••••••••••••••••••••••• ADD A NEW PET BUTTON •••••••••••••••••• -->
<button id="addPetButton"> Add a Pet!</button>

</div>

<script src="./public/js/Modal.js"></script>

<script>

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

    function addEditPet() {
        let addPetForm = document.querySelector('#addPetForm');
        let petName = document.querySelector('#name');
        let petType = document.querySelector('#type');
        let petBreed = document.querySelector('#breed');
        let petAge = document.querySelector('#age');
        
        if (petName.value < 2 || petType.value < 2 || petBreed.value < 2 || parseInt(petAge.value) < 0) {
            petName.value < 2 ? petName.style.borderColor = 'red' : petName.style.borderColor = 'lightgrey'
            petType.value < 2 ? petType.style.borderColor = 'red' : petType.style.borderColor = 'lightgrey' ;
            petBreed.value < 2 ? petBreed.style.borderColor = 'red' : petBreed.style.borderColor = 'lightgrey' ;
            parseInt(petAge.value) < 0 || petAge.value === '' ? petAge.style.borderColor = 'red' : petAge.style.borderColor = 'lightgrey' ;
            return null;
        } else {
            let xhr = new XMLHttpRequest();
            let addPetForm = document.querySelector('#addPetForm');
            let params = new FormData(addPetForm);
            xhr.open("POST", "index.php?action=addEditPet");
            xhr.onload = function() {
                if (xhr.status ==  200){
                    this.innerHTML = " ";
                }
            }
            xhr.send(params);
            location.reload();
        }
    }

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
        let petId = e.target.getAttribute("data-petId")
        addEditFormDisplay(petId)
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
                        edit : function () {
                            addEditFormDisplay(petId);
                        },
                        delete : function() {
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


//KEEP THESE FUNCTIONS INCASE BUGS. MAY NEED TO REVERT BACK TO THEM

    // function editPet(petId) {
    //     let xhr = new XMLHttpRequest();
    //         xhr.open('GET', 'index.php?action=addEditInput&petId='+petId);
    //         xhr.onload = function () {
    //             if(xhr.status == 200){
    //                 console.log(xhr.responseText);
    //                 let modalPetObj = {
    //                     Submit : addEditPet,
    //                 }
    //                 console.log(modalPetObj);
    //                 let petView = new Modal(xhr.responseText);
    //                 petView.generate(modalPetObj, allowCancel=false);
    //             }
    //         }
    //         xhr.send(null);
    // }

    // {
    //     let xhr = new XMLHttpRequest();
    //         xhr.open('GET', 'index.php?action=addEditInput');
    //         xhr.onload = function () {
    //             if(xhr.status == 200){
    //                 console.log(xhr.responseText);
    //                 let modalPetObj = {
    //                     add : addEditPet,
    //                 }
    //                 console.log(modalPetObj);
    //                 let petView = new Modal(xhr.responseText);
    //                 petView.generate(modalPetObj, allowCancel=false);
    //             }
    //         }
    //         xhr.send(null);
    // })



</script>
<?php $content = ob_get_clean();
require("template.php");
?>