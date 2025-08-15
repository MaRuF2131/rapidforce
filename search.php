<?php

require("search2.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function number_check($value){
  $value=test_input($value);
  if($value==false) return "1";

if(preg_match("/[^0-9]/",$value)) {
  return "1";
}
 else return $value;
}

$flag='-1';
usort($result, function($a, $b) {
  if ($a['ID'] > $b['ID']) {
      return 1;
  } elseif ($a['ID'] < $b['ID']) {
      return -1;
  }
  return 0;
});

  if(isset($_POST['search'])){
    $search=number_check($_POST['search']);
    if(strlen($search)!=11) echo $flag;
    else{
        $low=0;
        $high=$sz-1;
        while($low<=$high){
          $mid=($low+$high)/2;
          if($result[$mid]["ID"]<$search) $low++;
          else if($result[$mid]["ID"]>$search) $high--;
          else {
            $srch=$mid;
            $flag='1';
/*             if($result[$mid]["WORK_KEY"]!=""){
            } */
            echo json_encode($result[$mid]);
            return 0;
          }
          
        }
       echo $flag;
    }
  }
  else echo $flag;
?>

