<!-- index.php -->
<?php
require("./controller/controller.php");

$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";
try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "kakao":
            testShowKakaoLogin($action);
            break;
        case "kakaoResult":
            $kakaoNickname = isset($_REQUEST["kakaoNickname"]) ? $_REQUEST["kakaoNickname"] : NULL;
            $kakaoEmail = isset($_REQUEST["kakaoEmail"]) ? $_REQUEST["kakaoEmail"] : NULL;
            // $kakaoid = isset($_REQUEST["kakaoid"]) ? $_REQUEST["kakaoid"] : NULL;

            echo $kakaoNickname;
            echo "<br>";
            echo $kakaoEmail;
            echo "<br>";

            if ($kakaoNickname and $kakaoEmail) {
                testKakaoLogin($kakaoNickname, $kakaoEmail);
            } else {
                throw new Exception("Kakao Login is failed", 1000);
            }
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("./view/error.php");
}
