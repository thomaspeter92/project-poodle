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
        height:60vh;
        overflow:auto;
        font-size:1.1em;
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
        left:0;
    }
    #eventSpaceLeft{
        width:25%;
    }
    #eventSpaceRight{
        width:70%;
        display:flex;
        justify-content: flex-end;
    }

    .eventButton{
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
        width:80%;
        max-width:620px;
        height:80%;
        border:1px solid black;
        margin-top:10px;
       
    } 

    #eventPictureContainer{
        width:60vw;
        height:40vh; 
        margin:auto;
    }
    #lblStepIndicator{
        font-size: 0.8em;
        width:25%;
        margin:auto;
        color:grey;
    }
    #stepIndicator{
        width:98%;
        margin-left:5px;
    }

    #eventImage{
        display:block;
        width:100%;
        height:100%;
    }

    /* #eventStep1, #eventStep2, #eventStep3, #eventStep4{
        overflow:auto;
    } */
/* Style for maps */
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    #map2{
        border: 2px solid black;
        border-radius: 10px;
        margin-top: 1%;
        margin-left: auto;
        margin-right: auto;
        width:70%;
        height:40vh;
    }
    #mapContainer2{
        width: 100%;
        margin: auto;
        display: flex;
        justify-content: space-between;
    }
    #calculateDistance2{
        margin-left:3px;
    }
    #vendorList2{
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

    @media (max-width: 900px) {
        #formAddEditEvent{
            /* overflow:scroll; */
            font-size:0.9em;
        }
        
        .subSection2{
            flex-direction: column;
        }
        
        #mapContainer2{
            flex-direction: column;
        }

        legend{
            display:none;
        }

        fieldset{
            border:none;
        }

        #map2{
            width:95%;
            height:35vh;
        }
        #eventPictureContainer{
            width:90%;
            height:30vh;
        }
        #eventPictureFrame{
            width:100%;
        }

        .eventButton{
            width:25vw;
        }
        #eventSpaceLeft, #eventSpaceRight{
            width:30%;
        }
 
        #eventSpaceMiddle{
            width:30%
        }
        .formCol2{
            display:block;
            margin:4px 5px;
            padding: 2px 0;
        }
        .subSection2{
            margin:6px 0;
        }
    }

</style>

<form action="index.php" id="formAddEditEvent" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="updateEventDetails">
    <div id="stepEventHeader">
        <div id="lblStepIndicator">Step 1</div>
        <progress id= "stepIndicator" value="33" max="100" ></progress>
    </div>
    <div id="stepEventSection">

        <div id="eventStep1">

        <div class='subSection2'>
                <div>
                    <label for="eventName2" class="formCol2">Name of event* :</label> 
                    <input type="text" name="eventName2" id="eventName2" class="loginInput" value="<?=isset($eventEditDetails['name']) ? $eventEditDetails['name'] : ''; ?>" >
                </div>
                <div>
                    <label for="eventGuestLimit" class="formCol2">Guest limit* :</label> 
                    <input type="number" name="eventGuestLimit" id="eventGuestLimit" class="loginInput" value="<?=isset($eventEditDetails['guestLimit']) ? $eventEditDetails['guestLimit'] : ''; ?>" min="1">
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
                    <label for="eventDate" class="formCol2">Event date* :</label> 

                    <input type="date" name="eventDate" id="eventDate" class="loginInput" placeholder="yyyy-mm-dd" value="<?=isset($eventEditDetails['eventDate']) ? $eventDate : '' ; ?>">
                </div>
                <div>
                    <label for="eventTime" class="formCol2">Event time* :</label> 
                    <input type="time" name="eventTime" id="eventTime" class="loginInput"  value="<?=isset($eventEditDetails['eventDate'])? $eventTime : '' ; ?>">
                </div>
            </fieldset>
            <fieldset class="subSection2">
                <legend>Enter last date and time for members to subscribe to event</legend>
                <div>
                    <label for="eventExpiryDate" class="formCol2">Expiry date* :</label> 
                    <input type="date" name="eventExpiryDate" id="eventExpiryDate" class="loginInput" placeholder="yyyy-mm-dd" value="<?=isset($eventEditDetails['expiryDate']) ? $expiryDate : '' ;  ?>">
                </div>
                <div>
                    <label for="eventExpiryTime" class="formCol2">Expiry time* :</label> 
                    <input type="time" name="eventExpiryTime" id="eventExpiryTime" class="loginInput" value="<?=isset($eventEditDetails['expiryDate']) ? $expiryTime : ''; ?>">
                </div>
            </fieldset> 

        </div>
        <div  id="eventStep2">
            <div>
                <div>Description* :</div> 
                <textarea name="eventDescription" id="eventDescription"  rows="6" columns="250" placeholder="Enter details about the event"><?=isset($eventEditDetails['description']) ? $eventEditDetails['description'] : ''?></textarea>
            </div>
        </div>
        <div id="eventStep3">
            <!-- Choose picture for event -->
            <p>Choose a picture to load regarding the event.  </p>
            <div id="eventPictureContainer">
                <!-- <button class="loginButton">Choose picture file</button>
                <input type="hidden" id="eventPicture" name="eventPicture" value='1'> -->

                <label for="file" class="eventButton" style="border: 1px solid grey; cursor: pointer">Choose picture file:</label>
                <input type="file" id="file" name="file" accept="image/jpeg, image/png" style="display: none; " >
                <input type="hidden" name="eventPicture" id="eventPicture" value="<?= isset($eventEditDetails['imageName']) ? $eventEditDetails['imageName'] : '' ;?>">

                <!-- TODO Value of picture to  be changed -->
                <div id="eventPictureFrame"><img id="eventImage" alt="picture"></div>
            </div>
        </div>
        <div id="eventStep4">

            <p>Choose location to hold the event</p>
            <div id="mapContainer2">
                <div id="map2"></div>
                <div id="calculateDistance2">Calculate Distance<div id="distanceDiv2"></div></div>
                <div id="distanceDiv2"></div>
                <div id="locationList2"></div>
                <div id="vendorList2">
                </div>
            </div> 

        </div>
        <p id='errorMsg'></p>
    </div>

    <div id="stepEventFooter">
        <div id="eventSpaceLeft">
            <button type="button" id='eventPreviousButton' class='eventButton'>< Previous</button>
        </div>
        <!-- <div id="eventSpaceMiddle">
        </div> -->
        <div id="eventSpaceRight">           
            <button type="submit" id='eventSubmitButton' class='eventButton'> Submit </button>
            <button type="button" id='eventNextButton' class='eventButton'>Next ></button>
 
        </div>
        <input type="hidden" name="hostId" value="<?= $_SESSION['id']; ?>">
        <input type="hidden"  name="eventId" value="<?= isset($eventId) ? $eventId : null ;?>">
        <input id="itinerary" type="hidden" name="itinerary" value='<?= isset($eventEditDetails["itinerary"]) ? $eventEditDetails["itinerary"] : "" ?>'>
     
    
    </div>
</form>
