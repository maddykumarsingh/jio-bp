<?php

session_start();
$userId=$_SESSION['userId'];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
$_SESSION['userid']=$userId;
if ($_SESSION['userid']== '') {
    header("Location:index.php");
}

if($_SESSION['firstName']=="demo"){
    $demoprint="var isdemo=true;";
  }else{
    $demoprint="var isdemo=false;";
  }

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Down and Across</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <style type="text/css">
    @font-face {
        font-family: 'FiraSans-Medium';
        src: url('fonts/FiraSans-Medium.otf');
    }

    .auto {
        margin: auto;
        float: none;
    }



    body {
        font-family: 'FiraSans-Medium';
        width: 100%;
        background-color: white;
        background-image: url(images/background-web.png);
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    @media (min-width:100px) and (max-width:500px) {
        body {
            overflow: scroll;
            background-image: url(images/background-mob.png);
            background-repeat: repeat;
        }

        .desk {
            display: none;
        }

        .mob {
            display: block;
        }

        .container-control {
            margin-top: 45px;
        }
    }

    .highlight-text {
        font-size: 18px;
        margin-top: 5px;
    }

    .timer {
        background: #e9695e;
        color: white;
        width: 150px;
        padding: 5px;
        border-radius: 15px;
        font-size: 15px;
        margin: 0 auto;
        display: inline-block;
    }

    .submit {
        width: 130px;
        font-size: 18px;
        background: #e9695e;
        border: none;
        color: white;
    }


    /* //crossword puzzle */

    .cross-game {
        color: #ffffff !important;
        background-image: linear-gradient(to right, #E25569, #FB9946);
        padding: 0px 20px !important;
        margin-top: 0px;
        width: 60%;
        text-align: center;
        border-radius: 10px;
        font-size: 16px;
        margin-bottom: 2px;
        font-weight: 600;
    }

    .crossword {
        display: block;
        background-color: rgb(32, 32, 32);
    }

    .square {
        color: black;
        margin: 0 1px 4px 0;
        display: inline-block;
        font-size: 16px;

        font-weight: 900;
        width: 2em;
        height: 2em;
        /* line-height: 1.25em; */
        vertical-align: middle;
        text-align: center;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .char {
        font-size: 16px !important;
        text-transform: uppercase;
        outline: 0;
        border: 0;
        padding: 0;
        font-weight: 900;
        color: #ffffff;
        margin: 0px 0 0 -1px;
        width: 1.35em !important;
        height: 1.45em !important;
        text-align: center;
        background: none;
    }

    .letter {
        background-image: linear-gradient(to right, #E25569, #FB9946);

        -webkit-touch-callout: text;
        -webkit-user-select: text;
        -khtml-user-select: text;
        -moz-user-select: text;
        -ms-user-select: text;
        user-select: text;
    }

    @media (max-width: 320px) {
        .square {
            width: 0.79em !important;
            height: 0.79em !important;
            line-height: 0.80em !important;
        }
    }

    @media only screen and (min-width: 321px) and (max-width: 426px) {
        .square {
            width: 1.0em !important;
            height: 1.0em !important;
            line-height: 1.05em !important;
        }
    }

    @media only screen and (min-width: 427px) and (max-width: 768px) {
        .square {
            width: 1.4em !important;
            height: 1.4em !important;
            line-height: 1.5em !important;
        }
    }

    @media only screen and (min-width: 769px) and (max-width: 1440px) {
        .char {
            font-size: 16px !important;
            width: 1em !important;
            height: 1em !important;

        }
    }

    .mt-30 {
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .char {
            font-size: 12px !important;
            width: 1.25em !important;
            height: 1.25em !important;
        }

        .p0 {
            padding: 0px !important;
        }

        .input-text {
            font-size: 16px !important;
        }

        .title-game {
            font-size: 14px !important;
            padding: 10px 20px !important;
        }

        .game-title1 {
            font-size: 16px !important;
        }
    }

    .game-title1 {
        font-weight: 500;
        font-size: 17px;
        padding: 5px 10px;
        margin-bottom: 8px;
        color: black;
    }

    .log-text {
        font-weight: bolder;
    }

    .form-control {
        border: 1px solid #080808;

    }

    input {
        border: 2px solid black;
    }
    </style>
    <?php include("../actions-default.php");  back("rules.php");?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 highlight-text text-center"
                style="margin:20px 0px 30px;font-weight:bold;">TEASE YOUR BRAIN IN THIS FOOD FOR THOUGHT PUZZLE</div>
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 progress-container" style="margin-top:15px;">
                <div class="progress">
                    <div class="progress-bar bg-danger ui-background ui-color" style="width:10%; background:#e9695e; ">
                        0/3</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 text-center">
                <div class="timer" id="timer">Time : 00:00:00</div>
            </div>
        </div>
    </div>

    <div class="container" style="margin:20px 0px 30px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <form method="post" id="formdata" name="formdata">
                    <div class="row" style="margin-top:10px;margin-bottom:40px;">
                        <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12 plr0">
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12 p0 auto" id="crossword">
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square">3</div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>

                                <!-- row 1 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans30" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans31" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <!-- row 2 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square">2</div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans32" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <!-- row 3 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans20" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans33" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <!-- row 4 -->
                                <div class="">
                                    <div class="square">1</div>
                                    <div class="square letter">
                                        <input class="char ans10" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans11 ans21" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans12" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans13" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans14" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans15 ans34" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans16" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans17" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans18" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans19" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square letter">
                                        <input class="char ans110" type="text" maxlength="1" readonly>
                                    </div>
                                </div>
                                <!-- row 5 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans22" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans35" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>

                                <!-- row 6 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans23" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans36" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>

                                <!-- row 7 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans37" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>

                                <!-- row 8 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans38" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <!-- row 9 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans39" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>
                                <!-- row 10 -->
                                <div class="">
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square letter">
                                        <input class="char ans310" type="text" maxlength="1" readonly>
                                    </div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                    <div class="square"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="cross-game mt-10">ACROSS</div>
                                    <input class="timer" id="timerid" name="timer" type="hidden" />
                                    <input name="question" value="1" type="hidden" />
                                    <!-- <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"] ?>" > -->
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="game-title1" style="">1. To share ideas and connect <input type="text"
                                            name="ans1" class="login-text firstans" maxlength="11" autocomplete="off">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="cross-game mt-30">DOWN</div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="game-title1">2. Something that joins groups / teams together <input
                                            type="text" name="ans2" class=" login-text secondans" maxlength="4"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                    <div class="game-title1">3. An agreement between two people / teams <input
                                            type="text" name="ans3" class="login-text thirdans" maxlength="11"
                                            autocomplete="off"> </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-5 auto">
                                    <input type="submit" value="Submit" id="submit" name="submit"
                                        style="margin-bottom:10px;border-radius:5px;" class="button-submit submit">
                                </div>
                            </div>
                        </div>

                    </div>



            </div>
        </div>
        </form>

    </div>
    </div>




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php 
if(isset($redirectBack)){
    echo 'window.parent.redirectBack();';
}
?>

    <?php echo $demoprint;?>

    var question_count = 0;
    var wantToShow = 3;

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
        $("#timerid").val(target);



        timer();

        var democount = "<?php echo $sessionId;?>";
        if (democount == "demobypass") {
            var time = $("#timerid").val();
            if (time == "00:00:30") {
                document.getElementById("submit").click();
            }
        }

    }

    function timer() {
        t = setTimeout(add, 1000);
    }
    timer();



    function progressBar(location) {
        console.log("location----" + location);
        currrentProgress = (location) * 100 / 3;
        console.log(currrentProgress + "this");
        $(".progress-bar").eq(0).css("width", currrentProgress + "%");
        $(".progress-bar").html((location) + "/" + wantToShow);

    }


    $(document).ready(function() {
        $('.firstans').change(function() {
            var first = $(this).val().toLowerCase();

            if ($(this).val().length == 4) {
                question_count = question_count + 1;
                progressBar(question_count);
            }

        });
        $('.firstans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans10').val(wordtochar[0]);
                $('.ans11').val(wordtochar[1]);
                $('.ans12').val(wordtochar[2]);
                $('.ans13').val(wordtochar[3]);
                $('.ans14').val(wordtochar[4]);
                $('.ans15').val(wordtochar[5]);
                $('.ans16').val(wordtochar[6]);
                $('.ans17').val(wordtochar[7]);
                $('.ans18').val(wordtochar[8]);
                $('.ans19').val(wordtochar[9]);
                $('.ans110').val(wordtochar[10]);
            }).get();

            // $('.ans1').val(valueArray.split(''));
        });
    });

    $(document).ready(function() {
        $('.secondans').change(function() {
            var secondans = $(this).val().toLowerCase();
            if ($(this).val().length == 7) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
        });
        $('.secondans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans20').val(wordtochar[0]);
                $('.ans21').val(wordtochar[1]);
                $('.ans22').val(wordtochar[2]);
                $('.ans23').val(wordtochar[3]);
                // $('.ans24').val(wordtochar[4]);
                // $('.ans25').val(wordtochar[5]);
                // $('.ans26').val(wordtochar[6]);
                // $('.ans27').val(wordtochar[7]);
            }).get();

            // $('.secondans').val(valueArray.join(''));
        });
    });

    $(document).ready(function() {
        $('.thirdans').change(function() {
            var thirdans = $(this).val().toLowerCase();

            if ($(this).val().length == 13) {
                question_count = question_count + 1;
                progressBar(question_count);
            }


        });
        $('.thirdans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans30').val(wordtochar[0]);
                $('.ans31').val(wordtochar[1]);
                $('.ans32').val(wordtochar[2]);
                $('.ans33').val(wordtochar[3]);
                $('.ans34').val(wordtochar[4]);
                $('.ans35').val(wordtochar[5]);
                $('.ans36').val(wordtochar[6]);
                $('.ans37').val(wordtochar[7]);
                $('.ans38').val(wordtochar[8]);
                $('.ans39').val(wordtochar[9]);
                $('.ans310').val(wordtochar[10]);
                // $('.ans311').val(wordtochar[11]);
                // $('.ans312').val(wordtochar[12]);

                // $('.thirdans').val(valueArray.join(''));
            }).get();

        });
    });



    $(document).ready(function() {
        $('#formdata').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($("#formdata")[0]);
            $.ajax({
                url: "crossword-insert.php",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(d) {

                    var data = JSON.parse(d);
                    if (data.success == "true") {
                        swal("Thank you for submission", "",
                            "success").then(() => {
                            location.href = ("../thankyou.php");
                        });


                    } else if (d == 1) {
                        swal("Thank you for playing.Subscribe to any PLAN to play with your peers.",
                            "",
                            "success").then(() => {
                            location.href = ("../thankyou.php");
                        });
                    }



                }
            });
        });
    });
    </script>

<script>

document.addEventListener('contextmenu', event=> event.preventDefault()); 
document.onkeydown = function(e) { 
if(event.keyCode == 123) { 
return false; 
} 
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){ 
return false; 
} 
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){ 
return false; 
} 
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){ 
return false; 
} 
} 
</script> 

*</body>

</html>