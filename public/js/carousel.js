// This is the javascript file for the LANDING PAGE! <3 ***

//FUNCTIONS AND VARS FOR LANDING PAGE
const carouselImages = document.querySelectorAll('.carouselImg');
const nextImageDelay = 4000;
let imageCounter = 0;
carouselImages[imageCounter].style.opacity = 1;
function nextImage() {
    carouselImages[imageCounter].style.opacity = 0;
    imageCounter == 2 ? imageCounter = -1 : null;
    imageCounter += 1;
    carouselImages[imageCounter].style.opacity = 1;
}

function scrollAppear() {
    let textBox = document.querySelector('.boxAppearBefore');
    let boxPosition = textBox.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.5;
    boxPosition < screenPosition ? textBox.classList.add('boxAppearAfter') : textBox.classList.remove('boxAppearAfter');
}



let sideContent = document.querySelector('.sideContentBefore');
let click = false;

sideContent.addEventListener('click', function() {
    let innerContent = document.querySelector('.sideContentBefore > *');
    if (click == false) {
        innerContent.style.display = "initial";
        sideContent.classList.add('sideContentAfter');
        click = true;
    } else {
        sideContent.classList.remove('sideContentAfter');
        innerContent.style.display = "none";
        click = false;
    }
})

// CALLING FUNCTIONS / ADDING EVENT LISTENERs
window.addEventListener('scroll', scrollAppear);

setInterval(nextImage, nextImageDelay);

