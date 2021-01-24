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
     $query = "SELECT * FROM booking";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>

<table class = "tblone">
     <tr>
          <th width=2%>BookingID</th>
          <th width=18%>Name</th>
          <th width=12%>Phone No. </th>
          <th width=10%>Email</th>
          <th width=15%>Destination </th>
          <th width=11%>Departure date </th>
          <th width=10%>Vehicle id </th>
          <th width=10%>Action </th>
     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['booking_id'];?></td>
          <td><?php echo $row ['name'];?></td>
          <td><?php echo $row ['phone'];?></td>
          <td><?php echo $row ['email'];?></td>
          <td><?php echo $row ['destination'];?></td>
          <td><?php echo $row ['departure_date'];?></td>
          <td><?php echo $row ['vehicle_id'];?></td>
          <td><a href="bookingupdate.php?id=<?php echo $row['booking_id'];?>">Edit</a></td>

     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='owner.php'">Go back</button>


<?php include 'inc/footer.php'; ?>