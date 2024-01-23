
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Where's that word?</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style rel="stylesheet" type="text/css">
  body{
    width:100%;
    background-color: white;
    background-image: url(images/background-web.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
}
.rules-text{
  width: 150px;
  margin-top:40px;
  margin-bottom:20px;
}
.container-control{
    margin-top:80px;
}
.next{
    width:130px;
    font-size: 18px;
    background: #e9695e;
}
.respet_logo{
    width: 70% !important;
}
@media (min-width:100px) and (max-width:500px){
    body{

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

    .rule-list li {
        list-style-type: none;
        background-image: url(images/arrow.png);
        background-repeat: no-repeat;
        text-align: left;
        width: 100%;
        padding-bottom: 10px;
        font-size: 20px;
        font-weight: 500;
        color: black;
        padding-left: 40px;
    }
  </style>
</head>
<body>

<script>
        $(document).ready(function () {
            // Change the href attribute on page load
            // $('.logo-holder a').attr('href', 'https://your-new-url.com');
            $('.logo-holder a').attr('href', '<?php echo $urlLink; ?>');
        });
    </script>
<div class="container-fluid container-control">
<div class="row">
<div class="col-md-2 auto desk"></div>
<div class="col-md-8 auto"><img src="images/respect_logo.png?v=1" class="welcome-logo respet_logo"/></div>
<div class="col-md-2 auto"></div>

    <div class="col-md-2 auto desk"></div>
<div class="col-md-8 auto"><img src="images/welcome-logo.png" class="welcome-logo"/></div>
<div class="col-md-2 auto"></div>

</div>
<div class="row">
<div class="col-md-12 text-center">
<img class="rules-text" src="images/rules-text.png"/>
</div>
<div class="col-md-6 col-md-offset-3">
<ul class="rule-list">
   
</ul>
</div>
<div class="col-md-12 text-center">
<a href="wordpuzzle.php"><div style="font-weight:bold;" class="btn btn-info next">Next</div></a>
</div>
</div>
</div>


<script>
    $(document ).ready(function() {
    var organizationId="<?php echo $organizationId;?>";
    console.log(organizationId);
    if(organizationId == '8f1c1f27-4a70-4661-8a89-9f47517172df'){
        
        $(".logo-holder a").attr('href', 'https://myofficeengagements.com/Raymond-Engage/index.php');
        
    }
    if(organizationId == 'df0dbf83-2a5d-486e-be7e-ec55cd05ac8b'){
        
        $(".logo-holder a").attr('href', 'https://ask.extramileplay.com/');
        
    }
});
</script>
</body>
</html>
