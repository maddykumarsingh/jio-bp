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
        margin-top: 0px;
        width: 60%;
        text-align: center;
        border-radius: 10px;
        font-size: 16px;
        margin-bottom: 2px;
        font-weight: 600;
        padding: 2px;
        font-size: 20px;
        width: 110px;
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
        width: 1.9em;
        height: 1.9em;
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

    @media only screen and (min-width: 769px) {
        .char {
            font-size: 16px !important;
            width: 1em !important;
            height: 1em !important;

        }

        div#crossword {
            margin-top: 20%;
        }
    }

    @media only screen and (min-width: 769px) and (max-width: 1100px) {
        .char {
            font-size: 16px !important;
            width: 1em !important;
            height: 1em !important;

        }

        .square {
            width: 1.4em !important;
            height: 1.4em !important;
            line-height: 1.5em !important;
        }
    }

    @media only screen and (min-width: 770px) and (max-width: 865px) {
        .char {
            font-size: 16px !important;
            width: 1em !important;
            height: 1em !important;

        }

        .square {
            width: 1.1em !important;
            height: 1.2em !important;
            line-height: 1.1em !important;
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
        font-size: 15px;
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

    /* .square{
    border: 1px solid black;
} */
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 highlight-text text-center"
                style="margin:20px 0px 30px;font-weight:bold;">How well do you know your Life Insurance?</div>
            <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 progress-container" style="margin-top:15px;">
                <div class="progress">
                    <div class="progress-bar bg-danger ui-background ui-color" style="width:10%; background:#e9695e; ">
                        0/9</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 text-center">
                <div class="timer" id="timer">Time : 00:00:00</div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin:20px 0px 30px;">

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
                            <div class="square"></div>
                            <div class="square">1</div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <!-- <div class="square"></div>
                                        <div class="square"></div>
					                    <div class="square"></div>	 -->
                        </div>

                        <!-- row 1 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square">2</div>
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
                            <div class="square"></div>

                            <div class="square"></div>
                            <!--<div class="square"></div>
					                    <div class="square"></div> -->
                        </div>

                        <!-- row 2 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans20" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square">3</div>
                            <div class="square letter">
                                <input class="char ans30" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans31 ans11" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans32" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans33" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans34" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans35" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square letter">
                                <input class="char ans36" type="text" maxlength="1" readonly>
                            </div>
                            <!-- row 3 -->
                        </div>
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans21" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans13" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square">5</div>
                            <div class="square"></div>

                            <div class="square"></div>
                        </div>

                        <!-- row 4 -->
                        <div class="">
                            <div class="square">4</div>
                            <div class="square letter">
                                <input class="char ans40" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans41" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans42 ans22" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans43" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans44" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans45" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans46" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square letter">
                                <input class="char ans47 ans10" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans48" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans49" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans410 ans50" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans411" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square"></div>

                        </div>

                        <!-- row 5 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans23" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square">6</div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans14" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans51" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>

                            <div class="square"></div>
                        </div>

                        <!-- row 6 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans24" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans60" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square">7</div>

                            <div class="square letter">
                                <input class="char ans70 ans15" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans71" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans72" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans73 ans52" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans74" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square"></div>

                        </div>

                        <!-- row 7 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans61" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans17" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans53" type="text" maxlength="1" readonly>
                            </div>
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
                            <div class="square letter">
                                <input class="char ans62" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans17" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans54" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                        </div>
                        <!-- row 9 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square">8</div>
                            <div class="square letter">
                                <input class="char ans80" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans81 ans63" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans82" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans83" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square letter">
                                <input class="char ans84 ans18" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans55" type="text" maxlength="1" readonly>
                            </div>
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
                            <div class="square letter">
                                <input class="char ans64" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square letter">
                                <input class="char ans56" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>
                        </div>
                        <!-- row 11 -->
                        <div class="">
                            <div class="square">9</div>
                            <div class="square letter">
                                <input class="char ans90" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans91" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans92" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans93" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans94 ans65" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans95 " type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans96" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square letter">
                                <input class="char ans97" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square letter">
                                <input class="char ans98" type="text" maxlength="1" readonly>
                            </div>

                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans57" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                        </div>
                        <!-- row 12 -->
                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans66" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans58" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                        </div>

                        <div class="">
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square letter">
                                <input class="char ans67" type="text" maxlength="1" readonly>
                            </div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>
                            <div class="square"></div>

                            <div class="square"></div>
                            <div class="square"></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5 col-xs-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="cross-game mt-10">ACROSS</div>
                            <input class="timer" id="timerid" name="timer" type="hidden" />
                            <input name="question" value="1" type="hidden" />
                            <!-- <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"] ?>" > -->
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1" style=""> 3. A person (Generally child, spouse or parents) who gets
                                the sum assured as per the terms and conditions of your plan <input type="text"
                                    name="ans3" id="ans3" class="login-text thirdans" maxlength="7" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">4. It is the lump sum amount that a nominee receives when the life
                                insured dies within the policy period.<input type="text" name="ans4" id="ans4"
                                    class="login-text  fourthans" maxlength="12" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">7. It is the end of the benefits or privileges applicable under a
                                policy. It happens due to the non-payment of premium or any inactivity<input type="text"
                                    name="ans7" id="ans7" class="login-text seventhans" maxlength="5"
                                    autocomplete="off">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">8. It is an estimate of premium for the insurance coverage you
                                selected and information you entered<input type="text" name="ans8" id="ans8"
                                    class="login-text eightans" maxlength="5" autocomplete="off">
                            </div>


                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">9. It is the formal ending of a reinsurance agreement by its
                                natural expiration, cancellation, or commutation by the parties<input type="text"
                                    name="ans9" id="ans9" class="login-text ninthans" maxlength="9" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="cross-game mt-30">DOWN</div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">1. It is a type of life cover that provides insurance coverage to
                                two people under the same policy. The claim is payable either on the first death or last
                                survivor basis. <input type="text" name="ans1" id="ans1" class="login-text firstans"
                                    maxlength="9" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">2. It is the specific additional time you get after the due date to
                                pay the premium and avoid a policy lapse<input type="text" name="ans2" id="ans2"
                                    class="login-text secondans" maxlength="5" autocomplete="off"> </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">5. It is a contract (policy) in which an insurer indemnifies
                                another against losses from specific contingencies or perils<input type="text"
                                    name="ans5" id="ans5" class=" login-text fivthans" maxlength="9" autocomplete="off">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <div class="game-title1">6. On this specific date, an investment becomes due and is paid
                                back to the investor<input type="text" name="ans6" id="ans6"
                                    class=" login-text sixthans" maxlength="8" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-5 auto">
                            <input type="submit" value="Submit" id="submit" name="submit" style="margin-bottom:10px;"
                                class="button-submit submit">
                        </div>
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
    var wantToShow = 9;

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
            if (time == "00:5:00") {
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
        currrentProgress = (location) * 100 / wantToShow;
        console.log(currrentProgress + "this");
        $(".progress-bar").eq(0).css("width", currrentProgress + "%");
        $(".progress-bar").html((location) + "/" + wantToShow);

    }


    $(document).ready(function() {
        $('.firstans').change(function() {
            var first = $(this).val().toLowerCase();
            if (first == "jointlife") {
                $("#ans1").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans1").css({
                    "background-color": "red",
                    "color": "white"
                })
            }

            if ($(this).val().length == 9) {
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
                // $('.ans110').val(wordtochar[10]);
            }).get();

            // $('.ans1').val(valueArray.split(''));
        });
    });

    $(document).ready(function() {
        $('.secondans').change(function() {
            var secondans = $(this).val().toLowerCase();
            if ($(this).val().length == 5) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (secondans == "grace") {
                $("#ans2").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans2").css({
                    "background-color": "red",
                    "color": "white"
                })
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
                $('.ans24').val(wordtochar[4]);

            }).get();

            // $('.secondans').val(valueArray.join(''));
        });
    });

    $(document).ready(function() {
        $('.thirdans').change(function() {
            var thirdans = $(this).val().toLowerCase();

            if ($(this).val().length == 7) {
                question_count = question_count + 1;
                progressBar(question_count);
            }

            if (thirdans == "nominee") {
                $("#ans3").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans3").css({
                    "background-color": "red",
                    "color": "white"
                })
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
                // $('.ans37').val(wordtochar[7]);
                // $('.ans38').val(wordtochar[8]);
                // $('.ans39').val(wordtochar[9]);
                // $('.ans310').val(wordtochar[10]);
                // $('.ans311').val(wordtochar[11]);
                // $('.ans312').val(wordtochar[12]);

                // $('.thirdans').val(valueArray.join(''));
            }).get();

        });
    });

    $(document).ready(function() {
        $('.fourthans').change(function() {
            var fourthans = $(this).val().toLowerCase();
            if ($(this).val().length == 12) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (fourthans == "deathbenefit") {
                $("#ans4").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans4").css({
                    "background-color": "red",
                    "color": "white"
                })
            }
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
                $('.ans45').val(wordtochar[5]);
                $('.ans46').val(wordtochar[6]);
                $('.ans47').val(wordtochar[7]);
                $('.ans48').val(wordtochar[8]);
                $('.ans49').val(wordtochar[9]);
                $('.ans410').val(wordtochar[10]);
                $('.ans411').val(wordtochar[11]);

            }).get();

            //$('.fourthans').val(valueArray.join(''));
        });
    });

    $(document).ready(function() {
        $('.fivthans').change(function() {
            var fivthans = $(this).val().toLowerCase();
            if ($(this).val().length == 9) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (fivthans == "insurance") {
                $("#ans5").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans5").css({
                    "background-color": "red",
                    "color": "white"
                })
            }

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
                $('.ans55').val(wordtochar[5]);
                $('.ans56').val(wordtochar[6]);
                $('.ans57').val(wordtochar[7]);
                $('.ans58').val(wordtochar[8]);
                // $('.ans59').val(wordtochar[9]);
                // $('.ans510').val(wordtochar[10]);
                // // $('.ans511').val(wordtochar[11]);

            }).get();

            // $('.fivthans').val(valueArray.join(''));
        });
    });
    $(document).ready(function() {
        var sum = [];
        $('.sixthans').change(function() {
            var sixth = $(this).val().toLowerCase();
            if ($(this).val().length == 8) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (sixth == "maturity") {
                $("#ans6").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans6").css({
                    "background-color": "red",
                    "color": "white"
                })
            }

        });

        $('.sixthans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans60').val(wordtochar[0]);
                $('.ans61').val(wordtochar[1]);
                $('.ans62').val(wordtochar[2]);
                $('.ans63').val(wordtochar[3]);
                $('.ans64').val(wordtochar[4]);
                $('.ans65').val(wordtochar[5]);
                $('.ans66').val(wordtochar[6]);
                $('.ans67').val(wordtochar[7]);
                // $('.ans68').val(wordtochar[8]);
                // $('.ans69').val(wordtochar[9]);
                // $('.ans610').val(wordtochar[10]);

            }).get();
            // $('.fivthans').val(valueArray.join(''));
        });
    });



    $(document).ready(function() {
        var sum = [];
        $('.seventhans').change(function() {
            var seventhans = $(this).val().toLowerCase();
            if ($(this).val().length == 5) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (seventhans == "lapse") {
                $("#ans7").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans7").css({
                    "background-color": "red",
                    "color": "white"
                })
            }

        });

        $('.seventhans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans70').val(wordtochar[0]);
                $('.ans71').val(wordtochar[1]);
                $('.ans72').val(wordtochar[2]);
                $('.ans73').val(wordtochar[3]);
                $('.ans74').val(wordtochar[4]);
                $('.ans75').val(wordtochar[5]);


            }).get();
            // $('.fivthans').val(valueArray.join(''));
        });
    });
    $(document).ready(function() {
        var sum = [];
        $('.eightans').change(function() {
            var eigthans = $(this).val().toLowerCase();
            if ($(this).val().length == 5) {
                question_count = question_count + 1;
                progressBar(question_count);
            }

            if (eigthans == "quote") {
                $("#ans8").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans8").css({
                    "background-color": "red",
                    "color": "white"
                })
            }
        });

        $('.eightans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans80').val(wordtochar[0]);
                $('.ans81').val(wordtochar[1]);
                $('.ans82').val(wordtochar[2]);
                $('.ans83').val(wordtochar[3]);
                $('.ans84').val(wordtochar[4]);
                $('.ans85').val(wordtochar[5]);


            }).get();
            // $('.fivthans').val(valueArray.join(''));
        });
    });
    $(document).ready(function() {
        var sum = [];
        $('.ninthans').change(function() {
            var ninthans = $(this).val().toLowerCase();
            if ($(this).val().length == 9) {
                question_count = question_count + 1;
                progressBar(question_count);
            }
            if (ninthans == "terminate") {
                $("#ans9").css({
                    "background-color": "green",
                    "color": "white"
                });
            } else {
                $("#ans9").css({
                    "background-color": "red",
                    "color": "white"
                })
            }

        });

        $('.ninthans').keyup(function() {
            var wordtochar = this.value.split('');
            // console.log(wordtochar);
            var valueArray = $(wordtochar).map(function() {
                $('.ans90').val(wordtochar[0]);
                $('.ans91').val(wordtochar[1]);
                $('.ans92').val(wordtochar[2]);
                $('.ans93').val(wordtochar[3]);
                $('.ans94').val(wordtochar[4]);
                $('.ans95').val(wordtochar[5]);
                $('.ans96').val(wordtochar[6]);
                $('.ans97').val(wordtochar[7]);
                $('.ans98').val(wordtochar[8]);
                $('.ans99').val(wordtochar[9]);


            }).get();
            // $('.fivthans').val(valueArray.join(''));
        });
    });

    $(document).ready(function() {
        $('#formdata').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($("#formdata")[0]);
            $.ajax({
                url: "crossword-insert-abc.php",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(d) {
console.log(d);
                    var data = JSON.parse(d);
                    if (data.success == "true") {
                        // swal("Thank you for submission", "",
                        //     "success").then(() => {
                        //     location.href = ("../thankyou.php");
                        // });

                        location.href = ("leaderboard.php");
                    } else if (d == 1) {
                        swal("Thank you for playing.Subscribe to any PLAN to play with your peers.",
                            "",
                            "success").then(() => {
                            location.href = ("https://extramileplay.com/plans");
                        });
                    }



                }
            });
        });
    });
    </script>

    <script>
    // document.addEventListener('contextmenu', event=> event.preventDefault()); 
    // document.onkeydown = function(e) { 
    // if(event.keyCode == 123) { 
    // return false; 
    // } 
    // if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){ 
    // return false; 
    // } 
    // if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){ 
    // return false; 
    // } 
    // if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){ 
    // return false; 
    // } 
    // } 
    </script>
</body>

</html>