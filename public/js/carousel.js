// This is the javascript file for the LANDING PAGE! <3 ***

//FUNCTIONS  FOR LANDING PAGE
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


function clickExpand() {
    let innerContent = this.childNodes[4];
    let arrow = this.childNodes[2]
    if (this.classList.contains('afterClick')) {
        this.classList.remove('afterClick');
        innerContent.classList.remove('insideContentAfterClick')
        arrow.classList.remove('arrowClick')
    } else {
        innerContent.classList.add('insideContentAfterClick')
        this.classList.add('afterClick');
        arrow.classList.add('arrowClick')
        
    }
}

function contentReveal() {

    let innerContent = this.childNodes[3];
    innerContent.classList.contains('content3reveal') ? innerContent.classList.remove('content3reveal') : innerContent.classList.add('content3reveal');
    this.classList.contains('content3selected') ? this.classList.remove('content3selected') : this.classList.add('content3selected');
}





// CALLING FUNCTIONS / ADDING EVENT LISTENERs

window.addEventListener('scroll', scrollAppear);


const carouselImages = document.querySelectorAll('.carouselImg');
const nextImageDelay = 4000;
let imageCounter = 0;
carouselImages[imageCounter].style.opacity = 1;
setInterval(nextImage, nextImageDelay);

let content3divs = document.querySelectorAll('.content3inner');
for (let i = 0; i<content3divs.length; i++) {
    content3divs[i].addEventListener('click', contentReveal);
}

let expandingDivs = document.querySelectorAll('.insideContainer');
for (let i=0; i<expandingDivs.length; i++) {
    expandingDivs[i].addEventListener('click', clickExpand);
}

