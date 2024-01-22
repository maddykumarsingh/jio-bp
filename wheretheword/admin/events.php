<?php

ob_start();
error_reporting(E_ALL);
session_start();
$settings=json_decode(file_get_contents("settings.js"),true)[0];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
include_once '../dao/config.php';
include_once '../../admin_assets/triggers.php';

// $launchpos=default_data("launchpos");
// $numlimit=default_data("numlimit");

$events=$_GET["events"];
if(isset($events)){
    if($events=="shuffle"){
        if($launchpos>0){
            echo "Error : unable to shuffle. values are already released. Reset launch first.";
        }else{
            $numbers = range(1, 50);
            shuffle($numbers);
            $serialize=serialize($numbers);
            updateValues("shuffle",$serialize);
            header("Location:index.php");
        }
    }

    if($events=="add_words"){
            $words_array=$_POST["value"];
            $rules=$_POST["rules"];
            $title=$_POST["title"];
            $words_array=serialize($words_array);
            $rules=serialize($rules);
            updateValues("rules",$rules);
            updateValues("custom_title",$title);
            updateValues("custom_words",$words_array);
            updateValues("apply_custom_words","true");
            echo "true";
    }


    if($events=="change_theme"){
        $value=$_POST["value"];
                    updateValues("current_theme",$value);
                    echo "true";
                }


    if($events=="release_number"){
        $predict=($launchpos+1)*$numlimit;
        if($predict>50){
            updateValues("launchpos","10");
            updateValues("numlimit","5");
            header("Location:index.php");
        }else{
            $launchpos=$launchpos+1;
            updateValues("launchpos",$launchpos);
            header("Location:index.php");
        }
    }

}

?>