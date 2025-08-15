<?php
  require("admin/database.php");
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
  require("assetes/form input test.php");
   //$nameErr = $emailErr = $phoneErr=$whatsappErr=$genderErr = $bloodErr = "";
   $form_value=array("name","email","phone","whatsapp","blood","gender","district","thana","addr"
                     ,"pdistrict","pthana","paddr","institute");

    $class = new form_space\form_check();
    $name=!empty($_POST['name'])?$class->string_check("name"):"";

    $email=!empty($_POST['email'])?$class->email_check("email"):"";

    $whatsapp = !empty($_POST['whatsapp_number'])?$class-> number_check("whatsapp_number"):"Null";

    $phone =!empty($_POST['phone_number'])?$class-> number_check("phone_number"):"";

    $gender=!empty($_POST['gender'])?$class->gender_check("gender"):"";

    $blood=!empty($_POST['blood'])?$class->blood_check("blood"):"";

    $district=!empty($_POST['district'])?$class->string_check("district"):"";

    $thana=!empty($_POST['thana'])?$class->string_check("thana"):"";

    $addr=!empty($_POST['addr'])?$class->string_check("addr"):"";

    $pdistrict=!empty($_POST['pdistrict'])?$class->string_check("pdistrict"):"";

    $pthana=!empty($_POST['pthana'])?$class->string_check("pthana"):"";

    $paddr=!empty($_POST['paddr'])?$class->string_check("paddr"):"";

    $institute=!empty($_POST['institute'])?$class->string_check("institute"):"";

    $check=!empty($_POST['sk'])?$class->check_box("sk"):"other";

   $bool=true;
      foreach($form_value as $v){
           if($$v=="error"){$bool=false;echo"$v field is invalid<br>";}
          else if($$v==""||$$v==false){$bool=false;echo"must enter your $v<br>";}
           else{
            echo $$v."<br>";
           }
       } 

     if($bool===true){
        $present_address=$district.'.'.$thana.'.'.$addr;
        $permanent_address=$pdistrict.'.'.$pthana.'.'.$paddr;
        // Example of inserting data into a table using a prepared statement
        try {
            // Define your table and columns
            $table = "volunteer"; // Replace with your table name
            $sql = "INSERT INTO $table 
                    (id,name, email, phone, whatsapp, blood, gender, institute, skill, present_address, permanent_address) 
                    VALUES (:id,:name, :email, :phone, :whatsapp, :blood, :gender, :institute, :checkbox, :present_address, :permanent_address)";
        
            // Prepare the SQL statement
            $stmt = $_SESSION['conn']->prepare($sql);
        
            // Bind parameters
            $stmt->bindParam(':id', $phone);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':whatsapp', $whatsapp);
            $stmt->bindParam(':blood', $blood);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':institute', $institute);
            $stmt->bindParam(':checkbox', $check); // Assuming $check is a string
            $stmt->bindParam(':present_address', $present_address);
            $stmt->bindParam(':permanent_address', $permanent_address);
        
            // Execute the statement
            $stmt->execute();
        
            echo "Data inserted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
      
        
            echo'maruf';
/*          //encryption technique
        function encryptData($data, $key) {
            $cipher = "AES-128-CTR"; // Encryption algorithm
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $encrypted = openssl_encrypt($data, $cipher, $key, 0, $iv);
        
            // Return the IV and encrypted data together
            return base64_encode($iv . '::' . $encrypted);
          }
        
              // Step 1: Initialize cURL
               $ch = curl_init();
            
               // Step 2: Set cURL options
                   $url = "http://192.168.0.105/rapid%20force/volrgindex.php"; // Replace with your target URL
                  $data = array(
                          "name"=>$name,
                          "email"=>$email,
                          "phone"=>$phone,
                          "whatsapp"=>$whatsapp,
                          "blood"=>$blood,
                          "gender"=>$gender,
                          "present"=>$district.'.'.$thana.'.'.$addr,
                          "permanent"=>$pdistrict.'.'.$pthana.'.'.$paddr,
                          "institute"=>$institute,
                          "checkbox"=>$check
                   );
               
                   $headers = array(
                        "Content-Type: application/json", // Set content type
                        "Authorization: Love Toma", // Optional: if you need to include an authorization token
                         "Accept: application/json"
                     );

                     $key = "Maruf2131@@"; // Use a strong key
                     $jsonData = json_encode($data); // Convert to JSON
                     $encryptedData = encryptData($jsonData, $key);
               
               
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode(['peyload'=>$encryptedData]));
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
                    curl_close($ch);*/
    } 
}

?>
