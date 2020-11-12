<style>

form {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
}

p {
    font-size: .7em;
    width: 50%;
    
}

</style>


<form action="index.php" method="GET" id="addPetForm"  autocomplete="off">
    <p>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?=$petProfile['name']; ?>" required>
    </p>
    <p>
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="<?=$petProfile['type']; ?>"required>
    </p>
    <p>
        <label for="breed">Breed:</label><br>
        <input type="text" id="breed" name="breed" value="<?=$petProfile['breed']; ?>"required>
    </p>
    <p>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value="<?=$petProfile['age']; ?>"required>
    </p>
    <p>
        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender" value="<?=$petProfile['gender']; ?>">
    </p>
    <p>
        <label for="weight">Weight(kg):</label><br>
        <input type="number" id="weight" name="weight" value="<?=$petProfile['weight']; ?>">
    </p>
    <p>
        <label for="color">Color:</label><br>
        <input type="text" id="color" name="color" value=<?=$petProfile['name']?>>
    </p>
    <p>
        <label for="friendliness">Friendliness:</label><br>
        <input type="text" id="friendliness" name="friendliness" value="<?=$petProfile['friendliness']; ?>">
    </p>
    <p>
        <label for="activityLevel">Activity Level:</label><br>
        <input type="text" id="activityLevel" name="activityLevel" value=<?=$petProfile['activityLevel']; ?>>
    </p>
    <p>
        <label for="photo">Image:</label>
        <input type="file" id="photo" name="photo" accept="image/*">
    </p>
    <p>
        <input type="hidden" name="ownerId" value="<?= $_SESSION['id']; ?>">
        <input type="hidden" name="petId" value="<?= isset($petId) ? $petId : null ;?>">
    </p>
</form>



