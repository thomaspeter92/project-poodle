<?php ob_start();?>
<link rel="stylesheet" href="./public/css/Modal.css"/>

<style>

    #wrapper {
        background-color: rgb(245, 245, 245);
        width: 100vw;
    }

    .eventDetail {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 100vw;
        padding-top: 100px;
        margin: auto;
        padding-bottom: 50px;
    }

    .eventDetailHeader {
        width: 100%;
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
        margin: 10px 20px 0 20px;
        clip-path: circle(50% at 50% 50%);
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
        width: 34%;
    }

    .eventImage {
        max-width: 100%;
        margin-bottom: 20px;
    }

    #map img {
        width: 100%;
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
    }

    .commentChunk > p:first-child .hostPhoto {
        height: 25px;
        margin: 0 5px 0 0;
    }

    .commentChunk > p:first-child > span:first-child {
        font-weight: 600;
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
        width: 180px;
        height: 120px;
        background-color: #72ddf7;
        border-radius: 10px;
        color: white;
        text-align: center;
    }

    .attending {
        background-color: #ff3864;
    }

    #eventFullButton {
        background-color: lightgray;
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

    /* CHANGES TO THE MODAL CSS */

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

.modalDivContent {
    margin: 0;
    height: auto;
    width: 90%;
}

.modalDivButtons{
    position: initial;
    height: auto;
    width: 100%;
    margin-bottom: 20px;
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
    /* box-shadow: 5px 10px 18px #acacac; */
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

    #editInput {
        width: 100%;
        height: auto;
        border: none;
        resize: none;
        border-radius: 50px;
        padding: 20px;
        margin: 35px 0 35px 0;
    }

    #editInput {
        outline: none;
    }


</style>

<?php $style = ob_get_contents();?>
<?php ob_start();?>

<?php   

//CHECK IF CURRENT LOGGED IN USER IS ATTENDING THIS EVENT. 
    foreach($guestList as $guest) {
        if ($guest['guestId'] === $_SESSION['id']) {
            $attending = true;
            break;
        } else {
            $attending = false;
        }
    }
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
                if ($guestCount >= $event['guestLimit'] && $attending == false) { ?> 
                        <button id="eventFullButton" class="submit">SORRY, EVENT FULL</button><?php
                    } else { ?>
                        <button id="attendButton" class="submit <?= $attending == true ? 'attending' : ''?>" data-eventId="<?=$event['eventId']; ?>" data-hostId="<?=$event['hostId']; ?>" data-guestId="<?=$_SESSION['id']; ?>"><?= $attending == true ? 'ATTENDING' : 'ATTEND'?> </button>
                   <?php } ?>

                </div>
            </div>
        </div>

        <div class="eventDetailMainContent">
            <section class="eventDetailDescription">
                <img class="eventImage" src="./public/images/eventImages/eventImage<?= $event['picture']; ?>.jpg" />
                <?= $event['description']; ?>
                
                <form action="index.php" method="POST" id="commentForm">
                    <h4>Discussion:</h4>
                    <div id="formContent">
                        <img class="hostPhoto" src="<?=$_SESSION['imageURL'] ?>"></img>
                        <input type="hidden" name="author" id="author" value="<?= isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
                        <input type="hidden" name="eventId" id="eventId" value="<?=$event['eventId']; ?>">
                        <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                        <input type="hidden" name="action" value="eventCommentPost">
                        <button type="submit" class="submit">POST</button>
                    </div>
                </form>
                <div id="commentArea">

                <?php include("eventCommentsView.php") ?>

                </div>
                <div id="loadButtons">
                    <p id="loadMore">Show More <i class="fas fa-caret-down"></i></p>
                    <p id="showLess">Show Less <i class="fas fa-caret-up"></i></p>
                </div>

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
                <div id="map"><img src="./public/images/googleMapPreview.png" alt=""></div>
                <h5>Guest List (<?= $guestCount ?>)</h5>
                <div id="guestList">
                    <?php foreach($guestList as $guest): ?>
                    <div class="guestListItem">
                        <img class="hostPhoto" src="./private/profile/<?=$guest['image'];?>"></img>
                        <p><?= $guest['guestName'] ?><br><span>
                        <?= $guest['guestId'] === $event['hostId'] ? '<strong>HOST</strong>' : 'Guest'; ?></span></p>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </aside>
        </div>

        <div id="eventPreviews">
        <?php foreach($eventList as $list): ?>

            <div class="eventPreviewItem">
                <p><?= $list->eventDate ?> </p>
                <p><?=$list->name;?></p>
                <p><?= $list->location; ?> </p>
            </div>
            
        <?php endforeach;?>

        </div>
    </div>
</div>

<script src="./public/js/Modal.js"></script>

<script>
{
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
            xhr.send(params);
            location.reload();
        })
    }

    //FUNCTION TO LOAD MORE/LESS COMMENTS.
    var limit = 5;
    let loadMore = document.querySelector('#loadMore') ;
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
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `index.php?action=loadComments&eventId=1&limit=${limit}`);
        xhr.onload = function () {
            if (xhr.status == 200 ) {
            let commentArea = document.querySelector('#commentArea');
            commentArea.innerHTML = xhr.responseText;
            editComments();
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
                        // editComment(commentId)
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
}
    // function editComment(commentId) {
    //     let editInput = document.querySelector('#editInput')
    //     let newComment = editInput.value;
    //     if (newComment.trim().length < 3) {
    //         editInput.style.border = '1px solid red';
    //         return null;
    //     } else {
    //         let xhr = new XMLHttpRequest();
    //         let params = new FormData();
    //         params.append('action', 'editEventComment');
    //         params.append('commentId',commentId)
    //         params.append('newComment', newComment)
    //         xhr.open("POST", "index.php");
    //         xhr.onload = function () {
    //             // console.log(xhr.responseText)
    //         }
    //         xhr.send(params);
    //         location.reload();
    //     }
    // }



</script>

<?php
$content = ob_get_clean();
require("template.php");
?>