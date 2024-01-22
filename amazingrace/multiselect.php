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
$getpos="select * from unscramble where useid='$userid' order by id desc limit 1";

  $getpos=mysqli_query($con,$getpos);
  $getpos=mysqli_fetch_object($getpos);
  $points=$getpos->points;
 
//   echo $points;
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
    .chkbox {
        font-size: 18px;
        line-height: 20px;
        margin-top: 7px !important;
    }

    .bgmatchleft {
        background-color: #ffb600;
        margin: 0px 0px 10px;
    }

    .bgmatchright {
        background-color: #ffb600;
        margin: 10px 0px 7px;
        padding: 5px;
    }

    .title-name {
        color: #ed1e3c !important;
        padding: 0px 20px !important;
        margin-top: 10px;
        width: 100%;
        font-size: 16px;
        margin-bottom: 2px;
    }

    .title-game1 {
        /* background-image: linear-gradient(to right, #e97524,#dc2534,#af217b,#0b559e) !important; */
        color: #ed1e3c !important;
        padding: 0px 20px !important;
        margin-top: 10px;
        width: 100%;
        font-size: 16px;
        /* text-align: center; */
        margin-bottom: 2px;
        font-weight: bold;
    }

    .login-text1 {
        font-size: 13px;
        background-color: #ccc0;
        color: #ed1e3c;
        text-align: center;
        font-style: normal;
        font-weight: bold;
        text-decoration: inherit;
        border: none;
        border-bottom: 2px solid #ed1e3c;
        width: 60%;
    }

    #points {
        position: relative;
        width: 50%;
        float: right;
        text-align: right;
        font-size: 22px;
    }

    .auto {
        margin: auto;
        float: none;
    }
    </style>
</head>

<body style="overflow:hidden;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div id="points">Score: <?php echo $points;?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-7">
                <h4 class="title-name mb-10">Column A</h4>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-5">
                <h4 class="title-game1 mb-10">Column B</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-7">
                <h4 class="bgmatchright"><span class="des-titlt">A. Builds relationships for customer loyalty </span>
                </h4>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-5">
                <h4 class="bgmatchright"><span class="des-titlt">1. Foundation</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-7">
                <h4 class="bgmatchright"><span class="des-titlt">B. Invests win-win relationships</span></h4>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-5">
                <h4 class="bgmatchright"><span class="des-titlt">2. Intermediate</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-7">
                <h4 class="bgmatchright"><span class="des-titlt">C. Partners with customers to be a customer-centric
                        organization</span></h4>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-5">
                <h4 class="bgmatchright"><span class="des-titlt">3. Advanced</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-7">
                <h4 class="bgmatchright"><span class="des-titlt">D. Maintains relationships for repeat customers</span>
                </h4>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-5">
                <h4 class="bgmatchright"><span class="des-titlt">4. Expert</span></h4>
            </div>
        </div>

        <div class="row" style="margin-top:20px">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 form-group">

                <p class="input-text1">A .
                    <input type="text" name="ans1" class="char11 login-text1 mat1" pos="0" maxlength="1" required
                        autocomplete="off">
                </p>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 form-group">
                <p class="input-text1">B .
                    <input type="text" name="ans2" class="char11 login-text1 mat2" pos="1" maxlength="1" required
                        autocomplete="off">
                </p>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 form-group">
                <p class="input-text1">C .
                    <input type="text" name="ans3" class="char11 login-text1 mat3" pos="2" maxlength="1" required
                        autocomplete="off">
                </p>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 form-group">
                <p class="input-text1">D .
                    <input type="text" name="ans4" class="char11 login-text1 mat4" pos="3" maxlength="1" required
                        autocomplete="off">
                </p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-sm-1 col-md-1 col-lg-1 col-xs-6 auto">
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

    var clsNames = ["mat1", "mat2", "mat3", "mat4"];
    var correct = ["2", "3", "4", "1"]
    var answers = [];
    var points = <?php echo $points;?>;
    // var points = 0;

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

    $(".char11").on("change", function(e) {
        var getcurrent = $(this).attr("pos");
        var value = $(this).val();
        value = value.toLowerCase();
        if (value == correct[getcurrent].toLowerCase()) {
            $(this).css("background", "#c6ffc6");
            points = points + 1;
            $("#points").html("Score: " + points);
            $(this).attr('readonly', true);
        } else {
            $(this).css("background", "#ffdada");
        }
    });
    $(".char11").on("keyup", function(e) {
        var getcurrent = $(this).attr("pos");
        var value = $(this).val();
        value = value.toLowerCase();
        if (value == correct[getcurrent].toLowerCase()) {
            $(this).css("background", "#c6ffc6");

        } else {
            $(this).css("background", "#ffdada");
        }
    });



    function send() {
        $.ajax({
            type: "POST",
            url: "submit_multiselect.php",
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