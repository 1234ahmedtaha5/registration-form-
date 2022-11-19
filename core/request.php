<?php 

function getRequest(){
    return $_SERVER["REQUEST_METHOD"];
}

function postMethod(){
    if(getRequest()=="POST"){
        return true;
    }
    return false;
}

function recieveinput($value){
    return trim(htmlspecialchars($value));
}

