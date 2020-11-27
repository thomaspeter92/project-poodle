<?php session_start();?>
<!DOCTYPE html>
    <head>
    <!-- Initialize the viewport -->
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Load the required dependencies: A-frame and AR.js -->
    <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/master/aframe/build/aframe-ar.min.js"></script>
    
</head>
<?php if(isset($_SESSION['id'])){ ?>
<body style="margin : 0px; overflow: hidden;">
    
    <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false;'>
        <a-entity text="value: Hello you have 20 points!"></a-entity>

        <!-- <a-marker markerhandler emitevents="true" cursor="rayOrigin: mouse" id="animated-marker" type='barcode' value='6'></a-marker> -->
        <a-marker type="pattern" preset="pattern" url="pattern-markerFinal.patt" emitevents="true" cursor="rayOrigin: mouse" id="marker">
        <!-- <a-box position='0 0.5 0' color="red">
        </a-box> -->
            <a-entity gltf-model="cute_pug_waffles/scene.gltf"
                    scale="1 1 1" 
                    position="0 0 0"
                    rotation="0 -90 90"
                    animation="property: rotation; to:360 -90 90; loop: true; dur: 10000; easing: linear;"
                    id="model"
                    >
            </a-entity>
        </a-marker>
        <!-- <a-camera><a-cursor></a-cursor></a-camera> -->
        <a-entity camera></a-entity> 
    </a-scene>

    <script>
        let scene =  document.querySelector("a-scene");
        var formData = new FormData();
        scene.addEventListener("click", function(formData){ 
            window.location.href = "https://localhost/index.php?action=addPoints";
            // window.location.href = "https://localhost/index.php?action=coupon";

        });

        
    </script>
</body>
</html>
<?php }else{ 
    header('Location:https://localhost/index.php?action=pleaseLogIn ');
 } ?>
