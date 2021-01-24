<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM garage WHERE garage_id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
   $gname = mysqli_real_escape_string($db->link, $_POST['gname']);
   $gphone = mysqli_real_escape_string($db->link, $_POST['gphone']); 
   $gaddress = mysqli_real_escape_string($db->link, $_POST['gaddress']);

 if($gname == '' || $gphone == '' || $gaddress == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE garage
  SET
  gname  = '$gname',
  gphone = '$gphone',
  gaddress = '$gaddress'
  WHERE garage_id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM garage WHERE garage_id=$id";
 $deleteData = $db->delete($query);
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="garageupdate.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td><br>Garage Name</td>
  <td><br><input type="text" name="gname" 
  value="<?php echo $getData['gname'] ?>"/></td>
 </tr>
 <tr>
  <td><br>Garage Phone</td>
  <td><br><input type="text" name="gphone"
  value="<?php echo $getData['gphone'] ?>"/></td>
 </tr>

 <tr>
  <td><br>Garage Address</td>
  <td><br><input type="text" name="gaddress" 
  value="<?php echo $getData['gaddress'] ?>"/></td>
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
<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='garage.php'">Go back</button>
<?php include 'inc/footer.php'; ?>