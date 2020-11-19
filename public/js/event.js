// Franco @TODO To add this js to the Event page instead of Template
{
    var step=1;
    const createAddEditEventModal = () =>{
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=addEditEvent');
        xhr.onload = function () {
            if(xhr.status == 200){
                let addEditEventModal = new Modal(xhr.responseText);
                let addEditEventObj = {

                }
                addEditEventModal.generate(addEditEventObj,allowCancel=false);

                //Create event listener for the buttons inside the modal form

                var eventPreviousBut =  document.querySelector("#eventPreviousButton");
                if (eventPreviousBut) {
                    eventPreviousBut.addEventListener("click", movePreviousStep);  
                }
                var eventNextBut =  document.querySelector("#eventNextButton");
                if (eventNextBut) {
                    eventNextBut.addEventListener("click", moveNextStep);  
                }
                showEventStep("eventStep1");
                startMap();

            }
        }
        xhr.send(null);
    }

    // TODO to change the location of the add Event button
    var addEventBut =  document.querySelector("#addEvent");
    if (addEventBut) {
        addEventBut.addEventListener("click", createAddEditEventModal);  
    }


    function moveNextStep(){
        step +=1;
        let currentStep="eventStep"+step;
        showEventStep(currentStep);
    }

    function movePreviousStep(){
        step -=1;
        let currentStep="eventStep"+step;
        showEventStep(currentStep);
    }
    function showEventStep(currentStep){
        switch (currentStep){
            case "eventStep1":
                document.getElementById("eventStep1").style.display = "block";
                document.getElementById("eventStep2").style.display = "none";
                document.getElementById("eventStep3").style.display = "none";
                document.getElementById("eventPreviousButton").style.display = "none";
                document.getElementById("eventNextButton").style.display = "block";
                document.getElementById("eventSubmitButton").style.display = "none";
                document.getElementById("lblStepIndicator").innerHTML="Step 1 of 3";
                document.getElementById("stepIndicator").value = "33";
                break;
            case "eventStep2":
                document.getElementById("eventStep1").style.display = "none";
                document.getElementById("eventStep2").style.display = "block";
                document.getElementById("eventStep3").style.display = "none";
                document.getElementById("eventPreviousButton").style.display = "block";
                document.getElementById("eventNextButton").style.display = "block";
                document.getElementById("eventSubmitButton").style.display = "none";
                document.getElementById("lblStepIndicator").innerHTML="Step 2 of 3";
                document.getElementById("stepIndicator").value = "66";
                break;
            case "eventStep3":
                document.getElementById("eventStep1").style.display = "none";
                document.getElementById("eventStep2").style.display = "none";
                document.getElementById("eventStep3").style.display = "block";
                document.getElementById("eventPreviousButton").style.display = "block";
                document.getElementById("eventNextButton").style.display = "none";
                document.getElementById("eventSubmitButton").style.display = "block";
                document.getElementById("lblStepIndicator").innerHTML="Step 3 of 3";
                document.getElementById("stepIndicator").value = "100";
                break;
            default:
                break;
        }
    }


    // Functions for the mapping
    // var mapContainer = document.getElementById('map'); // 지도를 표시할 div 
    // var mapOption = { 
    //         center: new kakao.maps.LatLng(37.530767, 126.971937), // 지도의 중심좌표
    //         level: 3 // 지도의 확대 레벨
    //     };

    // var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
    // var bounds = new kakao.maps.LatLngBounds();
    // functions parts
    /**
     * callback function for geoCoder
     */
    var getCoords = function (result, status) {
            // 정상적으로 검색이 완료됐으면 
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
                // points.push(coords);
        // console.log(points);
        // createMarkersPoints(points);
        var marker = new kakao.maps.Marker({
                position: coords,
                map: map,
                clickable: true // 마커를 클릭했을 때 지도의 클릭 이벤트가 발생하지 않도록 설정합니다
            });
        var infowindow = new kakao.maps.InfoWindow({
                            content :"<"+(1)+">"+ locationData[1][2],
                        });
        console.log("count");
        infowindow.open(map, marker);  
        bounds.extend(coords);
        map.setBounds(bounds);
                // points.push(coords);
            } else{
                // alert("We could not find the address you provided");
            }
    };

     // traitement after addressSearch exec
    //  var points= Array();

     function useMyCoords(coords) {
         // points.push(coords);
         // console.log(points);
         // createMarkersPoints(points);
         var marker = new kakao.maps.Marker({
                 position: coords,
                 map: map,
                 clickable: true // 마커를 클릭했을 때 지도의 클릭 이벤트가 발생하지 않도록 설정합니다
             });
         var infowindow = new kakao.maps.InfoWindow({
                             content :"<"+(i+1)+">"+ locationData[i][2],
                         });
         console.log("count");
         infowindow.open(map, marker);  
         bounds.extend(coords);
         map.setBounds(bounds);
         
     }

     function getLatLonFromAddress(location) {
        var geocoder = new kakao.maps.services.Geocoder();
        geocoder.addressSearch(location[1], function (result, status) {
            // 정상적으로 검색이 완료됐으면 
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
                var marker = new kakao.maps.Marker({
                                position: coords,
                                map: map,
                                clickable: true // 마커를 클릭했을 때 지도의 클릭 이벤트가 발생하지 않도록 설정합니다
                            });
                var infowindow = new kakao.maps.InfoWindow({
                                    content :"<"+counter+">"+ location[2],
                                });
                infowindow.open(map, marker);  
                bounds.extend(coords);
                map.setBounds(bounds);
                let titles = document.getElementsByClassName("infoWindow");
                titles[titles.length-1].addEventListener('click', function(e){
                    let modalMapObj = { }
                    let infoView = new Modal(location[3]);
                    infoView.generate(modalMapObj, allowCancel=false);
                });
                  
                counter++;

                
            } else{
                // alert("We could not find the address you provided");
            }
        });
    }


    function startMap(){
        var mapContainer = document.getElementById('map'); // 지도를 표시할 div 
        var mapOption = { 
                center: new kakao.maps.LatLng(37.530767, 126.971937), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
        var bounds = new kakao.maps.LatLngBounds();
        // traitement after addressSearch exec
        var points= Array();

        //creation of the maps
        var locationData = [
            ['더블유코딩','서울 용산구 한강대로40길 39-13 1층', '<div class="infoWindow" style="padding:5px;">Wcoding: <div class="infoText"></div> </div>','where Pet Venture was born!<div><a href="https://map.kakao.com/link/to/'+'Wcoding,' + '37.530750,' + '126.971979'+'">Directions</a></div>'],
            ['르시앙블랑','서울 용산구 신흥로2길', '<div class="infoWindow" style="padding:5px;">Le Chien Blanc: <div class="infoText"></div> </div>','The greatest bakery in the world!<div><a href="https://map.kakao.com/link/to/'+'Le Chien Blanc,' + '37.530750,' + '126.971979'+'">Directions</a></div>'],
            ['서울스테이션어썸스테이션','서울 용산구 한강대로 405', '<div class="infoWindow" style="padding:5px;">Seoul Station: <div class="infoText"></div> </div>','for no reason...<div><a href="https://map.kakao.com/link/to/'+'Seoul Station,' + '37.530750,' + '126.971979'+'">Directions</a></div>']
        ];

        let listVendor = Array();
        let counter = 1;
        for(let i=0; i<locationData.length; i++){
                let myLocation = locationData[i];
                let containerVendor = document.getElementById("vendorList");
                var vendor = document.createElement("div");
                vendor.className="vendorElement";
                vendor.textContent = "* "+locationData[i][0];
                listVendor.push(containerVendor.appendChild(vendor));
                vendor.addEventListener("click", function(){
                    
                    getLatLonFromAddress(myLocation);
                    console.log("coutner qfter", counter);
            });  
        }
    }
}