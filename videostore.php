
<?php
require("admin/database.php");
$mrg;
       $sql="SELECT VIDEO FROM vsit";
                $result= $_SESSION['conn']->query($sql);
                $result1= $result->fetchAll();
                for($i=0;$i<sizeof($result1);$i++) $result1[$i][0]="vsit/".$result1[$i][0];

                $sql="SELECT VIDEO FROM vbonna";
                $result= $_SESSION['conn']->query($sql);
                $result2= $result->fetchAll();
                for($i=0;$i<sizeof($result2);$i++) $result2[$i][0]="vbonna/".$result2[$i][0];
        $mrg=array_merge($result1,$result2);
                $sql="SELECT VIDEO FROM vbikkho";
                $result= $_SESSION['conn']->query($sql);
                $result3= $result->fetchAll();
                for($i=0;$i<sizeof($result3);$i++) $result3[$i][0]="vbikkho/".$result3[$i][0];
        $mrg=array_merge($mrg,$result3);
 ?>                