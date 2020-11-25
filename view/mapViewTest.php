
<link rel="stylesheet" href="./public/css/Modal.css"/>
<?php ob_start();?> 
<style>
    #map{
        border: 2px solid black;
        border-radius: 10px;
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto;
        width:50%;
        height:550px;
    }
    #mapContainer{
        width: 80%;
        margin: auto;
        display: flex;
        justify-content: space-between;
    }
    #vendorList{
        margin-top: 10%;
    }
    #calculateDistance{
        margin-right: 5%;
        margin-left: 5%;
        margin-top: 10%;
    }
    #distanceDiv{
        margin-right: 5%;
        margin-left: 5%;
        margin-top: 10%;
    }
    .infoWindow{
        /* border-radius: 5px; */
        background-color: grey;
        font-weight: bold;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 140px;
        height: 30px;
    }
    .infoTextContents{
        border: 1px solid black;
    }
    .destination{
        color: white;
        background-color: black;
        text-align: center;
    }
    .modalSubDiv{
        width: 30%;
        height: 30%;
    }
    .modalDivContent{
        width: 30%;
        height: 30%;
    }
    #locationList{
        margin-top: 10%;
        margin-right: 10%;
    }
</style>


<div id="mapContainer">
    <div id="map"></div>
    <div id="calculateDistance">Calculate Distance<div id="distanceDiv"></div></div>
    <div id="distanceDiv"></div>
    <div id="locationList"></div>
    <br><br><br>
    <div id="vendorList">
        
    </div>
</div>

<!-- <p><em>마커를 클릭해주세요!</em></p> 

function dynamicallyLoadScript(url) {
    var script = document.createElement("script");  // create a script DOM node
    script.src = url;  // set its src to the provided URL

    document.head.appendChild(script);  // add it to the end of the head section of the page (could change 'head' to 'body' to add it to the end of the body section instead)
}

 -->
<script src="./public/js/Modal.js"></script>
<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<!-- GEOCODER lat lon from address -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=services"></script>
<!-- MAP -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2">
</script>
<!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=LIBRARY"></script> -->






<!--****************************************************************************************************************************************************************************************************************************************************** -->
<!--****************************************************************************************************************************************************************************************************************************************************** -->
<!--****************************************************************************************************************************************************************************************************************************************************** -->





<script>
    var stopByCounter = 1;
    var locationList = document.getElementById("locationList");
    var bounds = new kakao.maps.LatLngBounds();
    var polyLineArray = Array();
    var mapContainer = document.getElementById('map'); // 지도를 표시할 div 
    var mapOption = { 
            center: new kakao.maps.LatLng(37.530767, 126.971937), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
        };

    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    var zoomControl = new kakao.maps.ZoomControl();
    // 지도 오른쪽에 줌 컨트롤이 표시되도록 지도에 컨트롤을 추가한다.
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);


    //Stop by points
    var markerClickArray = Array();
    var markerInfo = "Stop by point";
    var startEndHandler = function startEnd(mouseEvent){
        // 클릭한 위도, 경도 정보를 가져옵니다   
        var latlng = mouseEvent.latLng; 
        var markerClick = new kakao.maps.Marker({ 
            // 지도 중심좌표에 마커를 생성합니다 
            map: map,
            position: latlng 
        }); 
    
        //지도에 마커를 표시합니다
        var infowindow = new kakao.maps.InfoWindow({
            content : markerInfo,
        });
        infowindow.open(map, markerClick);
        bounds.extend(latlng);
        map.setBounds(bounds);
        polyLineArray.push(latlng);
        var destination = document.createElement("div");
        var dash = document.createElement("div");
        dash.textContent = "************";
        destination.textContent = "StopBy Point "+stopByCounter
        locationList.appendChild(destination);
        locationList.appendChild(dash);
        markerClickArray.push(latlng);
        markerInfo = "Stop by point";
        stopByCounter++;
        if(markerClickArray.length==3){
            kakao.maps.event.removeListener(map, 'click', startEndHandler);
        }
        
    }

    kakao.maps.event.addListener(map, 'click', startEndHandler);

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
                // var location4 = location[4];
                var infowindow = new kakao.maps.InfoWindow({
                                    content :"<"+counter+">"+location[2],
                                });
                // location4.addEventListener('click', function(){
                //     polyLineArray.push(coords);
                // })
                infowindow.open(map, marker);  
                // polyLineArray.push(coords);
                bounds.extend(coords);
                map.setBounds(bounds);
                let titles = document.getElementsByClassName("infoWindow");
                titles[titles.length-1].addEventListener('click', function(e){
                    let modalMapObj = { }
                    let infoView = new Modal(location[3]);
                    infoView.generate(modalMapObj, allowCancel=false);
                    var roadviewContainer = document.getElementById('roadview'); //로드뷰를 표시할 div
                    var roadview = new kakao.maps.Roadview(roadviewContainer); //로드뷰 객체
                    var roadviewClient = new kakao.maps.RoadviewClient(); //좌표로부터 로드뷰 파노ID를 가져올 로드뷰 helper객체
                    roadviewClient.getNearestPanoId(coords, 50, function(panoId) {
                        roadview.setPanoId(panoId, coords); //panoId와 중심좌표를 통해 로드뷰 실행
                    });
                    var addButton = document.getElementsByClassName("addButton");
                    addButton[0].addEventListener('click', function(){
                        polyLineArray.push(coords);
                        var destination = document.createElement("div");
                        destination.textContent = location[0];
                        var dash = document.createElement("div");
                        dash.textContent = "************";
                        locationList.appendChild(destination);
                        locationList.appendChild(dash);
                        console.log(polyLineArray);
                    })
                });
                  
                counter++;

                
            } else{
                // alert("We could not find the address you provided");
            }
        });
    }
    

    //Grabbing vendor data 
    var vendorData = Array();
    var sponsorData = <?php echo $sponsors; ?>;
    
    for(let i=0; i<sponsorData.length; i++){
        let vendorElement = Array();
        let vendorName = sponsorData[i]['name'];
        vendorElement.push(vendorName);
        vendorElement.push(sponsorData[i]['address']);
        vendorElement.push('<div class="infoWindow" style="padding:5px;">'+vendorName+'<div class="infoText"></div> </div>');
        vendorElement.push('<div id="roadview" style="width:100;height:50;"></div>'+'<div class="addButton">AddButton</div>'+sponsorData[i]['description']+'<div>');
        vendorData.push(vendorElement);
    }
    

    // var locationData = [
    //     ['더블유코딩','서울 용산구 한강대로40길 39-13 1층', '<div class="infoWindow" style="padding:5px;">Wcoding: <div class="infoText"></div> </div>','<div id="roadview" style="width:100;height:50;"></div>'+'<div class="addButton">AddButton</div>'+'where Pet Venture was born!<div><a href="https://map.kakao.com/link/to/'+'Wcoding,' + '37.530750,' + '126.971979'+'">Directions</a></div>'],
    //     ['르시앙블랑','서울 용산구 신흥로2길', '<div class="infoWindow" style="padding:5px;">Le Chien Blanc: <div class="infoText"></div> </div>','<div id="roadview" style="width:100;height:50;"></div>'+'<div class="addButton">AddButton</div>'+'The greatest bakery in the world!<div><a href="https://map.kakao.com/link/to/'+'Le Chien Blanc,' + '37.530750,' + '126.971979'+'">Directions</a></div>'],
    //     ['서울스테이션어썸스테이션','서울 용산구 한강대로 405', '<div class="infoWindow" style="padding:5px;">Seoul Station: <div class="infoText"></div> </div>','<div id="roadview" style="width:100;height:50;"></div>'+'<div class="addButton">AddButton</div>'+'for no reason...<div><a href="https://map.kakao.com/link/to/'+'Seoul Station,' + '37.530750,' + '126.971979'+'">Directions</a></div>']
    // ]

    let listVendor = Array();
    var addButtonMap = 'click';
    let counter = 1;
    for(let i=0; i<vendorData.length; i++){
            let myLocation = vendorData[i];
            let containerVendor = document.getElementById("vendorList");
            var vendor = document.createElement("div");
            vendor.className="vendorElement";
            vendor.textContent = "* "+vendorData[i][0];
            listVendor.push(containerVendor.appendChild(vendor));
            // vendor.addEventListener("click", function(){
                
                getLatLonFromAddress(myLocation);
                console.log("coutner qfter", counter);
            // });  
    }
    
    //Distance functionality 
    var distanceButton = document.getElementById("calculateDistance");
    var distanceDiv = document.getElementById("distanceDiv");
    var distanceLength = document.createElement("span");

    distanceButton.addEventListener('click', function(){
        console.log(polyLineArray);
        var polyline = new kakao.maps.Polyline({
            map: map,
            path: polyLineArray,
            strokeWeight: 2,
            strokeColor: 'red',
            strokeOpacity: 0.8,
            strokeStyle: 'solid'
        });
        polyline.setMap(map);
        var polyLength = polyline.getLength(); 
        distanceLength.textContent = "The total travel distance for this journey is "+Math.trunc(polyLength)+" m. and you can have "+(polyLength/12800)+" big macs after."
        distanceDiv.appendChild(distanceLength); 

    })
    

</script>

<?php $content = ob_get_clean();
    require("template.php");
?>
