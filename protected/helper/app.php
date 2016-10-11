<?php
class app {
    public static function baseUrl($long_url = false, $dir = "", $file = ""){
        if ($long_url)
            return Yii::app()->request->getBaseUrl(true).$dir.$file;
        else
            return Yii::app()->request->baseUrl.$dir.$file;
    }
}
