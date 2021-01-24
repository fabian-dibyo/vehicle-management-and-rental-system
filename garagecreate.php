<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>

<?php
     $db = new Database();
if(isset($_POST['submit'])){
     $gname = mysqli_real_escape_string($db->link,$_POST['gname']);
     $gphone = mysqli_real_escape_string($db->link,$_POST['gphone']);
     $gaddress = mysqli_real_escape_string($db->link,$_POST['gaddress']);

     if($gname == '' || $gaddress == '' || $gphone == ''){
          $error ="Field must not be empty!!";
     }else{
          $query = "INSERT INTO garage(gname, gphone, gaddress) Values ('$gname','$gphone','$gaddress')";
          $create = $db->insert($query);
     }
}
?>

<?php
     if(isset($error)){
          echo "<span style = 'color:red' > ".$error."</span>";
     }
?>


<form action = "garagecreate.php" method = "post">
<table >

     <tr>
          <td><br>Garage Name</td>
          <td><br><input type ="text" name = "gname" placeholder = "Please enter garage name"></td>
     </tr>
     <tr>
          <td><br>Garage Phone</td>
          <td><br><input type ="text" name = "gphone" placeholder = "Please enter phone no."></td>
     </tr>

     <tr>
          <td><br>Garage Address</td>
          <td><br><input type ="text" name = "gaddress" placeholder = "Please enter garage address"></td>
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
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='garage.php'">Go back</button>




<?php include 'inc/footer.php'; ?>