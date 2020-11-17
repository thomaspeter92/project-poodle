<style>

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
    justify-content: space-around;
}

#editCommentInput {
    width: 100%;
    height: 100%;
    border: none;
    resize: none;
    border-radius: 50px;
    padding: 20px;
    background-color: white;
}

.modalDivContent {
    margin: 0;
    height: 50%;
    width: 80%;

}

.modalDivButtons{
    position: initial;
    height: auto;
    width: 100%;
    align-self: flex-end;
    margin: 25px 0 25px 0;
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
</style>


<h4>Edit Comment:</h4>

<form action="index.php" method="POST" id="editCommentForm" name="editCommentForm">
    <textarea rows="1" name="editCommentInput" id="editCommentInput" > <?=$comment['comment'];?></textarea>
    <input type="hidden" name="commentId" value="<?=$comment['commentId'];?>">
    <input type="hidden" name="action" value="editEventComment">
</form>

<script>

</script>