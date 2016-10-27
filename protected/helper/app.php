<?php
class app {
    public static function baseUrl($long_url = false, $dir = "", $file = ""){
        if ($long_url)
            return Yii::app()->request->getBaseUrl(true).$dir.$file;
        else
            return Yii::app()->request->baseUrl.$dir.$file;
    }
    
    public static function datetimeUserFriendly( $date ) {
        $dateDateTime = new DateTime($date);
        $date = $dateDateTime->getTimestamp();
        // Вывод даты на русском
        $monthes = array(
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        );
        $stringDateTime = date('d ', $date) . $monthes[(date('n', $date))] . date(' Y, H:i', $date);

        $days = array(
            'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
            'Четверг', 'Пятница', 'Суббота'
        );
        
        $stringDateTime .= ', '.$days[(date('w', $date))];
        return $stringDateTime;
    }
    
    public static function actionRole($roles){
        if (in_array(User::role(), $roles)) {
            return 'allow';
        }else{
            return 'deny';
        }
    }
    
    public static function dateTimeByFormat($datetime, $format = "Y.m.d"){
        $datetime = strtotime($datetime);
        return date($format, $datetime);
    }
    
    public static function getParam($get){
        if (Yii::app()->request->getQuery($get))
            return Yii::app()->request->getQuery($get);
        else
            return NULL;
    }
    
    public static function time(){
        return time();
    }
    
    public static function date(){
        return date("Y-m-d H:i:s");
    }
    
    public static function params($paramName){
        return Yii::app()->params[$paramName];
    }
}
