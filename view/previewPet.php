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
        background-image: url("./public/images/wallpaper.jpeg");
        /* background-size: cover; */
    }

    /* body: first-child{
        margin-top: 15%;
    } */

    .petListElement{
        height: 20%;
        width: 90%;
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
        width: 15% ;
        height: 65%;
    }

    .petDivPreviewImage{
        width: 40%;
        margin-top: 15%;
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
<?php foreach($petPreviews as $preview):?>
    <div class = "petListElement" data-petId="<?=$preview['id']?>">
        <!-- <p>-----------------------------------</p> -->
        <div class="petPreviewContents">
            
            <p>NAME <?=" : ".$preview['name'];?></p>
            <p>BREED <?=" : ".$preview['breed'];?></p>
            <p>AGE <?=" : ".$preview['age']." years";?></p>
            <p>COLOR <?=" : ".$preview['color'];?></p>
        </div>
        <!-- <div class="petDivPreviewImage"> -->
            <img class="petPreviewImage" src="./public/images/testImage<?=$preview['photo']?>.jpg" />
            <!-- <p><a href="index.php?action=petprofile&petid=">Full Profile</a></p> -->
        <!-- </div> -->
        <!-- <p>-----------------------------------</p> -->
    
    </div>
<?php endforeach;?>

<button id="addPetButton"> Add a Pet!</button>


<script src="./public/js/Modal.js"></script>
<script>

    function delPet (petId){
        //something
    }

    function addEditPet() {
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

    function addEditFormDisplay(petId) {
        let xhr = new XMLHttpRequest();
        if (petId) {
            xhr.open('GET', 'index.php?action=addEditInput&petId='+petId);
        } else {
            xhr.open('GET', 'index.php?action=addEditInput');
        }
        xhr.onload = function () {
            if(xhr.status == 200){
                console.log(xhr.responseText);
                let modalPetObj = {
                    Submit : addEditPet,
                }
                console.log(modalPetObj);
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
    // console.log(elements);
    for(i=0; i<elements.length; i++){
        elements[i].addEventListener('click', function(e){
            // we get the owner and pet id
            let target  = e.target;
            let petId = target.getAttribute("data-petId");
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
                    console.log(xhr.responseText);
                    let modalPetObj = {
                        edit : function () {
                            addEditFormDisplay(petId);
                        },
                        del : delPet,
                    }
                    console.log(modalPetObj);
                    let petView = new Modal(xhr.responseText);
                    petView.generate(modalPetObj, allowCancel=true);
                }
            }
            //inside event listener of AJAX
            
            //console.log("test");
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