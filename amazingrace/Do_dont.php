<?php
session_start();
$userid=$_SESSION['userId'];
if ($userid== '') {
    $redirectBack=true;
}
include_once('dao/config.php');

$questions=array("Not share it as no one asked for it",
"Wait for an idea-generation contest to win",
"Evaluate the feasibility and share it with the concerned person in charge",
"Keep searching for better ways to improve current and new processes");
$answers=array("Dont","Dont","Dos","Dos");
$userid=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];

$jigsaw="select * from unscramble where useid='$userid' order by id desc limit 1";
$jigsaw=mysqli_query($con,$jigsaw);
$jigsaw=mysqli_fetch_object($jigsaw);
$jigsaw_point=$jigsaw->points;
$jigsaw_time=$jigsaw->time;

$multiselect="select * from multiselect where useid='$userid' order by id desc limit 1";
$multiselect=mysqli_query($con,$multiselect);
$multiselect=mysqli_fetch_object($multiselect);
$multiselect_point=$multiselect->points;

$points=$jigsaw_point+$multiselect_point;


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/games-global.css?v=1" rel="stylesheet">
    <style>
    #exampleDrag li {}

    #points {
        position: relative;
        width: 50%;
        float: right;
        text-align: right;
        font-size: 22px;
    }
    </style>
</head>

<body style="overflow:hidden;">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">

                <div id="timer" style="display:inline-block;">Time: 00:00:00</div>
            </div>
            <div class="col-md-6">
                <div id="points">Score: <?php echo $points;?></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-6 col-xs-6 col-xl-6 text-center">
                    <div class="dustbin agree" id="makeMeDroppable"><img src="images/bucket/agree-box.png"
                            style="width:100%" /></div>
                </div>
                <div class="col-md-6 col-xs-6 col-xl-6 text-center">
                    <div class="dustbin disagree" id="makeMeDroppableTwo"><img src="images/bucket/disagree-box.png"
                            style="width:100%" /></div>
                </div>

                <ul id="exampleDrag">
                    <?php 
                      for($i=0; $i<sizeOf($questions); $i++){
                          echo '<li class="questions drag'.$i.'"  pos="'.$i.'" style="display:none">'.$questions[$i].'</li>';
                      }
                      ?>
                </ul>
                <!--<div class="col-md-12 text-right">
                       <input type="submit" value="skip" name="submit" class="button-submit" style="margin-bottom:10px;"> 
                       </div>-->
            </div>
        </div>
    </div>

    <style>
    @media (min-width: 768px) {
        .modal-content2 {
            -webkit-box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
            box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
        }
    }

    @media (max-width: 768px) {
        .modal-content2 {
            -webkit-box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
            box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
        }
    }

    .modal-content2 {
        position: relative;
        background-color: #fff0;
        background-clip: padding-box;
        border: 0px solid #999;
        border: 0px solid rgba(0, 0, 0, .2);
        border-radius: 0px;
    }

    .container {
        display: none;
        width: 100%;
        height: 100vh;
        position: fixed;
        opacity: 0.9;
        background: #222;
        z-index: 40000;
        top: 0;
        left: 0;
        overflow: hidden;

        animation-name: fadeIn_Container;
        animation-duration: 1s;

    }

    .modal {
        display: none;
        top: 0;
        min-width: 250px;
        width: 80%;
        height: 400px;
        margin: 0 auto;
        position: fixed;
        z-index: 40001;
        /* background: #fff; */
        border-radius: 10px;
        /* box-shadow: 0px 0px 10px #000; */
        -webkit-box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
        box-shadow: 0 0px 0px rgb(0 0 0 / 50%) !important;
        margin-top: 30px;
        margin-left: 10%;

        animation-name: fadeIn_Modal;
        animation-duration: 0.8s;

    }

    .header {
        width: 100%;
        height: 70px;
        border-radius: 10px 10px 0px 0px;
        border-bottom: 2px solid #ccc;
    }

    .header a {
        text-decoration: none;
        float: right;
        line-height: 70px;
        margin-right: 20px;
        color: #aaa;
    }

    .content {
        width: 100%;
        height: 250px;
    }

    form {
        margin-top: 20px;
    }

    form label {
        display: block;
        margin-left: 12%;
        margin-top: 10px;
        font-family: sans-serif;
        font-size: 1rem;
    }

    form input {
        display: block;
        width: 75%;
        margin-left: 12%;
        margin-top: 10px;
        border-radius: 3px;
        font-family: sans-serif;
    }

    #first_label {
        padding-top: 30px;
    }

    #second_label {
        padding-top: 25px;
    }


    .footer {
        width: 100%;
        height: 80px;
        border-radius: 0px 0px 10px 10px;
        border-top: 2px solid #ccc;
    }

    .fotter button {
        float: right;
        margin-right: 10px;
        margin-top: 18px;
        text-decoration: none;
    }

    /****MEDIA QUERIES****/

    @media screen and (min-width: 600px) {

        .modal {
            width: 600px;
            height: 300px;
            margin-left: calc(50vw - 250px);
            margin-top: calc(50vh - 150px);
        }


        .header {
            width: 100%;
            height: 40px;
        }

        .header a {
            line-height: 40px;
            margin-right: 10px;
        }

        .content {
            width: 100%;
            height: 190px;
        }

        form label {
            margin-left: 10%;
            margin-top: 10px;
        }

        form input {
            width: 75%;
            margin-left: 10%;
            margin-top: 10px;
        }

        #first_label {
            padding-top: 0px;
        }

        #second_label {
            padding-top: 0px;
        }

        .footer {
            width: 100%;
            height: 70px;
        }

        .footer button {
            float: right;
            margin-right: 10px;
            margin-top: 10px;
        }

    }

    #points {
        position: relative;
        width: 50%;
        float: right;
        text-align: right;
        font-size: 22px;
    }

    /*LARGE SCREEN*/
    @media screen and (min-width: 1300px) {}

    /****ANIMATIONS****/

    @keyframes fadeIn_Modal {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn_Container {
        from {
            opacity: 0;
        }

        to {
            opacity: 0.9;
        }
    }
    </style>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content2 modal-content">
                <div class="modal-body">
                    <img src="img/Great_going.gif" style="width:100%;">
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="a">

    </div>
    <div class="modal" id="b">
        <div class="content">
            <img src="img/Great_going.gif" style="width:100%;">
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery.ui.touch-punch.js"></script>
    <script>
    <?php 
if(isset($redirectBack)){
    echo 'window.parent.redirectBack();';
}
?>

    var correct = new Audio('audio/correct.mp3');
    var incorrect = new Audio('audio/incorrect.mp3');

    var target,
        seconds = 0,
        minutes = 0,
        hours = 0;
    var t;

    function add() {
        seconds++;
        if (seconds >= 60) {
            seconds = 0;
            minutes++;
            if (minutes >= 60) {
                minutes = 0;
                hours++;
            }
        }



        target = (hours ? (hours > 3 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" +
            minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
        $("#timer").html("Time : " + target);
        $(".timer").val(target);

        timer();
    }

    function timer() {
        t = setTimeout(add, 1000);
    }
    timer();


    var questions = <?php echo json_encode($questions) ?>;
    var answers = <?php echo json_encode($answers) ?>;
    var collectAnswers = [];
    var currentAnswer = null;

    var pos = 0;
    var points = <?php echo $points;?>;
    nextQuestion();

    function nextQuestion() {
        if (pos != 0) {
            if (currentAnswer == answers[pos - 1]) {
                //points = points + 1;
                points = points + 1;
                $("#points").html("Score: " + points);
                console.log(points);
                // $(this).attr('readonly', true);
                correct.play();
                swal({
                    title: "Right Answer",
                    type: "success",
                    timer: 2000
                });
            } else {
                incorrect.play();
                swal({
                    title: "Wrong Answer",
                    type: "error",
                    timer: 2000
                });
            }
            collectAnswers.push(currentAnswer);
        }
        if (pos == 4) {
            setTimeout(() => {
                send();
            }, 1500);
        }
        $(".questions").eq(pos).css("display", "inline-block");
    }



    $(init);

    function init() {
        $('.drag0,.drag1,.drag2,.drag3').draggable({
            //  refreshPositions: true,
            revert: "invalid",
            containment: 'parent parent',
            start: function(event, ui) {
                $(this).css({
                    width: "50%",
                    height: "auto"
                });
            }
        });
        $('#makeMeDroppable').droppable({
            tolerance: "pointer",
            hoverClass: "ui-state-hover",
            drop: handleDropEventTrue
        });
        $('#makeMeDroppableTwo').droppable({
            tolerance: "pointer",
            hoverClass: "ui-state-hover",
            drop: handleDropEventFalse
        });
    }



    function whileDrag(event, ui) {

        /*
        var draggable = ui.draggable;
        console.log(draggable);
        */
    }

    function handleDropEventTrue(event, ui) {
        currentAnswer = "Dos";
        /* $(this).css({
             background:"#f1f1f1"
         })
         $(".drag"+ui.draggable.attr('pos')).css({
             left:"unset",
             transition:"1s all",
         });
         $(".drag"+ui.draggable.attr('pos')).css("opacity","0");
         setTimeout(() => {
         $(".drag"+ui.draggable.attr('pos')).hide();
         }, 1000);
         pos=pos+1;
         nextQuestion();
         setTimeout(() => {
             $(this).css({
             background:"white"
             })  
         }, 1000);
         */
        pos = pos + 1;
        $(".drag" + ui.draggable.attr('pos')).hide();
        nextQuestion();
    }

    function handleDropEventFalse(event, ui) {
        currentAnswer = "Dont";
        pos = pos + 1;
        $(".drag" + ui.draggable.attr('pos')).hide();
        nextQuestion();
    }

    function send() {
        $.ajax({
            type: "POST",
            url: "submit_Do_dont.php",
            data: "time=" + target + "&points=" + points + "&answers=" + collectAnswers.toString(),
            success: function(result) {
                console.log(result);
                if (result == "1010") {
                    console.log(result);
                    $("#a").css("display", "block");
                    $("#b").css("display", "block");
                    setTimeout(function() {
                        window.parent.closeGame();
                        $("#a").fadeOut();
                        $("#b").fadeOut();
                    }, 3000);
                    /*
                                        swal("Thank you for submission.", "", "success").then(() => {
                                            window.parent.closeGame();
                                    });
                                    */
                }
            }
        });
    }

    function sendskip() {
        $.ajax({
            type: "POST",
            url: "submit_Do_dont.php?&skip=true",
            data: "skip=true",
            success: function(result) {
                console.log(result);
                if (result == "1010") {
                    console.log(result);

                    window.parent.closeGame();

                }
            }
        });
    }

    $(".button-submit").click(function() {
        sendskip();
    });
    </script>
</body>

</html>