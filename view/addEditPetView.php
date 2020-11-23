<style>

form {
    width: 100%;
    height: 90%;
    text-align: center;
    /* display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin: 0;
    padding: 0; */
}
#formInner {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin: 0;
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
    height: auto;
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

@media (max-width: 500px) {
    .modalSubDiv {
        width: 80%;
        height: 95%;
        justify-content: space-around;
    }

    form {
        flex-direction: column;
        justify-content: space-around;
    }
}

</style>


<form action="index.php" id="addPetForm"  autocomplete="off" enctype="multipart/form-data">
    <div id="formInner">
        <div>
            <p>
                <label for="name">*Name:</label><br>
                <input type="text" id="name" name="name" value="<?=$petProfile['name']; ?>" required>
            </p>
            <p>
                <label for="type">*Type:</label><br>
                <input type="text" id="type" name="type" value="<?=$petProfile['type']; ?>"required>
            </p>
            <p>
                <label for="breed">*Breed:</label><br>
                <input type="text" id="breed" name="breed" value="<?=$petProfile['breed']; ?>"required>
            </p>
            <p>
                <label for="age">*Age:</label><br>
                <input type="number" id="age" name="age" value="<?=$petProfile['age']; ?>"required>
            </p>
            <p>
                <label for="gender" id="genderLabel">*Gender:</label><br>
                <input type="radio" id="male" name="gender" value="male" <?= $petProfile['gender'] == "male" ? 'checked' : ''; ?> >Male
                <input type="radio" id="female" name="gender" value="female" <?= $petProfile['gender'] == "female" ? 'checked' : ''; ?>>Female
            </p>
        </div>
        <div>
            <p>
                <label for="weight">Weight(kg):</label><br>
                <input type="number" id="weight" name="weight" value="<?=$petProfile['weight']; ?>">
            </p>
            <p>
                <label for="color">Color:</label><br>
                <input type="text" id="color" name="color" value=<?=$petProfile['color']?>>
            </p>
            <p>          
                <label for="friendliness">Friendliness:</label><br>
                <input type="range" id="friendliness" name="friendliness" min="0" max="5" value="<?=$petProfile['friendliness']; ?>">
            </p>
            <p>
                <label for="activityLevel">Activity Level:</label><br>
                <input type="range" id="activityLevel" name="activityLevel" min="0" max="5" value="<?=$petProfile['activityLevel']; ?>">        
            </p>
            <p>
                <label for="file" style="border: 1px solid grey">Click here to upload an image:</label>
                <input type="file" id="file" name="file" style="display: none;" >
                <input type="hidden" name="photo" id="photo" value="<?=$petProfile['photo']?>">
            </p>
            <p>
                <input type="hidden" name="ownerId" value="<?= $_SESSION['id']; ?>">
                <input type="hidden" id="petId" name="petId" value="<?= isset($petId) ? $petId : null ;?>">
                <input type="hidden" name="action" id="action" value="addEditPet">
            </p>
        </div>
    </div>    
    <textarea name="description" id="description" cols="30" rows="3" placeholder="Please provide a short description of your pet..."><?= $petProfile['description']?></textarea>
</form>
<p>* indicates a required field.</p>
<p id="fileError" class="errorMsg">* error uploading file, check size and file type.</p>
<p id="formError" class="errorMsg">* error uploading form, check inputs and try again.</p>


