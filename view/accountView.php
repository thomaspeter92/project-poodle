<?php

?>
<style>
    img {
        margin-left: auto;
        margin-right: auto;    
    }
    form {
        margin-bottom: 0px;
    }
    
    .passwordSection {
        border: solid;
        display: inline-block;
    }

    .modalDivButtons{
        top: 90%
    }

    .modalDivButtons button{
        margin: 0;
    }

</style>

<br>
<img class="profilePic" src="<?= $_SESSION['imageURL'];?>" alt="Profile Pic">

<form action="changePicture.php" method="post" enctype="multipart/form-data">
  Select image to upload
  <input type="file" name="fileToUpload" id="fileToUpload" default="">
  <input type="submit" value="Upload Image" name="submit" >
</form>
<form action="changeName.php" method="post" enctype="multipart/form-data">
First Name: <input type="text" name="name" id="" value="<?=$memberDataFromDB['name'] ?>">
<br>
<br>
Email: <input type="text" name="name" id="" value="<?=$memberDataFromDB['email'] ?>">
<br>
<br>
</form>

<div class="passwordSection">
    <div class="passwordDefault">
        <span>Change your password?  </span><button name="password" id="changePassword" value="Change Password">Change Password</button>
    </div>
    <div class="changePW" hidden>
        <!-- <form action="index.php" method="POST"> -->
            <input type="hidden" name="action" value="changePW">
            Current Password:<input type="text" name="currentPW" id="currentPW">
            <br>
            New Password:<input type="text" name="newPW" id="newPW">
            <br>
            Confirm Password:<input type="text" name="confirmPW" id="confirmPW">
            <br>
            <input type="button" id="changePWSubmit" value="Submit">
        <!-- </form> -->
        <button id="cancelPW">Keep Current Password</button>
    </div>
</div>
<br>
<br>
