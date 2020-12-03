<?php ob_start();?>

<style>


/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
    /* padding-top: 5em; */
    display: flex;
    align-items: middle;
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
  font-size: 2rem;
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






    #wrapper {
        background-color: rgb(245, 245, 245);
        width: 100vw;
    }
    a:link {
        color: black;
    }

    a:visited {
        color: black;    
    }

    a:hover {
        text-decoration: underline;
    }

    .eventDetail {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 100vw;
        margin: auto;
        padding-bottom: 50px;
    }

    .eventDetailHeader {
        width: 100%;
        padding-top: 100px;
        margin-bottom: 20px;
        background-color: white;
        border-bottom: 1px solid lightgray;
    }

    #eventHeaderContent {
        width: 85%;
        margin: auto;
        padding-bottom: 20px;
    }

    #eventHeaderContent h3 {
        font-size: 2em;
        margin-right: 10px;
    }

    #eventHeaderContent>p {
        color: grey;
    }

    #headerContentExtra {
        display: flex;
        flex-direction: column;
        align-items: flex-end
        /* justify-content: space-between; */
    }

    #headerContentExtra p:first-child {
        display: flex;
        align-items: center;
    }

    #eventName {
        display: flex;
        align-items: center;
    }

    #eventName i {
        color: #ff3864;
        padding-right: 5px;
    }
    .hostPhoto {
        height: 50px;
        width: 50px;        
        margin: 10px 20px 0 20px;
        clip-path: circle(50% at 50% 50%);
        background-position: center;
        background-size: cover;
        overflow: hidden;
        object-fit: cover;
    }




    .eventDetailMainContent {
        display: flex;
        justify-content: space-between;
        width: 85%;
        margin-bottom: 20px;
    }

    .eventDetailDescription {
        width: 65%;
    }

    .eventDetailSideContent {
        width: 32%;
        margin-left: 15px;

    }

    .eventImage {
        max-width: 100%;
        margin-bottom: 20px;
    }


    #eventInfo {
        background-color: white;
        border-radius: 10px;
    }

    .eventInfoChunk {
        display: flex;
        align-items: center;
        width: 50%;
        margin: 10px;
    }



    .eventInfoChunk p {
        margin-left: 20px;
    }

    .eventInfoChunk i {
        width: 20px;
        height: 20px;
        font-size: 1.5em;
        color: #ff3864
    }
    #mapDisplay h5 {
        margin-bottom: 10px;
    }

    #guestList {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .guestListItem {
        width: 100px;
        height: 120px;
        background-color: white;
        border-radius: 10px;
        margin: 5px 5px 0 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .guestListItem p{
        color: #ff3864;
        font-size: .8em;
        font-weight: 600;
    }

    .guestListItem span {
        color: grey;
        font-weight: 500;
        font-size: .7em;
    }
    


    #commentForm {
        margin-top: 50px;
    }

    #formContent {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #author {
        border: none;
    }

    #comment {
        width: 70%;
        border: none;
        resize: none;
        border-radius: 50px;
        padding: 20px;
    }

    #comment:focus {
        outline: none;
    }

    .submit {
        margin: 20px;
        width: 10%;
        background-color: #72ddf7;
        border-style: none;
        color: white;
        border-radius:42px;
        height: 50px;
    }

    .submit:focus {
        outline: none;
    }

    .commentChunk {
        background-color: white;
        width: 100%;
        border-radius: 10px;
        padding: 5px;
        margin: 10px 0 10px 0;
    }

    .commentChunk > p:first-child {
        display: flex;
        justify-content: space-between;
        position: relative;
    }

    .commentChunk > p:first-child .hostPhoto {
        height: 25px;
        width: 25px;
        margin: 0 5px 0 0;
    }

    .commentChunk > p:first-child > span:first-child {
        font-weight: 600;
        display: flex;
        align-items: center;
    }
    .commentChunk > p:first-child > span:nth-child(2) {
        color: lightslategrey;
        font-size: .8em;
    }

    .commentChunk i {
        margin-left: 10px;
        color: #ff3864;
    }

    .commentChunk i:hover {
        cursor: pointer;
    }
    
    #eventPreviews {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .eventPreviewItem {
        width: 20%;
        height: 150px;
        background-color: white;
        border-radius: 10px;
        text-align: center;
    }

    .eventPreviewItem p:first-child {
        color: #ff3864;
        font-size: .7em;
    }
    .eventPreviewItem p:nth-child(2) {
        font-weight: bold;
    }

    .eventPreviewItem p:nth-child(3) {
        color: grey;
    }

    .attending {
        background-color: #ff3864;
    }

    #eventFullButton {
        background-color: lightgray;
        font-size: .7em;
    }

    #loadButtons {
        display: flex;
        justify-content: center;
    }

    #loadbuttons p {
        margin: 10px;
        font-size: .8em;
    }

    #showLess {
        display: none;
    }

    #showLessGuests {
        display: none;
    }
    #editInput {
        width: 100%;
        height: auto;
        border: none;
        resize: none;
        border-radius: 50px;
        padding: 20px;
        margin: 10px 0 0 0;
}

    #editInput {
        outline: none;
}

    .overlay {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        background-color: rgba(250, 250, 250, 0.7);
        border-radius: 10px;
        background: linear-gradient(360deg, rgba(255,255,255,1) 18%, rgba(255,255,255,0) 100%);
}

    #errorDisplay {
        padding-top: 100px;
}

    #aboutEvent {
        display: none;
}

#seeAllEvents {
    margin-top: 15px;
    color: #ff3864;
}

    /********************** CHANGES TO THE MODAL CSS **********************/

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
    background-color: rgb(245, 245, 245);
    width: 50%;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
}

.modalSubDiv > .modalDivContent {
    margin: 0;
    height: auto;
    width: 90%;
}

.modalDivButtons{
    position: initial;
    height: auto;
    width: 100%;
    /* margin-bottom: 20px; */
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
    text-align: center;
}

.modalButtonClose {
    border: none;
    background-color: transparent;
    color: #ff3864;
}

.modalButton:hover {
    background-color:#ff3864;
}
.modalButton:focus {
    outline: none;
}



@media (max-width: 450px) {

    .eventDetailMainContent {
        flex-direction: column-reverse;
        align-items: center;
    }
    .eventDetailSideContent {
        width: 100%;
        margin: auto;
        align-items: center;
        display: flex;
        flex-direction: column;
    }
    .eventDetailDescription {
        width: 100%;
        margin: auto;
        text-align: center;
    }
    #aboutEvent {
        display: inherit;
    }
    #eventInfo {
        width: auto;
        display: flex;
    }
    .eventInfoChunk {
        flex-direction: column;
    }
    #eventPreviews {
        flex-direction: column;
    }
    .eventPreviewItem {
        width: 70%;
        margin-bottom: 10px;
    }
    .commentChunk {
        width: 70%;
        margin: auto;
        margin-bottom: 10px;    

    }
    .commentChunk > p:first-child {
        flex-direction: column;
        align-items: center;
    }
    .commentChunk > p:first-child > span:first-child {
        margin-bottom: 10px;
    }
    #authorPhoto {
        display: none;
    }

    #map {
        width: 90%;
    }
    .submit {
        width: auto;
        font-size: .6em;
    }

    .modalMainDiv > .modalSubDiv {
        width: 70%;
    }

    .modalDivButtons button{
        width: auto;
        padding: 10px;
    }

}


    /* Franco */
    #editEvent:hover, .deleteEvent:hover{
        cursor: pointer;
    }
</style>

<?php $style = ob_get_contents();?>
<?php ob_start();?>

<?php   

//CHECK IF CURRENT LOGGED IN USER IS ATTENDING THIS EVENT.
$attending = false;

if (isset($_SESSION['id'])) {
    foreach($guestIdList as $guestId) {
        if ($guestId['guestId'] === $_SESSION['id']) {
            $attending = true;
            break;
        }
    }
}

//CHECKING FOR OLD EVENTS TO DISABLE ATTEND FUNCTION
$eventTime = strtotime($event['eventDate']);
$currentTime = time();
$eventPassed = $eventTime < $currentTime ? true : false;


//IF THERE IS A CORRECT EVENT ID, WE DISPLAY THE EVENT.
if($event) {
?>

<div id="wrapper">
    <div class=eventDetail>
        <div class="eventDetailHeader">
            <div id="eventHeaderContent">
                <p><?= $event['eventDate']; ?></p>
                <div id="eventName">
                    <h3><?= $event['name']; ?></h3>
                    <?php if (isset($_SESSION['id']) && $event['hostId'] === $_SESSION['id']) { ?>
                            <i id="editEvent" class="fas fa-edit" data-eventid="<?=$event['eventId'];?>"></i><i class="fas fa-trash-alt deleteEvent" data-eventid="<?=$event['eventId']; ?>"></i> <?php }; ?>
                </div>
                <div id="headerContentExtra">
                    <p><img class="hostPhoto" src="./private/profile/<?= $event['image']; ?>"></img> <span>Hosted by: <strong><?= $event['hostName']; ?></strong></span></p>
                    <!-- Franco -->
                    
                    <!-- Franco -->
            
                <?php 
                //CHECK IF GUEST LIST IS FULL AND DISABLE ATTEND FUNCTIONS (UNLESS USER IS ATTENDING ALREADY)
                if ($eventPassed == false) {
                    if (isset($_SESSION['id'])) {
                            if ($event['guestLimit'] != 0 && $guestCount >= $event['guestLimit'] && $attending == false) { ?>
                                    <button id="eventFullButton" class="submit">SORRY, EVENT FULL</button><?php 
                            } else { ?>
                                <button id="attendButton" class="submit <?= $attending == true ? 'attending' : ''?>" data-eventId="<?=$event['eventId']; ?>" data-hostId="<?=$event['hostId']; ?>" data-guestId="<?=$_SESSION['id']; ?>"><?= $attending == true ? 'ATTENDING' : 'ATTEND'?> </button>
                        <?php }
                    } else {
                        echo '<em>Sign in to Attend</em>';
                    }
                } else {
                    echo '<em>This event has now passed.</em>';
                }

                // if($eventPassed == true && isset($_SESSION['id'])){ ?> 
                    <div id="ratingSection">
                        <p>rate the event: </p>
                            <form method="POST" action="index.php" id="ratingForm">
                                <div id="full-stars">
                                    <div class="rating-group">
                                        <input disabled checked class="rating__input rating__input--none" name="rating" id="rating3-none" value="0" type="radio">

                                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input star1" name="rating" id="rating3-1" value="1" type="radio">

                                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input star2" name="rating" id="rating3-2" value="2" type="radio">

                                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input star3" name="rating" id="rating3-3" value="3" type="radio">

                                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input star4" name="rating" id="rating3-4" value="4" type="radio">

                                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input star5" name="rating" id="rating3-5" value="5" type="radio">
                                    </div>
                                    <input type="hidden" name="eventId" id="eventId" value="<?=$event['eventId']; ?>">
                                    <input type="hidden" name="action" value="addStars">
                                </div>
                                <button style="text-align: center" type="submit" class="submitRating">Submit</button> 
                            </form>
                    </div>
                
                <?php
                // }

                ?>
                </div>
            </div>
        </div>

        <div class="eventDetailMainContent">
            <section class="eventDetailDescription">
                <h4 id="aboutEvent">About this Event: </h4>
                <img class="eventImage" src="./private/event/<?= $event['picture']; ?>" />
                <?= nl2br($event['description']); ?>
                
                <form action="index.php" method="POST" id="commentForm">
                    <h4>Discussion:</h4>  <?= !isset($_SESSION['id']) ? '<em>*Sign In to Leave a Comment</em>' : '';?> 

        <?php if (isset($_SESSION['id'])) {?>

                    <div id="formContent">
                        <img id="authorPhoto" class="hostPhoto" src="<?=$_SESSION['imageURL'] ?>"></img>
                        <input type="hidden" name="author" id="author" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <input type="hidden" name="eventId" id="eventId" value="<?=$event['eventId']; ?>">
                        <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                        <input type="hidden" name="action" value="eventCommentPost">
                        <button type="submit" class="submit">POST</button>
                    </div>

        <?php } ?>
                </form>
                <div id="commentArea" data-commentCount="<?= count($commentsCount); ?>">

                <?php include("eventCommentsView.php") ?>

                </div>
        <?php if (isset($_SESSION['id'])) { 
                    if  (count($commentsCount) > 5) {  ?>
                        <div id="loadButtons">
                            <p id="loadMore" data-eventId="<?= $event['eventId'];?>">Show More <i class="fas fa-caret-down"></i></p>
                            <p id="showLess">Show Less <i class="fas fa-caret-up"></i></p>
                        </div>  <?php }    
                } else { 
                    echo '<p  style="text-align: center;"><em>Sign In to See More</em></p>' ; 
                } ?>
            </section>
            <aside class="eventDetailSideContent">
                <div id="eventInfo">
                    <div class="eventInfoChunk">
                        <i class="far fa-clock"></i> 
                        <p><?= $event['eventDate'];?></p>
                    </div>
                    <div class="eventInfoChunk">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><?=$event['location']; ?></p>
                    </div>
                    <div class="eventInfoChunk">
                        <i class="fas fa-users"></i>
                        <p>Guest Limit: <?=$event['guestLimit'] == 0 ? 'none' : $event['guestLimit']; ?></p>     
                    </div>
                </div>
                <div id="mapDisplay"> <h5>Itinerary:</h5> <?php include("mapViewDetail.php"); ?></div>
                <h5>Guest List (<?= $guestCount ?>)</h5><p id="guestCount" style="display: none;"><?= $guestCount ?></p>
                <div id="guestList">
                    <?php include("loadGuestsView.php") ?>
                </div>
                <?php if ($guestCount > 5) { ?>
                    <p id="loadMoreGuests" data-eventId="<?=$event['eventId']; ?>">Show more...</p>
                    <p id="showLessGuests" data-eventId="<?=$event['eventId']; ?>">Show Less...</p>
                <?php } ?>
            </aside>
        </div>

</div>
        <h5>More Events Like This One:</h5>
        <div id="eventPreviews">
        <?php foreach($eventList as $list): ?>

            <div class="eventPreviewItem">
                <p><?= $list->eventDate ?></p>
                <p><a href="index.php?action=showEventDetail&eventId=<?=$list->id;?>"><?=$list->name;?></a></p>
                <p><?= $list->location; ?></p>
            </div>
            
        <?php endforeach;?>

        </div>
        <a id="seeAllEvents" href="index.php?action=events">See All</a>
    </div>
    <!-- Franco -->
    <form id="eventDeleteForm" method="POST" action="index.php?action=deleteEvent">
        <input type="hidden" id="eventId" name="eventId" value="<?=$event['eventId'];?>">
    </form>
</div>

<!-- ERROR IF USER SEARCHES FOR AN INVALID EVENT!  -->
<?php } else { ?>

        <h3 id="errorDisplay">SORRY, EVENT NOT FOUND. PLEASE TRY AGAIN.</h3>

<?php    } ?>
        
<!-- <script src="./public/js/Modal.js"></script> -->


<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=services"></script>

<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2">
</script>
<script src="./public/js/event.js"></script>
<script>
//FUNCTION TO SUBMIT COMMENTS TO THE DB
    let commentForm = document.querySelector('#commentForm');
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        let commentBox = document.querySelector('#comment');
        if(commentBox.value.length >= 3) {
            let xhr = new XMLHttpRequest();
            let params = new FormData(commentForm);
            xhr.open("POST", "index.php");

            xhr.onload =  function() {

                // ERROR MESSAGES HERE
            }
            xhr.send(params);
            location.reload();
        } else {
            commentBox.style.border = '1px solid red';
        }
    })

// FUNCTION TO DELETE COMMENT FROM DB, SEND COMMENT ID AS FORM DATA. 
    let deleteCommentButton = document.querySelectorAll('.deleteComment');
    for (let i=0; i<deleteCommentButton.length; i++) {
        deleteCommentButton[i].addEventListener('click', function(e) {
            let commentId = e.target.getAttribute("data-commentId");
            deleteComment(commentId);
        })
    }
    function deleteComment (commentId){
        if (confirm('Are you sure you want to delete?')) { 
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?action=deleteEventComment");
            let params = new FormData();
            params.append("commentId",commentId);
            xhr.send(params);
            location.reload();
        }
    }

    //FUNCTION TO INSERT USER INTO GUEST LIST, USING USER ID AND EVENT ID
    let attendButton = document.querySelector('#attendButton');
    if (attendButton) {
        attendButton.addEventListener('click', function() {
            let eventId = attendButton.getAttribute("data-eventId");
            let hostId = attendButton.getAttribute("data-hostId");
            let guestId = attendButton.getAttribute("data-guestId");
            let params = new FormData();
            params.append("eventId",eventId);
            params.append("hostId",hostId);
            params.append("guestId",guestId);
            if(attendButton.classList.contains('attending') && confirm('Confirm: unattend event!')) {
                params.append("action",'unattendEvent');
                this.textContent = "ATTEND";
                this.classList.remove('attending');
            } else {  
                    params.append("action",'attendEvent');
                    this.textContent = "ATTENDING";
                    this.classList.add('attending');
                }
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php");
            xhr.onload = function() {
                if (xhr.responseText.trim() == 'success') {
                    location.reload();
                } else {
                    alert('Oops, something went wrong. Please try again.')
                }
            }
            xhr.send(params);
        })
    }

    //FUNCTION TO LOAD MORE/LESS COMMENTS.
    var limit = 5;
    let loadMore = document.querySelector('#loadMore');
    let commentCount = document.querySelector('#commentArea').getAttribute("data-commentCount");
    if (commentCount > 5 && commentCount == true) {
        loadMore.addEventListener('click', function() {
            limit+= 5;
            loadComments(limit);
            showLess.style.display = 'initial';
        })

        let showLess = document.querySelector('#showLess')
        showLess.addEventListener('click', function() {
            limit = 5;
            loadComments(limit);
            showLess.style.display = 'none';
        })
        function loadComments(limit) {
            let eventId = loadMore.getAttribute("data-eventId");
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `index.php?action=loadComments&eventId=${eventId}&limit=${limit}`);
            xhr.onload = function () {
                if (xhr.status == 200 ) {
                let commentArea = document.querySelector('#commentArea');
                commentArea.innerHTML = xhr.responseText;
                editComments();
                }
            }
            xhr.send(null);
        }
    }

// FUNCTION TO LOAD MORE GUEST LIST ITEMS.
    var guestCount = document.querySelector('#guestCount');
    var guestCounter = 5;
    var loadMoreGuests = document.querySelector('#loadMoreGuests');

    if (guestCount.textContent > 5) {
        var eventId = loadMoreGuests.getAttribute("data-eventId");
        loadMoreGuests.addEventListener('click', function() {
            guestCounter+= 5;
            loadGuests(guestCounter, eventId);
            showLessGuests.style.display = 'initial';
            console.log(guestCounter)
        })
        var showLessGuests = document.querySelector('#showLessGuests')
        showLessGuests.addEventListener('click', function() {
            guestCounter = 5;
            loadGuests(guestCounter, eventId);
            showLessGuests.style.display = 'none';
        })
    }

    function loadGuests(guestCounter, eventId) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `index.php?action=loadGuests&eventId=${eventId}&limit=${guestCounter}`);
        xhr.onload = function () {
            if (xhr.status == 200 ) {
                let guestList = document.querySelector('#guestList');
                guestList.innerHTML = xhr.responseText;
                console.log(xhr.responseText)
            }
        }
        xhr.send(null);
    }
    
// FUNCTION/EVENT LISTENERS FOR EDITING COMMENT
    function editComments() {
    let editCommentButton = document.querySelectorAll('.editComment');
    for (let i=0; i<editCommentButton.length; i++) {
        editCommentButton[i].addEventListener('click', function(e) {
            console.log('hello')
            let commentId = e.target.getAttribute("data-commentId");
            let comment = editCommentButton[i].parentElement.parentElement.parentElement.childNodes[3].textContent;
            let editCommentInput = `<textarea rows="1" id="editInput">${comment}</textarea>`;
            let editObj = {
                    Update: function () {
                        let editInput = document.querySelector('#editInput')
                        let newComment = editInput.value;
                        if (newComment.trim().length < 3) {
                            editInput.style.border = '1px solid red';
                            return null;
                        } else {
                            let xhr = new XMLHttpRequest();
                            let params = new FormData();
                            params.append('action', 'editEventComment');
                            params.append('commentId',commentId)
                            params.append('newComment', newComment)
                            xhr.open("POST", "index.php");
                            xhr.onload = function () {
                            }
                            xhr.send(params);
                            location.reload();
                        }
                    }
                }   
            let editModal = new Modal(editCommentInput);
            editModal.generate(editObj,allowCancel=false);
        })
    }}
    editComments();

//FUNCTION TO ADD STAR RATING TO DB
    var ratingForm = document.querySelector('#ratingForm');
    ratingForm.addEventListener('submit', function(e){
        e.preventDefault();
        var rates = document.querySelectorAll('.rating__input');
        for(var i=1; i<rates.length; i++){
            if(rates[i].checked){
                var checked = rates[i];
                var rateValue = rates[i].value;
                var xhr = new XMLHttpRequest();
                var params = new FormData(ratingForm);
                xhr.open("POST", "index.php?action=addStars");
                xhr.send(params);
            }
        } 
        var ratingSection = document.querySelector('#ratingSection');
        var rateTheEvent = document.querySelector('#ratingSection>p');
        rateTheEvent.remove();
        var rated = document.createElement('p');
        rated.textContent = "thank you for rating";
        rated.style.color = "#72ddf7";
        ratingSection.replaceChild(rated, ratingForm);

    });

// ************* MAP FUNCTIONS ************
    var itin = <?= $event['itinerary'] ?>
    // var viewListArray = [[37.530750,126.971979],[37.540522437037716, 126.98675092518866],[37.55397916880342, 126.97248154788045]]

    var bounds = new kakao.maps.LatLngBounds();
    var routeArray = Array();
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(37.530750,126.971979), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // 마커가 표시될 위치입니다 
    // var markerPosition  = new kakao.maps.LatLng(33.450701, 126.570667); 

    // 마커를 생성합니다
    for(let i=0; i<itin.length; i++){
        var coords = new kakao.maps.LatLng(itin[i]['Ma'],itin[i]['La']);
        console.log(coords)
        routeArray.push(coords);
        var marker = new kakao.maps.Marker({
            position: coords
        });

        // 마커가 지도 위에 표시되도록 설정합니다
        marker.setMap(map);
        bounds.extend(coords);
        map.setBounds(bounds);
    }

    var polyline = new kakao.maps.Polyline({
            map: map,
            path: routeArray,
            strokeWeight: 2,
            strokeColor: 'red',
            strokeOpacity: 0.8,
            strokeStyle: 'solid'
        });
    polyline.setMap(map);

    let deleteEventButton = document.querySelector('.deleteEvent');
    if (deleteEventButton){
        deleteEventButton.addEventListener('click', function(e) {
            // let eventId = e.target.getAttribute("data-eventId");
            deleteEvent();
        });
    }

    function deleteEvent (){
        if (confirm('Are you sure you want to delete?')) { 
            let deleteFormEle = document.getElementById("eventDeleteForm");
            deleteFormEle.submit();
        }
    }

    // function editEvent (eventId){

    //     createAddEditEventModal(eventId);
    // }

    let editEventButton = document.getElementById('editEvent');
    if (editEventButton){
        editEventButton.addEventListener('click', function(e) {
            let eventId = e.target.getAttribute("data-eventid");
            createAddEditEventModal(eventId);
        });
    }









</script>
</script>

<?php
$content = ob_get_clean();
require("template.php");
?>