<style>
    
    .modalSubDiv{
        width:90%;
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
    #eventDetails {
        border-radius:5px;
        border-style: none;
        border: 1px solid lightgrey;
        padding: 5px;
        font-size: 1em;
    }
    #eventDetails:focus {
        outline: none;
    }
    
    #eventDetails:hover {
        box-shadow: 5px 10px 18px lightgrey;
    }
    .SubSection2{
        margin:5px 0;
    }
    #eventDetails{
        display:block;
    }
    #eventPicture{
        width:100%;
        height:90%;
        border:1px solid black;
       
    } 
    #eventMap{
        width:55vw;
        height:35vh; 
        border:1px solid black;
        /* margin:auto; */
    }
    #eventPictureContainer{
        width:55vw;
        height:35vh; 
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

</style>

<form action="" id="formAddEditEvent">
    <div id="stepEventHeader">
        <div id="lblStepIndicator">Step 1</div>
        <progress id= "stepIndicator" value="33" max="100" ></progress>
    </div>
    <div id="stepEventSection">
        <div id="eventStep1">
            <div class='subSection'>
                <label for="eventName" class="form_col">Name of event :</label> 
                <input type="text" name="eventName" id="eventName" class="loginInput" required>
                <label for="eventGuestLimit" class="form_col">Maximum number of guests :</label> 
                <input type="number" name="eventGuestLimit" id="eventGuestLimit" class="loginInput" >
            </div>
            <fieldset class="SubSection2">
                <legend>Enter date and time when the event is happening</legend>
                <label for="eventDate" class="form_col">Event date :</label> 
                <input type="date" name="eventDate" id="eventDate" class="loginInput" >
                <label for="eventTime" class="form_col">Event time :</label> 
                <input type="time" name="eventTime" id="eventTime" class="loginInput" >
            </fieldset>
            <fieldset class="SubSection2">
                <legend>Enter last date and time for members to subscribe to event</legend>
                <label for="eventExpiryDate" class="form_col">Last date :</label> 
                <input type="date" name="eventExpiryDate" id="eventExpiryDate" class="loginInput" >
                <label for="eventExpiryTime" class="form_col">Last time :</label> 
                <input type="time" name="eventExpiryTime" id="eventExpiryTime" class="loginInput">
            </fieldset>
            <div class="SubSection2">
                <div for="eventDetails" >Enter some details about the event :</div> 
                <textarea type="number" name="eventDetails" id="eventDetails"  rows="6" columns="250" placeholder="Details of the event"></textarea>
            </div>
        </div>
        <div id="eventStep2">
            <!-- Choose picture for event -->
            <p>Choose a picture to load regarding the event. The picture can give an idea to other members what to expect for the event </p>
            <div id="eventPictureContainer">
                <button>Choose a picture file to load</button>
                <div id="eventPicture"></div>
            </div>
        </div>
        <div id="eventStep3">
            <!-- Choose location for event -->
            <p>Choose location to hold the event</p>
            <div id="eventMap"></div>
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
        
    </div>
</form>
