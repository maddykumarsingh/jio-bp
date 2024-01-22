<?php

$questions=array("IMDs can reach out to LGI via WhatsApp and can get the relevant details within 2-3 steps through a BOT",
"BOTs will read the queries, understand them and remediate or provide the information/solution over WhatsApp as a reply to their request",
"This BOT service is limited to certain working hours only",
"This BOT service reduces productivity of SMs",
"Contact details cannot be updated through the helpdesk service",
"Current offering of IMDs in the Liberty Partner Helpdesk will be Motor and Health only",
"This is a common offering by majority of LGI competitors");
$answers=array("true","true","false","false","false","true","false");



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
        <style type="stylesheet">

        </style>
        </head>
    <body>

            <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="col-md-12">
                      <div id="timer">Time: 00:00:00</div>
                      <ul id="example1">
                      <?php 
                      for($i=0; $i<sizeOf($questions); $i++){
                          echo '<li><div class="list-number">'.($i+1).'</div>'.$questions[$i].'-<input type="text" class="get-answer"/></li>';
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


    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
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
  
    
   /* 
    setTimeout(() => {
        var modal1 = $('#closeGame', window.parent.document);
            modal1.click();
        }, 5000);
        */
        var correct=<?php echo json_encode($answers)?>;
        var collectAnswers=[];
        var userAnswers=[];
        var points=0;
        var questionLength=<?php echo sizeOf($questions);?>;
        function prepareArray(){
            collectAnswers=[];
            for(var i=0; i<questionLength; i++){
                var value=$(".get-answer").eq(i).val();
                value=value.trim();
                value=value.toLowerCase();
                collectAnswers.push(value);
                if(correct[i]==value){
                    userAnswers.push(correct[i]);
                    points=points+1;
                    console.log("correct");
                }else{
                    console.log("incorrect");
                }
            }
            send();
        }

function send(){
                      $.ajax({ 
                                type: "POST", 
                                url: "submit_tf.php", 
                                data: "time="+target+"&points="+points+"&answers="+collectAnswers.toString(), 
                                success: function(result){ 
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
 
$(".button-submit").click(function(){
    prepareArray();
});
        

    </script>
    </body>
</html>