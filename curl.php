<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://hub.loginradius.com/userprofile/3860c5d2-e602-4126-b886-86770e779616/1824eac1-82f6-46ff-99a4-a9c7a43d7113"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        echo "<pre>";
  print_r($output);
  exit;
        // close curl resource to free up system resources 
        curl_close($ch);      
?>