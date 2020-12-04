<style>

form {
    width: 100%;
    height: 90%;
    text-align: center;
}
#formInner {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: flex-start;
    margin-top: 30px;
    padding: 0;
}

form div {
    width: 45%;
}

#description {
    width: 90%;
    resize: none;
}

input {
    border-radius:42px;
    border-style: none;
    border: 1px solid lightgrey;
    padding: 5px;
}
input:focus {
    outline: none;
}

input:hover {
    box-shadow: 5px 10px 18px lightgrey;
}

#photo {
    border-radius: 0;
    border: none;
}

label {
    font-size: 1.3em;
    font-weight: normal;
}

p {
    font-size: .7em;
    text-align: center;
}

.modalMainDiv{
    z-index: 30;
    position: relative;
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 30;
}

.modalSubDiv{
    background-image: none;
    background-color: white;
    width: 50%;
    height: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
}

.modalDivContent {
    margin: 0;
    height: auto;
}

.modalDivButtons{
    position: initial;
    height: auto;
    width: 100%;
    margin-bottom: 25px;
}

.modalDivButtons button{
    margin: 0;
    width: auto;
    height: 50px;
    margin-bottom: 0;
    background-color: #72ddf7;
	border-radius:42px;
	cursor:pointer;
	color:#ffffff;
	font-size:17px;
	padding:13px 76px;
    border-style: none;
    box-shadow: 5px 10px 18px #acacac;
    text-align: center;
}

.modalButton:hover {
    background-color:#ff3864;
}
.modalButton:focus {
    outline: none;
}

.errorMsg {
    display: none;
    color: red;
    text-align: center;
}
#uploadButton {
        background-color: #72ddf7;
        border-style: none;
        color: white;
        border-radius:42px;
        height: 30px;
        padding: 5px;
        font-size: .7em;

}

#imagePreview {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    margin: auto;
    display: block;
}

/* FOR THE STAR RATING INPUTS!!!! */
/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
div .rating-group {
    display: flex;
    width: 100%;
    justify-content: center;
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


/* make all stars orange on rating group hover */
.rating-group:hover .rating__label .rating__icon--star {
  color: orange;
}

/* make hovered input's following siblings grey on hover */
.rating__input:hover ~ .rating__label .rating__icon--star {
  color: #ddd;
}

@media (max-width: 500px) {
    .modalSubDiv {
        width: 80%;
    }

    .modalDivContent {
        overflow-y: scroll;
    }

    #formInner {
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }
    #formInner div {
        width: 100%;
    }
}

</style>


<form action="index.php" id="addPetForm"  autocomplete="off" enctype="multipart/form-data">
    <div id="formInner">
        <div>
            <p>
                <label for="name">*Name:</label><br>
                <input class="required" type="text" id="name" name="name" value="<?=!empty($petProfile['name']) ? $petProfile['name'] : '' ?>" required>
            </p>
            <p>
                <label for="type">*Type:</label><br>
                <input class="required" type="text" id="type" name="type" value="<?=!empty($petProfile['type']) ? $petProfile['type'] : '' ?>"required>
            </p>
            <p>
                <label for="breed">*Breed:</label><br>
                <input class="required" type="text" id="breed" name="breed" value="<?=!empty($petProfile['breed']) ? $petProfile['breed'] : '' ?>"required>
            </p>
            <p>
                <label for="age">*Age:</label><br>
                <input type="number" id="age" name="age" value="<?=!empty($petProfile['age']) ? $petProfile['age'] : '' ?>"required>
            </p>
            <p>
                <label for="gender" id="genderLabel">*Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" <?=isset($petProfile['gender']) ? ($petProfile['gender'] == "male" ? 'checked' : '') : ''; ?> >Male
                <input type="radio" id="female" name="gender" value="female" <?= isset($petProfile['gender']) ? ($petProfile['gender'] == "female" ? 'checked' : '') : ''; ?>>Female
            </p>
            <textarea name="description" id="descriptionInput" cols="30" rows="3" placeholder="Please provide a short description of your pet... (max 150 char)" maxlength="150"><?=!empty($petProfile['description']) ? $petProfile['description'] : '' ?></textarea>
        </div>
        <div>
            <p>
                <label for="weight">Weight(kg):</label><br>
                <input type="number" id="weight" name="weight" value="<?=!empty($petProfile['weight']) ? $petProfile['weight'] : '' ?>">
            </p>
            <p>
                <label for="color">Color:</label><br>
                <input type="text" id="color" name="color" value=<?=!empty($petProfile['color']) ? $petProfile['color'] : '' ?>>
            </p>
                <span>Friendliness:</span>
                <div class="rating-group">
                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star1" name="friendliness" id="rating3-1" value="1" type="radio" <?php if(isset($petProfile['friendliness']) && $petProfile['friendliness'] == 1) { echo 'checked'; } ?>>

                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star2" name="friendliness" id="rating3-2" value="2" type="radio" <?php if(isset($petProfile['friendliness']) && $petProfile['friendliness'] == 2) { echo 'checked'; } ?>>

                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star3" name="friendliness" id="rating3-3" value="3" type="radio" <?php if(isset($petProfile['friendliness']) && $petProfile['friendliness'] == 3) { echo 'checked'; } ?>>

                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star4" name="friendliness" id="rating3-4" value="4" type="radio" <?php if(isset($petProfile['friendliness']) && $petProfile['friendliness'] == 4) { echo 'checked'; } ?>>

                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star5" name="friendliness" id="rating3-5" value="5" type="radio" <?php if(isset($petProfile['friendliness']) && $petProfile['friendliness'] == 5) { echo 'checked'; } ?>>
                </div>
            <p></p>
                <span>Activity Level:</span>
                <div class="rating-group">
                    <label aria-label="1 star" class="rating__label" for="rating3-12"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star1" name="activityLevel" id="rating3-12" value="1" type="radio" <?php if(isset($petProfile['activityLevel']) && $petProfile['activityLevel'] == 1) { echo 'checked'; } ?>>

                    <label aria-label="2 stars" class="rating__label" for="rating3-22"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star2" name="activityLevel" id="rating3-22" value="2" type="radio" <?php if(isset($petProfile['activityLevel']) && $petProfile['activityLevel'] == 2) { echo 'checked'; } ?>>

                    <label aria-label="3 stars" class="rating__label" for="rating3-32"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star3" name="activityLevel" id="rating3-32" value="3" type="radio" <?php if(isset($petProfile['activityLevel']) && $petProfile['activityLevel'] == 3) { echo 'checked'; } ?>>

                    <label aria-label="4 stars" class="rating__label" for="rating3-42"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star4" name="activityLevel" id="rating3-42" value="4" type="radio" <?php if(isset($petProfile['activityLevel']) && $petProfile['activityLevel'] == 4) { echo 'checked'; } ?>>

                    <label aria-label="5 stars" class="rating__label" for="rating3-52"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                    <input class="rating__input star5" name="activityLevel" id="rating3-52" value="5" type="radio" <?php if(isset($petProfile['activityLevel']) && $petProfile['activityLevel'] == 5) { echo 'checked'; } ?>>
                </div>
            <p>
                <img src="./private/pet/<?=!empty($petProfile['photo']) ? $petProfile['photo'] : 'default.png' ?>" id="imagePreview"></img>
                <label for="file" id="uploadButton">UPLOAD IMAGE</label>
                <input type="file" id="file" name="file" style="display: none;"><br><br>
                <input type="hidden" name="photo" id="photo" value="<?=!empty($petProfile['photo']) ? $petProfile['photo'] : '' ?>">
            </p>
            <p>
                <input type="hidden" name="ownerId" value="<?= $_SESSION['id']; ?>">
                <input type="hidden" id="petId" name="petId" value="<?= isset($petId) ? $petId : null ;?>">
                <input type="hidden" name="action" id="action" value="addEditPet">
            </p>
        </div>
    </div>
</form>
<p>* indicates a required field.</p>
<p id="fileError" class="errorMsg">* error uploading file, check size and file type.</p>
<p id="formError" class="errorMsg">* error uploading form, check inputs and try again.</p>


