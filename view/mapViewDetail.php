
<!-- <link rel="stylesheet" href="./public/css/Modal.css"/> -->
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
    <!-- <div id="calculateDistance">Calculate Distance<div id="distanceDiv"></div></div> -->
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
<!-- <script src="./public/js/Modal.js"></script> -->
<script src="https://kit.fontawesome.com/f66e3323fd.js" crossorigin="anonymous"></script>
<!-- GEOCODER lat lon from address -->
<!-- <script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=services"></script> -->
<!-- MAP -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2">
</script>
<!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=cea8248c64bf22c135e642408c2fb6c2&libraries=LIBRARY"></script> -->






<!--****************************************************************************************************************************************************************************************************************************************************** -->
<!--****************************************************************************************************************************************************************************************************************************************************** -->
<!--****************************************************************************************************************************************************************************************************************************************************** -->





<script>
var viewListArray = [[37.530750,126.971979],[37.540522437037716, 126.98675092518866],[37.55397916880342, 126.97248154788045]]
var bounds = new kakao.maps.LatLngBounds();
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
mapOption = { 
    center: new kakao.maps.LatLng(37.530750,126.971979), // 지도의 중심좌표
    level: 3 // 지도의 확대 레벨
};

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

// 마커가 표시될 위치입니다 
// var markerPosition  = new kakao.maps.LatLng(33.450701, 126.570667); 

// 마커를 생성합니다
for(let i=0; i<viewListArray.length; i++){
    var coords = new kakao.maps.LatLng(viewListArray[i][0],viewListArray[i][1]);
    console.log(coords)
    var marker = new kakao.maps.Marker({
        position: coords
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);
    bounds.extend(coords);
    map.setBounds(bounds);
}


    // var viewListArray = [[37.530750,126.971979],[37.530750,126.971979],[37.530750,126.971979]]

    
    
    // var bounds = new kakao.maps.LatLngBounds();
    
    // var mapContainer = document.getElementById('map'); // 지도를 표시할 div 
    // var mapOption = { 
    //         center: new kakao.maps.LatLng(37.530767, 126.971937), // 지도의 중심좌표
    //         level: 3 // 지도의 확대 레벨
    //     };

    // var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // var zoomControl = new kakao.maps.ZoomControl();
    // // 지도 오른쪽에 줌 컨트롤이 표시되도록 지도에 컨트롤을 추가한다.
    // map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);


    // for(let i=0; i<viewListArray.length; i++){
    //         let myLocation = viewListArray[i];
            
    //         var coords = new kakao.maps.LatLng(myLocation);
    //             var marker = new kakao.maps.Marker({
    //                             position: coords,
    //                             map: map,
    //                             clickable: true // 마커를 클릭했을 때 지도의 클릭 이벤트가 발생하지 않도록 설정합니다
    //                         });
                
    //             var infowindow = new kakao.maps.InfoWindow({
    //                                 content :i,
    //                             });
                
    //             infowindow.open(map, marker);  
                // polyLineArray.push(coords);
                // bounds.extend(coords);
                // map.setBounds(bounds);
            
            
            
            // });  
    // }



    
</script>

<?php $content = ob_get_clean();
    require("template.php");
?>
