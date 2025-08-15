<?php
$_SESSION['conn']='';
?>
<?php
  if(empty($_SESSION['conn'])){database();}
  else return $_SESSION['conn'];

  function database(){ 
  $conn='';
  $server="localhost";
  $username="maruf";
  $password="VUYPOWvHH/fnJn[]";
  $database="rapidforce";
  try{
    $conn=new PDO("mysql:host=$server;dbname=$database",$username,$password);
  
     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     $_SESSION['conn']=$conn;
   }
   catch(PDOException $e){
    echo"connection failed".$e->getMessage();
   }

  }

?>