<?php
//require 'vendor/autoload.php';
require_once ('AfricasTalkingGateway.php');
//use AfricasTalking\SDK\AfricasTalking;
//d3d2b9054786138f199330adcb78e9cd905f28cb01b125d5a011ec1cf7793848
// Set your app credentials
$username   = "kipropevans";
$apiKey     = "2f4ee3754f5f181ae9f91f6595784c70399f5afde81f8c2b7e049dc861e9fbfa";

// Initialize the SDK
//$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
//$sms        = $AT->sms();

//function sendMessage() {
    // Set the numbers you want to send to in international format
    $recipients = "+254702565559";

    // Set your message
    $message    = "Your child's tag has been swiped  ";
$gateway = new AfricasTalkingGateway($username, $apiKey);
    try {
        // Thats it, hit send and we'll take care of the rest
        $results = $gateway->sendMessage( $recipients, $message);

        foreach($results as $result){
            echo " Number: " .$result->number;
            echo " Status: " .$result->status;
            echo " MessageId: " .$result->messageId;
            echo " Cost: " .$result->cost."\n";
            
        }
        
    } catch (AfricasTalkingGatewayException $e) {
        echo "Error: ".$e->getMessage();
    }
//}

