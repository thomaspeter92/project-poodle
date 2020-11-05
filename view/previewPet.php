<?php session_start()?>
<?php ob_start();?>

<style>
<?php include './public/css/Modal.css'; ?>
</style>
<?php foreach($petPreviews as $preview):?>
    <div class = "petListElement" data-petId="<?=$preview['id']?>">
        <p>-----------------------------------</p>
        <p>NAME: <?=" ".$preview['name'];?></p>
        <p>BREED: <?=" ".$preview['breed'];?></p>
        <p>AGE: <?=" ".$preview['age'];?></p>
        <p>COLOR: <?=" ".$preview['color'];?></p>
        <img src="./public/images/testImage<?=$preview['photo']?>.jpg" width="100" height="100"/>
        <p><a href="index.php?action=petprofile&petid=<?=$preview['id']?>">Full Profile</a></p>
        <p>-----------------------------------</p>
    </div>
<?php endforeach;?>

<script src="./public/js/Modal.js"></script>
<script>
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

                    let petView = new Modal(xhr.responseText);
                    petView.generate();
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