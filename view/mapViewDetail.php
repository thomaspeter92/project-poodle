
<!-- <link rel="stylesheet" href="./public/css/Modal.css"/> -->
<style>
    #map{
        border: 2px solid black;
        border-radius: 10px;
        /* margin-top: 10%; */
        margin-left: auto;
        margin-right: auto;
        width:100%;
        height:550px;
    }
    #mapContainer{
        width: 100%;
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
    <div id="distanceDiv"></div>
    <div id="locationList"></div>
    <br><br><br>
    <div id="vendorList">
        
    </div>
</div>
