<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM service WHERE employee_id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
   $ename = mysqli_real_escape_string($db->link, $_POST['ename']);
   $rate = mysqli_real_escape_string($db->link, $_POST['rate']);
   $labor_time = mysqli_real_escape_string($db->link, $_POST['labor_time']); 
   $garage_id = mysqli_real_escape_string($db->link, $_POST['garage_id']);

 if($ename == '' || $rate == '' || $labor_time == '' || $garage_id == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE service
  SET
  ename  = '$ename',
  rate = '$rate',
  labor_time = '$labor_time',
  garage_id = '$garage_id'
  WHERE employee_id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM service WHERE employee_id=$id";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="serviceupdate.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td><br>Employee Name</td>
  <td><br><input type="text" name="ename" 
  value="<?php echo $getData['ename'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Rate/Hour</td>
  <td><br><input type="text" name="rate"
  value="<?php echo $getData['rate'] ?>"/></td>
 </tr>

 <tr>
  <td><br>Labor Time(hour)</td>
  <td><br><input type="text" name="labor_time" 
  value="<?php echo $getData['labor_time'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Garage ID</td>
  <td><br><input type="text" name="garage_id" 
  value="<?php echo $getData['garage_id'] ?>"/></td>
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
<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='service.php'">Go back</button>
<?php include 'inc/footer.php'; ?>