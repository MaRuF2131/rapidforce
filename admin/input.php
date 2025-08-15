<?php
 require_once("database.php");
  
 function string_check($value){

   if(preg_match("/[\"']/",$value)) {
     return false;
   }
   else return $value;
 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return string_check($data);
}

if (isset($_POST['news'])) input_news();

  function input_news(){
      $myfile=fopen("admin/text.txt","w") or die("unable to open file");
        $txt=test_input($_POST["news"]);
         if($txt!=false)fwrite($myfile,$txt);
        fclose($myfile);
        header("location:index.php");
      }

  if(isset($_POST["upload2"])){  img("homecontent/sit/","gellary","upload2","sit");}

  if (isset($_POST['upload1'])){  img("homecontent/slideshow/","upfile","upload1","slide_show");}

  function img($dest,$upfile,$upload,$table){
     $check=array("image/jpg","image/jpeg","image/png","image/gif");

    if (isset($_POST["$upload"])) {
       
          if(empty($_FILES["$upfile"]['name'])) echo"select a img file<br>";

             else{
                     echo"m<br>";
                     $tempname =($_FILES["$upfile"]["tmp_name"]); //strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    
                         if(in_array($_FILES["$upfile"]['type'],$check)){
                             // Get all the submitted data from the form
                              try{ 
                                $filename= test_input($_FILES["$upfile"]["name"]);
                                if($filename==false) return;
                                $sql = "INSERT INTO $table(IMAGE) VALUES ('$filename')";
                              
                              // Execute query
                              $_SESSION['conn']->exec($sql);
                            
                               $folder = $dest.$filename;
                               echo"$folder<br>";
                                    if (move_uploaded_file($tempname, $folder)) {
                                           echo "<h3>&nbsp; Image uploaded successfully!</h3>";
                                        } else {
                                            echo "<h3>&nbsp; Failed to upload image!</h3>";
                                         }
                               }
                                   catch(PDOException $e){
                                    echo"dt upload failed".$e->getMessage();
                                   }
                           }
                   }
      }
   }






    //this for video
   if(isset($_POST['upload3'])){ video($_POST['typ'],'video','upload3', $_POST['typ']);}
   function video($dest,$upfile,$upload,$table){
    $check=array("video/mp4","video/avi","video/webm","video/mov");

   if (isset($_POST["$upload"])) {
      
         if(empty($_FILES["$upfile"]['name'])) echo"select a video file<br>";

            else{
                    //echo"m<br>";
                    $tempname =($_FILES["$upfile"]["tmp_name"]); //strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   
                        if(in_array($_FILES["$upfile"]['type'],$check)){
                            // Get all the submitted data from the form
                             try{ 
                               $filename= test_input($_FILES["$upfile"]["name"]);
                               if($filename==false) return;
                               $sql = "INSERT INTO $table(video) VALUES ('$filename')";
                             
                             // Execute query
                             $_SESSION['conn']->exec($sql);
                           
                              $folder = "homecontent/".$dest."/".$filename;
                              echo"$folder<br>";
                                   if (move_uploaded_file($tempname, $folder)) {
                                          echo "<h3>&nbsp; video uploaded successfully!</h3>";
                                       } else {
                                           echo "<h3>&nbsp; Failed to upload video!</h3>";
                                        }
                              }
                                  catch(PDOException $e){
                                   echo"dt upload failed".$e->getMessage();
                                  }
                          }
                  }
     }
  }
?>