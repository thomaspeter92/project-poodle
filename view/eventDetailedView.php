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
        margin-right: 10px;
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

    #attendButton {
        width: auto;
        padding: 0 10px 0 10px;
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

    #descriptionArea {
        word-wrap: break-word;
    }

    .eventDetailSideContent {
        width: 32%;
        margin-left: 15px;

    }

    .eventImage {
        max-width: 100%;
        margin-bottom: 20px;
        display: block;
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

    #mapContainer {
        flex-direction: column;
    }

    #loadbuttons p {
        margin: 10px;
        font-size: .8em;
    }

    #loadMore {
        display: none;
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
    height: 300px;
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
    margin-bottom: 10px;
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
        width: 100%;
    }
    #mapDisplay {
        width: 100%;
    }
    #mapContainer {
        height: 50vh;
    }

    .submit {
        width: auto;
        font-size: .6em;
        padding: 0 10px 0 10px;
        width: 70px;
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
$eventExpiry = strtotime($event['expiry']);
$currentTime = time();
$eventPassed = $eventExpiry < $currentTime ? true : false;


//IF THERE IS A CORRECT EVENT ID, WE DISPLAY THE EVENT.
if($event) {
?>

<div id="wrapper">
    <div class=eventDetail>
        <div class="eventDetailHeader">
            <div id="eventHeaderContent">
                <p><em>DEADLINE:</em><br> <?= $event['expiry']; ?></p>
                <div id="eventName">
                    <h3><?= $event['name']; ?></h3>
                    <?php if (isset($_SESSION['id']) && $event['hostId'] === $_SESSION['id']) { ?>
                            <i id="editEvent" class="fas fa-edit" data-eventid="<?=$event['eventId'];?>"></i><i class="fas fa-trash-alt deleteEvent" data-eventid="<?=$event['eventId']; ?>"></i> <?php }; ?>
                </div>
                <div id="headerContentExtra">
                    <p><img class="hostPhoto" src="./private/profile/<?= !empty($event['image']) ?$event['image'] : 'defaultProfile.png' ?>"></img> <span>Hosted by: <strong><?= $event['hostName']; ?></strong></span></p>
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
                    echo '<em>This event has now expired.</em>';
                }

                ?>
                </div>
            </div>
        </div>

        <div class="eventDetailMainContent">
            <section class="eventDetailDescription">
                <h4 id="aboutEvent">About this Event: </h4>
                <img class="eventImage" src="<?=!empty($event['picture']) ? './private/event/'.$event['picture'] : './public/images/event/default.png' ?>" />
                <p id="descriptionArea"><?= nl2br($event['description']); ?></p>

                <form action="index.php" method="POST" id="commentForm">
                    <h4>Discussion:</h4>  <?= !isset($_SESSION['id']) ? '<em>*Sign In to Leave a Comment</em>' : '';?> 

        <?php if (isset($_SESSION['id'])) {?>

                    <div id="formContent">
                        <img id="authorPhoto" class="hostPhoto" src="./private/profile/<?=!empty($profilePic['profileImage']) ? $profilePic['profileImage'] : 'defaultProfile.png' ?>"></img>
                        <input type="hidden" name="author" id="author" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <input type="hidden" name="eventId" id="eventId" value="<?=$event['eventId']; ?>">
                        <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                        <input type="hidden" name="action" value="eventCommentPost">
                        <button type="submit" class="submit">POST</button>
                        <!-- ADDED PARAMS FOR NOTIFICATION -->
                        <input type="hidden" name="authorName" value="<?= $_SESSION['name'] ?>">
                        <input type="hidden" name="hostId" value="<?= $event['hostId'] ?>">
                        <input type="hidden" name="eventName" value="<?= $event['name'] ?>">

                    </div>

        <?php } ?>
                </form>
                <div id="commentArea" data-eventId="<?= $event['eventId'];?>">

                <?php include("eventCommentsView.php") ?>

                </div>
        <?php if (isset($_SESSION['id'])) {  ?>
                        <div id="loadButtons">
                            <p id="loadMore" data-eventId="<?= $event['eventId'];?>">Show More <i class="fas fa-caret-down"></i></p>
                            <p id="showLess">Show Less <i class="fas fa-caret-up"></i></p>
                        </div>  <?php    
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
                <?php if ($guestCount > 6 && isset($_SESSION['id'])) { ?>
                    <p id="loadMoreGuests" data-eventId="<?=$event['eventId']; ?>">See All</p>
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
    <!-- Franco -->
    <form id="eventDeleteForm" method="POST" action="index.php?action=deleteEvent">
        <input type="hidden" id="eventId" name="eventId" value="<?=$event['eventId'];?>">
    </form>
</div>

<!-- ERROR IF USER SEARCHES FOR AN INVALID EVENT!  -->
<?php } else { ?>

        <h3 id="errorDisplay">SORRY, EVENT NOT FOUND. PLEASE TRY AGAIN.</h3>

<?php    } ?>
        


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
        if(commentBox.value.length >= 2) {
            let xhr = new XMLHttpRequest();
            let params = new FormData(commentForm);
            xhr.open("POST", "index.php");
            xhr.onload =  function() {
            if (xhr.status == 200) {
                loadComments(limit);
                commentBox.value = '';
            }
            }
            xhr.send(params);
        } else {
            commentBox.style.border = '1px solid red';
        }
    })

// FUNCTION TO DELETE COMMENT FROM DB, SEND COMMENT ID AS FORM DATA. 
    function deleteComment() {
        let deleteCommentButton = document.querySelectorAll('.deleteComment');
        if (deleteCommentButton) {
            for (let i=0; i<deleteCommentButton.length; i++) {
                deleteCommentButton[i].addEventListener('click', function(e) {
                    let commentId = e.target.getAttribute("data-commentId");
                    if (confirm('Are you sure you want to delete?')) { 
                        let xhr = new XMLHttpRequest();
                        xhr.open("POST", "index.php?action=deleteEventComment");
                        let params = new FormData();
                        params.append("commentId",commentId);
                        xhr.send(params);
                        loadComments(limit)
                    }
                })
            }
        }
    }
    deleteComment();


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
                console.log(xhr.responseText);
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
    let commentCount = document.querySelector('#commentCount').getAttribute("data-commentCount");

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
        let commentArea = document.querySelector('#commentArea');
        let eventId = commentArea.getAttribute("data-eventId");
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `index.php?action=loadComments&eventId=${eventId}&limit=${limit}`);
        xhr.onload = function () {
            if (xhr.status == 200 ) {
            commentArea.innerHTML = xhr.responseText;
            editComments();
            deleteComment();
            let comments = document.querySelectorAll('.commentChunk');
            commentCount = document.querySelector('#commentCount').getAttribute("data-commentCount");
            comments.length == commentCount ? loadMore.style.display = 'none' : loadMore.style.display ='initial';

            }
        }
        xhr.send(null);
    }
    loadComments(5);

// FUNCTION TO LOAD MORE GUEST LIST ITEMS.
    var guestCount = document.querySelector('#guestCount');
    var loadMoreGuests = document.querySelector('#loadMoreGuests');
    if (guestCount.textContent > 6) {
        var eventId = loadMoreGuests.getAttribute("data-eventId");
        loadMoreGuests.addEventListener('click', function() {
            loadGuests(eventId);
        })
    }

    function loadGuests(eventId) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `index.php?action=loadGuests&eventId=${eventId}&loadAll=true`);
        xhr.onload = function () {
            if (xhr.status == 200 ) {
                let guestModal = new Modal(xhr.responseText);
                guestModal.generate()
            }
        }
        xhr.send(null);
    }
    
// FUNCTION/EVENT LISTENERS FOR EDITING COMMENT
    function editComments() {
    let editCommentButton = document.querySelectorAll('.editComment');
    for (let i=0; i<editCommentButton.length; i++) {
        editCommentButton[i].addEventListener('click', function(e) {
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

// ************* MAP FUNCTIONS ************
    var itin;
    itin = '<?= isset($event["itinerary"]) ? $event["itinerary"] : ""; ?>';
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
    if(itin){
        itin = JSON.parse(itin);
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
    }
    let deleteEventButton = document.querySelector('.deleteEvent');
    if (deleteEventButton){
        deleteEventButton.addEventListener('click', function(e) {
            deleteEvent();
        });
    }

    function deleteEvent (){
        if (confirm('Are you sure you want to delete?')) { 
            let deleteFormEle = document.getElementById("eventDeleteForm");
            deleteFormEle.submit();
        }
    }


    let editEventButton = document.getElementById('editEvent');
    if (editEventButton){
        editEventButton.addEventListener('click', function(e) {
            let eventId = e.target.getAttribute("data-eventid");
            createAddEditEventModal(eventId);
        });
    }

</script>

<?php
$content = ob_get_clean();
require("template.php");
?>