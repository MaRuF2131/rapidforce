<?php
require("admin/database.php");
$sql="SELECT * FROM volunteer";
$result= $_SESSION['conn']->query($sql);
$result= $result->fetchAll();
$sz=sizeof($result);
$i=0;
$mid=0;
?>