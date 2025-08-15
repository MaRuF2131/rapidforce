<?php
  require("admin_input_test.php");
  if(isset(($_GET['data']))&& !empty($_GET['data'])){
         $data=$_GET['data'];
         $class=new  input_test\test();
         if($class->text($data)=='true'){
      
         }
         else echo"You can not access this page";
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body{
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
            background-color: #f4f7f6;
        }

        * {
              -ms-overflow-style: none;  /* Internet Explorer 10+ */
             scrollbar-width: none;  /* Firefox */
        }
       *::-webkit-scrollbar { 
              display: none;  /* Safari and Chrome */
           }
          *{
                box-sizing: border-box;
                margin: 0px;
               padding: 0px;
         }
         .head{
            z-index: 1000;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            position: sticky;
            top:0;
            left:0;
            width: 100%;
            height: auto;
            min-height: 50px;
            background-color: crimson;
            color: cyan;
         }
         form{
            display: flex;
            flex-wrap: wrap;
            justify-content:space-between;
            align-items: start;
            padding: 5px;
         }

         #story{
            display: flex;
            flex-wrap: wrap;
            align-items: start;
            justify-content: start;
            resize: none;
            padding: 0px;
            margin-bottom:50px;
            width:40%;
            height: 450px;
            overflow-y: auto;
         }
        .first-table label{
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
            align-items: center;
        }
       .first-table input,.first-table label{
            height: 35px;
            width:40%;
            padding: 5px;
            margin-bottom: 5px;
            background-color:rgba(130, 242, 134,0.5);
            border: none;
            border-radius: 5px;
        }
        .first-table input:hover,.first-table label:hover{
            background-color: #f4f7f6;
        }
        .first-table{
            z-index: 1000;
            position:fixed;
            bottom:0;
            left:0;
            display: flex;
            flex-wrap: wrap;
            justify-content:space-between;
            align-items: center;
            background-color:rgb(76, 175, 80);
            height:auto;
            width: 100%;
            padding:5px;
        }

        .first-table input,.first-table label{
            overflow: auto;
        }
        .content{
            display: flex;
            flex-wrap: wrap;
            justify-content: right;
            align-items:end;
            width:59%;
            margin-bottom:100px;
        }
         table{
            width:100%;
            height: auto;
            border-collapse:separate;
        }
        td{
            text-align: center;
            background-color:transparent;
            width:25%;
            height:30px;
        }
        th{ 
            background-color:black;
            text-align: center;
            color: white;
            width:25%;
            height: 40px;
            padding: 5px;
        }
        table input{
            display: flex;
            flex-wrap: wrap;
            overflow-y: auto;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color:transparent;
            height:100%;
            width:100%;
            border: none;
        }

        form span{
            position:absolute;
            left:98%;
            transform: translateY(30px);
            color: red;
            font-size: 30px;
            cursor: pointer;
        }
        tr{
            background-color: white;
        }
        tr:nth-child(even){
         background-color:rgba(239, 234, 234, 0.927);
        }
        tr:hover{
            background-color:rgb(200, 215, 220);
        }

    </style>
</head>
<body>
         <div class="head">
            <h3>Write story about this place and enter volunteers name and phone number who have worked in this place</h3> 
        </div>
    <form action="" method="post" enctype="">
        <div class="first-table">
          <input type="file" name="image[]" id="image" multiple accept="image/*" hidden required>
          <label for="image">Upload images of this place</label>
          <input type="submit" value="Submit" name="submit"> 
          </div>
          <textarea  name="story" id="story" placeholder="Write some story about this place"></textarea>
       <div class="content">  
          <table class="second-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone number</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <span class="plas">+</span>
        </div>     
    </form>

<script>

let i=1;
  document.querySelector(".plas").addEventListener("click",function(){
    
      const bd = document.querySelector('tbody');
            var row = document.createElement('tr');
             var cell1= document.createElement('td');
             var cell2= document.createElement('td');


             var cell1_value=document.createElement("input")
             var cell2_value=document.createElement("input")

          
            cell1_value.type='text';
            cell1_value.name='name'+i;
            cell1_value.required=1;
            cell1_value.placeholder='name';
            cell1_value.addEventListener("keydown",function(event){    
                     if (string_check(event.key)!=1) {
                          event.preventDefault();
                       }
                      })

            cell2_value.type='text';
            cell2_value.name='number'+i;
            cell2_value.required=1;
            cell2_value.placeholder='number';
            cell2_value.addEventListener("keydown",function(event){    
                     if (number_check( event.key)!=1) {
                          event.preventDefault();
                       }
                      })



            cell1.appendChild(cell1_value);
            cell2.appendChild(cell2_value);

            row.appendChild(cell1);
            row.appendChild(cell2);

            bd.appendChild(row);
            i++;

});

document.querySelector("#story").addEventListener("keydown",function(event){
    if (string_check(event.key)!=1) {
                          event.preventDefault();
                       }
  })


document.querySelector('#image').addEventListener('change', function() {
    var label = this.nextElementSibling;
    
    // Check if files were selected
    if (this.files.length > 0) {
        let filenames = [];
        let error=['type error on:'];
        for (let i = 0; i < this.files.length; i++) {
            let file = this.files[i].name;

            if (img_check(this.files[i].type) === 1){
                filenames.push(file); // Add valid file names to the array
            } else {
                error.push(i+1); // Add error message for invalid types
            }
        }
        // Display the selected file names or error messages
        if(error.length==1){label.textContent = filenames.join(', ');}
             else{label.textContent = error.join(', ');}
    } else {
        label.textContent = 'Choose images'; // Reset to placeholder when no file is selected
    }
});

function img_check( data){
    let val=String(data.toLowerCase());
    const validTypes = ['image/jpeg', 'image/png', 'image/gif','image/jpg'];
            if (!(validTypes.includes(val))) {
                return 0;
            }
            else{
                return 1;
            }
}

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
</script>
</body>
</html>