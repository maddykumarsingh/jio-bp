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

$wordpuzzle="select * from wordpuzzle where userid='$userid' order by id desc limit 1";
$wordpuzzle=mysqli_query($con,$wordpuzzle);
$wordpuzzle=mysqli_fetch_object($wordpuzzle);
$wordpuzzle_point=$wordpuzzle->total_score;

$points=$tf_point+$multiselect_point+$unscramble_point+$wordpuzzle_point;
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
    <style rel="stylesheet" type="text/css">
    /* //spot                         */
    .spot-img {
        position: relative;
    }

    .Supportive {
        position: absolute;
        width: 9%;
        top: 44% !important;
        left: 39%;
        /* cursor: pointer; */
    }

    .Listener {
        position: absolute;
        width: 16%;
        top: 9.5% !important;
        right: 24%;
        /* cursor: pointer; */
    }

    .Addresses {
        position: absolute;
        width: 18.5%;
        bottom: 0% !important;
        left: 16%;
        /* cursor: pointer; */
    }

    .Smile {
        position: absolute;
        width: 14%;
        top: 37% !important;
        left: 20%;
        /* cursor: pointer; */
    }

    .Environment {
        position: absolute;
        width: 5.5%;
        top: 23% !important;
        left: 32.5%;
        /* cursor: pointer; */
    }

    .img-fluid {
        width: 100%;
    }

    .plr0 {
        padding: 0px !important;
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
</head>

<body style="overflow:hidden;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6" style="float:right;">
                <div id="points">Score: <?php echo $points;?></div>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-10 col-md-9 col-lg-9 col-xs-12 auto">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 plr0">
                        <img src="images/spot/spotdifferent1.jpg" class="img-fluid">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 plr0">
                        <img src="images/spot/spotdifferent2.jpg" class="img-fluid spot-img">
                        <img src="images/spot/Smile.png" class="Smile" id="Smile">
                        <img src="images/spot/Supportive.png" class="Supportive" id="Supportive">
                        <img src="images/spot/Addresses.png" class="Addresses" id="Addresses">
                        <img src="images/spot/Listener.png" class="Listener" id="Listener">
                        <img src="images/spot/Environment.png" class="Environment" id="Environment">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-sm-11 col-md-11 col-lg-11 col-xs-12 auto form-group">
                <input name="question" value="3" type="hidden" />
                <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 pr0">
                    <p class="game-title1">1. <input type="text" name="ans1" class="login-text1 spot1 Supportive-text1"
                            required style="width:90%;margin-top:0px !important;"></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 pr0">
                    <p class="game-title1">2.<input type="text" name="ans2" class="login-text1 spot2 Addresses-text2"
                            required style="width:90%;margin-top:0px !important;"></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 pr0">
                    <p class="game-title1">3.<input type="text" name="ans3" class="login-text1 spot3 Listener-text3"
                            required style="width:90%;margin-top:0px !important;"></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 pr0">
                    <p class="game-title1">4.<input type="text" name="ans4" class="login-text1 spot4 Smile-text4"
                            required style="width:90%;margin-top:0px !important;"></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 pr0">
                    <p class="game-title1">5.<input type="text" name="ans5" class="login-text1 spot5 Environment-text5"
                            required style="width:90%;margin-top:0px !important;"></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1 col-xs-4 auto">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
                        <input type="submit" value="Submit" name="submit" class="button-submit"
                            style="margin-bottom:10px;">
                    </div>
                </div>
            </div>
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
    var points = <?php echo $points;?>;
    $(document).ready(function() {

        $(".Supportive").click(function() {
            $('.Supportive-text1').val('Supportive');
            swal("Supportive", "");
            points = points + 1;
            $("#points").html("Score: " + points);

            // totalWords=totalWords+1;
            // progressBar(totalWords);
            // alert("Supportive");
        });

        $(".Addresses").click(function() {
            $('.Addresses-text2').val('Addresses Complaint');
            swal("Addresses Complaint", "");
            //alert("Addresses");
            points = points + 1;
            $("#points").html("Score: " + points);


        });
        $(".Listener").click(function() {
            $('.Listener-text3').val('Good Listener');
            swal("Good Listener", "");
            //alert("Tortoise");
            points = points + 1;
            $("#points").html("Score: " + points);


        });

        $(".Smile").click(function() {
            $('.Smile-text4').val('Smile and make them feel welcome');
            swal("Smile and make them feel welcome", "");
            //alert("Birds");
            points = points + 1;
            $("#points").html("Score: " + points);


        });

        $(".Environment").click(function() {
            $('.Environment-text5').val('Friendly Environment');
            swal("Friendly Environment", "");
            //alert("Gray Addresses");
            points = points + 1;
            $("#points").html("Score: " + points);
        });
        $(".spot-img").click(function() {
            swal("Oops, try again!", "", "error");
            //alert("Oops, try again!");
        });
    });


    var clsNames = ["spot1", "spot2", "spot3", "spot4", "spot5"];
    var correct = ["Supportive", "Addresses Complaint", "Good Listener", "Smile and make them feel welcome",
        "Friendly Environment"
    ]
    var answers = [];
    var points = <?php echo $points;?>;

    function execute() {
        answers = [];
        for (var i = 0; i < clsNames.length; i++) {
            var newval = $('.' + clsNames[i]).val();
            //alert(correct[i]);
            if (newval == correct[i]) {
                answers.push(newval);
                //points = points + 1;
            }

        }
        //alert(answers+'='+points);

        send();
    }





    function send() {
        $.ajax({
            type: "POST",
            url: "submit_spot.php",
            data: "time=" + target + "&points=" + points + "&answers=" + answers.toString(),
            success: function(result) {
                console.log(result);
                if (result == "1010") {
                    console.log(result);
                    $('#myModal').modal('show');
                    setTimeout(function() {
                        window.parent.closeGame();
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

    $(".button-submit").click(function() {
        execute();
    });
    </script>
</body>

</html>