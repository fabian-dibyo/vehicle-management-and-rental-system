<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";
     
?>
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>
<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>

<p align="center" style="font-size:22px;color:Black"> Please select a table to view data <p>

<button type="button" style="height:50px;margin-left:31%;margin-right:0%;margin-top:1%;margin-bottom:1%;width:100px" class="btn btn-outline-primary" onclick="location.href='booking.php'">Booking</button>
<button type="button" style="height:50px;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;width:100px" class="btn btn-outline-primary" onclick="location.href='garage.php'">Garage</button>
<button type="button" style="height:50px;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;width:100px" class="btn btn-outline-primary" onclick="location.href='service.php'">Service</button>
<button type="button" style="height:50px;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;width:101px" class="btn btn-outline-primary" onclick="location.href='vehicle.php'">Vehicle</button>
<p> <br> <br> <br> <br><br><br><br><p>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='logout.php'" >Log out</button>




   <?php include 'inc/footer.php'; ?>