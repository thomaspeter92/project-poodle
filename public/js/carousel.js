// This is the javascript file for the image carousel! <3 ***


// const carouselImages = document.querySelectorAll('.carouselImg');

// const nextImageDelay = 4000;

// let imageCounter = 0;

// carouselImages[imageCounter].style.opacity = 1;

// setInterval(nextImage, nextImageDelay);

function nextImage() {
    carouselImages[imageCounter].style.opacity = 0;
    imageCounter == 3 ? imageCounter = -1 : null;
    imageCounter += 1;
    carouselImages[imageCounter].style.opacity = 1;
}

const parallax = document.querySelectorAll ('div');

window.addEventListener('scroll', function(e) {
    let offset = window.pageYOffset;
    parallax[0].style.backgroundPositionY = offset * -0.3 + "px";
})

