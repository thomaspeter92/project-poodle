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
        margin-top: 5%;
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

<form action="index.php" method="POST">
    <input type="hidden" name="action" value="addEditPet">
    Name:<input type="text" name="name"></br>
    Type:<input type="text" name="type"></br>
    Breed:<input type="text" name="breed"></br>
    Age:<input type="text" name="age"></br>
    Gender:<input type="text" name="gender"></br>
    Weight:<input type="text" name="weight"></br>
    Color:<input type="text" name="color"></br>
    Friendliness:<input type="text" name="friendliness"></br>
    Activity Level:<input type="text" name="activityLevel"></br>
    Owner ID:<input type="number" name="ownerId" value="<?= $_SESSION['id']; ?>"></br>
    <input type="submit" value="submit">
</form>

<script src="./public/js/Modal.js"></script>
<script>

    function editPet(petId) {

        console.log("EDITION OF PEEEEEETTTTT");
        let xhr = new XMLHttpRequest();
            // xhr.open('GET', 'index.php?action=editPet&petid='+petId);
            // xhr.onload = function () {
            //     if(xhr.responseText == "success") {

            //     }
            // }
            // xhr.send(null);
    }

    function delPet (petId){
        //something
    }


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
                        add: null,
                        edit : editPet,
                        del : delPet,
                    }
                    console.log(modalPetObj);
                    let petView = new Modal(xhr.responseText);
                    petView.generate(modalPetObj);
                }
            }
            //inside event listener of AJAX
            
            //console.log("test");
            xhr.send(null);
        
        });
    }

    

</script>
<?php $content = ob_get_clean();
require("template.php");
?>