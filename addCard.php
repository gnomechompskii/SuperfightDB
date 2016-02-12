<!doctype html>
<?php
session_start();

    $dbcnx = @mysql_connect("localhost", $_SESSION['user'], $_SESSION['pass']);

    if (!$dbcnx)
        {
          echo( "<p>Unable to connect to the " .
                    "database server at this time.</p>");
          exit();
        }

    if (! mysql_select_db("devsitee_superfight") ) 
        {
          echo( "<p>Unable to locate the superfight" .
                "database at this time.</p>" );
          exit();
        }

                
?>
<html lang="en" ng-app>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/addCard.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script type="text/javascript">
    function showCard()
    {
        if(document.getElementById("type").value=="Fighter")
        {
            document.getElementById("preview").style.visibility="visible";
            document.getElementById("preview").style.backgroundColor="white";
            document.getElementById("previewTxt").style.backgroundColor="white";
            document.getElementById("previewTxt").style.color="black";
            document.getElementById("cPreview").style.visibility="visible";
            document.getElementById("cardVal").disabled=false;
        }
        else if(document.getElementById("type").value=="Attribute")
        {
            document.getElementById("preview").style.visibility="visible";
            document.getElementById("preview").style.backgroundColor="black";
            document.getElementById("previewTxt").style.backgroundColor="black";
            document.getElementById("previewTxt").style.color="white";
            document.getElementById("cPreview").style.visibility="visible";
            document.getElementById("cardVal").disabled=false;
        }
        if(document.getElementById("type").value=="-1")
        {
            document.getElementById("preview").style.visibility="hidden";
            document.getElementById("cPreview").style.visibility="hidden";
            document.getElementById("cardVal").disabled=true;
        }
    }
</script>
    </head>
    <body >
      <div class="container" id="displayBox">
            <h1>Add Card</h1>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" ng-init="card={value:''}">
                <div class="form-group" id="cardType" name="cardType">
                <div class="col-sm-12">
                    <h5 id="cType"><strong>Card Type: </strong></h5>
                    <select class="form-control" name="type" id="type" onChange="showCard();" style="width:100%;">
                        <option value="-1">-Select a Type-</option>
                        <option value="Fighter">Fighter</option>
                        <option value="Attribute">Attribute</option>
                    </select>
                </div>
              </div>
              <div class="form-group" id="cardValue" name="cardValue">
                <h5 id="cText"><strong>Card Text: </h5>
                <div class="col-sm-3">
                  <textarea class="form-control" rows="4" cols="90" id="cardVal" name="cardVal" ng-model="card.value" placeholder="Enter card value here..." disabled ></textarea>
                </div>
              </div>
              <h5 id="cPreview" style="visibility:hidden;"><strong>Preview: </strong></h5>
              <div id="buttonClass" class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button id="card-submit" name="submit" type="submit" class="btn btn-default btn-lg">Submit Card</button>
                </div>
              </div>
            </form>
            <div id="preview" style="visibility:hidden;">
                <textarea id="previewTxt" readonly>{{card.value}}</textarea>
            </div>
        </div>
    <!-- Scripts -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/angular.min.js"></script>
    </body>
</html>
