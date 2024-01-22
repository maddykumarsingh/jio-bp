<?php
ob_start();
error_reporting(E_ALL);
session_start();
$settings=json_decode(file_get_contents("settings.js"),true)[0];
$organizationId=$_SESSION['organizationId'];
$sessionId=$_SESSION['sessionId'];
include_once '../dao/config.php';
include_once '../../admin_assets/triggers.php';



if (!$_SESSION['adminId']) {
    header('Location:../index.php?save');
} 

$tabName="";
// $values_array=default_data("values_array");
// $shuffle=default_data("shuffle");
// $launchpos=default_data("launchpos");
// $numlimit=default_data("numlimit");
$current_theme=default_data("current_theme");
$custom_words=default_data("custom_words");
$custom_title=default_data("custom_title");
$rules=default_data("rules");
$apply_custom_words=toogles("apply_custom_words");


?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
      
<?php include_once("../../admin_assets/common-css.php");?>
<!-- Only unique css classes -->
    <style rel="stylesheet" type="text/css">

    </style>
<!-- Only unique css classes -->
  </head>


<body class="horizontal-layout horizontal-menu 2-columns" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
<?php include_once("../../admin_assets/common-header.php");?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title"><?php echo $tabName;?></h3>
          </div>
        </div>
        <div class="content-body">
<section id="basic-form-layouts">
	<div class="row match-height">
<!-- add content here -->


		<div class="col-md-8">
			<div class="card" id="custom_card_height">
				<?php cardHeader(" Click below to select from our ready themes");?>
				<div class="card-content collapse show">
					<div class="card-body">
                        <div class="row">
                          <?php 
for($i=0; $i<sizeof($settings["themesets"]); $i++){
       if($i==$current_theme){
          $showTick='<img src="../../admin_assets/assets/img/tick.png" class="custom-tick"/>';
          if($apply_custom_words){
            $wordlist=$custom_words;
          }else{
            $wordlist=$settings["themesets"][$i]["words"];
          }
       }else{
          $showTick='';
          $wordlist=$settings["themesets"][$i]["words"];
       }
       echo '<div class="col-xl-4 col-md-4 col-sm-12">
       <div class="card text-white box-shadow-0 '.$settings["themesets"][$i]["color-theme"].'">
         <div class="card-content collapse show">
           <div class="card-body custom-body" pos="'.$i.'">
             <h4 class="card-title text-white">'.$settings["themesets"][$i]["themeName"].'</h4>
             <p class="card-text">Title : '.$settings["themesets"][$i]["title"].'</p>
             <p class="card-text">Words: '.implode(', ',$wordlist).' </p>
           </div>
         </div>
       </div>
       '.$showTick.'
     </div>';
}


?>

                </div>
</div>
</div>
        </div>
</div>
        <!-- NEW CARD -->
        <div class="col-md-4">
			<div class="card" id="custom_card_height">
			<?php cardHeader("Custom Settings");?>
				<div class="card-content collapse show">
					<div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                          <h4 class="card-title">Add Custom Rules:</h4>
                        <div class="form-group col-12 mb-2 rules-repeater">

<div data-repeater-list="repeater-group">
  <?php 
  for($i=0; $i<sizeof($rules); $i++){
     echo ' <div class="input-group mb-1" data-repeater-item>
     <input type="text" placeholder="Rules" name="rules" value="'.$rules[$i].'" class="form-control" id="example-ql-input">
     <span class="input-group-append" id="button-addon2">
         <button class="btn btn-danger" type="button" data-repeater-delete>
             <i class="ft-x"></i>
         </button>
     </span>
 </div>';
  }
  ?>
   
</div>

<button type="button" data-repeater-create class="btn btn-primary">
    <i class="ft-plus"></i> Add new rule
</button>
<p class="text-muted"><code>* Keep 3 rules at the most <br> * At least 1 rule is required <br> * character limit of each rule is 200</code></p>
</div>

                        </div>

                        <div class="col-md-12 mb-2">
                          <h4 class="card-title">Add Custom Title:</h4>
                          <input type="text" id="title" value="<?php echo $custom_title;?>" class="form-control" id="basicInput" >
<p class="text-muted"><code>* This title will reflect on the main game page</code></p>
                        </div>

                        <div class="col-md-12 ">
                        <h4 class="card-title">Add Custom Words:</h4>
                        <fieldset>
                            <label>These words will reflect on the main game page</label>
                            <div class="form-group">
                              <?php   
                              if($apply_custom_words){
                                $List = implode(', ', $custom_words);  
                              }else{
                                $List = implode(', ', $settings["themesets"][$current_theme]["words"]);  
                              }
                          
                              ?>
                                <div class="bingo-custom form-control" data-tags-input-name="bingo-custom"><?php print_r($List);?></div>
                              
                                <p class="text-muted"><code>* Duplicate Words Not Allowed   <br>* Space Between Words are not allowed  <br>* Character limit of each word is 13 <br> * Total number of words in a single puzzle is limited to 8</code></p>

                            </div>
                        </fieldset>

</div>
<div class="col-md-12 text-center auto">
                <div class="form-container">
                <button class="btn btn-md btn-success login-button core-button-color" style="margin-top:15px;" id="tagButton" type="submit" name="submit">Save All</button>           
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                <div class="form-group pb-1">
                          <?php 
                    
                          if($apply_custom_words){
                            echo '<a href="'.PAGE_NAME.'?setting=apply_custom_words&value=false"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($apply_custom_words).'/></a>';
                          }else{
                            echo '<a href="'.PAGE_NAME.'?setting=apply_custom_words&value=true"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($apply_custom_words).'/></a>';
                          }
                          ?>
              
              <label  class="font-medium-2 text-bold-600 ml-1">Apply Custom Settings</label>
                  </div>
                </div>
            </div>
            
				                 	</div>
                   </div>
              </div>
          </div>
        </div>


 <!-- add content here end -->     
          </div>
       </div>
          </section>
        </div>
      </div>
    </div>



    


<?php include("../../admin_assets/footer.php");?>
<?php include_once("../../admin_assets/common-js.php");?>
<script type="text/javascript">


$('.rules-repeater').repeater({
  show: function () {

if( $(this).parents(".rules-repeater").find("div[data-repeater-item]").length <= 3 ){
$(this).slideDown();
} else {
$(this).remove();
}
}
});

var rules=[];
function getValues(){
  $('input[name*="rules"]').each(function(e)
{
      rules.push($(this).val()); 
});
}


        $(".custom-body").click(function(){
        var t = $(this).attr("pos");
        $.ajax({ 
       type: "POST", 
       url: "events.php?events=change_theme", 
       data: {value : t}, 
       success: function(result) { 
              if(result=="true"){
                swal('Success', 'Data Updated', 'success');
                setTimeout(() => {
                  location.reload();
                }, 1000);
              }else{
                swal('Error', result, 'error');
              }
        } 
});   
})

// $('.m_repeater').repeater({
// initEmpty: false,
// show: function () {
// if( $(this).parents(".m_repeater").attr("data-limit").length > 0 ){
// if( $(this).parents(".m_repeater").find("div[data-repeater-item]").length <= $(this).parents(".m_repeater").attr("data-limit") ){
// $(this).slideDown();
// } else {
// $(this).remove();
// }
// } else {
// $(this).slideDown();
// }
// },
// hide: function (deleteElement) {
// $(this).slideUp(deleteElement);
// }
// });

var bingo=$( ".bingo-custom");

bingo.tagging({
        "bingo-custom": !1,
        "no-duplicate-callback": duplicateTag
    })

    $(".login-button").click(function(){
      if($('.rules-repeater').find("div[data-repeater-item]").length!=0){
        getValues();
      var t=bingo.tagging("getTags");
      var title=$("#title").val();
      $.ajax({ 
       type: "POST", 
       url: "events.php?events=add_words", 
       data: {value : t,"rules":rules,"title":title}, 
       success: function(result) { 
              if(result=="true"){
                swal('Success', 'Data Updated', 'success');
                setTimeout(() => {
                  location.reload();
                }, 1000);
              }else{
                swal('Error', result, 'error');
              }
        } 
        });  
      }else{
        alert("at least 1 rule required.");
      }
    });

    bingo.on( "add:after", function ( el, text, tagging ) {
        customCode(text);
});
bingo.on( "remove:after", function ( el, text, tagging ) {
        customCode(text)
});


function customCode(text){
    if(text.length > 13){
        bingo.tagging("remove", text);
        swal('Unallowed Length', 'word character limit must be less than 13', 'error');
    }else{
        var t;
        t = bingo.tagging("getTags");
        wordlength=t.length;
        if(wordlength>8){
            wordlength=wordlength-1;
            bingo.tagging("remove", text);
            swal('Exceed Word Limit', 'Only 8 Words are Allowed', 'error');
        }
    }
}


    function duplicateTag(){
    swal('Duplicate Word', 'Duplicate Word not Allowed', 'error');
}
</script>
  </body>
</html>