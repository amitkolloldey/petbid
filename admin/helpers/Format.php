<?php

class Format{
    //Formating Date
    public function formatDate($date){
        return date('F ,j Y, g:i a',strtotime($date));
    }
    //Formating Excerpt
    public function formatExcerpt($text, $limit = 100){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,' '));
        $text = $text."....";
        return $text;
    }
    //Validation
    public function validation($data = ''){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;
    }    
}