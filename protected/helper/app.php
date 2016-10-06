<?php
class app {
    public static function baseUrl($true = false, $dir = "", $file = ""){
        if ($true)
            return Yii::app()->request->getBaseUrl(true).$dir.$file;
        else
            return Yii::app()->request->baseUrl.$dir.$file;
    }
}
