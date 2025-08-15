<?php
require("admin_input_test.php");
$table_one=[];
$table_two=[]; 
$error_one=[];
$error_two=[];


//this is for top table 
if ($_SERVER["REQUEST_METHOD"] =="POST"&&isset($_POST['submit'])) {

        $input_count = count(array_filter($_POST))+count(array_filter($_FILES));
        $class=new input_test\test();  
     if(isset($_POST['work_name'])){
       $work_name=$class->text("work_name");
       if($work_name!="error"){array_push($table_one,$work_name);}
          else{array_push($error_one,1);}
        }

     if(isset($_POST['work_type'])){
        $work_type=$class->text("work_type");
        if($work_type!="error"){array_push($table_one,$work_type);}
           else{array_push($error_one,2);}
        }

     if(isset($_POST['location'])){
        $location=$class->text("location");
        if($location!="error"){array_push($table_one,$location);}
           else{array_push($error_one,3);}
        }

     if (!empty($_FILES["video"]["name"][0])) { // Check if the first file is set
             $tmp=[];
            foreach ($_FILES["video"]["name"] as $key => $name) {
                // Get the file type and temporary name
                $fileType = strtolower($_FILES["video"]["type"][$key]);
                $tmpName = $_FILES["video"]["tmp_name"][$key];
  
                // Process the video using your class method
                $video = $class->video($fileType, $name);
  
               if ($video != "error") {
                           $tmp[$name]=$tmpName;
                } else {
                    array_push($error_one, 4);
                 }
          }
          array_push($table_one, $tmp);
       } else {
                  array_push($table_one, "null");
           }

     if(isset($_POST['work_date'])){
        $work_date=$class->text("work_date");
        if($work_date!="error"){array_push($table_one,$work_date);}
           else{array_push($error_one,5);}
       }


     //work for table ;
    for($i=1;$i<=($input_count-5)/4;$i++){
         $error=[];
         $valid=[];
        if(isset($_POST['service'.$i])){
            $service=$class->text('service'.$i);
            if($service!="error"){array_push($valid,$service);}
               else{array_push($error,1);}
         }

         if(isset($_POST['quantity'.$i])){
            $quantity=$class->text('quantity'.$i);
            if($quantity!="error"){array_push($valid,$quantity);}
               else{array_push($error,2);}
         }

         if(isset($_POST['cost'.$i])){
            $cost=$class->number('cost'.$i);
            if($cost!="error"){array_push($valid,$cost);}
               else{array_push($error,3);}
         }

         if((!empty($_FILES['file'.$i]["name"][0]))){
            $tmp=[];
            foreach ($_FILES["file".$i]["name"] as $key => $name) {
                 $file=$class->image(strtolower($_FILES['file'.$i]["type"][$key]),($_FILES['file'.$i]["name"][$key]));
                     if($file!="error"){$tmp[$file]=$_FILES['file'.$i]["tmp_name"][$key];}
                      else{array_push($error,4);}
            }
            array_push($valid,$tmp);
         }


         if(sizeof($error)>0){array_push($error_two,$error);}
         if(!(sizeof($error_two)>0)){array_push($table_two,$valid);}
    }
    //this for error check
     if(sizeof($error_one)>0) foreach($error_one as $err){echo "error on topbar and column $err <br>";}
     if(sizeof($error_two)>0) foreach($error_two as $err){
             echo"error on sheet<br>";
             foreach($err as $clm) echo "column $clm <br>";
     }
}

// this for data base call

if(sizeof($error_one)<=0 && sizeof($error_two)<=0){ insert_into_databas($table_one,$table_two);}
  
   function insert_into_databas($table_one,$table_two){
      require("database.php");
      $bool=0;
      // this for first table insert
      if(sizeof($table_one)===5){
          $string=implode(",",array_keys($table_one[3]));
         $sql="INSERT INTO distribution(work_name,work_type,location,video,work_date)
            values(
               '$table_one[0]','$table_one[1]','$table_one[2]','$string','$table_one[4]'
              )
             ";
            try{ 
               $bool=$_SESSION["conn"]->exec($sql);
              if($table_one[3]!='null') 
                     { 
                        foreach($table_one[3] as $key=>$name){
                        if(move_uploaded_file( $name,('homecontent/work_video/'.$key))) echo"upload succesful<br>";
                             else echo "upload faild <br>";
                        }
                     }
            }
           catch(error){

           }
         }

         //this for second table insert
         if($bool===1){ 
            $table_name=$table_one[0];
            $sql="CREATE TABLE $table_name(
             ID BIGINT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
             SERVICES VARCHAR(100) NOT NULL,
             QUANTITY VARCHAR(100) NOT NULL,
             COST DOUBLE(100) NOT NULL,
             MONEY_RECIPT VARCHAR(65500) NOT NULL
             )";
             $bool= $_SESSION["conn"]->exec($sql);

            $j=0;
          while($j<sizeof($table_two)){
            $set=$table_two[$j];
            $string=implode(',',array_keys($set[3]));
           $sql="INSERT INTO $table_name(SERVICES,QUANTITY,COST,MONEY_RECIPT)
           values(
              '$set[0]','$set[1]','$set[2]','$string'
             )";
            $bool+=$_SESSION["conn"]->exec($sql);
          foreach($set[3] as $key=>$name){
                 if(move_uploaded_file($name,('homecontent/money_recipt/'.$key))) echo"ss<br>";
                    else echo "ff<br>";

             }
             $j++;
         }
      }
      if($bool===$j){
         $url="admin/story.php?data=".urlencode("true");
         header("Location:$url");
         exit();
      }
   }
?>