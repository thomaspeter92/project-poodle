// This is the javascript file for the LANDING PAGE! <3 ***

//FUNCTIONS  FOR LANDING PAGE
{

    //Function to change carousel image on an interval. Playing with opacitiy. 
    function nextImage() {
        carouselImages[imageCounter] ? carouselImages[imageCounter].style.opacity = 0 : null;
        imageCounter == 2 ? imageCounter = -1 : null;
        imageCounter += 1;
        carouselImages[imageCounter] ? carouselImages[imageCounter].style.opacity = 1 : null;
    }

    // Same function as above but for mobile view. 
    // function nextImageMobile() {
    //     mobileCarousel[imageCounter2].style.opacity = 0;
    //     imageCounter2 == 2 ? imageCounter2 = -1 : null;
    //     imageCounter2 += 1;
    //     mobileCarousel[imageCounter2].style.opacity = 1;
    // }

    //Function to make element appear as we scroll down the page. This is used on the textbox next to the map preview. 
    function scrollAppear() {
        let textBox = document.querySelector('.boxAppearBefore');
        let boxPosition = textBox.getBoundingClientRect().top;
        let screenPosition = window.innerHeight / 1.5;
        boxPosition < screenPosition ? textBox.classList.add('boxAppearAfter') : textBox.classList.remove('boxAppearAfter');
    }

    //Function to use on the expanding content area. We add and remove classes to expand/reveal the elements inside. 
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

    //Function to add and remove classes on mouseover event. 
    function mouseOverElevate(e) {
        this.classList.contains('content5divMouseOver') ? this.classList.remove('content5divMouseOver') : this.classList.add('content5divMouseOver');
    }

    function cardFlip() {
        // var card = this.parentElement.parentElement;
        this.classList.contains('cardFlip') ? this.classList.remove('cardFlip') : this.classList.add('cardFlip');
    }



    // CALLING FUNCTIONS / ADDING EVENT LISTENERs

    window.addEventListener('scroll', scrollAppear);

    var cards = document.querySelectorAll('.theCard')
    for(var i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', cardFlip);
    }

    var carouselImages = document.querySelectorAll('.carouselImg');
    var nextImageDelay = 4000;
    var imageCounter = 0;

    if(carouselImages[imageCounter]) {
        carouselImages[imageCounter].style.opacity = 1;
        setInterval(nextImage, nextImageDelay);
    }

    // var mobileCarousel = document.querySelectorAll('.mobileCarousel');
    // var imageCounter2 = 0;
    // if(mobileCarousel) {
    //     if(mobileCarousel[imageCounter2] ) {
    //         mobileCarousel[imageCounter2].style.opacity = 1;
    //         setInterval(nextImageMobile, nextImageDelay);
    //     }
    // }

    // let content3divs = document.querySelectorAll('.content3inner');
    // for (let i = 0; i<content3divs.length; i++) {
    //     content3divs[i].addEventListener('click', contentReveal);
    // }

    var expandingDivs = document.querySelectorAll('.insideContainer');
    for (var i=0; i<expandingDivs.length; i++) {
        expandingDivs[i].addEventListener('click', clickExpand);
    }

    var content5div = document.querySelectorAll('.content5div');
    for (var i = 1; i<content5div.length; i++) {
        content5div[i].addEventListener('mouseenter', mouseOverElevate)
        content5div[i].addEventListener('mouseleave', mouseOverElevate) 
    }

    var leftArrow = document.querySelector('.leftArrow');
    var rightArrow = document.querySelector('.rightArrow')
    var profileContainer = document.querySelector('#profileContainer')
    let translateLeft = 0
    leftArrow.addEventListener('click', function() {
        if(translateLeft == 0) {
        return null;
        } else {
            translateLeft -= 1200;
            profileContainer.style.transform = `translateX(-${translateLeft}px)`;
            console.log(translateLeft);
        }
    })
    rightArrow.addEventListener('click', function(){
        if(translateLeft >= 2400) {
            return null;
        } else {
            translateLeft += 1200;
            profileContainer.style.transform = `translateX(-${translateLeft}px)`;
            console.log(translateLeft);
        }
    })

}
