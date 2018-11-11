<?php require_once("includes/connection.php");?>
<?php require_once("includes/functions.php");?>
<?php include("includes/header.php");?>

<nav>
<ul>
 <li><a class="active" href="index.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="contact.php">Contact</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a href="aboutus.php">About</a></li>
    <li><a href="#login">Login</a></li>
  </ul>

 </ul>
 </nav>
 <nav id="navvertical">
  <li><a  href="#home">home</a></li>
  <li><a href="#news">news</a></li>
  <li><a href="admin.php">admin</a></li>
  <li><a href="#contact">content</a></li>
  <li><a href="contacts.php">contacts</a></li>
<section>
 <?php
 
   
 if( isset($_GET['name'], $_GET['tag']))
 {
 $var1 = $_GET['name'];
 $var2 = $_GET['tag'];
  // $sql = "UPDATE tblStudents SET name='Doe' WHERE id=2";
 
$sql = "INSERT INTO tblStudents (id, name, rfidtag, regno)
VALUES ('', '".$var1."', '".$var2."', 5)";
   if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
 } else {
    echo "Error updating record: " . mysqli_error($conn);
}

 }

//}

?> 


</section>

<?php require("includes/footer.php");?>