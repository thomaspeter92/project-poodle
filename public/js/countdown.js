// Set the date we're counting down to
function countDownDate(eventTime, unique) {

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
        document.querySelector("#countdown"+unique).innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";
        } else if (minutes>0){
            document.querySelector("#countdown"+unique).innerHTML = minutes + "m " + seconds + "s ";
        } else if (seconds>0){
            document.querySelector("#countdown"+unique).innerHTML = seconds + "s ";
        }
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.querySelector("#countdown"+unique).innerHTML = "moments!";
        }
    }, 1000);

}