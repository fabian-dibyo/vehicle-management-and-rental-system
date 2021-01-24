<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>

<?php
     $db = new Database();
if(isset($_POST['submit'])){
     $ename = mysqli_real_escape_string($db->link,$_POST['ename']);
     $rate = mysqli_real_escape_string($db->link,$_POST['rate']);
     $labor_time = mysqli_real_escape_string($db->link,$_POST['labor_time']);
     $garage_id = mysqli_real_escape_string($db->link,$_POST['garage_id']);
     if($ename == '' || $rate == '' || $labor_time == '' || $garage_id == ''){
          $error ="Field must not be empty!!";
     }else{
          $query = "INSERT INTO service(ename, rate, labor_time,garage_id ) Values ('$ename','$rate','$labor_time ','$garage_id')";
          $create = $db->insert($query);
     }
}
?>

<?php
     if(isset($error)){
          echo "<span style = 'color:red' > ".$error."</span>";
     }
?>


<form action = "servicecreate.php" method = "post">
<table >

     <tr>
          <td><br>Employee Name</td>
          <td><br><input type ="text" name = "ename" placeholder = "Enter Employee Name"></td>
     </tr>
     <tr>
          <td><br>Rate/Hour</td>
          <td><br><input type ="number" name = "rate" placeholder = "Enter Rate/hour"></td>
     </tr>
     <tr>
          <td><br>Labour Time(hour)</td>
          <td><br><input type ="number" name = "labor_time" placeholder = "Enter Labor Time"></td>
     </tr>
     <tr>

     </tr>
     <td><br>Garage Name</td>
          <td><br>
          <select name = "garage_id">
               <option value="" >Employee Garage</option>
               <option value="1">Trivedi Garage </option>
               <option value="2">Kaleen Vaia Garages </option>
               <option value="3">Patwary Garages and Co </option>
               <option value="4">Jowardar Garage and Foundation </option>
               <option value="5">Mark Brothers Garage</option>
          </select>
          
          
          </td>
     <tr>
          <td></td>
          <td><br>
          <input type ="submit" name = "submit" value = "Submit" />
          <input type ="reset" value = "Cancel" />

          
          </td>
     </tr>

</table>
</form>

<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='service.php'">Go back</button>




<?php include 'inc/footer.php'; ?>