<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of html
 *
 * @author a.ovasafyan
 */
class html {
    public static function tagClass($tag, $text, $class){
        return "<".$tag." class='".$class."'>".$text."</".$tag.">";
    }
    
    public static function tag($tag, $text){
        return "<".$tag.">".$text."</".$tag.">";
    }
}
