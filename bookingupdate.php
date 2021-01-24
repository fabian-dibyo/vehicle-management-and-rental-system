<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM booking WHERE booking_id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($db->link, $_POST['name']);
   $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
   $email = mysqli_real_escape_string($db->link, $_POST['email']); 
   $destination = mysqli_real_escape_string($db->link, $_POST['destination']);
   $dept_date = mysqli_real_escape_string($db->link, $_POST['departure_date']);
   $vehi_id = mysqli_real_escape_string($db->link, $_POST['vehicle_id']);



 if($name == '' || $phone == '' || $email == '' || $destination == '' || $dept_date == '' || $vehi_id == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE booking
  SET
  name  = '$name',
  phone = '$phone',
  email = '$email',
  destination = '$destination',
  departure_date = '$dept_date',
  vehicle_id = '$vehi_id'
  WHERE booking_id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM booking WHERE booking_id=$id";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="bookingupdate.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td><br>Name</td>
  <td><br><input type="text" name="name" 
  value="<?php echo $getData['name'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Phone</td>
  <td><br><input type="text" name="phone"
  value="<?php echo $getData['phone'] ?>"/></td>
 </tr>

 <tr>
  <td><br>Email</td>
  <td><br><input type="text" name="email" 
  value="<?php echo $getData['email'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Destination</td>
  <td><br><input type="text" name="destination" 
  value="<?php echo $getData['destination'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Departure Date</td>
  <td><br><input type="date" name="departure date" 
  value="<?php echo $getData['departure_date'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Vehicle ID</td>
  <td><br><input type="text" name="vehicle_id" 
  value="<?php echo $getData['vehicle_id'] ?>"/></td>
  </td>
 </tr>
 <tr>
  <td></td>
  <td><br>
  <input type="submit" name="submit" value="Update"/>
  <input type="reset" Value="Cancel" />
  <input type="submit" name="delete" Value="Delete" />
  </td>
 </tr>

</table>
</form>
<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='booking.php'">Go back</button>

<?php include 'inc/footer.php'; ?>