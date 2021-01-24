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
     $query = "SELECT * FROM garage";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>

<table class = "tblone">
     <tr>
          <th width=20%>Garage id</th>
          <th width=20%>Garage Name </th>
          <th width=20%>Garage Phone </th>
          <th width=20%>Garage Address </th>
          <th width=20%>Action </th>
     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['garage_id'];?></td>
          <td><?php echo $row ['gname'];?></td>
          <td><?php echo $row ['gphone'];?></td>
          <td><?php echo $row ['gaddress'];?></td>
          <td><a href="garageupdate.php?id=<?php echo $row['garage_id'];?>">Edit</a></td>

     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='garagecreate.php'">Insert Data</button>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='owner.php'">Go back</button>


<?php include 'inc/footer.php'; ?>