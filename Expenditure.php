<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>
<?php
     $db = new Database();
     $query = "SELECT ename,rate*labor_time as Expenditure FROM service";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>
<table class = "tblone">
     <tr>
          <th width=50%>Employee Name</th>
          <th width=50%>Expenditure</th>

     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['ename'];?></td>
          <td><?php echo $row ['Expenditure'];?></td>


     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='service.php'">Go back</button>
<button type="button" class="btn btn-secondary btn-sm float-right" onclick="location.href='totalexpenditure.php'">Total Expenditure</button>


<?php include 'inc/footer.php'; ?>