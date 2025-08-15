<?php
// Check if the authorization header is set
require("admin\admin_input_test.php");
require("admin\database.php");
$headers = getallheaders();
$_POST['key1']='';
$_POST['key2']='';
$js="";
$searck_key=[];
if (isset($headers['Authorization'])) {
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
            //$js=$data;
            // Step 4: Access the data using the keys
            if ($data!='null' && isset($data['key1']) && isset($data['key2'])){
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
            }
        } else {
            $js=json_encode($js);
        }
    } else {$js=json_encode($js);};
} else  $js=json_encode("f");





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic table styling */
        body {
            font-family: Arial, sans-serif;
            padding:0px;
            margin: 0px;
            height:100vh; /* Just for demonstration - makes the page longer */
        }
        *{
            box-sizing: border-box;
            margin: 0px;
        }

        h2{
            width: 100%;
            height:auto;
            text-align: center;
            padding: 5px;
            color:black;
            background-color: #ddd;
        }

        table {
            position:absolute;
            width: 100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:gray;
        }

        tr:nth-child(even){
         background-color:rgba(239, 234, 234, 0.927);
        }
        tr:hover{
            background-color:rgb(200, 215, 220);
        }

        tr {
            background-color: white;
            opacity: 0; /* Start with transparent */
            scale: .5;
            transform: translateY(-20px);
            transition: opacity 1s ease, transform .5s ease,scale 1s ease; /* Transition effect */
        }

        .show {
            opacity: 1; /* Fully visible */
            scale: 1;
            transform: translateY(0);
        }

        .sticky-form{
            z-index: 1000;
            position: sticky;
            top:7rem;
            margin-top: 7rem;
            display: flex;
            flex-wrap: wrap;
            width:100%;
            gap:10px;
            background-color: black;
        }

        /* Input search styling */
        input[type=submit],input[type=text] {
            margin-top:5px;
            padding:10px;
            font-size: 16px;
            max-width: 150px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type=submit]{
            cursor: pointer;
        }

        /* No data found message */
        .no-data {
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            display: none;
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <?php include("sidebar and navbar/sidebar.html")?>

    <!-- Search input field -->
     <form action="mydoantion search.php" method="post"  class="sticky-form" enctype="multipart/form-data">
          <h2>Search Donation by Name and Number</h2>
          <input type="text" name="name" value="" placeholder="Enter name" class="name">
          <input type="text" name="number" value='' placeholder="Enter number" class="number">
          <input type="submit" id="search" name="search" value="Search">
    </form>

    <!-- Table to display data -->
    <table id="data-table">
        <thead style="display:none">
            <tr>
                <th>Send by</th>
                <th>Method</th>
                <th>Date/Time</th>
                <th>Amount</th>
                <th>Distributed(100%)</th>
                <th>Current Amount</th>
            </tr>
        </thead>
        <tbody>
             
        </tbody>
    </table>

    <!-- Message when no data is found -->
    <p id="no-data-message" class="no-data" >No matching name and phone number.</p>

    <script>
        // Function to search through the table and display relevant rows
         let v= JSON.parse('<?php print_r($js)?>');

    let j=0;
    const bd = document.querySelector('tbody');
    bd.innerHTML='';
    if(v.length<=0){
        document.querySelector(".no-data").style.display='flex';
        document.querySelector(".name").value='<?php echo $searck_key[0]; ?>';
        document.querySelector(".number").value='<?php echo $searck_key[1]; ?>';
    }
    else{
        if(v!=='f'){
            console.log(v)
            document.querySelector(".name").value='<?php echo $searck_key[0]; ?>';
            document.querySelector(".number").value='<?php echo $searck_key[1]; ?>';
            document.querySelector('thead').style.display='table-header-group';
        while(j<v.length){
             var row = document.createElement('tr');
             var cell1= document.createElement('td');
             var cell2= document.createElement('td');
             var cell3= document.createElement('td');
             var cell4= document.createElement('td');
             var cell5= document.createElement('td');
             var cell6= document.createElement('td');
 
            cell1.textContent=v[j]['DONATED_BY'];
            cell2.textContent=v[j]["METHOD"];
            cell3.textContent=v[j]['DONATE_DATE'];
            cell4.textContent=v[j]['AMOUNT'];
            cell5.textContent=v[j]['DISTRIBUTED']?v[0]['DISTRIBUTED']+"%":"0%";
            cell6.textContent=v[j]['CURRENT_AMOUNT'];

            row.appendChild(cell1);
            row.appendChild(cell2);
            row.appendChild(cell3);
            
            row.appendChild(cell4);
            row.appendChild(cell5);
            row.appendChild(cell6);

            bd.appendChild(row);
            j++;
        }
      }
    }

         document.querySelector(".name").addEventListener("keydown",function(event){
            if (string_check(event.key)!=1) {
                          event.preventDefault();
                       }
         }) 

         document.querySelector(".number").addEventListener("keydown",function(event){
            if (number_check(event.key)!=1) {
                          event.preventDefault();
                       }
         })  


        function string_check( data){
        let val=String(data);
        let re = /['":;<>?]/i;
            if (val.match(re)!=null){
                return 0;
            }
            else {
              return 1;
            }
      }

      function number_check( data){
        let val=String(data);
        let re = /[^0-9]/i;
            if ((val.match(re)!=null&&val!="Backspace")||val.length<0) {
                return 0;
            }
            else{
              return 1;
            }
   }
                // Wait for the document to load
     window.onload = function() {
            const rows = document.querySelectorAll('#data-table tr');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.classList.add('show'); // Add the class to fade in
                }, index *300); // Delay each row's animation
            });
        };
    </script>
    <script src="sidebar and navbar/sidebar.js"></script>

</body>
</html>