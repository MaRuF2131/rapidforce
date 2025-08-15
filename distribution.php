<?php
 require("distribution search.php");
 
 $sql="SELECT work_name, work_date FROM distribution";
 $result2=$_SESSION["conn"]->query($sql);
  $result2=$result2->fetchAll();

  usort($result2, function ($a, $b) {
       return strtotime($b['work_date']) <=> strtotime($a['work_date']);
   });
  $sz=sizeof($result2);
  $i=0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        .distribution{
              display: flex;
              flex-wrap: wrap;
              justify-content:right;
              align-items: center;
              height: 100%;
              width: 100%;
              background-color: transparent;
        }
        .distribution-date{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            overflow:hide;
            border-radius: 5px;
            width: 19%;
            padding-left:5px;
            color:palegoldenrod;
            background-color: black;
            position: fixed;
            top:7rem;
            left:0;
            bottom:0;
            z-index:1010;
            transition: all .7s ease-in-out;
        }
        .distribution-date ul{
            list-style: none;
            overflow-y: auto;
            margin: 0;
            padding: 0;
            padding-bottom:150px;
            width: 100%;
            height: 100%;
        }
        .distribution-date ul li{
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            height:35px;
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            background-color:darkgreen;
        }
        .distribution .distribution-body{
            display: flex;
            flex-direction:column;
            justify-content: start;
            align-items: center;
            height: 100%;
            width:78%;
            padding-right: 5px;
            margin-top: 7rem;
        }
        .distribution .distribution-content{
            position:relative;
            display: flex;
            flex-direction:column;
            justify-content:start;
            align-items: center;
            width: 100%;
        }
        .distribution .distribution-body .distribution-nav{
            position:sticky;
            top: 7rem;
            z-index: 1000;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 30px;
        }
        .distribution .distribution-body .distribution-nav select{
             appearance: none;
             display: flex;
             flex-wrap: wrap;
             background-color: white;
             margin: 0px;
             width: 100%;
             height:100%;
             border-radius: 5px;
             outline: none;
        }
       .distribution-date ul li:hover{
             background-color: aqua;
             color:black;
             cursor: pointer;
          } 

   .first-table{
            display: flex;
            flex-wrap: wrap;
            justify-content:space-between;
            align-items: center;
            background-color:rgb(76, 175, 80);
            height:auto;
            width: 100%;
            margin-top:10px;
            padding:10px;
        }
         table{
            width: 100%;
            height: auto;
            border-collapse:separate;
            border: 2px solid rgb(76, 175, 80);
        }
        thead{
            width: 100%;
        }
        td{
            text-align: center;
            background-color:transparent;
            height:30px;
        }
        th{ 
            background-color:black;
            text-align: center;
            color: white;
            height: 40px;
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
        .distribution-body .distribution-content .money-recipt{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .distribution-body .distribution-content .dv{
            margin-bottom: 15px;
            display: inline-flex;
            justify-content:center;
            align-items: center;
            overflow-y: hidden;
            overflow-x: auto;
            width:100%;
            height:300px;
            background-color:rgba(0,0,0,1);
            border-radius: 5px;
        }
      .distribution-content .money-recipt img{
         width:min(300px,100%);
         min-width:300px;
         height: 250px;
         margin: 5px;
         cursor: pointer;
         transition: transform .2s ease-out;
      }
      .distribution-content .money-recipt span{
        width:100%;
        color:aquamarine;
        background-color: black;
      }
      .distribution-content .money-recipt img:hover{
        transform: scale(1.2);
        
      }
      .video{
        display: none;
        flex-wrap: wrap;
        justify-content: center;
        align-items:center;
        width: 100%;
      }
      .video p,.volunteer p{
        color:red;
        text-align: center;
        background-color: darkkhaki;
        width: 100%;
        height: 30px;
        padding: 5px;
        border-radius: 5px;
      }
      video{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        height:400px;
        overflow: hidden;
        border-radius: 5px;
        background-color: black;
        margin-bottom:30px;
      }

      .place_story{
        display: none;
      }
      .volunteer{
        display: none;
      }

      .people_vice{
        display: none;
      }

      .picture{
        display: none;
      }
   .arrow{
        display: block;
        position: fixed;
        left: 0;
        top:85px;
        z-index:1010;
        height: 40px;
        width: 40px;
        cursor: pointer;
    }

    #clicked {
            background-color:peru;
        }

    @media(width<601px){
      :is(.distribution-date){
        top:7.5rem;
        left:-200%;
        width:70%;
      }
      :is(.distribution .distribution-body){
        width: 100%;
        padding:5px;
        align-items: end;
        margin-top: 5rem;
      }
      :is(.distribution .distribution-body .distribution-nav){
         width:92%;
         top:5.7rem;
      }
      :is(.arrow){
       display:block;
      }
    }

    @media(width>600px){
      :is(.distribution-date){
        top:7rem;
        left:0;
        width:20%;
      }
      :is(.arrow){
       display: none;
      }
    }

   
    </style>
</head>
<body>

<?php
     //include("resizevideo.php");
    ?>

<?php
     include("donatebutton.php");
     ?>

   <?php
      include("sidebar and navbar/sidebar.html");
     ?>
       <?php
       include("balence.html");
     ?>
  <div class="arrow">
        <img id="ar"src="logo/icon/chevron-forward-outline.svg" alt="more" >
     </div>
<div class="distribution">
       <div class="distribution-date" id="">
          <p style="background-color:pink;color:black; width:100%;padding:5px;text-align:center;">LIST OF WORK DATE</p>
          <ul class="ul">
          </ul>
       </div>
    <div class="distribution-body">
            <div class="distribution-nav">
             <select id="myDropdown">
                 <option value="money">Money</option>
                 <option value="place_story">Place story</option>
                 <option value="volunteers">Volunteers</option>
                 <option value="benefited people">benefited people</option>
                 <option value="picture">Picture</option>
                 <option value="video">Video</option>
                 <option value="people_vice">People vice</option>
              </select>
          </div>   
        <div class="distribution-content">
               <div class="first-table">
                </div>

              <table class="second-table">  
                 <thead>
                      <tr>
                       <th>SERVICE</th>
                       <th>QUANTITY</th>
                       <th>COST</th>
                     </tr>  
                 </thead>

                  <tbody> 
                 
                  </tbody>
              </table>
              <p style="color:red;margin-top:50px; font-size:22px;">Copy of money recipt</p>
              <div class="money-recipt">


              </div>

        </div>
        

          <div class="video"> 
              </div>

           <div class="place_story"> 
              </div>

          <div class="volunteers"> 
              </div>

           <div class="picture"> 
              </div>

           <div class="people_vice"> 
              </div>
   </div>
</div>



   

<script src="sidebar and navbar/sidebar.js"></script>
<script type="text/javascript">
 function call_content(loop){
      //this for money-recipt
      content_change("money")
      let recipt=document.querySelector(".money-recipt");
            recipt.innerHTML='';
            let arr=loop[2];
            Object.keys(arr).forEach(index=>{
                let spn=document.createElement("span");
                    spn.textContent="Money recipt of "+index;
                    recipt.appendChild(spn);
                    let m=0;
                    let dv=document.createElement("div");
                        dv.className="dv";
                  while(m<arr[index].length){
                         let im_array=arr[index][m];
                         im_array.forEach(im=>{
                             var image=document.createElement('img');
                             image.src='admin/homecontent/money_recipt/'+im;
                             dv.appendChild(image);
                         })
                         m++;
                    }
                   recipt.appendChild(dv); 
                });
     // this for table information 
     let top=document.querySelector(".first-table");
     top.innerHTML='';
             var cell1= document.createElement('span');
             var cell2= document.createElement('span');
             var cell3= document.createElement('span');
             cell1.textContent=loop[0][0][1];
             cell2.textContent=loop[0][0][2];
             cell3.textContent=loop[0][0][4];
             top.appendChild(cell1);
             top.appendChild(cell2);
             top.appendChild(cell3);

    // this for table data 
    let j=0;
    const bd = document.querySelector('tbody');
    bd.innerHTML='';
    var cost=0;
    while(j<loop[1].length){
             var row = document.createElement('tr');
             var cell1= document.createElement('td');
             var cell2= document.createElement('td');
             var cell3= document.createElement('td');
 
            cell1.textContent=loop[1][j][1];
            cell2.textContent=loop[1][j][2];
            cell3.textContent=loop[1][j][3];
            cost+=loop[1][j][3];

            row.appendChild(cell1);
            row.appendChild(cell2);
            row.appendChild(cell3);

            bd.appendChild(row);
            j++;
        }
        var row = document.createElement('tr');
        var cell4= document.createElement('td');
            cell4.textContent="TOTAL COST: "+cost;
            cell4.colSpan="3";
            row.appendChild(cell4);

          bd.appendChild(row);

    let vd= document.querySelector(".video");
         vd.innerHTML='';
         let string=loop[0][0][3];
         let video=string.split(",");
         let p=document.createElement("p");
           p.textContent="Watch our video:";
           vd.appendChild(p);
         video.forEach(name=>{
            vfile=document.createElement("video");
            vfile.controls=1;
            vfile.src='admin/homecontent/work_video/'+name;
            vd.appendChild(vfile);
         })

         
    let vltrs= document.querySelector(".volunteers");
         vltrs.innerHTML='';
         let str=loop[0][0][3];
         let im=str.split(",");
         let p2=document.createElement("p");
           p2.textContent="See our banner image:";
           vltrs.appendChild(p2);
         im.forEach(name=>{
            vfile=document.createElement("img");
            vfile.src='admin/homecontent/work_video/'+name;
            vltrs.appendChild(vfile);
         })
}





    let i=<?php echo sizeof($result2); ?>;
    let result=JSON.parse('<?= json_encode($result2); ?>');
       
    const parent=document.querySelector(".ul");

  for(let j=0;j<i;j++){
     const list= document.createElement("li");
        list.setAttribute("data-set",result[j][0]);
        list.textContent=result[j][1];
        if(j===0)list.id="clicked";
        list.addEventListener("click",function(event){

            $(document).ready(function(){ 
                  var key=list.getAttribute("data-set");
                $.ajax({
                      url:'distribution search.php',
                      type:'post',
                      data:{search:key},
                      success:function(result){
                        call_content(JSON.parse(result));
                      }
              });
        })
             
      });
      parent.appendChild(list);
   }

   //default search
   $(document).ready(function(){ 
                $.ajax({
                      url:'distribution search.php',
                      type:'post',
                      data:{search:result[0][0]},
                      success:function(result){
                        call_content(JSON.parse(result));
                      }
              });
        })

    document.querySelector("#myDropdown").addEventListener("change",function(event){
          let value=this.options[this.selectedIndex].value;
           content_change(value)
    })
    function content_change(v){
         document.querySelector(".distribution-content").style.display='none';
         document.querySelector(".place_story").style.display='none';
         document.querySelector(".volunteers").style.display='none';
         document.querySelector(".picture").style.display='none';
         document.querySelector(".people_vice").style.display='none';
         document.querySelector(".video").style.display='none';

         if(v=="money"){document.querySelector(".distribution-content").style.display='flex';document.querySelector("#myDropdown").value="money"}
          else if(v=="place_story")document.querySelector(".place_story").style.display='flex';
          else if(v=="volunteers")document.querySelector(".volunteers").style.display='flex';
          else if(v=="picture")document.querySelector(".picture").style.display='flex';
          else if(v=="people_vice")document.querySelector(".people_vice").style.display='flex';
          else if(v=="video")document.querySelector(".video").style.display='flex';
    }

    document.querySelector(".arrow").addEventListener("click",function(){
      document.querySelector(".arrow img").style.transform=document.querySelector(".arrow img").style.transform ==="rotateY(-180deg)"?"rotateY(0deg)":"rotateY(-180deg)";
        //this.style.transform = "rotateY(-360deg)";
        document.querySelector(".distribution-date").style.left=document.querySelector(".distribution-date").style.left=="0px"?"-200%":"0px";
    })
    document.querySelector(".ul").addEventListener("click",function(){
      document.querySelector(".arrow img").style.transform ="rotateY(0deg)"
       if(window.innerWidth<=600) document.querySelector(".distribution-date").style.left="-200%";
    })



const listItems = document.querySelectorAll('.ul li');

listItems.forEach(item => {
    item.addEventListener('click', function() {
        // Remove 'clicked' class from all items
        listItems.forEach(i => i.id="");
        // Add 'clicked' class to the clicked item
        item.id='clicked';
    });
});
  </script>
</body>
</html>