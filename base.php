<?php

session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/controller/Title.php";



$Title=new Title;


function to($url){
    header("location:".$url);
}

