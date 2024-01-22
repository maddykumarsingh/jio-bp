<?php
session_start();
$userid=$_SESSION['userId'];
if ($userid== '') {
    $redirectBack=true;
}
include_once('dao/config.php');
$userid=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];

$tf="select * from do_dont where useid='$userid' order by id desc limit 1";
$tf=mysqli_query($con,$tf);
$tf=mysqli_fetch_object($tf);
$tf_point=$tf->points;
$tf_time=$tf->time;

$unscramble="select * from unscramble where useid='$userid' order by id desc limit 1";
$unscramble=mysqli_query($con,$unscramble);
$unscramble=mysqli_fetch_object($unscramble);
$unscramble_point=$unscramble->points;
$unscramble_time=$unscramble->time;

$multiselect="select * from multiselect where useid='$userid' order by id desc limit 1";
$multiselect=mysqli_query($con,$multiselect);
$multiselect=mysqli_fetch_object($multiselect);
$multiselect_point=$multiselect->points;

$points=$tf_point+$multiselect_point+$unscramble_point;
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
    <link href="css/games-global.css" rel="stylesheet">
    <script src='js/jquery-ui.min.js'></script>
    <script src="js/index.js?&v=2"></script>
</head>

<body>
    <style type="text/css">
    .auto {
        margin: auto;
        float: none;
    }

    .rf-tgrid {
        font-family: Arial;
        font-weight: 700;
        font-size: 20px;
        margin: 1px;
        color: black;
        padding: 8px 20px !important;
        /* border: 1px solid bisque; */
        vertical-align: middle;
        text-align: center;

    }

    @media (max-width: 768px) {
        #rf-wordcontainer {
            font-family: Arial, sans-serif;
            font-weight: normal;
            font-size: 37px !important;
            float: left;
            padding-right: 10px;
            cursor: default;
            margin: 1em 1em 1em 0;
            width: 55%;
            border: 2px solid;
            border-color: black;
            background-color: #eee;
            cursor: pointer;
        }
    }

    /* Style for the grid */
    .rf-tablestyle {
        border: 2px solid;
        border-color: transparent;
        background-color: #eeeeee05;
        cursor: pointer;
        margin-bottom: 20px;
    }

    /* Style for the div containing the grid */
    #rf-searchgamecontainer {
        float: left;
    }

    /* Style for the div containing the word list */
    #rf-wordcontainer {
        display: none;
        font-family: Arial, sans-serif;
        font-weight: normal;
        font-size: 25px;
        float: left;
        padding-right: 10px;
        cursor: default;
        margin: 1em 1em 1em 0;
        width: 20%;
        border: 2px solid;
        border-color: black;
        background-color: #eee;
        cursor: pointer;
    }

    /* Style for the words that have been found */
    .rf-foundword {
        font-family: Arial, sans-serif;
        text-decoration: line-through;
        color: darkslategray;
    }

    #rf-tablegrid .rf-armed {
        /*  background: lightcyan;*/
    }

    #rf-tablegrid .rf-highlight {
        background: #1b49e4;
    }


    #rf-tablegrid .rf-glowing {
        background: black;
        color: #ffffff;

    }

    #rf-tablegrid .rf-selected {
        background: #ffb600;
        color: white;
    }

    /* style for words that didn't make it on the grid */
    .rf-pfalse {
        color: #111;
        visibility: hidden;
    }

    @media (max-width: 320px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 12px;
            margin: 1px;
            padding: 5px 10px !important;
            /* border: 1px solid bisque; */
            vertical-align: middle;
            text-align: center;
        }

        .game-title1 {
            font-family: 'NewsGoth BT';
            font-weight: 500;
            font-size: 14px;
            margin-top: 0px;
            padding: 5px 10px;
            margin-bottom: 8px;
        }

        .details {
            padding: 10px;
        }
    }

    @media only screen and (min-width: 321px) and (max-width: 375px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 12px;
            font-weight: bolder;
            margin: 0px;
            padding: 7px 11px !important;
            /* border: 1px solid bisque; */
            vertical-align: middle;
            text-align: center;
        }

        .details {
            padding: 10px;
        }

        .game-title1 {
            font-family: 'NewsGoth BT';
            font-weight: 500;
            font-size: 14px;
            margin-top: 0px;
            padding: 5px 10px;
            margin-bottom: 8px;
        }
    }

    @media only screen and (min-width: 376px) and (max-width: 425px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 12px;
            margin: 1px;
            padding: 5px 15px !important;
            /* border: 1px solid bisque; */
            vertical-align: middle;
            text-align: center;
        }

        .game-title1 {
            font-family: 'NewsGoth BT';
            font-weight: 500;
            font-size: 14px;
            margin-top: 0px;
            padding: 5px 10px;
            margin-bottom: 8px;
        }

        .details {
            padding: 10px;
        }
    }

    @media only screen and (min-width: 426px) and (max-width: 768px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 14px;
            margin: 1px;
            padding: 7px 15px !important;
            /* border: 1px solid bisque; */
            vertical-align: middle;
            text-align: center;
        }

        .game-title1 {
            font-family: 'NewsGoth BT';
            font-weight: 500;
            font-size: 14px;
            margin-top: 0px;
            padding: 5px 10px;
            margin-bottom: 8px;
        }
    }

    @media only screen and (min-width: 769px) and (max-width: 1024px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 16px;
            margin: 1px;
            padding: 6px 18px !important;
            vertical-align: middle;
            text-align: center;
        }

        .game-title1 {
            font-family: 'NewsGoth BT';
            font-weight: 500;
            font-size: 15px !important;
            margin-top: 0px;
            padding: 5px 10px;
            margin-bottom: 8px;
        }

    }

    @media only screen and (min-width: 769px) and (max-width: 1500px) {
        #rf-searchgamecontainer {
            float: left;
            margin-left: 27px !important;
        }
    }

    .details {
        padding: 0px;
    }

    .game-title1 {
        font-family: 'NewsGoth BT';
        font-weight: 500;
        font-size: 18px;
        margin-top: 0px;
        padding: 5px 10px;
        margin-bottom: 8px;
    }

    .plr0 {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .selectword {
        color: #ec1c24;
        margin-left: 10px;
    }

    .col-half-offset {
        margin-left: 2.166666667%
    }

    .form-control {
        border: 1px solid #080808;
    }

    .log-text {
        font-weight: bolder;
    }

    .log-text::placeholder {
        color: black;
    }

    .auto {
        margin: auto;
        float: none;
    }

    #points {
        position: relative;
        width: 50%;
        float: right;
        text-align: right;
        font-size: 22px;
    }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="timer-back" id="timer">Time : 00:00:00</div>
            </div>
            <div class="col-md-6">
                <div id="points">Score: <?php echo $points;?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-xs-12 progress-container auto">
                <div class="progress">
                    <div class="progress-bar bg-danger ui-background ui-color" style="width:10%;">0/6</div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-8 col-md-7 col-lg-6 col-xs-12 plr0 auto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 plr0">
                    <div class="col-md-12 col-sm-12 col-xs-12 highlight-text">[ Drag the mouse to hightlight words ]
                    </div>
                    <!-- <input type="text" name="" class="counter" id="imgclickcount" style=""> -->
                    <div id="theGrid" width="100%"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-8 col-md-7 col-lg-7 col-xs-12 auto">
                <form method="post" id="formdata" name="formdata">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input class="timer" name="timer" type="hidden" />
                            <input name="question" value="1" type="hidden" />
                            <input type="hidden" name="userid" value="55">
                            <!-- <input type="hidden" class="form-control  log-text counter"> -->
                            <input type="text" pos="0" name="ans1" value="" placeholder="T_ _ a _ _ _k"
                                class="form-control  log-text Teamwork">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input type="text" pos="1" name="ans2" value="" placeholder="Em_ _t _ _"
                                class="form-control  log-text Empathy">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input type="text" pos="2" name="ans3" value="" placeholder="R_ _ pe_t"
                                class="form-control  log-text Respect">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input type="text" pos="3" name="ans4" value="" placeholder="S_ _ p_ _t"
                                class="form-control  log-text Support">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input type="text" pos="4" name="ans5" value="" placeholder="I_ _ _ _ _ity"
                                class="form-control  log-text Integrity">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                            <input type="text" pos="5" name="ans6" value="" placeholder="A_ _li_ _"
                                class="form-control  log-text Agility">
                        </div>
                    </div>
                    <div class="row show-btn">
                        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-8 auto">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
                                <input type="submit" value="Submit" name="submit" class="button-submit"
                                    style="margin-bottom:10px;">
                            </div>
                        </div>
                    </div>
                </form>
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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php 
if(isset($redirectBack)){
    echo 'window.parent.redirectBack();';
}
?>
    var points = <?php echo $points;?>;
    var correct = new Audio('audio/correct.mp3');
    var incorrect = new Audio('audio/incorrect.mp3');
    /* 
     setTimeout(() => {
         var modal1 = $('#closeGame', window.parent.document);
             modal1.click();
         }, 5000);
         */

    var wantToShow = 6;
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

    function progressBar(location) {
        console.log(location);
        currrentProgress = (location) * 100 / wantToShow;
        console.log(currrentProgress + "this");
        $(".progress-bar").eq(0).css("width", currrentProgress + "%");
        $(".progress-bar").html((location) + "/" + wantToShow);
    }
    var answer = ["Teamwork", "Empathy", "Respect", "Support", "Integrity", "Agility"];

    // $(".form-control").bind("change paste keyup", function() {
    //     console.log("change");
    //     var getcurrent = $(this).attr("pos");
    //     var value = $(this).val();
    //     value = value.toLowerCase();
    //     if (value == answer[getcurrent].toLowerCase()) {
    //         $(this).css("background", "#c6ffc6");

    //         //$(this).attr('readonly', true);
    //     } else {
    //         $(this).css("background", "#ffdada");
    //     }
    // });

    $(document).ready(function() {
        $('#formdata').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($("#formdata")[0]);
            $.ajax({
                url: 'ajaxcall/wordpuzzle-insert.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    data = data.trim();
                    console.log(data + " true");
                    if (data == "1") {
                        $('#myModal').modal('show');
                        setTimeout(function() {
                            window.parent.closeGame();
                        }, 3000);
                    } else if ("all" == data) {
                        $('#myModal').modal('show');
                        setTimeout(function() {
                            window.parent.closeGame();
                        }, 3000);
                    }

                    //alert(data);
                }


            });
        });
    });
    </script>
</body>

</html>