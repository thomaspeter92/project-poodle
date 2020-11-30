

<style>

.modalSubDiv{
    border-radius: 20px;
    height: 60%;
    width: 45%;
}

.modalSubDiv button {
    font-family: 'Montserrat', sans-serif;

}
.modalSubDiv>.modalButtonClose {
    left: 15px;
    top: 5px;
    border-radius: 50%;
    height:20px;
    width: 20px;
    font-size: .7em;
    background-color: red;
    box-shadow: none;
}

    .petProfile{
        display: none;
    }

    #profileBox {
        width: 100%;
        height: 100%;
        border-top: 30px solid rgb(54,60,63);
        border-radius: 20px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .petImage {
        width: 125px;
        height: 125px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #ff3864;
    }

    .innerDiv {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 95%;
    }

    .innerDiv:first-of-type {
        width: 25%;
    }
    .innerDiv:last-of-type {
        width: 65%;
    }

    .innerDiv button {
        margin-top: 20px;
        padding: 5px 20px 5px 20px;
    }

    .innerDivInside {
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stats {
        background-color: rgb(238,238,238);
        border-radius: 20px;
        height: 33%;
        margin-top: 10px;
        width: 100%;
    }

    .stats>table {
        width: 90%;
        text-align: left;
        color: gray;

    }

    .innerDivInside:nth-of-type(2) {
        margin-top: 20px;
    }

    #description {
        border-top: 5px solid lightgray;
        text-align: center;
        font-style: italic;    
        padding-top: 10px;
        color: gray;
    }

    h5 {
        font-size: 1.5em;
        margin: 5px 0 5px 0;
        color: black;
    }

    table i {
        color: #ff3864;
    }

    @media (max-width: 500px) {

        .modalSubDiv {
            height: 80%;
            width: 80%;
        }
        .modalDivButtons {
            top: 80%;
            height: auto;
        }
        #profileBox {
            flex-direction: column;
            justify-content: flex-start;
        }
        #profileBox > .innerDiv{
            height: auto;
            width: 90%;
            margin: 10px;
        }

        .innerDivInside {
            height: auto;
            width: 95%;
            text-align: center;
        }

        .stats table {
            text-align: center;
        }
    
    }

/*  
    .petProfileImage{
        box-shadow: 3px 3px 3px grey;
        border-radius: 10px;    
        margin-top: 10%;
        margin-left: 10%;
        width: 70%;
        height: 70%;
    } */




    /* @media (max-device-width : 400px) {

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

    } */

   



</style>

<?php if($petProfile != false){ ?>


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

<!-- CREATE FUNCTION TO INCREASE PET AGE EVERY YEAR? -->

<div id="profileBox">
    <div class="innerDiv">
        <img class="petImage" src="./private/pet/<?=!empty($petProfile['photo']) ? $petProfile['photo'] : 'default.png' ?>" alt="pet profile image">
        <button>EVENTS</button>
    </div>
    <div class="innerDiv">
        <div class="innerDivInside stats">
            <table>
                <tr>
                    <td colspan="4">            
                        <h5> <?= $petProfile['name'] ?> <?= $petProfile['gender'] == 'male' ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>' ?> </h5>
                        <!-- <i class="fas fa-edit"></i> -->
                    </td>
                </tr>
                <tr>
                    <td><i class="fas fa-dog"></i></td>
                    <td><?= $petProfile['breed'] ?></td>
                    <td><i class="fas fa-birthday-cake"></i></td>
                    <td><?= $petProfile['age'] ?> years</td>

                </tr>
                <tr>
                    <td><i class="fas fa-weight-hanging"></i></td>
                    <td><?= !empty($petProfile['weight']) ? $petProfile['weight'].'kg' : 'no data' ?></td>
                    <td><i class="fas fa-palette"></i></td>
                    <td><?= !empty($petProfile['color']) ? $petProfile['color'] : 'no data' ?></td>

                </tr>
            </table>
        </div>
        <div class="innerDivInside">
            <table>
                <tr>
                    <td>Activity Level: <td>
                    <td>*****</td>
                </tr>
                <tr>
                    <td>Friendliness: <td>
                    <td>*****</td>
                </tr>
            </table>
        </div>
        <div class="innerDivInside">
            <p id="description">
                <?= !empty($petProfile['description']) ? $petProfile['description'] : '*No data, please add a description*' ?>
            </p>
        </div>
    </div>
</div>



<?php }else{
    echo "We are not able to find your pet information";
}
?>


<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>