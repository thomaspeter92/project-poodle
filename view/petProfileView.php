

<style>

.modalSubDiv{
    border-radius: 20px;
    height: 420px;
    width: 600px;
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
.modalDivButtons {
    bottom: 0;
    left:0;
    top: unset;
}
.modalDivButtons button {
    margin-bottom:20px;
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
    width: 30%;
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

.innerDivInside:nth-child(2) {
    flex-direction: column;
}
.innerDivInside:nth-child(2) p {
    margin: 10px 0 0 0;
}
.stats {
    background-color: rgb(238,238,238);
    border-radius: 20px;
    height: 33%;
    margin-top: 10px;
    width: 90%;
}

.stats>table {
    width: 75%;
    text-align: left;
    color: gray;
    font-weight: 600;
}

#description {
    border-top: 5px solid lightgray;
    text-align: center;
    font-style: italic;    
    padding-top: 10px;
    color: gray;
    width: 100%;
    font-size: .8em;
    word-wrap: break-word;
}

h5 {
    font-size: 1.5em;
    margin: 5px 0 5px 0;
    color: black;
}

table i {
    color: #ff3864;
    font-size: 1.2em;
}
table td {
    white-space: nowrap;
}

.starArea {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 40px;

}
.starArea p {
    font-weight: bold;
    white-space: nowrap;
}

/* FOR THE STAR RATING INPUTS!!!! */
/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
div .rating-group {
    display: flex;
    width: 100%;
    justify-content: flex-end;
}

/* make hover effect work properly in IE */
.rating__icon {
  pointer-events: none;
}

/* hide radio inputs */
.rating__input {
 position: absolute !important;
 left: -9999px !important;
}

/* hide 'none' input from screenreaders */
.rating__input--none {
  display: none
}

/* set icon padding and size */
.rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 1.5rem;
}

/* set default star color */
.rating__icon--star {
  color: orange;
}

/* if any input is checked, make its following siblings grey */
.rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}


    @media (max-width: 500px) {

        .modalSubDiv {
            height: 80%;
            width: 80%;
        }
        .modalDivButtons {
            top: unset;
            bottom: 15px;
            height: auto;
        }
        .modalDivButtons button {
            margin:0;
            height: 50px;
            
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
        .stats {
            padding: 10px 0 10px 0;
        }

        .stats table {
            text-align: center;
        }
        #description {
            font-size: 1em;
        }
    
    }

   



</style>

<?php if($petProfile != false){ ?>

<!-- CREATE FUNCTION TO INCREASE PET AGE EVERY YEAR? -->

<div id="profileBox">
    <div class="innerDiv">
        <img class="petImage" src="./private/pet/<?=!empty($petProfile['photo']) ? $petProfile['photo'] : 'default.png' ?>" alt="pet profile image">
        

    </div>
    <div class="innerDiv">
        <div class="innerDivInside stats">
            <table>
                <tr>
                    <td colspan="4">            
                        <h5> <?= $petProfile['name'] ?> <?= $petProfile['gender'] == 'male' ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>' ?> </h5>
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
            <?php if (!empty($petProfile['friendliness'])) : ?>
            <div class="starArea">
                <p>Friendliness: </p>
                <div class="rating-group">
                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star1" name="friendliness" id="rating3-1" value="1" type="radio" <?= $petProfile['friendliness'] == 1 ? 'checked' : '' ?>>

                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star2" name="friendliness" id="rating3-2" value="2" type="radio" <?= $petProfile['friendliness'] == 2 ? 'checked' : '' ?>>

                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star3" name="friendliness" id="rating3-3" value="3" type="radio" <?= $petProfile['friendliness'] == 3 ? 'checked' : '' ?>>

                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star4" name="friendliness" id="rating3-4" value="4" type="radio" <?= $petProfile['friendliness'] == 4 ? 'checked' : '' ?>>

                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star5" name="friendliness" id="rating3-5" value="5" type="radio" <?= $petProfile['friendliness'] == 5 ? 'checked' : '' ?>>
                </div>
            </div>
            <?php else: ?> 
            <p><strong>Friendliness:</strong> <em>No data available</em></p> 
            <?php endif?>
            <?php if (!empty($petProfile['activityLevel'])) : ?>
            <div class="starArea">
                <p>Activity Level: </p>
                <div class="rating-group">
                    <label aria-label="1 star" class="rating__label" for="rating3-12"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star1" name="activityLevel" id="rating3-12" value="1" type="radio" <?= $petProfile['activityLevel'] == 1 ? 'checked' : '' ?>>

                    <label aria-label="2 stars" class="rating__label" for="rating3-22"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star2" name="activityLevel" id="rating3-22" value="2" type="radio" <?= $petProfile['activityLevel'] == 2 ? 'checked' : '' ?>>

                    <label aria-label="3 stars" class="rating__label" for="rating3-32"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star3" name="activityLevel" id="rating3-32" value="3" type="radio" <?= $petProfile['activityLevel'] == 3 ? 'checked' : '' ?>>

                    <label aria-label="4 stars" class="rating__label" for="rating3-42"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star4" name="activityLevel" id="rating3-42" value="4" type="radio" <?= $petProfile['activityLevel'] == 4 ? 'checked' : '' ?>>

                    <label aria-label="5 stars" class="rating__label" for="rating3-52"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input disabled class="rating__input star5" name="activityLevel" id="rating3-52" value="5" type="radio" <?= $petProfile['activityLevel'] == 5 ? 'checked' : '' ?>>
                </div>
            </div>
            <?php else: ?>
            <p><strong>Activity Level: </strong><em>No data available-</em></p> 
            <?php endif?>
        </div>
        <div class="innerDivInside">
        <p id="description">
                "<?= !empty($petProfile['description']) ? $petProfile['description'] : '*No data, please add a description*' ?>"
            </p>
        </div>
    </div>
</div>



<?php }else{
    echo "We are not able to find your pet information";
}
?>


<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>