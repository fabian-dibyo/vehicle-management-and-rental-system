<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";
     
?>
<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>
<p><br><br><p>
<p align="center" style="font-size:25px"> Book your car by pressing the following button <p>
<button type="button" style="height:70px;margin-left:40%;margin-right:5%;margin-top:3%;margin-bottom:4%;width:200px" class="btn btn-success" onclick="location.href='create.php'">BOOK NOW</button> 
<p> <br> <br> <br> <br><p>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='index.php'">Main Menu</button>

<?php include 'inc/footer.php'; ?>