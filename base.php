<?php

session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/controller/Title.php";
include_once __DIR__ . "/controller/Bottom.php";
include_once __DIR__ . "/controller/Ad.php";
include_once __DIR__ . "/controller/Admin.php";
include_once __DIR__ . "/controller/Image.php";
include_once __DIR__ . "/controller/Mvim.php";
include_once __DIR__ . "/controller/Menu.php";
include_once __DIR__ . "/controller/News.php";
include_once __DIR__ . "/controller/Total.php";



$Title=new Title;
$Bottom=new Bottom;
$Ad=new Ad;
$Admin=new Admin;
$Image=new Image;
$Mvim=new Mvim;
$Menu=new Menu;
$News=new News;
$Total=new Total;


function to($url){
    header("location:".$url);
}

function q($sql){
    $pdo=new PDO("mysql: host=localhost; charset=utf8; dbname=db11", 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Total->online();