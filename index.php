<?php
  
  include 'config/koneksi.php';
  
  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <style type="text/css">

    body {
    background: url(img/f.jpg) no-repeat fixed;
   -webkit-background-size: 100% 100%;
   -moz-background-size: 100% 100%;
   -o-background-size: 100% 100%;
   background-size: 100% 100%;
 }

   .container{
   font-family:Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
  

}
 
</style>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="100x76" href="img/logo.png">
  <link rel="icon" type="image/png" href="img/logo.png">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Angkasa Pura Flight Information Display System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
 <body id="page-top">
    <div class="nav" style="padding: 10px; padding-left: 130px; background-color: #333333;" >
       <a href="index.php"><img src="img/ap1.png" width="200px" height="55px"></a>
    </div>
    <!-- Services -->
    <section id="body" style="padding:20px;">
      <div class="container">
        <form action="" method="POST">
          <div class="row">
            <div class="col-sm-4">
              <select class="form-control" name="loc" id="loc" selected="selected">
                <?php

                  include 'config/koneksi.php';

                  $airports = "SELECT name,loc FROM airports";
                  $queryairports = mysqli_query($konek,$airports);
                  while ($data = mysqli_fetch_array($queryairports)) { ?>
                  <option value="<?php echo $data['loc'] ?>"><?php echo $data['name'] ?>
                  </option>
                  <?php
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="form-control" name="indo" id="indo" selected="selected">
                <option value="D">Domestic</option>
                <option value="I">International</option>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="form-control" name="arrdep" id="arrdep" selected="selected">
                <option value="A">Arrival</option>
                <option value="D">Departure</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-5">
            </div>
            <div class="col-sm-2" style="padding-left: 40px;">
              <button type="button" class="btn btn-success btn-fill" name="search" id="search">Search</button>
            </div>
             <div class="col-sm-5">
            </div>
          </div>
        </form>
      </div>
   <br>
    <div id="data">
      
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    
  </div>
</body>

</html>
<script>
      $("#search").click(function() {
        var loc = $("#loc").val();
        console.log(loc);
        var indo = $("#indo").val();
        console.log(loc);
        var arrdep = $("#arrdep").val();
        console.log(loc);
        $.ajax({
          url: "./ajax_data.php?loc=" + loc + '&indo=' + indo + '&arrdep=' + arrdep,
          success: function(result){
            $("#data").html(result);
         var auto_refresh = setInterval(
         function ()
         {
        var loc = $("#loc").val();
        console.log(loc);
        var indo = $("#indo").val();
        console.log(loc);
        var arrdep = $("#arrdep").val();
        console.log(loc);
         $('#data').load("./ajax_data.php?loc=" + loc + '&indo=' + indo + '&arrdep=' + arrdep).fadeIn("slow");
             }, 10000);
          }
        });
      });
      
</script> 

