<?php require_once("includes/connection.php");?>
<?php require_once("includes/functions.php");?>
<?php include("includes/header.php");?>

<section>

    
 <?php

 //$var1 = $_GET['name'];
 //$var2 = $_GET['tag'];
 $student_name = 'Milly Jerono';
 date_default_timezone_set("Africa/Nairobi");
 
// SET time_zone = 'America/New_York';
 $sql = "SELECT *
FROM tblstudents
LEFT JOIN tblrecords ON tblstudents.id = tblrecords.student_id
WHERE name = '$student_name'
GROUP BY tblRecords.datetime DESC";
//$sql = "SELECT id ,name, contact, class FROM tblstudents WHERE rfidtag='$var2' ";
$result = mysqli_query($conn, $sql);?>
 
        <?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $currentDate = false;
    while($row = mysqli_fetch_assoc($result)) {?>
   <?php 
    echo "<h2>".$row["datetime"]." </h2>";?>
   
    
          <div>
   <table class="table table-striped">
    <thead>
      <tr>
        <th>RegNo</th>
        <th>Name</th>
        <th>Class</th>
        <th>Datetime</th>
        <th>Rfid Uid</th>
      </tr>
    </thead>
    <tbody>
<?php    
    $lastdate = NULL;
        foreach ($row as $rows){
           echo "<tr>";
                   echo "<td>".$row["rid"]."</td>";
                   echo "<td>".$row["name"]."</td>";
                   echo "<td>".$row["class"]."</td>";
                   echo "<td>".$row["datetime"]." </td>";
                   echo "<td>".$row["rfidtag"]."</td>";
         echo "</tr>";
         
        }        


       // echo "id: " . $rows["id"]. " - Name: " . $rows["name"]. " " . $rows["datetime"]. "<br>";
    }
} else {
    echo "0 results";
}

?> 

    </tbody>
  </table>
        
    </div>

</section>

<?php include("includes/footer.php");?>