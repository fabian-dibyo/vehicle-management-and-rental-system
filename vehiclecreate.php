<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>

<?php
     $db = new Database();
if(isset($_POST['submit'])){
     $model = mysqli_real_escape_string($db->link,$_POST['model']);
     $ppday = mysqli_real_escape_string($db->link,$_POST['ppday']);
     $garage_id = mysqli_real_escape_string($db->link,$_POST['garage_id']);

     if($model == '' || $garage_id == '' || $ppday == ''){
          $error ="Field must not be empty!!";
     }else{
          $query = "INSERT INTO vehicle(model, ppday, garage_id) Values ('$model','$ppday','$garage_id')";
          $create = $db->insert($query);
     }
}
?>

<?php
     if(isset($error)){
          echo "<span style = 'color:red' > ".$error."</span>";
     }
?>


<form action = "vehiclecreate.php" method = "post">
<table >

     <tr>
          <td><br>Model Name</td>
          <td><br><input type ="text" name = "model" placeholder = "Enter model name"></td>
     </tr>
     <tr>
          <td><br>Price Per Day</td>
          <td><br><input type ="text" name = "ppday" placeholder = "Enter price per day"></td>
     </tr>

     <tr>
     <td><br>Garage Name</td>
          <td><br>
          <select name = "garage_id">
               <option value="" >Assign garage for servicing</option>
               <option value="1">Trivedi Garage </option>
               <option value="2">Kaleen Vaia Garages </option>
               <option value="3">Patwary Garages and Co </option>
               <option value="4">Jowardar Garage and Foundation </option>
               <option value="5">Mark Brothers Garage</option>
          </select>
          
          
          </td>
     </tr>
     
     <tr>
          <td></td>
          <td><br>
          <input type ="submit" name = "submit" value = "Submit" />
          <input type ="reset" value = "Cancel" />

          
          </td>
     </tr>

</table>
</form><br>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='vehicle.php'">Go back</button>




<?php include 'inc/footer.php'; ?>