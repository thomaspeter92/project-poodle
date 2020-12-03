function countDownDateMobile(eventTime, unique) {
    var countDownDate = new Date(eventTime*1000).getTime();
    var x = setInterval(function() {

        // Get today's date and time
        var d = new Date();
        var localTime = d.getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - localTime;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id="demo"
        if (hours>0) {
        document.querySelector("#countdownMobile"+unique).innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";
        } else if (minutes>0){
            document.querySelector("#countdownMobile"+unique).innerHTML = minutes + "m " + seconds + "s ";
        } else if (seconds>0){
            document.querySelector("#countdownMobile"+unique).innerHTML = seconds + "s ";
        }
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.querySelector("#countdownMobile"+unique).innerHTML = "moments!";
        }
    }, 1000);

}


let notificationDropdownDesktop = document.querySelector(".notificationsDropdownDesktop");
notificationDropdownDesktop.addEventListener('click', event => {
    event.stopPropagation();
    desktopContents = document.querySelector(".notificationsDropdownContentDesktop");
    desktopContents.classList.toggle("show");
    notificationNumberSpan = document.querySelector('#notificationNumber')
    notificationNumberNotTrimmed = notificationNumberSpan.textContent
    nNtrimmed = notificationNumberNotTrimmed.trim();
    console.log(nNtrimmed);


    if (nNtrimmed > 0) {
        console.log("worked")
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=readNotifications');
        xhr.onload = function () {
            if(xhr.status == 200){
                notificationNumberSpan.innerHTML = '';
            } else {
                return null;
            }
        }
        xhr.send(null);
    }
});

// Remove Dropdown on click inside window
window.addEventListener("click", event => {
contents = document.querySelector(".notificationsDropdownContentDesktop")    ;
contents.classList.remove("show");
});

let mobileDropdownNotifications = document.querySelector(".notificationsDropdownMobile");
mobileDropdownNotifications.addEventListener('click', event => {
    console.log("clicked");
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=notificationsView');
    xhr.onload = function () {
        if(xhr.status == 200){
            let notificationsView = new Modal(xhr.responseText);
            notificationsView.generate();
            let countDownSpans = document.querySelectorAll(".countDownSpan");
            for (n=0; n<countDownSpans.length; n++) {
            let unixEvent = countDownSpans[n].getAttribute("data-unixevent")
            let unique = countDownSpans[n].getAttribute("data-unique")
            // console.log(unixEvent);
            // console.log(unique);
            countDownDateMobile(unixEvent, unique)
            // console.log('i ran')
            }
        } else {
            return null;
        }
    }
    
    xhr.send(null);
});