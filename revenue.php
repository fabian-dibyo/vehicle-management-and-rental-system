<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>
<?php
     $db = new Database();
     $query = "SELECT distinct vehicle.model,vehicle.ppday*count(*) as revenue from vehicle,booking where booking.vehicle_id=vehicle.vehicle_id group by booking.vehicle_id";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>
<table class = "tblone">
     <tr>
          <th width=50%>Vehicle Model</th>
          <th width=50%>Revenue</th>

     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['model'];?></td>
          <td><?php echo $row ['revenue'];?></td>


     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='vehicle.php'">Go back</button>


<?php include 'inc/footer.php'; ?>