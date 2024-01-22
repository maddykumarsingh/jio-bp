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

$tabName="Settings";
$values_array=default_data("values_array");
$shuffle=default_data("shuffle");
$launchpos=default_data("launchpos");
$numlimit=default_data("numlimit");

$prevent_submit=toogles("prevent_submit");
$prevent_claim=toogles("prevent_claim");
$display_leaderboard=toogles("display_leaderboard");

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


		<div class="col-md-6">
			<div class="card" id="custom_card_height">
				<?php cardHeader("Full House Settings");?>
				<div class="card-content collapse show">
					<div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group pb-1">
                          <?php 
                    
                          if($prevent_submit){
                            echo '<a href="'.PAGE_NAME.'?setting=prevent_submit&value=false"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($prevent_submit).'/></a>';
                          }else{
                            echo '<a href="'.PAGE_NAME.'?setting=prevent_submit&value=true"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($prevent_submit).'/></a>';
                          }
                          ?>
              
              <label for="switchery2" class="font-medium-2 text-bold-600 ml-1">Disable Submit Button</label>
            </div>
            
            <div class="form-group pb-1">
                          <?php 
                    
                          if($prevent_claim){
                            echo '<a href="'.PAGE_NAME.'?setting=prevent_claim&value=false"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($prevent_claim).'/></a>';
                          }else{
                            echo '<a href="'.PAGE_NAME.'?setting=prevent_claim&value=true"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($prevent_claim).'/></a>';
                          }
                          ?>
              
              <label for="switchery2" class="font-medium-2 text-bold-600 ml-1">Disable Claims</label>
            </div>
            <div class="form-group pb-1">
                          <?php 
                    
                          if($display_leaderboard){
                            echo '<a href="'.PAGE_NAME.'?setting=display_leaderboard&value=false"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($display_leaderboard).'/></a>';
                          }else{
                            echo '<a href="'.PAGE_NAME.'?setting=display_leaderboard&value=true"><input type="checkbox" id="switchery2" class="switchery" data-size="md" '.switchery($display_leaderboard).'/></a>';
                          }
                          ?>
              
              <label for="switchery2" class="font-medium-2 text-bold-600 ml-1">Show Leaderboard to everyone</label>
            </div>
            <div class="well" style="margin-top:10px; font-weight:bolder; color:red;">Toogle switch to Disable / Enable</div>
</div>
 
                </div>
</div>
</div>
        </div>
</div>


<div class="col-md-6">
			<div class="card" id="custom_card_height">
				<?php cardHeader("Full House Settings");?>
				<div class="card-content collapse show">
					<div class="card-body">
                        <div class="row">
                        <div class="col-md-12">

            <h4 class="card-title" id="basic-layout-form">Release Limit In Numbers</h4>
                            <input type="number" id="relimit" value="<?php echo $numlimit;?>" class="form-control" id="basicInput" >
                            <label for="relimit" class="font-medium-2 text-bold-600 text-danger ml-1">Do not Change After Release</label>


</div>
<div class="col-md-12  auto">
                <div class="form-container">
                <button class="btn btn-nd btn-success login-button" style="margin-top:0px;" id="settings" type="submit" name="submit">Save</button>           
                </div>
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
   $("#settings").click(function(){
   var getNum=$("#relimit").val();
   location.href=("events.php?events=change_limit&value="+getNum);
})
</script>
  </body>
</html>