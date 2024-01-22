$(document).ready(function () {

    local_data = data;

    headingTopic = "GK";
    faces=0;

    var Objarr = local_data[0][headingTopic];
    // console.log(Objarr[0]);

    var points = 0;
    var wrongGuesses = 0;
    // var randomCategoryArray;
    var randomWord;
    var randomWordArray;
    var gamecount = 0;

 
        $('.tab').children().each(function (index) {
            $(this).prop("enabled", "true");
            $(this).removeClass("used");
        });
        wrongGuesses = 0;
        $("#container").empty();
        callfunction();
        $("#startbtn").css("display", "none");
    


    $("#nextbtn").on("click", function () {


        $('.tab').children().each(function (index) {
            $(this).prop("enabled", "true");
            $(this).removeClass("used");
        });
        wrongGuesses = 0;
        $("#container").empty();
        callfunction();
        $("#nextbtn").css("display", "none");
    });


    function callfunction() {

        $(".category").text("");
        console.log(gamecount, Objarr.length);

        randomWordArray = [];
        $("#container").show();
        $('.tab').children().each(function (index) {
            $(this).prop("disabled", false);

        });

        var ques =Objarr[gamecount].ques;
        $(".question").text(ques);
        var answord = Objarr[gamecount].ans;
        randomWord = answord.toUpperCase();
        // console.log(randomWord);
        randomWordArray = answord.split("");


        for (var i = 0; i < randomWord.length; i++) {
            $('#container').append('<div class="letter ' + i + '"></div>');
            $('#container').find(":nth-child(" + (i + 1) + ")").text(randomWordArray[i]);
            $(".letter").css("color", "#4ABDAC");
        }

        // Button click function

    }

    $("button").on("click", function () {
        $(this).addClass("used");

        $(this).prop("disabled", "true");
        var matchFound = false;
        // Check if clicked letter is in secret word
        var userGuess = $(this).text();
        console.log(userGuess);
        for (var i = 0; i < randomWord.length; i++) {
            if (userGuess === randomWord.charAt(i)) {
                $('#container').find(":nth-child(" + (i + 1) + ")").css("color", "#EFEFEF").addClass("winner");
                matchFound = true;
            }
        }

        //Check for winner
        var goodGuesses = [];
        $(".letter").each(function (index) {
            if ($(this).hasClass("winner")) {
                goodGuesses.push(index);
                if (goodGuesses.length === randomWordArray.length) {
                    points = points + 1;
                    $("button").prop("disabled", "true");
                    faces=faces+1;
                    console.log("faces "+faces);
                    $("#hangman").attr("src", "images/faces/" + faces + ".png");
                    $(".category").text("congratulations you guessed right answer");
                    correct.play();
                    $("#points").text("Points:" + points);

                    $("#container").hide();
                    gamecount = gamecount + 1;
                    console.log(gamecount, Objarr.length);

                    if (gamecount < Objarr.length) {
                        $("#nextbtn").css({
                            "display": "block"
                        });
                    } else {
                        var score = $("#points").text();
                        score = score.split(":")[1];
                        $.ajax({
                            type: "POST",
                            url: "spot-submit.php",
                            data: "time=" +target + "&points=" + score+"&answers=null",
                            success: function (result) {
                                console.log(result);
                                if(result=="1010"){
                                    console.log(result);
                                    swal("Thank you for submission.", "", "success").then(() => {
                                        window.parent.closeGame();
                                });
                                   }
                            }
                        });
                    }
                    // callfunction();
                    // $(".category").append("<br><button enabled class='play-again'>Play again?</button>");

                }
            }
        });

        // If no match, increase count and add appropriate image
        if (matchFound === false) {
            wrongGuesses += 1;
        }

        // If wrong guesses gets to 7 exit the game
        if (wrongGuesses === 7) {
            $("#container").hide();
            $("button").prop("disabled", "true");
            incorrect.play();
            $(".category").text("incorrect answer!  correct answer is " + randomWord);
            console.log(gamecount, Objarr.length);
            gamecount = gamecount + 1;
            $("#container").hide();

            if (gamecount < Objarr.length) {
                $("#nextbtn").css({
                    "display": "block"
                });
            } else {
                        var score = $("#points").text();
                        score = score.split(":")[1];
                        $.ajax({
                            type: "POST",
                            url: "spot-submit.php",
                            data: "time=" +target + "&points=" + score+"&answers=null",
                            success: function (result) {
                                console.log(result);
                                if(result=="1010"){
                                    console.log(result);
                                    swal("Thank you for submission.", "", "success").then(() => {
                                        window.parent.closeGame();
                                });
                                   }
                            }
                        });
                   


            }


            // $(".category").append("<br><button enabled class='play-again'>Play again?</button>");
        }

    }); // End button click


    $(".play-again").on("click", function () {
        alert(play - again);
        callfunction();
        $("#container").show();
        $("#nextbtn").css("display", "none");
        //location.reload();
    });

}); // End document.ready
