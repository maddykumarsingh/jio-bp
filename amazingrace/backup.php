<?php





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
#makeMeDraggable { float: left; width: 300px; height: 300px; background: red; }
#makeMeDroppable { float: right; width: 300px; height: 300px; border: 1px solid #999; }
</style>

        </head>
    <body>

            <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="col-md-12">
                      <!-- <div class="dustbin" ondrop="drop(event)" ondragover="allowDrop(event)"></div>-->


<div id="content" style="height: 400px;">

  <div id="makeMeDraggable"> </div>
  <div id="makeMeDroppable"> </div>

</div>


                      <!--<div id="drag1"  class="statement" draggable="true" ondragstart="drag(event)">This is the text statement about the agree desagree content. follow this content pls</div> -->
                      </div>
                      </div>
                </div>
        </div>


    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
$( init );

function init() {
  $('#makeMeDraggable').draggable( {
    drag: checkThis
  } );
  $('#makeMeDroppable').droppable( {
    drop: handleDropEvent
  } );
}
function checkThis(){
    alert("working");
}

function handleDropEvent( event, ui ) {
  var draggable = ui.draggable;
  alert( 'The square with ID "' + draggable.attr('id') + '" was dropped onto me!' );
}

    </script>
    </body>
</html>