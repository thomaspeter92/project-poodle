

<style>

.petProfile{
        display: flex;
    }

    .petProfileImage{
        box-shadow: 3px 3px 3px grey;
        border-radius: 10px;    
        margin-top: 10%;
        margin-left: 10%;
        width: 70%;
        height: 70%;
    }

    .fas{
        color: black;
    }

    @media (max-device-width : 400px) {

        .petProfileImage{
            box-shadow: 3px 3px 3px grey;
            border-radius: 10px;    
            margin-top: 20%;
            margin-left: 10%;
            width: 100px;
            height: 180px;
        }


        .petProfileMainContent{
            font-size: 0.8em;
            width: 40%;
        }

    }

</style>

<?php if($petProfile != false): ?>

<div class=petProfile>
    <div class="petProfileMainContent">
        <p><strong><i class="fas fa-paw"></i> <?="   :    ".htmlspecialchars($petProfile['name']);?></strong></p>
        <p><strong><i class="fas fa-dog"></i> <?="   :    ".htmlspecialchars($petProfile['breed']);?></strong></p>
        <p><strong><i class="fas fa-birthday-cake"></i> <?="   :    ".htmlspecialchars($petProfile['age']." years");?></strong></p>
        <p><strong><i class="fas fa-palette"></i> <?="   :    ".htmlspecialchars($petProfile['color']);?></strong></p>

        <p><strong><i class="fas fa-venus-mars"></i> <?="   :    ".htmlspecialchars($petProfile['gender']);?></strong></p>
        <p><strong><i class="fas fa-weight-hanging"></i> <?="   :    ".htmlspecialchars($petProfile['weight']." kg");?></strong></p>

        <p><span>"</span><strong><?=htmlspecialchars($petProfile['friendliness']);?></strong><span>"</span></p>
        <p><span>"</span><strong><?=htmlspecialchars($petProfile['activityLevel']);?></strong><span>"</span></p>
    </div>
    <div class="petProfileImageDiv">
        <img class="petProfileImage" src="./private/pet/<?=$petProfile['photo']?>" />
    </div>
</div>
<?php 
else:
    echo "We are not able to find your pet information";
endif;
?>


<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>