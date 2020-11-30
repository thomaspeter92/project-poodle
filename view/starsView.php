<<<<<<< HEAD
<?php $title= "contactPage"?>
<?php ob_start(); ?>
<style>


/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
    padding-top: 5em;
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




</style>
<div id="full-stars-example-two">
    <div class="rating-group">
        <!-- <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio"> -->

        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input star1" name="rating3" id="rating3-1" value="1" type="radio">

        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input star2" name="rating3" id="rating3-2" value="2" type="radio">

        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input star3" name="rating3" id="rating3-3" value="3" type="radio">

        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input star4" name="rating3" id="rating3-4" value="4" type="radio">

        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input star5" name="rating3" id="rating3-5" value="5" type="radio">
    </div>
  <p class="desc" style="font-family: sans-serif; font-size:0.9rem">Full stars<br/>
    Must select a star value</p>
</div>

<script>
var starValue;
// const getStarValue = (starValue) =>{
    // for(var i=1;i<stars.length;i++){
//     // console.log(stars[i].value);
//     stars[i].addEventListener('click', function(){
//         console.log(stars[i].value);
//          starValue = stars[i].value;
//          return starValue;
//     });
//    
// }
// }
var stars = document.querySelectorAll('input');



var star1 = document.querySelector('.star1');
star1.addEventListener('click', function(){
    starValue = 1;
    
});

var star2 = document.querySelector('.star2');
star2.addEventListener('click', function(){
    starValue = 2;
});

var star3 = document.querySelector('.star3');
star3.addEventListener('click', function(){
    starValue = 3;
});

var star4 = document.querySelector('.star4');
star4.addEventListener('click', function(){
    starValue = 4;
});

var star5 = document.querySelector('.star5');
star5.addEventListener('click', function(){
    starValue = 5;
});

console.log(starValue);
</script>

<?php
$content = ob_get_clean();
require("template.php");
?>
=======
<!-- https://www.youtube.com/watch?v=EnU0DSdvF_c&ab_channel=AdnanAfzal -->
<!-- ^ possibly a useful tutorial -->
>>>>>>> 4368db9be844caa0f1e2c212acb61eb0ab2c2917
