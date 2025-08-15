
<?php
  //session_start();
    require("search2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="all gallery/gallery.css">
    <script type="text/javascript" src="lazy.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    .main-gallery img{
            width:80px;
            height:80px;
            border-radius:50%;
            backdrop-filter: brightness(300%);
        }
  .main-gallery .volunteer_info{
      display: flex;
      flex-wrap: wrap;
      justify-content:center;
      width: 100%;
  }
  @media(width<600px){
    :is(.main-gallery .volunteer_info){
      padding-top:5px;
    }
  }

 .gallery-option input,.gallery-option2 input{
     height:30px;
     margin: 0px;
     margin-top:10px;
     width: 80%;
     background-color: #2c3e50;
     border-radius:0px;
     border-top-left-radius: 5px;
     border-bottom-left-radius: 5px;
     border: none;
 }

 .gallery-option button,.gallery-option2 button{
     height:30px;
     margin:0px;
     margin-top: 10px;
     width:20%;
     background-color:darkblue;
     border-top-right-radius: 5px;
     border-bottom-right-radius: 5px;
     border:none;
     cursor: pointer;
 }
 .gallery-option img, .gallery-option2 img{
    height: 100%;
    width: 100%;
 }
  .main-gallery .pro,.main-gallery .pro2,.main-gallery .spro{
    display: flex;
    flex-wrap: wrap;
    align-content:space-between;
    justify-content:left;
    width:90%;
    min-height: 200px;
    height:auto;
    background-color:rgb(209, 207, 207);
    border-radius: 5px;
    margin-bottom: 50px;
    padding: 8px;
  }
  .main-gallery .spro{
    display:none;
  }
  .main-gallery .error{
    display: none;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
  }

  .main-gallery .name,.main-gallery .live{
    display: flex;
    flex-wrap: wrap;
    justify-content:start;
    align-content:start;
    height:auto;
    width: 55%;
    margin: 8px;
  }
   .gallery-option input:focus,.gallery-option2 input:focus{
     outline: none;
   }

  .main-gallery .view{

    display: flex;
    flex-wrap: wrap;
    justify-content:center;
    align-items:center;
    height: 30px;
    width: 100%;
    background: linear-gradient(to right,rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    border-radius: 5px;
    cursor: pointer;
  }

  .error{
       width: 100%;
       height: 100%;
       color: red;
  }


    </style>
</head>
<body>

    <?php
         include("donatebutton.php");
     ?>
        <?php
        include("sidebar and navbar/sidebar.html");
        ?>
         <?php
            include("volunteer prifle view/view.html");
        ?>
    
     <div class="arrow">
        <img id="ar"src="logo/icon/chevron-forward-outline.svg" alt="more">
     </div>

    <div class="gallery">
         <div class="gallery-option">
               <div style="display:flex; flex-wrap:wrap;width:100%">
                   <input type="search" name="search" id="search0" placeholder="Number...">
                   <button type="submit" id="m"> <img src="logo\icons8-search.svg" alt=""> </button>  
               </div> 
            <ul>
                <li onclick="type2_active('s')"> VOLUNTEERS</li>
                <li onclick="type2_active('bi')">VERIFIED</li>
            </ul>
            <span>@copyright 2024 power by TechNest Solution</span>
        </div>

          <div class="gallery-option2">
                <div style="display:flex; flex-wrap:wrap;width:100%">
                  <input type="search" name="search" id="search1" placeholder="Number...">
                  <button type="submit" id="m"> <img src="logo\icons8-search.svg" alt=""> </button>
               </div>
              <ul>
                <li onclick="type_active('s')" >VOLUNTEERS</li>
                <li onclick="type_active('bi')" >VERIFIED</li>
              </ul>
          </div>

        <div class="main-gallery">

          <div class="volunteer_info">
               <div class="error">Search Not Match</div> 
            <div class="spro">
                  <img data-src="profile image/<?php echo $result[$i]['profile_img']?>" class="lozad img img-responsive" id="simage">
                  <div class="name"><span id="name"></span></div>
                  <div class="live"><span id="lp">LIVE IN -Raj</span></div>
                  <div class="live"><span id="pp">FROM -Raj</span></div>
                  <div class="live"><span id="work"></span></div>
                  <div class="view" id="<?php echo $result[$i][0]?>" name="<?php echo $result[$i]['NAME']?>"><span>View Details</span></div>
           </div>

                <?php
                while($i<$sz){
                  $v=explode('.',$result[$i]["present_address"]);
                  $v1=explode('.',$result[$i]["permanent_address"]);
                    if($result[$i]["WORK_KEY"]!=""){
                        $work=explode(',',$result[$i]["WORK_KEY"]);
                 ?>
                 <div class="pro">
                     <img data-src="profile image/<?php echo $result[$i]['profile_img']?>" class="lozad img img-responsive">
                     <div class="name"><span><?php echo strtoupper($result[$i]["NAME"])?></span></div>
                     <div class="live"><span>LIVE IN -<?php echo $v[0];?></span></div>
                     <div class="live"><span>FROM -<?php echo $v1[0];?></span></div>
                     <div class="live"><span>Project-<?php echo sizeof($work);?></span></div>
                     <div class="view" id="<?php echo $result[$i][0]?>" name="<?php echo $result[$i]['NAME']?>"><span>View Details</span></div>
                 </div>
                 <?php
                   }
                   else{
                ?>
                 <div class="pro2">
                 <img data-src="profile image/<?php echo $result[$i]['profile_img']?>" class="lozad img img-responsive">
                     <div class="name"><span><?php echo strtoupper($result[$i]["NAME"])?></span></div>
                     <div class="live"><span>LIVE IN -<?php echo $v[0];?></span></div>
                     <div class="live"><span>FROM -<?php echo $v1[0];?></span></div>
                     <div class="view " id="<?php echo $result[$i][0]?>" name="<?php echo $result[$i]['NAME']?>"><span>View Details</span></div>
                 </div>
               <?php
                  }
               $i+=1;}
                ?>

          </div>      

      </div>
  </div>


<script src="rezise and move tool/tool.js"></script>
      <script>
          lozad('.lozad',{load:function(e1){
            e1.src=e1.dataset.src;
             }}).observe();
        
    $(document).ready(function(){ 
        try{
        var id=document.querySelectorAll("#m");
        for(let i=0;i<id.length;i++){id[i].addEventListener('click',function(){
            if(id.length!=2) location.reload();
            try{
             document.getElementById("search"+i).value;
            }
            catch(erro){
              location.reload();
            }
            $.ajax({
              url:'search.php',
              type:'post',
              data:{search:$("#search"+i).val()},
              success:function(result){
                if(result!=-1){
                  result=JSON.parse(result);
                  v=result["present_address"].split(".")
                  v1=result["permanent_address"].split(".")
                  name=result["NAME"].toUpperCase();
                  $("#name").html(name);
                  if(result["WORK_KEY"]!=null ||result["WORK_KEY"]!= undefined){
                    work=result["WORK_KEY"].split(",");
                    $("#work").html("Project-"+work.length);
                  }
                  $("#lp").html("LIVE IN-"+v[0]);
                  $("#pp").html("FROM-"+v1[0]);
                  document.querySelector("#simage").setAttribute("data-src","profile image/"+result['profile_img']);
                  document.querySelector(".view").setAttribute("id",result["ID"]);
                  document.querySelector(".view").setAttribute("name",result["NAME"]);

                  document.querySelector(".spro").style.display="flex";
                  document.querySelector(".error").style.display="none";
                  var v1=document.querySelectorAll(".pro");
                  var v2=document.querySelectorAll(".pro2");
                  if(v1!=null)v1.forEach((pr)=>{
                  pr.style.display="none";
                 })
                  if(v2!=null)v2.forEach((pr)=>{
                  pr.style.display="none";
                 })
                }
                else {
                  //console.log(result);
                  document.querySelector(".error").style.display="flex"
                  document.querySelector(".spro").style.display="none";
                  var v1=document.querySelectorAll(".pro");
                  var v2=document.querySelectorAll(".pro2");
                  if(v1!=null)v1.forEach((pr)=>{
                  pr.style.display="none";
                 })
                  if(v2!=null)v2.forEach((pr)=>{
                  pr.style.display="none";
                 })
                }
              }
            } );
        })};
      }
      catch(erro){
        location.reload();
      }
      });


       try{
              var el=document.querySelectorAll("#close")
              var el2=document.querySelectorAll(".view")
              for (var i = 0; i < el.length; i++) {
                    el[i].addEventListener('click',clos);
               }

               for (var i = 0; i < el2.length; i++) {
                    el2[i].addEventListener('click',function(){
                      open(this);
                    });
               }

               function clos(){
                      document.querySelector(".viewport").style.display="none";
                   }

               function open(e){
                       document.querySelector(".set_about").style.display="none"
                    // Use fetch to send a request to the PHP script
                        fetch('profile.php', {
                                    method: 'POST',
                                    headers: {
                                       'Content-Type': 'application/json',
                                       },
                                     body: JSON.stringify({ 
                                      id: e.getAttribute('id'),
                                      name:e.getAttribute('name')
                                      })
                               })
                       .then(response => {
                             if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                             }
                              return response.json();
                           })
                        .then(data => {
                                     if (data.redirect) {
                                        // Handle redirection
                                               window.location.href = data.redirect;
                                     } else if (data.error) {
                                             // Handle error
                                            location.reload();
                                     console.error(data.error);
                                    } else if (data.success) {
                                              set_data(data.success.result);
                                    }
                              })
                       .catch(error => {
                               console.error('Error:', error);
                          });

                        function set_data(data){
                                        //set cover image
                                          let cover=document.querySelector(".coverphote");
                                              cover.innerHTML='';
                                          let image=document.createElement("img");
                                              image.src='profile image/'+data[11];
                                              image.alt='cover image';
                                              image.className='lozad';
                                              cover.appendChild(image);
                                           // set profile image 
                                          let pro=document.querySelector(".profile");
                                              pro.innerHTML='';
                                          let pro_img=document.createElement("img");
                                              pro_img.src='profile image/'+data[10];
                                              pro_img.alt='cover image';
                                              pro_img.className='lozad';
                                              let name=document.createElement('p');
                                                 name.textContent=data[1].toUpperCase();
                                        pro.appendChild(pro_img);
                                        pro.appendChild(name);
                             document.querySelector(".about").addEventListener("click",function(){
                                    for(i=1;i<=10;i++){
                                           let p=document.querySelector('.p'+i);
                                           if(i===1) j=7;
                                           if(i===2)j=13;
                                           if(i===3)j=12;
                                           if(i===4) j=3;
                                           if(i===5) j=4;
                                           if(i===6) j=2;
                                           if(i===7) j=6;
                                           if(i===8) j=8;
                                           if(i===9) j=5;
                                           if(i===10) j=9;
                                           p.textContent=j===9?data[j]==null?'0':data[j].split(',').length:data[j];
                                        } 
                                      document.querySelector(".set_about").style.display="block"
                                  });
                                  
                        }
                   
                                document.querySelector(".viewport").style.display="flex";
                                make_resize(".viewport");
                                make_move(".viewport",".mv");
                    

                }

        }

       catch(erro){
        location.reload();
       }
        


        function gallery_type(){
            try{
                let v= document.querySelector(".gallery-option2");
                let v2=document.querySelector(".arrow");
                   v2.style.display="none"
                   v.style.left="0px";
            }
            catch(error){
                location.reload();
            }
        }

        function type_active(e){
            try{
                var v= document.querySelector(".gallery-option2");
                var v2=document.querySelector(".arrow");
                var v3= document.querySelectorAll(".pro");
                var v4= document.querySelectorAll(".pro2");
              if(e=="s"){
                document.querySelector(".spro").style.display="none";
                document.querySelector(".error").style.display="none";
                 if(v3!=null)v3.forEach((pr)=>{
                  pr.style.display="flex";
                 })
                 if(v4!=null)v4.forEach((pr)=>{
                  pr.style.display="flex";
                 })
              }

            else  if(e=="bi"){
                 document.querySelector(".spro").style.display="none";
                 document.querySelector(".error").style.display="none";
                 if(v4!=null)v4.forEach((pr)=>{
                  pr.style.display="none";
                 })  
                 
                 if(v3!=null)v3.forEach((pr)=>{
                  pr.style.display="flex";
                 })
              }
              v2.style.display="block";
              v.style.left="-200%";

        }
        catch(error){
            location.reload();
        }
    }
        
    
    
    function type2_active(e){

            try {
                var v3= document.querySelectorAll(".pro");
                var v4= document.querySelectorAll(".pro2");
              if(e=="s"){
                 document.querySelector(".spro").style.display="none";
                 document.querySelector(".error").style.display="none";
                 if(v3!=null)v3.forEach((pr)=>{
                  pr.style.display="flex";
                 })
                 if(v4!=null)v4.forEach((pr)=>{
                  pr.style.display="flex";
                 })
              }

            else  if(e=="bi"){
                  document.querySelector(".spro").style.display="none";
                  document.querySelector(".error").style.display="none";
                 if(v4!=null)v4.forEach((pr)=>{
                  pr.style.display="none";
                 })   

                 if(v3!=null)v3.forEach((pr)=>{
                  pr.style.display="flex";
                 })
              }
        }
        catch(error){
            location.reload();
        }
    }




/* function hidesidebox(){
  let width=window.innerWidth;
   try{

     if(width>599){
        const sidebar = document.querySelector('.gallery-option2')
        const arw = document.querySelector('.arrow')
           sidebar.style.left = '-200%';
           arw.style.display = 'none';
          }
    else{
        const arw = document.querySelector('.arrow')
         arw.style.display = 'block';
        }
     }
    catch(error){
       location.reload();
    }
  }
    window.onresize=hidesidebox; */
   </script>   
 <script src="sidebar and navbar/sidebar.js"></script> 
</body>
</html>