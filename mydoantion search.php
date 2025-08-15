<?php
 require("admin/admin_input_test.php");
 $top_data=[];
 $table_data=[];
 $money_recipt=[];
 if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['search'])){   
    if(!empty($_POST['name']) && !empty($_POST['number'])){
        $class=new input_test\test();
        $name=$class->text('name');
        $number=$class->number('number');
        if($name!="error" && $number!="error"){
            // Step 1: Initialize cURL
               $ch = curl_init();
            
            // Step 2: Set cURL options
                $url = "http://192.168.0.105/rapid%20force/mydonation.php"; // Replace with your target URL
               $data = array(
                    "key1" =>$name, // Your data to send
                    "key2" => $number
                );
            
                $headers = array(
                     "Content-Type: application/json", // Set content type
                     "Authorization: Love Toma" // Optional: if you need to include an authorization token
                  );
            
              // Convert the data to JSON format
                  $jsonData = json_encode($data);
            
                 curl_setopt($ch, CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_POST, true);
                 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response instead of printing
            
              // Step 3: Execute cURL request
                 $response = curl_exec($ch);
            
              // Check for errors
                if ($response === false) {
                    echo 'cURL Error: ' . curl_error($ch);
               } else{
                   echo $response;
               }
            
               // Step 4: Close cURL session
                 curl_close($ch);
         }else{echo "Your input value is in wrong syntax";} 
     } else{echo "Your input value is in wrong method";} 

 }else echo "can not copy the url which contain other person details ";

 ?>