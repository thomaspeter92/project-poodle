<?php ob_start();?>

<style>

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
    }

    #eventHeaderContent>p {
        color: grey;
    }

    #headerContentExtra {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #headerContentExtra p:first-child {
        display: flex;
        align-items: center;
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
                <h3><?= $event['name']; ?></h3>
                <div id="headerContentExtra">
                    <p><img class="hostPhoto" src="./private/profile/<?= $event['image']; ?>"></img> <span>Hosted by: <strong><?= $event['hostName']; ?></strong></span></p>

            
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

                ?>
                </div>
            </div>
        </div>

        <div class="eventDetailMainContent">
            <section class="eventDetailDescription">
                <h4 id="aboutEvent">About this Event: </h4>
                <img class="eventImage" src="./public/images/eventImages/eventImage<?= $event['picture']; ?>.jpg" />
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
                <div id="mapDisplay"> <?php include("mapViewTest.php"); ?></div>
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
</div>

<!-- ERROR IF USER SEARCHES FOR AN INVALID EVENT!  -->
<?php } else { ?>

        <h3 id="errorDisplay">SORRY, EVENT NOT FOUND. PLEASE TRY AGAIN.</h3>

<?php    } ?>
        
<!-- <script src="./public/js/Modal.js"></script> -->

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
    if (commentCount > 5) {
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
                                // console.log(xhr.responseText)
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



</script>

<?php
$content = ob_get_clean();
require("template.php");
?>