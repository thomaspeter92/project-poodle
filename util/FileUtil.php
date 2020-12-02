<?php
class FileUtil {

    static function downloadFileFromURL($url, $dir) {
        $fileName = basename($url);   //Get File name from URL
        $pathForSave = $dir.$fileName;
        file_put_contents($pathForSave, file_get_contents($url));
        return $fileName;
    }
}