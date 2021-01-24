<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM vehicle WHERE vehicle_id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
   $model = mysqli_real_escape_string($db->link, $_POST['model']);
   $ppday = mysqli_real_escape_string($db->link, $_POST['ppday']);
   $garage_id = mysqli_real_escape_string($db->link, $_POST['garage_id']); 

 if($model == '' || $ppday == '' || $garage_id == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE vehicle
  SET
  model  = '$model',
  ppday = '$ppday',
  garage_id = '$garage_id'
  WHERE vehicle_id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM vehicle WHERE vehicle_id=$id";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="vehicleupdate.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td><br>Model</td>
  <td><br><input type="text" name="model" 
  value="<?php echo $getData['model'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Price Per Day</td>
  <td><br><input type="text" name="ppday"
  value="<?php echo $getData['ppday'] ?>"/></td>
 </tr>

 <tr>
  <td><br>Garage ID</td>
  <td><br><input type="text" name="garage_id" 
  value="<?php echo $getData['garage_id'] ?>"/></td>
  </td>
 
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
<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='vehicle.php'">Go back</button>
<?php include 'inc/footer.php'; ?>