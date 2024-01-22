

// $(document).on("keydown", function (e) {
//   if (e.key == "F5" || e.key == "F12" || 
//     (e.ctrlKey == true && (e.key == 'r' || e.key == 'R')) || 
//     e.keyCode == 116 || e.keyCode == 82) {

//     e.preventDefault();
// }
// });		
var visitedquestions = [];
//Prints dice roll to the page

function printNumber(number) {
	var placeholder = document.getElementById('placeholder');
	placeholder.innerHTML = number;
}

var button = document.getElementById('dice');
function diceroll(){
      var dice = $("#dice");
        $(".wrap").append("<div id='dice_mask'></div>");//add mask
        dice.attr("class","dice");//After clearing the last points animation
        dice.css('cursor','default');
        var num = Math.floor(Math.random()*6+1);//random num 1-6
        dice.animate({left: '+2px'}, 100,function(){
          dice.addClass("dice_t");
        }).delay(200).animate({top:'-2px'},100,function(){
          dice.removeClass("dice_t").addClass("dice_s");
        }).delay(200).animate({opacity: 'show'},600,function(){
          dice.removeClass("dice_s").addClass("dice_e");
        }).delay(100).animate({left:'-2px',top:'2px'},100,function(){
          dice.removeClass("dice_e").addClass("dice_"+num);
          $("#result").html("Your dice count is<span>"+num+"</span>");
          dice.css('cursor','pointer');
          $("#dice_mask").remove();//remove mask
        });
        return num;
     }
button.onclick = function() {
  if(visitedquestions.length == 23){
    window.onbeforeunload = null;
    alert('You have completed all questions. Thank You for playing')
    window.location.replace('index.php')
  }
   var result = diceroll();
   // var result = 3;
  printNumber(result);
  var inputtype = parseInt($('.current_position').attr('id'))

	var addedValue = inputtype+result
	if (addedValue > 24) {
    setRoundScore();
    increment();
    getPlayerScore();
    $("#"+inputtype).removeClass('current_position')
    var addedValue = addedValue - 24
    if (addedValue == 0) {
     $("#1").addClass('current_position')
   }else{
     $("#"+addedValue).addClass('current_position')	
   }

 }
 $("#"+addedValue).addClass('current_position')
 $("#"+inputtype).removeClass('current_position')
 console.log(inputtype ,addedValue)


 if(addedValue != 1){
  setTimeout(function() {
   $('#myModal').modal('show');
}, 1200);
  
}	
if($('#is_visited_'+addedValue).val() == '0'){
     	visitedquestions.push(addedValue)
     	fetchquestiondetails(addedValue,result)
     }else{
      if(addedValue == 7 || addedValue == 13 || addedValue == 19){
        fetchquestiondetails(addedValue,result)
      }else{
        $("#roll-dice-message").css('display','none')
        fetchrandomfacts(addedValue)
      }

    }
  };

 $(document).ready(function () {
   window.onbeforeunload = function() {
     return false
   }  
   if (performance.navigation.type == 1) {
     var userid = "<?php echo $_SESSION['userid'];?>";
     $.ajax({
       type : "POST",
       url  : "ajaxcall/deleteQuestions.php",
       data:{
         'userid': userid
       },
       success:function(response){
         console.log()
       }
     });
   }
   $('#myModal').modal({backdrop: 'static', keyboard: false})  
   $('#myModal').modal('hide');
 });

 function fetchquestiondetails(addedValue,result){
   $.ajax({
     type : "POST",
     url  : "ajaxcall/checkQuestions.php",
     data : {
      'addedValue':addedValue,
    },
    success:function(response){
      $(".dice-info").css('display','block')
      var form = '<form method = "POST" id="submit_question_answer" name="submit_question_answer" autocomplete="off">'+
      '<input type ="text" name="answers" id="answers" class="answer_input_class form-control" maxlength="1"placeholder="Please insert your answer as A or B">'+ 
      '<input type ="submit" name="submit" class="btn mdlBtn" id="ajax_answer_submit" value="submit">' 
      var questions = JSON.parse(response);
      console.log(questions)
      if(questions['questions']){
       $("#question").html('')
       $("#question-category").html(''); 
       $("#dice-count").html(result)
       $("#question-type").html(questions['questions'].question_type)
       $("#close_button").css('display','none')
       $('#peril-div').css('display','none');
       $("#question").html(questions['questions'].question)
       $("#question_option_1").html(questions['questions']['option_1']).css('list-style-type','upper-alpha')
       $("#question_option_2").html(questions['questions']['option_2']).css('list-style-type','upper-alpha')
       $("#question_heading").html(questions['questions']['question_type'])
       if(questions['questions']['type'] == undefined){
            $("#question-category").css('border','0px solid #000');
       }else{
            $("#question-category").css('border','1px solid #000');
            $("#question-category").html(questions['questions']['type']);
       }
       $("#answer_submit").append(form) 
       $('#is_visited_'+addedValue).val(1)
       answerSubmit('#ajax_answer_submit','#answers',addedValue)
     }else{
      $("#question-category").css('border','0px solid #000');
      $("#question-category").html('');
      $("#dice-count").html(result)
      $('#peril-div').css('display','block')
      $("#question").html('')
      $("#question_option_1").html('').css('list-style-type','none')
      $("#question_option_2").html('').css('list-style-type','none')
      $('#peril-div').css('display','block');
      $('#peril-images').css('display','block');
      if($('#is_image_'+addedValue).val() == '0'){
        $("#question-type").html('PERILS')
        $('#peril-div').css('display','block')
        $('#peril-images').css('display','block');
        $("#question_heading").html('Peril')
        $('#peril-images').attr('src',questions['question_image_1'].image_url);
        $('#is_image_'+addedValue).val(1)
        $("#answer_submit").append(form) 
        $('#is_visited_'+addedValue).val(1)
        answerSubmit('#ajax_answer_submit','#answers',addedValue)
      }else if($('#is_image_'+addedValue).val() == '1'){
        $("#question-type").html('PERILS')
        $("#close_button").css('display','none')
        $("#question_heading").html('Peril')
        $('#peril-images').css('display','block');
        $('#peril-div').css('display','block')
        $('#peril-images').attr('src',questions['question_image_2'].image_url);
        $('#is_image_'+addedValue).val(2)
        $("#answer_submit").append(form) 
        $('#is_visited_'+addedValue).val(1)
        answerSubmit('#ajax_answer_submit','#answers',addedValue) 
      }else{
        fetchrandomfacts(addedValue);
      } 
    }
  }
});
 }

 function answerSubmit(submit_id,input_id,div_id){
   $(document).ready(function(){
     $(submit_id).on('click',function(){		
       var str = $(input_id).val()
       if(str == ''){
         alert('Please Enter your answer')
         return false
       }
       if (/\s/.test(str)) {
        alert('Please dont enter space in answer')
        return false
      }
      if(str.match(/[_\W0-9]/))
      {
        alert('Please do not enter special characters or numbers');
        return false
      }	
      if(!(str.match(/[ab AB]/)))
      {
        alert('Enter valid A or B Option');
        return false
      }   		
      $.ajax({
        type : "POST",
        url  : "ajaxcall/submitAnswer.php",
        data : {
          'answer':$(input_id).val(),
          'div_id':div_id
        },
        success:function(response){
                     	getPlayerScore();
                        var message = JSON.parse(response);

		       if(message == "correct"){
                $("#roll-dice-message").css('display','block').addClass('alert-success fas fa-check').removeClass('alert-danger fa-times').html('Your answer has been recorded. Please roll dice to proceed further');
              }else{
                $("#roll-dice-message").css('display','block').addClass('alert-danger fas fa-times').removeClass('alert-success fa-check').html('Your answer is Incorrect. Please roll dice to proceed further');
              }        
		    }
                   });

      $(input_id).remove();
      $(submit_id).remove();
      $('#myModal').modal('hide');
    })
   })  
 }
 function fetchrandomfacts(div_id){
    $(".dice-info").css('display','none')
    $("#close_button").css('display','block')
    $("#question").html('Random Facts')
    $("#question_option_1").html('').css('list-style-type','none')
    $("#question_option_2").html('').css('list-style-type','none')
    $("#peril-images").html('').css('display','none')
     $.ajax({
         type : "POST",
         url  : "ajaxcall/randomFacts.php",
         success:function(response){
          var facts = JSON.parse(response);
          console.log(facts[0].facts)
           $("#question").html('RANDOM FACT')
           $("#question_option_1").html(facts[0].facts)
          
        }
     });
}
function setRoundScore(){
 $.ajax({
   type : "POST",
   url  : "ajaxcall/checkRoundScore.php",
   success:function(response){}
 });
}

function increment() {
  $('#round_counter').val( function(i, oldval) {
    return ++oldval;
  });

}

function getPlayerScore(){
  $.ajax({
   type : "POST",
   url  : "ajaxcall/getPlayerScore.php",
   success:function(response){
      $("#player-score").html(response)
   }
 });
}

