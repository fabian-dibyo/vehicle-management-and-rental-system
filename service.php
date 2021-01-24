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
     $query = "SELECT * FROM service";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>

<table class = "tblone">
     <tr>
          <th width=16%>Employee ID</th>
          <th width=16%>Employee Name </th>
          <th width=16%>Rate/Hour </th>
          <th width=16%>Labour Time(hour) </th>
          <th width=16%>Garage ID </th>
          <th width=16%>Action </th>
     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['employee_id'];?></td>
          <td><?php echo $row ['ename'];?></td>
          <td><?php echo $row ['rate'];?></td>
          <td><?php echo $row ['labor_time'];?></td>
          <td><?php echo $row ['garage_id'];?></td>
          <td><a href="serviceupdate.php?id=<?php echo $row['employee_id'];?>">Edit</a></td>

     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='servicecreate.php'">Insert Data</button>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='owner.php'">Go back</button>
<button type="button" class="btn btn-secondary btn-sm float-right" onclick="location.href='Expenditure.php'">Expenditure</button>


<?php include 'inc/footer.php'; ?>