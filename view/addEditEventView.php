<style>
    
    .modalSubDiv{
        width:80%;
        height:70%;
        margin: auto;
        background-image: none;
        background-color: white;
    }
    .modalDivContent{
        width:100%;
        height:100%;
    }
    #formAddEditEvent{
        width:100%;
        height:100%;
    }
    #stepEventHeader{
        width:90%;
        height:7%;
        margin:1vh 0;
    }
    #stepEventSection{
        width:90%;
        height:80%;
        margin:auto;
    }
    #stepEventFooter{
        width:100%;
        display:flex;
        justify-content: space-around;
        position:absolute;
        bottom:1vh;
    }
    #eventSpaceLeft, #eventSpaceRight{
        width:25%;
    }
 
    #eventSpaceMiddle{
        width:45%
    }
    .eventButton{
        margin: auto;
        width: 18vw;
        height: 5vh;
        margin-bottom: 0;
        background-color: #72ddf7;
        border-radius:5vh;
        cursor:pointer;
        color:#ffffff;
        font-size:1em;
        padding:8px 10px;
        border-style: none;
        box-shadow: 5px 10px 18px #acacac;
        text-align: center;
    }
    
    .eventButton:hover {
        background-color:#ff3864;
    }
    .eventButton:focus {
        outline: none;
    }
    #eventDescription {
        border-radius:5px;
        border-style: none;
        border: 1px solid lightgrey;
        padding: 5px;
        font-size: 1em;
        width:98%;
        height:40vh;       
        display:block;
        resize:none;
        margin-top:1vh;
    }
    #eventDescription:focus {
        outline: none;
    }
    
    #eventDescription:hover {
        box-shadow: 5px 10px 18px lightgrey;
    }
    .subSection2{
        margin:15px 0;
        display: flex;
        justify-content: space-around;
    }

    #eventPictureFrame{
        width:100%;
        height:90%;
        border:1px solid black;
        margin-top:5px;
       
    } 
    /* #eventMap{
        width:55vw;
        height:35vh; 
        border:1px solid black;

    } */
    #eventPictureContainer{
        width:45vw;
        height:45vh; 
        margin:auto;
    }
    #lblStepIndicator{
        font-size: 0.8em;
        width:20%;
        margin:auto;
        color:grey;
    }
    #stepIndicator{
        width:98%;
        margin-left:5px;
    }
/* Style for maps */
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    #map2{
        border: 2px solid black;
        border-radius: 10px;
        margin-top: 1%;
        margin-left: auto;
        margin-right: auto;
        width:70%;
        height:350px;
    }
    #mapContainer{
        width: 80%;
        margin: auto;
        display: flex;
        justify-content: space-between;
    }
    #vendorList{
        margin-top: 10%;
        margin-left:3%;
    }
    .infoWindow{
        /* border-radius: 5px; */
        background-color: grey;
        font-weight: bold;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 140px;
        height: 30px;
    }
    .infoTextContents{
        border: 1px solid black;
    }
    .destination{
        color: white;
        background-color: black;
        text-align: center;
    }

    .formCol2{
        display:inline-block;
        margin:10px 15px;
        padding: 3px 0;

    }
    /* .modalSubDiv{
        width: 30%;
        height: 30%;
    }
    .modalDivContent{
        width: 30%;
        height: 30%;
    } */

</style>

<form action="index.php" id="formAddEditEvent" method="POST">
    <input type="hidden" name="action" value="updateEventDetails">
    <div id="stepEventHeader">
        <div id="lblStepIndicator">Step 1</div>
        <progress id= "stepIndicator" value="33" max="100" ></progress>
    </div>
    <div id="stepEventSection">

        <div id="eventStep1">

        <div class='subSection2'>
                <div>
                    <label for="eventName" class="formCol2">Name of event :</label> 
                    <input type="text" name="eventName" id="eventName" class="loginInput" value="<?=isset($eventEditDetails['name']) ? $eventEditDetails['name'] : ""; ?>" required>
                </div>
                <div>
                    <label for="eventGuestLimit" class="formCol2">Guest limit :</label> 
                    <input type="number" name="eventGuestLimit" id="eventGuestLimit" class="loginInput" value="<?=isset($eventEditDetails['guestLimit']) ? $eventEditDetails['guestLimit'] : ""; ?>">
                </div>

            </div>
            <fieldset class="subSection2">
                <legend>Enter date and time when the event is happening</legend>
                <div>
                <?php if (isset($eventEditDetails['eventDate'])){
                        $dateObj = new DateTime($eventEditDetails['eventDate']);
                        $eventDate = $dateObj->format('Y-m-d');
                        $eventTime = $dateObj->format('H:i:s');
                    }?>
                    <?php if (isset($eventEditDetails['expiryDate'])){
                        $dateObj = new DateTime($eventEditDetails['expiryDate']);
                        $expiryDate = $dateObj->format('Y-m-d');
                        $expiryTime = $dateObj->format('H:i:s');
                    }?>
                    <label for="eventDate" class="formCol2">Event date :</label> 

                    <input type="date" name="eventDate" id="eventDate" class="loginInput" placeholder="yyyy-mm-dd" value="<?=isset($eventEditDetails['eventDate']) ? $eventDate : '' ; ?>">
                </div>
                <div>
                    <label for="eventTime" class="formCol2">Event time :</label> 
                    <input type="time" name="eventTime" id="eventTime" class="loginInput"  value="<?=isset($eventEditDetails['eventDate'])? $eventTime : '' ; ?>">
                </div>
            </fieldset>
            <fieldset class="subSection2">
                <legend>Enter last date and time for members to subscribe to event</legend>
                <div>
                    <label for="eventExpiryDate" class="formCol2">Last date :</label> 
                    <input type="date" name="eventExpiryDate" id="eventExpiryDate" class="loginInput" placeholder="yyyy-mm-dd" value="<?=isset($eventEditDetails['expiryDate']) ? $expiryDate : '' ;  ?>">
                </div>
                <div>
                    <label for="eventExpiryTime" class="formCol2">Last time :</label> 
                    <input type="time" name="eventExpiryTime" id="eventExpiryTime" class="loginInput" value="<?=isset($eventEditDetails['expiryDate']) ? $expiryTime : ''; ?>">
                </div>
            </fieldset> 

        </div>
        <div  id="eventStep2">
            <div>
                <div>Description :</div> 
                <textarea name="eventDescription" id="eventDescription"  rows="6" columns="250" placeholder="Enter details about the event"><?=isset($eventEditDetails['description']) ? $eventEditDetails['description'] : ''?></textarea>
            </div>
        </div>
        <div id="eventStep3">
            <!-- Choose picture for event -->
            <p>Choose a picture to load regarding the event. The picture can give an idea to other members what to expect for the event </p>
            <div id="eventPictureContainer">
                <button class="loginButton">Choose picture file</button>
                <input type="hidden" id="eventPicture" name="eventPicture" value='1'>
                <!-- TODO Value of picture to  be changed -->
                <div id="eventPictureFrame"></div>
            </div>
        </div>
        <div id="eventStep4">

            <p>Choose location to hold the event</p>
            <div id="mapContainer">
                <div id="map2"></div>
                <div id="calculateDistance">Calculate Distance<div id="distanceDiv"></div></div>
                <div id="distanceDiv"></div>
                <div id="locationList"></div>
                <br><br><br>
                <div id="vendorList">
                </div>
            </div> 

        </div>
    </div>
    <div id="stepEventFooter">
        <div id="eventSpaceLeft">
            <button type="button" id='eventPreviousButton' class='eventButton'>< Previous</button>
        </div>
        <div id="eventSpaceMiddle">
        </div>
        <div id="eventSpaceRight">
            <button type="button" id='eventNextButton' class='eventButton'>Next ></button>
            <button type="submit" id='eventSubmitButton' class='eventButton'> Submit </button>
        </div>
        <input type="hidden" name="hostId" value="<?= $_SESSION['id']; ?>">
        <input type="hidden"  name="eventId" value="<?= isset($eventId) ? $eventId : null ;?>">
        <input id="itenary" type="hidden" name="itenary" value="<?= isset($eventEditDetails['itenary']) ? $eventEditDetails['itenary'] : '' ?>">
    
    </div>
</form>
