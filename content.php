<?php require_once("includes/connection.php");?>
<?php require_once("includes/functions.php");?>

<?php require_once ('AfricasTalkingGateway.php');?>

<section>
 <?php
 ob_start();

 //$var1 = $_GET['name'];
 $var2 = $_GET['tag'];
 
$sql = "SELECT id ,name, contact, class FROM tblstudents WHERE rfidtag='$var2' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        $std_id = $row["id"];
                
        $std_name = $row["name"];
        $std_contact = $row["contact"];
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["contact"]. "<br>";
        echo "1";
    }
} else {
    echo "0";
}

 ob_end_flush();

?> 
<?php
//echo "id: $std_id ";
//echo "contact: $std_contact <br>"; 
$dtz = new DateTimeZone("Africa/Lagos"); //Your timezone
$now = new DateTime(date("Y-m-d H:i:s"), $dtz);
$cdate = $now->format("Y-m-d H:i:s");

$sql = "INSERT INTO tblrecords (rid, student_id, siku)
VALUES ('', '".$std_id."','".$cdate."')";
   if (mysqli_query($conn, $sql)) {
    //header("Location: admin.php");
       //echo '<script>location.href="http://schoolbus.co.ke/admin.php" </script>';
$username   = "kipropevans";
$apiKey     = "2f4ee3754f5f181ae9f91f6595784c70399f5afde81f8c2b7e049dc861e9fbfa";

    // Set the numbers you want to send to in international format
    $recipients = "+254702565559";

    // Set your message
    $message    = "Your child $std_name tag has been swiped  ";
$gateway = new AfricasTalkingGateway($username, $apiKey);
    try {
        // Thats it, hit send and we'll take care of the rest
        $results = $gateway->sendMessage( $recipients, $message);

        foreach($results as $result){
            //echo " Number: " .$result->number;
            //echo " Status: " .$result->status;
            //echo " MessageId: " .$result->messageId;
            //echo " Cost: " .$result->cost."\n";
            
        }
        
    } catch (AfricasTalkingGatewayException $e) {
        echo "Error: ".$e->getMessage();
    }
    
 } else {
    echo "Error updating record: " . mysqli_error($conn);
}

 
?>

</section>

