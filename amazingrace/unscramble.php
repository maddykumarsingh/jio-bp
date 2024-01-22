<?php
session_start();
$userid=$_SESSION['userId'];
if ($userid== '') {
    $redirectBack=true;
}

$questions=array("Be _________  -   VTETATNIE",
"Foresee _________ trends  -    GINHCAGN",
"Have the right ________    - SOTOL");
$answers=array("attentive","changing","tools");



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
    <style>
    #points {
        position: relative;
        width: 50%;
        float: right;
        text-align: right;
        font-size: 22px;
    }

    #example1 li input {
        height: 31px !important;
    }

    #timer {
        width: 50%;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div id="timer">Time: 00:00:00</div>
                </div>
                <div class="col-md-6">
                    <div id="points">Score: 0</div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <ul id="example1">
                        <?php 
                      for($i=0; $i<sizeOf($questions); $i++){
                          echo '<li><div class="list-number" style="color:black;">'.($i+1).'</div>'.$questions[$i].'-<input type="text"  pos="'.$i.'" class="get-answer unscramble-input"/></li>';
                      }
                      ?>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <input type="submit" value="Submit" name="submit" class="button-submit" style="margin-bottom:10px;">
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



        target = (hours ? (hours > 3 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes :
            "0" +
            minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
        $("#timer").html("Time : " + target);
        $(".timer").val(target);

        timer();
    }

    function timer() {
        t = setTimeout(add, 1000);
    }
    timer();


    /* 
     setTimeout(() => {
         var modal1 = $('#closeGame', window.parent.document);
             modal1.click();
         }, 5000);
         */
    var correct = <?php echo json_encode($answers)?>;
    var collectAnswers = [];
    var userAnswers = [];
    var points = 0;
    var questionLength = <?php echo sizeOf($questions);?>;
    var isSend = false;

    function prepareArray() {
        collectAnswers = [];
        for (var i = 0; i < questionLength; i++) {
            var value = $(".get-answer").eq(i).val();
            value = value.trim();
            value = value.toLowerCase();
            collectAnswers.push(value);
            if (correct[i] == value) {
                userAnswers.push(correct[i]);
                // points = points + 1;

                console.log("correct");
            } else {
                console.log("incorrect");
            }
        }
        send();
    }


    function send() {
        $.ajax({
            type: "POST",
            url: "submit_unscramble.php",
            data: "time=" + target + "&points=" + points + "&answers=" + collectAnswers.toString(),
            success: function(result) {
                console.log(result);
                if (result == "1010") {
                    isSend = true;
                    $('#myModal').modal('show');
                    setTimeout(function() {
                        window.parent.closeGame();
                    }, 3000);
                }
            }
        });
    }
    $(".get-answer").on("change", function(e) {
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
    $(".get-answer").on("keyup", function(e) {
        var getcurrent = $(this).attr("pos");
        var value = $(this).val();
        value = value.toLowerCase();
        if (value == correct[getcurrent].toLowerCase()) {
            $(this).css("background", "#c6ffc6");

        } else {
            $(this).css("background", "#ffdada");
        }
    });

    $(".button-submit").click(function() {
        if (!isSend) {
            prepareArray();
        } else {
            window.parent.closeGame();
        }
    });
    </script>
</body>

</html>