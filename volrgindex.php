<?php
// Check if the authorization header is set
require("admin\admin_input_test.php");
require("admin\database.php");
$headers = getallheaders();
$_POST['key1']='';
$_POST['key2']='';
$js="";
$searck_key=[];
if (isset($headers['Authorization'])){
    // Get the authorization token
    $authHeader = $headers['Authorization'];
    // Split the header to get the token
        list($type, $token) = explode(' ', $authHeader);

    if($type="Love" && $token="Toma"){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Step 2: Get the raw POST data
            $json = file_get_contents('php://input');
            // Step 3: Decode the JSON data
            $data = json_decode($json, true); // true to get an associative array


            function decryptData($encryptedData, $key) {
              $cipher = "AES-128-CTR"; // Must match the encryption algorithm
              $encryptedData = base64_decode($encryptedData); // Decode the Base64-encoded string
              
              // Separate the IV and the encrypted data
              list($iv, $encrypted) = explode('::', $encryptedData, 2);
              
              // Decrypt the data
              $decrypted = openssl_decrypt($encrypted, $cipher, $key, 0, $iv);
              
              return $decrypted;
          }
          
          if($data!='null'){
               $encryptedData =$data['peyload']; // Replace with your actual encrypted data
               $key = "Maruf2131@@"; // Same key used during encryption
          
               $decryptedData = decryptData($encryptedData, $key);
          
                   if ($decryptedData === false) {
                         echo "Decryption failed.";
               } else {
                      $decryptedData=json_decode($decryptedData, true);
                   }
             }
          
            //$js=$data;
            // Step 4: Access the data using the keys
/*             if ($data!='null' && isset($data['key1']) && isset($data['key2'])){
                $class=new input_test\test();
                $_POST['key1']=$data['key1'];
                $_POST['key2']=$data['key2'];
                $name=$class->text('key1');
                $number=$class->number('key2');
                $searck_key[0]=$_POST['key1'];
                $searck_key[1]=$_POST['key2'];
                if($name!='error' && $number!='error'){
                      $sql="SELECT * FROM money_donation WHERE (NUMBER='$number' OR DONATED_BY='$number')  AND DONER='$name'";
                      $result=$_SESSION["conn"]->query($sql);
                      $result=$result->fetchAll();
                     $js=json_encode($result);
                }else{$js=json_encode($js);}
                
                
            } else {
                $js=json_encode($js);
            } */
        } else {
          echo "erro1";
        }
    } else {echo "erro2";}
} else{
  include("sidebar and navbar/sidebar.html");
   include("registration.html");
   include("assetes/footer.html");
}






?>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPID FORCE</title>
    <link rel="stylesheet" href="assetes/volrg.css">
    </script>
    <style>
      .error{
        border: 2px solid red !important;
      }
    </style>
</head>
<body>
<?php
     //include("balence.html");
     ?>
   <?php  //include("sidebar and navbar/sidebar.html");?>
   <?php
     //include("balence.html");
     ?>
   <div class="rg">
        <span>REGISTRATION<span>
    </div>


    <form id ="form" action="assetes\volrg.php" onsubmit=" return valdt()" method="post" enctype="multipart/form-data">
        <div class="rg_form">
            <div class="personal">
              <h6>Personal Information</h6>
              <div class="personal_inner">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name"  required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <label for="phone_number">Phone number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
                <label for="whatsapp_number">Whatsapp number:</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number">
                <label for="gender">Gender:</label>
                <input type="text" name="gender" id="gender" required>
                <label for="blood">Blood:</label>
                <input type="text" name="blood" id="blood" required >
              </div>
           </div>

                <div class="address">
                    <h6>ADDRESS</h6>
                    <div class="permanent">
                        <p>Permanent address</p>
                          <label for="pdistrict">District:</label>
                          <input type="text" name="pdistrict" id="pdistrict" required >
                          <label for="pthana">Thana:</label>
                          <input type="text" name="pthana" id="pthana" required >
                          <label for="paddr">Address:</label>
                          <input type="text" name="paddr" id="paddr" placeholder="village/area/street no" required >
                    </div>

                    <div class="present">
                        <p>Present address</p>
                          <label for="district">District:</label>
                          <input type="text" name="district" id="district"  required>
                          <label for="thana">Thana:</label>
                          <input type="text" name="thana" id="thana" required>
                          <label for="addr">Address:</label>
                          <input type="text" name="addr" id="addr" placeholder="village/area/street no" required>
                    </div>

               </div>

              <div class="education">
                <h6>Educational information</h6>
                  <div class="institute">
                     <label for="institute">Institute:</label>
                      <input type="text" name="institute" id="institute" placeholder="School/College/University:" required>
                    </div>

                    <div class="skill" >
                        <p>skill</p>
                         <label for="s">swimming</label>
                         <input type="checkbox" name="sk[]" id="swimming" value="swimming,">
                         <label for="s">Scout</label>
                         <input type="checkbox" name="sk[]" id="scout" value="scout,">
                         <label for="s">English</label>
                         <input type="checkbox" name="sk[]" id="english" value="english,">
                         <label for="s">Other</label>
                         <input type="checkbox" name="sk[]" id="other" value="other">
                    </div>
               </div>
            <input type="submit" value="NEXT" id="submit" name="next"> 
    </form>
<?php
  //include("assetes/footer.html");
?>
<script src="sidebar and navbar/sidebar.js"></script>
<script>
     /* document.oncontextmenu=()=>{
        document.getElementById("name").setAttribute("required", "");
  
         //return false;
       }
       document.onclick=()=>{
        document.getElementById("name").setAttribute("required", "");
  
         //return false;
       }*/

  check();
  function check(){
    //console.log("maruf");
    document.getElementById("name").setAttribute("required", "");
    document.getElementById("email").setAttribute("required", "");
    document.getElementById("phone_number").setAttribute("required", "");
    document.getElementById("gender").setAttribute("required", "");
    document.getElementById("blood").setAttribute("required", "");
    document.getElementById("district").setAttribute("required", "");
    document.getElementById("thana").setAttribute("required", "");
    document.getElementById("addr").setAttribute("required", "");
    document.getElementById("pdistrict").setAttribute("required", "");
    document.getElementById("pthana").setAttribute("required", "");
    document.getElementById("paddr").setAttribute("required", "");
    document.getElementById("institute").setAttribute("required", "");
    
  }

  function valdt() {
      
             //check();
            let user0=document.getElementById("name").value;
            let user1 = document.getElementById("name");
            

            let user2=document.getElementById("email").value;
            let user3 = document.getElementById("email");
         
        
            let user4=document.getElementById("blood").value;
            let user5 = document.getElementById("blood");
          

            let user6=document.getElementById("gender").value;
            let user7 = document.getElementById("gender");
          

            let user8=document.getElementById("district").value;
            let user9 = document.getElementById("district");
         

            let user10=document.getElementById("thana").value;
            let user11 = document.getElementById("thana");
          

            let user12=document.getElementById("addr").value;
            let user13 = document.getElementById("addr");
            

            let user14=document.getElementById("pdistrict").value;
            let user15 = document.getElementById("pdistrict");
          

            let user16=document.getElementById("pthana").value;
            let user17 = document.getElementById("pthana");
            

            let user18=document.getElementById("paddr").value;
            let user19 = document.getElementById("paddr");
            

            let user20=document.getElementById("institute").value;
            let user21 = document.getElementById("institute");
          

            let user22=document.getElementById("phone_number").value;
            let user23 = document.getElementById("phone_number");

            let user24=document.getElementById("whatsapp_number").value;
            let user25 = document.getElementById("whatsapp_number");
            
            let b1=number_check(user22,user23,0)+string_check(user20,user21)+string_check(user18,user19)+string_check(user16,user17);
            
            let b2=string_check(user14,user15)+string_check(user12,user13)+string_check(user10,user11)+string_check(user8,user9);
            
            let b3= number_check(user24,user25,1)+gender_check(user6,user7)+blood_check(user4,user5)+string_check(user2,user3)+string_check(user0,user1);
          
            let ans=b1+b2+b3;
            if(ans==0) return true;
           else { alert("please input valid information"); return false;}
   
        }

 function gender_check(data,act){
     let val=data.trim();
     let val2=val.toLowerCase();
    const gen=["male","female"];
    if(gen.indexOf(val2)==-1){
      act.classList.add("error");
      return -1;
    }
    else{
        act.value=val;
        return 0;
    }
  }

  function blood_check(data,act){
     let val=data.trim();
     let val2=val.toLowerCase();
    const blo=["a+","a-","b-","b+","o+","o-","ab+","ab-"];
    if(blo.indexOf(val2)==-1){
      act.classList.add("error");
      return -1;
    }
    else{
        act.value=val;
        return 0;
    }
  }

  function string_check( data,act){
        let val=data.trim();
        let re = /['":;<>?]/i;
            if (val.match(re)!=null||val.length==0) {
                act.classList.add("error");
                return -1;
            }
            else {
              act.value=val;
              return 0;
            }
   }

  
   function number_check( data,act,kay){
        let val=data.trim();
        if(val.length==0&&kay==1) return 0;
        let re = /[0-9]/i;
            if (val.match(re)==null||val.length!=11) {
                act.classList.add("error");
                return false;
            }
            else {
              act.value=val;
              return 0;
            }
   }

        window.onclick = function (event) {
            let id=event.target.id;

                document.getElementById(id).classList.remove("error");
        }

</script>

</body>
</html> -->