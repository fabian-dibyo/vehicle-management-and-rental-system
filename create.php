<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>

<?php
     $db = new Database();
if(isset($_POST['submit'])){
     $name = mysqli_real_escape_string($db->link,$_POST['name']);
     $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
     $email = mysqli_real_escape_string($db->link,$_POST['email']);
     $destination = mysqli_real_escape_string($db->link,$_POST['destination']);
     $departure_date = mysqli_real_escape_string($db->link,$_POST['departure_date']);
     $vehicle_id = mysqli_real_escape_string($db->link,$_POST['vehicle_id']);
     if($name == '' || $email == '' || $phone == ''|| $destination == '' || $departure_date =='' || $vehicle_id ==''){
          $error ="Field must not be empty!!";
     }else{
          $query = "INSERT INTO booking(name, phone, email,destination,departure_date, vehicle_id) Values ('$name','$phone','$email ',' $destination','$departure_date','$vehicle_id')";
          $create = $db->insert($query);
     }
}
?>

<?php
     if(isset($error)){
          echo "<span style = 'color:red' > ".$error."</span>";
     }
?>


<form action = "create.php" method = "post">
<table >

     <tr>
          <td><br>Name</td>
          <td><br><input type ="text" name = "name" placeholder = "Please enter name"></td>
     </tr>
     <tr>
          <td><br>Phone</td>
          <td><br><input type ="text" name = "phone" placeholder = "Please enter phone no."></td>
     </tr>

     <tr>
          <td><br>Email</td>
          <td><br><input type ="text" name = "email" placeholder = "Please enter email"></td>
     </tr>
     <tr>
          <td><br>Destination</td>
          <td><br><input type ="text" name = "destination" placeholder = "Please enter destination"></td>
     </tr>
     <tr>
          <td><br>Departure date</td>
          <td><br><input type ="date" name = "departure_date" placeholder = "Please enter departure_date"></td>
     </tr>
     <tr>
          <td><br>Vehicle Model</td>
          <td><br>
          <select name = "vehicle_id">
               <option value="" >Select your car</option>
               <option value="1">Toyota Corolla Axio </option>
               <option value="2">Toyota Probox </option>
               <option value="3">Toyota Land Cruiser Prado </option>
               <option value="4">Toyota Premio </option>
               <option value="5">Toyota Allion</option>
               <option value="6">Tata Nano </option>
               <option value="7"> 	Hundai sonata </option>
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
</form>

<br><button type="button" class="btn btn-secondary btn-sm" onclick="location.href='user.php'">Go back</button>



<?php include 'inc/footer.php'; ?>