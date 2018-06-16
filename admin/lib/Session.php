<?php 
class Session{
    public static function init(){
        session_start();
    }
    public static function set($key,$value){
        $_SESSION[$key] = $value; 
    }
    public static function get($key){
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function checkSession(){
        self::init();
        if(self::get('login') == false){
            self::destroy();
        } 
    }
    public static function checkLogin(){
        self::init();
        if(self::get('login') == true){ 
            echo "<script>window.location.assign('http://localhost/pet-bid/admin/')</script>";
        } 
    }
    public static function destroy(){
        session_destroy();  
        echo "<script>window.location.assign('http://localhost/pet-bid/admin/login.php')</script>";
    }
}