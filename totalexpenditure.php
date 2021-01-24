<?php include 'inc/header.php'; 
     include "config.php";
     include "Database.php";

?>
<?php
     $db = new Database();
     $query = "SELECT sum(rate*labor_time) as TotalExpenditure FROM service";
     $read = $db-> select($query);

?>

<?php
     if(isset($_GET['msg'])){
          echo "<span style = 'color:green' > ".$_GET['msg']."</span>";
     }
?>
<table class = "tblone">
     <tr>
          <th width=100%>Total Expenditure</th>

     </tr>
<?php if($read) {?>
<?php while($row = $read -> fetch_assoc()) { ?>
     <tr>
          <td><?php echo $row ['TotalExpenditure'];?></td>


     </tr>
<?php }?>
<?php } else{?> 
<p> Data is not available!!> </p>
<?php } ?>

</table>
<button type="button" class="btn btn-secondary btn-sm" onclick="location.href='service.php'">Go back</button>

<?php include 'inc/footer.php'; ?>