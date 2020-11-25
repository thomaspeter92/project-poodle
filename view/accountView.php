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
        padding: 10px;
        width: 80%;
    }

    .modalDivButtons{
        top: 90%;
    }

    .modalDivButtons button{
        margin: 0;
        position: absolute;
        height: 20px;
    }

    .modalSubDiv {
        height: 500px;
        width: 300px;
    }

    .modalDivContent {
        margin-top:25px;
        margin-left: 0px;
        margin-right:0px;
        text-align: center;
    }


    .modalCancel {
        position: absolute;
        right: 10%;
        bottom: 5%;
    }

    .successPW {
        color: green;
    }

    .fail {
        color:red;
    }

    .failedPW {
        color: red;
    }

    .needDiffPW {
        color: red;
    }

    input[type="file"] {
    display: none;
    }

    .customFileUpload {
    /* border: 1px solid #ccc;
    cursor: pointer;
    width:100px;
    font-family: monsterRatRegular; */
    /* font-size: 14px; */
    margin: 0;
    width: auto;
    /* height: 50px; */
    margin-bottom: 0;
    background-color: #72ddf7;
    border-radius: 42px;
    cursor: pointer;
    color: #ffffff;
    font-size: 17px;
    /* padding: 13px 76px; */
    border-style: none;
    box-shadow: 5px 10px 18px #acacac;
    text-align: center;
    }

    .customFileUpload:hover {
        background-color:#ff3864;
    }

    .accountForm {
        position: relative;
        margin-top:20px;
    }

    .profilePicManage{
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
    }

    
    .dropdownContent {
        /* position: absolute; */
        /* transform: translate(-50%, -50%);
        left: 50%;
        top: 70%; */
        /* background-color: #f1f1f1; */
        /* min-width: 160px; */
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        z-index: 100;
        display:none;
    }

    

    .show {
        display: block;
    }

    .imagePreview {
        display: none;
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
    }

    @media (max-device-width : 400px) {
        .accountForm .profilePic{
            max-height:100px;
            max-width:100px;
            overflow: hidden;
        }
    }

    /* Change color of dropdown links on hover */
    .dropdownContent a:hover {background-color: #ddd;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    


</style>

<br>
<div class="accountForm">
    <img class="profilePicManage" src="<?php if($memberDataFromDB['profileImage'] == NULL) { 
                echo "./private/profile/defaultProfile.png"; 
            } else { 
                echo "./private/profile/".$memberDataFromDB['profileImage']; 
            };?>" alt="Profile Pic">
    <img class="imagePreview" src="" alt="Image Preview">
    <div class="dropdown">
        <button class="imageDropbtn">Update Image</button>
        <div class="dropdownContent">
            <label class="customFileUpload">
                <input type="file" name="imageInput" id="imageInput">
                Replace Picture
            </label>    
            <br>
            <button id="removeImageBtn">Delete Image</button>
        </div>
    </div>
    <br>
    <div class="fail" id="profilePicRemoved" hidden>You have removed your profile picture.<br></div>
    <div class="fail" id="notAnImage" hidden>File type must be .jpg or .png.<br></div>
    <div>First Name:</div>
    <input type="text" name="nameInput" id="nameInput" class="required" value="<?=$memberDataFromDB['name'] ?>">
    <br>
    <div>Email:</div>
    <input type="text" name="emailInput" id="emailInput" class="required email" value="<?=$memberDataFromDB['email'] ?>">
    <br>
    <br>
    <div class="fail" id="accountEmpty" hidden>Cannot save blank name and email fields.</div>
</div>
<div class="passwordSection">
    <div class="passwordDefault">
        <span>Change your password?  </span><button name="password" id="changePassword" value="Change Password">Change Password</button>
    </div>
    <div class="changePW" hidden>
        <input type="hidden" name="action" value="changePW">
        Current Password: <input type="text" name="currentPW" id="currentPW" class="required">
        <br>
        <br>
        New Password: <input type="text" name="newPW" id="newPW" class="required password"> 
        <br>
        <div class="needDiffPW fail" hidden>New Password Cannot be same as old Password</div>
        <br>
        Confirm Password: <input type="text" name="confirmPW" id="confirmPW" class="confirmPassword required">
        <br>
        <br>
        <div class="failedPW fail" hidden>Incorrect Password</div>
        <button id="changePWSubmit">Submit</button>
        <br>
        <br>
        <button id="cancelPW">Keep Current Password</button>
    </div>
    <div class="emptyPW fail" hidden><br>Fill out password form completely before submitting</div>
    <div class="successPW" hidden><br>Password change successful</div>
    <div class="matchPW fail" hidden><br>New password does not match the confirmed password.</div>
</div>
<br>
<br>
<button id="deleteAccountBtn">Delete Account</button>

<br>
<br>
