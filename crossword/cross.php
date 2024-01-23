<?php

session_start();
$_SESSION['userid']=$_SESSION['token'];
if ($_SESSION['userid']== '') {
    header("Location:index.php");
}

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
              


                        body{
    font-family: 'FiraSans-Medium';
    width:100%;
    background-color: white;
    background-image: url(images/background-web.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
@media (min-width:100px) and (max-width:500px){
    body{
        overflow: scroll;
        background-image: url(images/background-mob.png);
        background-repeat: repeat;
    }
    .desk{
        display: none;
    }
    .mob{
        display: block;
    }
    .container-control{
        margin-top:45px;
    }
   }
.highlight-text{
    font-size:18px;
    margin-top:5px;
}
.timer{
    background: #e9695e;
    color: white;
    width: 150px;
    padding: 5px;
    border-radius: 15px;
    font-size: 15px;
    margin:0 auto;
    display: inline-block;
}
.submit{
    width:130px;
    font-size: 18px;
    background: #e9695e;
    border: none;
    color: white;
}
   

/* //crossword puzzle */

.cross-game {
    color:#ffffff !important;
    background-image: linear-gradient(to right, #E25569 , #FB9946);
    padding: 0px 20px !important;
    margin-top: 0px;
    width: 30%;
    text-align: center;
    border-radius:10px;
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
    
    font-weight:900;
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
    background-image: linear-gradient(to right, #E25569 , #FB9946);

    -webkit-touch-callout: text;
    -webkit-user-select: text;
    -khtml-user-select: text;
    -moz-user-select: text;
    -ms-user-select: text;
    user-select: text;
}

@media (max-width: 320px) {
    .square {
        width: 1.26em !important;
        height: 1.26em !important;
        line-height: 1.27em !important;
    }
}
@media only screen and (min-width: 321px) and (max-width: 426px) {
    .square {
        width: 1.55em !important;
    height: 1.55em !important;
    line-height: 1.55em !important;
    }
}
@media only screen and (min-width: 427px) and (max-width: 768px) {
    .square {
        width: 1.55em !important;
    height: 1.55em !important;
    line-height: 1.55em !important;
    }
}

@media only screen and (min-width: 769px) and (max-width: 1440px) {
    .char {
        font-size: 16px !important;
        width: 1em !important;
        height: 1em !important;

    }
}

.mt-30{
    margin-top: 30px;
}

@media (max-width: 768px) {
    .char {
        font-size: 14px !important;
        width: 1.25em !important;
        height: 1.25em !important;
    }

    .p0{
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
    color:black;
}

.log-text{
     font-weight:bolder;
}
.form-control{
                            border: 1px solid #080808;
                        }

   </style>

    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 highlight-text text-center" style="margin:20px 0px 30px;">TEASE YOUR BRAIN IN THIS FOOD FOR THOUGHT PUZZLE</div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 progress-container" style="margin-top:15px;">
                                <div class="progress">
                                <div class="progress-bar bg-danger ui-background ui-color" style="width:10%; background:#e9695e; ">0/5</div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 text-center" >
                                    <div class="timer" id="timer" >Time : 00:00:00</div>
                        </div>
                    </div>
            </div>

            <div class="container" style="margin:20px 0px 30px;">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <form method="post" id="formdata" name="formdata">
                    <div class="row" style="margin-top:10px;margin-bottom:40px;">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 plr0">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 p0" id="crossword">
                                    <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square">1</div>
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
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans10" type="text" maxlength="1" readonly>
                                        </div>
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
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans11" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                    </div>
                                    <!-- row 2 -->
                                    <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans12" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                    </div>
                                    <!-- row 3 -->
                                    <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square">3</div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans13" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                    </div>
                                    <!-- row 4 -->
                                    <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans30" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans14" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                    </div>
                                    <!-- row 5 -->
                                  <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans31" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square">4</div>
                                        <div class="square letter">
                                            <input class="char ans15" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square">5</div>
                                        <div class="square"></div>
                                </div>

                                    <!-- row 6 -->
                                    <div class="">
                                        <div class="square">2</div>
                                        <div class="square letter">
                                            <input class="char ans20" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans21" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans22 ans32" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans23" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans24" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans25 ans40" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans26 ans16" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans27" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans28 ans50" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans29" type="text" maxlength="1" readonly>
                                        </div>
                                        
                                    </div>

                                    <!-- row 7 -->
                                    <div class="">
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans33" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans41" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square letter">
                                            <input class="char ans17" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans51" type="text" maxlength="1" readonly>
                                        </div>
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
                                            <input class="char ans42" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans52" type="text" maxlength="1" readonly>
                                        </div>
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
                                            <input class="char ans43" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square letter">
                                            <input class="char ans53" type="text" maxlength="1" readonly>
                                        </div>
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
                                            <input class="char ans44" type="text" maxlength="1" readonly>
                                        </div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                        <div class="square"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="cross-game mt-10">ACROSS</div>
                                        <input class="timer" name="timer" type="hidden" />
                                            <input  name="question" value="1" type="hidden" />
                                            <!-- <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"] ?>" > -->
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="game-title1" style="">2. 85% of this berry fruit produce comes from the hills of Mahabaleshwar : <input type="text" name="ans2" class=" log-text  secondans "
                                                    maxlength="10" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                 <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="cross-game mt-30">DOWN</div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                        <div class="game-title1" style="">1. Peppers used to add spice to food    :  <input type="text" name="ans1"
                                                    class="log-text firstans" maxlength="8" 
                                                    autocomplete="off">
                                            </div>  
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="game-title1" style="">3. The historic Red <input type="text" name="ans3" class="log-text thirdans"
                                                    maxlength="4" autocomplete="off"> in Delhi got its name from its red stone </div> 
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="game-title1" style="">4. Not every animal has red <input type="text" name="ans4"
                                                    class=" log-text fourthans" maxlength="5" 
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <div class="game-title1" style="">5. The flower of romance : <input type="text" name="ans5"
                                                    class="log-text fivthans" maxlength="4" autocomplete="off"></div>
                                        </div>
                                    
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-5 auto">
                                                <input type="submit" value="Submit" name="submit" style="margin-bottom:10px;" class="button-submit submit">
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


   /* 
    setTimeout(() => {
        var modal1 = $('#closeGame', window.parent.document);
            modal1.click();
        }, 5000);
        */
        
    var question_count=0;
    var wantToShow=5;

var target,
   seconds =0, minutes =0, hours =0; var t;

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
  

    
    target= (hours ? (hours > 3 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
    $("#timer").html("Time : "+ target);
    $(".timer").val(target);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();

function progressBar(location){
    console.log(location);
    currrentProgress=(location)*100/wantToShow;
    console.log(currrentProgress+"this");
    $(".progress-bar").eq(0).css("width",currrentProgress+"%");
    $(".progress-bar").html((location)+"/"+wantToShow);
}


$(document).ready(function() {
            $('.firstans').change(function() {
                var first=$(this).val().toLowerCase();
                //if(first=='chillies'){
                    question_count=question_count+1;
                    // console.log(question_count);
                    progressBar(question_count);
                 // }else{
                    //swal("Hint", "", "");
                //}
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
                    // $('.ans18').val(wordtochar[8]);
                    // $('.ans19').val(wordtochar[9]);
                    // $('.ans110').val(wordtochar[10]);
                    //    console.log($(this.value));
                    //    console.log(wordtochar[0]);
                }).get();
            
                // $('.ans1').val(valueArray.split(''));
            });
        });

        $(document).ready(function() {
            $('.secondans').change(function() {
                var secondans=$(this).val().toLowerCase();
               // if(secondans=='strawberry'){
                    question_count=question_count+1;
                    // console.log(question_count);
                    progressBar(question_count);
                 // }else{
                    //swal("Hint", "", "");
                //}
            });
            $('.secondans').keyup(function() {
                var wordtochar = this.value.split('');
                // console.log(wordtochar);
                var valueArray = $(wordtochar).map(function() {
                    $('.ans20').val(wordtochar[0]);
                    $('.ans21').val(wordtochar[1]);
                    $('.ans22').val(wordtochar[2]);
                    $('.ans23').val(wordtochar[3]);
                    $('.ans24').val(wordtochar[4]);
                    $('.ans25').val(wordtochar[5]);
                    $('.ans26').val(wordtochar[6]);
                     $('.ans27').val(wordtochar[7]);
                    $('.ans28').val(wordtochar[8]);
                    $('.ans29').val(wordtochar[9]);
                    // $('.ans210').val(wordtochar[10]);

                }).get();
               
                // $('.secondans').val(valueArray.join(''));
            });
        });

        $(document).ready(function() {
            $('.thirdans').change(function() {
                var thirdans=$(this).val().toLowerCase();
                //if(thirdans=='fort'){
                    question_count=question_count+1;
                    // console.log(question_count);
                    progressBar(question_count);
                 // }else{
                    //swal("Hint", "", "");
                //}
            });
            $('.thirdans').keyup(function() {
                var wordtochar = this.value.split('');
                // console.log(wordtochar);
                var valueArray = $(wordtochar).map(function() {
                    $('.ans30').val(wordtochar[0]);
                    $('.ans31').val(wordtochar[1]);
                    $('.ans32').val(wordtochar[2]);
                    $('.ans33').val(wordtochar[3]);
                    // $('.ans34').val(wordtochar[4]);
                    // $('.ans35').val(wordtochar[5]);
                    // $('.ans36').val(wordtochar[6]);
                    // $('.ans37').val(wordtochar[7]);
                    // $('.ans38').val(wordtochar[8]);

                    // $('.thirdans').val(valueArray.join(''));
                }).get();
               
            });
        });

        $(document).ready(function() {
            $('.fourthans').change(function() {
                var fourthans=$(this).val().toLowerCase();
               // if(fourthans=='blood'){
                    question_count=question_count+1;
                    // console.log(question_count);
                    progressBar(question_count);
               // }else{
                    //swal("Hint", "", "");
                //}
            });
            $('.fourthans').keyup(function() {

                var wordtochar = this.value.split('');
                // console.log(wordtochar);
                var valueArray = $(wordtochar).map(function() {
                    $('.ans40').val(wordtochar[0]);
                    $('.ans41').val(wordtochar[1]);
                    $('.ans42').val(wordtochar[2]);
                    $('.ans43').val(wordtochar[3]);
                    $('.ans44').val(wordtochar[4]);
                    // $('.ans45').val(wordtochar[5]);
                    // $('.ans46').val(wordtochar[6]);
                    // $('.ans47').val(wordtochar[7]);
                    // $('.ans48').val(wordtochar[8]);

                }).get();
               
                //$('.fourthans').val(valueArray.join(''));
            });
        });
        $(document).ready(function() {
            $('.fivthans').change(function() {
                var fivthans=$(this).val().toLowerCase();
               // if(fivthans=='rose'){
                    question_count=question_count+1;
                    // console.log(question_count);
                    progressBar(question_count);
                //}else{
                   // swal("Hint", "", "");
                //}
            });
            $('.fivthans').keyup(function() {
                var wordtochar = this.value.split('');
                // console.log(wordtochar);
                var valueArray = $(wordtochar).map(function() {
                    $('.ans50').val(wordtochar[0]);
                    $('.ans51').val(wordtochar[1]);
                    $('.ans52').val(wordtochar[2]);
                    $('.ans53').val(wordtochar[3]);
                    $('.ans54').val(wordtochar[4]);
                    // $('.ans55').val(wordtochar[5]);
                    // $('.ans56').val(wordtochar[6]);
                    // $('.ans57').val(wordtochar[7]);
                    // $('.ans58').val(wordtochar[8]);
                    // $('.ans59').val(wordtochar[9]);
                    // $('.ans510').val(wordtochar[10]);
                    // $('.ans511').val(wordtochar[11]);


                }).get();
               
                // $('.fivthans').val(valueArray.join(''));
            });
        });
        // $(document).ready(function() {
        // 
        //     $('.sixthans').keyup(function() {
        //         var wordtochar = this.value.split('');
        //         // console.log(wordtochar);
        //         var valueArray = $(wordtochar).map(function() {
        //             $('.ans60').val(wordtochar[0]);
        //             $('.ans61').val(wordtochar[1]);
        //             $('.ans62').val(wordtochar[2]);
        //             $('.ans63').val(wordtochar[3]);
        //             $('.ans64').val(wordtochar[4]);
        //             $('.ans65').val(wordtochar[5]);
        //             $('.ans66').val(wordtochar[6]);
        //             $('.ans67').val(wordtochar[7]);
                  
        //         }).get();
        //         // $('.fivthans').val(valueArray.join(''));
        //     });
        // });



$(document).ready(function() {
            $('#formdata').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($("#formdata")[0]);
    $.ajax({
        url: 'crossword-insert.php',
        type: 'POST',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            if(data != "all"){
                var data = JSON.parse(data);
                var token = <?php $_SESSION['token']; ?>
                $.ajax({
                "url": "http://139.59.7.187//api/game-server/report/add",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    //pass the token from session here
                    "Authorization": "Bearer " + token,
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "time": data.time,
                    "points": data.score,
                    "round": data.showName
                }),
                success: function(data){
                    console.log(data);
                if (data.message == "REPORT ADDED SUCCESSFULLY") {
                    swal("Thank you for submission.", "", "success").then(() => {
                                location.href=("rating.php");
                        });
                }
                else{
                        swal("Already play.", "", "success").then(() => {
                                location.href=("rating.php");
                        });
                }
                }
                });
            } else {
                        swal("Already play.", "", "success").then(() => {
                                location.href=("rating.php");
                        });
                }
            
        }
    });
        });
    });
    </script>
    </body>
</html>