<?php
require("admin\admin_input_test.php");
require("admin\database.php");

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['donate1'])){
          
            if(isset($_POST['name']) && isset($_POST['number']) && isset($_POST['amount'])){

                if(!empty($_POST['name'])&&!empty($_POST['number'])&&!empty($_POST['amount'])){
                    $class=new input_test\test();
                    $name=$class->text('name');
                    $number=$class->number('number');
                    $amount=$class->number('amount');

                    if($number!='error' && $amount!='error' && $number!='error'){
                                   $number=(float)$number;
                                   $amount=(float)$amount;
                                   date_default_timezone_set('Asia/Dhaka');
                                   $donate_date=date('d-m-y');
                    }
                }
            }


}


?>