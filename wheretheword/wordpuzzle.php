<?php
    $words=['Accountability', 'Prioritize', 'Initiative', 'Communicate', 'Collaborate', 'Punctuality' , 'Procrastinate' , 'Resistance' , 'Blaming'];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Where's that word? </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src='js/jquery-ui.min.js'></script>

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

    @media (min-width: 768px) {
        .swal2-popup.swal2-modal.swal2-show {
            width: 450px !important;
        }
        h2#swal2-title {
            font-size: 30px !important;
        }
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
        margin:0 auto;
    }

    /* Style for the div containing the grid */
    #rf-searchgamecontainer {
    
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
        background: #00943a;
    }


    #rf-tablegrid .rf-glowing {
        background: #00943a;
        color: #ffffff;

    }

    #rf-tablegrid .rf-selected {
        background: #00943a;
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
            font-size: 8px;
            margin: 1px;
            padding: 5px 8px !important;
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
            font-size: 9px;
            font-weight: bolder;
            margin: 0px;
            padding: 5px 9px !important;
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

    @media only screen and (min-width: 375px) and (max-width: 425px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 10px;
            margin: 1px;
            padding: 5px 9px !important;
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

    @media only screen and (min-width: 425px) and (max-width: 768px) {
        .rf-tgrid {
            font-family: Arial;
            font-weight: 700;
            font-size: 11px;
            margin: 1px;
            padding: 7px 11px !important;
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
        border: 1px solid #00943b;
    background: #f7d000;
    }

    .log-text {
        font-weight: bolder;
    }

    body {
        font-family: 'FiraSans-Medium';
        width: 100%;
        background-color:transparent !important;
        background-image: url(images/background.png);
    
        background-size: 100% 100%;
        background-attachment: fixed;
    }

    .highlight-text {
        font-size: 18px;
        margin-top: 5px;
    }

    .timer {
        background: #00943b;
    color: white;
    width: 150px;
    padding: 5px;
    border-radius: 4px;
    font-size: 15px;
    margin: 0 auto;
    display: inline-block;
    }

    .submit {
        width: 130px;
    font-size: 18px;
    background: #00943b;
    border: none;
    border-radius: 8px;
    color: white;
    padding: 6px 0px;
    }

    .top-title {
        text-align: center;
        font-size: 18px;
        margin-top: 15px;
        color: #e9695e;
    }
    .swal2-popup.swal2-modal.swal2-show {
    background: #699DD4 !important;
}
h2#swal2-title{
    color: white !important;
}
    </style>
    <div >
         <img width="100%" src="images/header-logo.png" alt="">
    </div>
    <div style="text-align: center;font-size:xx-large; margin:40px 2px;">
         Identify 7 key behaviours that reflect an ownership mindset   
    </div>

    <div class="container-fluid">
        <div class="row" style="display: flex; justify-content:baseline;">
               <div class="progress col-md-12">
                    <div class="progress-bar bg-danger ui-background ui-color" style="width:100%; background:#00943b; ">
                        0 /<?php echo sizeof($words)?>
                    </div>
                </div>
           

    
            <div class="col-sm-8 col-md-7 col-lg-6 col-xs-12 plr0 auto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 plr0">
                    <div class="col-md-12 col-sm-12 col-xs-12 highlight-text text-center">  
                    
                    
                    </div>
                    <div id="theGrid" style="margin-bottom: 15px;"></div>
                </div>
            </div>


            <div class="col-md-12 text-center">
                <div class="timer" id="timer">Time : 00:00:00</div>
            </div>

    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-8 col-md-7 col-lg-7 col-xs-12 auto">
                    <div class="row">
                    <?php 
                    for ($i=0; $i<sizeof($words); $i++){
                            echo '<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6 form-group">
                                   <input type="text" name="ans'.($i+1).'" value="" class="form-control log-text '.$words[$i].'">
                                 </div>';
                    }
                    ?>
                    </div>
                    <div class="row show-btn">
                        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-8 auto">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
                                <input type="button" id="submit" value="Submit" 
                                    class="button-submit submit" style="margin-bottom:10px;">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <script src="js/sweetalert.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script src="js/index1.js"></script>
    <script>
           
    
    var wantToShow = <?php echo sizeof($words)?>;
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
        timer();
    }

    function timer() {
        t = setTimeout(add, 1000);
    }
    timer();


    function progressBar(location) {
        console.log("location-----" + location);
        currrentProgress = (location) * 100 / wantToShow;
        console.log(currrentProgress + "this");
        $(".progress-bar").eq(0).css("width", currrentProgress + "%");
        $(".progress-bar").html((location) + "/" + wantToShow);
    }

    var wordsArray=<?php echo json_encode($words) ?>;
    var words ="<?php echo implode(',', $words);?>";

    var answercount=0;
    var points=0;
    var answers=[];
    function answerAlert(current){
                if(current!=-1){
                    console.log(current);
                    answercount=answercount+1;
                    $("."+wordsArray[current]).val(wordsArray[current]);
                    answers.push(wordsArray[current]);
                    points=points+1;
                    progressBar(answercount);
                }
        }

    $(document).ready(function() {
        $("#theGrid").wordsearchwidget({
            "wordlist" : words,
            "gridsize" : 12,
            "width" : 800});

                    $(".button-submit").click(function(){
                        $.ajax({ 
                                type: "POST", 
                                url: "wordpuzzle-insert.php", 
                                data: "time="+target+"&points="+points+"&answers="+answers.toString(), 
                                success: function(data){ 
                                    console.log(data);
                                    var data = JSON.parse(data);
                                    if(data.success){
                                          Swal.fire({
                                                    title: 'Your score is '+data.score,
                                                    imageUrl: 'images/thankk.png',
                                                    imageWidth: 370,
                                                    imageHeight: 324,
                                                    imageAlt: 'Custom image',
                                                }).then(() => {
                                                    location.href = "../";
                                                });
                                    }else{
                                        alert(data);
                                    }
                                                
                
                                } 
                            });   
                    });


    });
    document.addEventListener('contextmenu', event => event.preventDefault());
 
    </script>


</body>

</html>