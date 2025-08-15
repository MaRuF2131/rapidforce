<?php
 require("admin/database.php");
 require("admin/admin_input_test.php");
 $top_data=[];
 $table_data=[];
 $money_recipt=[];
 if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['search'])){   
    if(!empty($_POST['search'])){
        $class=new input_test\test();
        $key=$class->text('search');
        if($key!="error"){
             call_database($key);
        }
    }

 }

 function call_database($key){
       global $top_data;
       global $table_data;
       global $money_recipt;
       $result_array=[];
         function marg_array(&$arr ,$index,$values){
            if(!isset($arr[$index])){
               $arr[$index]=[];
            }
            $values=explode(",",$values);
           array_push($arr[$index],$values);
       } 

         $sql="SELECT * FROM distribution WHERE work_name='$key'";
         $result=$_SESSION['conn']->query($sql);
         $result=$result->fetchAll();
         $top_data=$result;
         array_push($result_array,$top_data);

         $sql="SELECT * FROM $key";
         $result=$_SESSION['conn']->query($sql);
         $result=$result->fetchAll();
         $table_data=$result;
         //echo sizeof($table_data);
         array_push($result_array,$table_data);

         for($i=0;$i<sizeof($table_data);$i++){
                  marg_array($money_recipt,$table_data[$i][1],$table_data[$i][4]);
         }
  
         array_push($result_array,$money_recipt);
         echo json_encode($result_array);
 }
?>