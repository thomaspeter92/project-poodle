<style>

p {
    font-size: .7em;
}

</style>


<form action="index.php" method="GET" id="addPetForm">
    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name" value=<?=$petProfile['name']; ?>>
    </p>
    <p>
        <label for="type">Type:</label><br>
        <input type="text" name="type" value=<?=$petProfile['type']; ?>>
    </p>
    <p>
        <label for="breed">Breed:</label><br>
        <input type="text" name="breed" value=<?=$petProfile['breed']; ?>>
    </p>
    <p>
        <label for="age">Age:</label><br>
        <input type="text" name="age" value="<?=$petProfile['age']; ?>">
    </p>
    <p>
        <label for="gender">Gender:</label><br>
        <input type="text" name="gender" value="<?=$petProfile['gender']; ?>">
    </p>
    <p>
        <label for="weight">Weight:</label><br>
        <input type="text" name="weight" value="<?=$petProfile['weight']; ?>">
    </p>
    <p>
        <label for="color">Color:</label><br>
        <input type="text" name="color" value=<?=$petProfile['name']?>>
    </p>
    <p>
        <label for="friendliness">Friendliness:</label><br>
        <input type="text" name="friendliness" value="<?=$petProfile['friendliness']; ?>">
    </p>
    <p>
        <label for="activityLevel">Activity Level:</label><br>
        <input type="text" name="activityLevel" value=<?=$petProfile['activityLevel']; ?>>
    </p>
    <p>
        <input type="hidden" name="ownerId" value="<?= $_SESSION['id']; ?>">
        <input type="hidden" name="petId" value="<?= isset($petId) ? $petId : null ;?>">
    </p>
</form>



