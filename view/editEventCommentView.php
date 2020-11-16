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
    background-color: white;
    width: 50%;
    height: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#editCommentForm {
    width: 100%;
    height: 100%;
}

#editCommentInput {
    width: 100%;
    border: none;
    resize: none;
    border-radius: 50px;
    padding: 20px;
    background-color: lightgray;
}

.modalDivContent {
    margin: 0;
    height: auto;
}

.modalDivButtons{
    position: initial;
    height: auto;
    width: 100%;
    align-self: flex-end;
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



<form id="editCommentForm">

<input type="text" name="editCommentInput" id="editCommentInput" value=<?=$comment;?>>

</form>
