<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>


<button type="button" class="btn btn-outline-primary" onclick="location.href='booking.php'">Booking</button>
<button type="button" class="btn btn-outline-primary" onclick="location.href='garage.php'">Garage</button>
<button type="button" class="btn btn-outline-primary" onclick="location.href='service.php'">Service</button>
<button type="button" class="btn btn-outline-primary" onclick="location.href='vehicle.php'">Vehicle</button>
<?php
     $db = new Database();
     $query = "SELECT * FROM vehicle";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>

<table class = "tblone">
     <tr>
          <th width=20%>Vehicle ID</th>
          <th width=20%>Model </th>
          <th width=20%>Price Per Day </th>
          <th width=20%>Garage ID </th>
          <th width=20%>Action </th>
     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['vehicle_id'];?></td>
          <td><?php echo $row ['model'];?></td>
          <td><?php echo $row ['ppday'];?></td>
          <td><?php echo $row ['garage_id'];?></td>
          <td><a href="vehicleupdate.php?id=<?php echo $row['vehicle_id'];?>">Edit</a></td>

     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button  type="button" class="btn btn-secondary btn-sm" onclick="location.href='vehiclecreate.php'">Insert Data</a></button>
<button  type="button" class="btn btn-secondary btn-sm" onclick="location.href='owner.php'">Go Back</a></button>
<button type="button" class="btn btn-secondary btn-sm float-right" onclick="location.href='revenue.php'">Revenue</button>
<button type="button" style="margin-left: 720px"class="btn btn-secondary btn-sm" onclick="location.href='timesbooked.php'">Times Booked</button>


<?php include 'inc/footer.php'; ?>