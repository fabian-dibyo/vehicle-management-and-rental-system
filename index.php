<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";
     
?>
<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>


<p align="center" style="font-size:30px;color:Purple"> Are you the user or owner?  <p>
<button type="button" style="height:100px;margin-left:29%;margin-right:5%;margin-top:4%;margin-bottom:4%;width:200px;background-color: #4CAF50;border-radius: 8px" class="btn btn-secondary" onclick="location.href='user.php'">USER</button>
<button type="button" style="height:100px;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;width:200px;background-color: #008CBA;border-radius: 8px" class="btn btn-secondary" onclick="location.href='owner.php'">OWNER</button>






 <?php include 'inc/footer.php'; ?>