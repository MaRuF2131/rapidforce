
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="lazy.js"></script>
    <link rel="stylesheet" href="all gallery/gallery.css">
    <style>
    .main-gallery img{
            width:48%;
            height:350px;
            border-radius: 5px;
            margin-bottom: 20px;
            backdrop-filter: brightness(300%);
            animation-name:fade-in;
        }

.main-gallery img:hover{
        animation:zoom 1s linear
    }
    @keyframes zoom{
        0%{scale:1;}
       50%{scale:.9;}
       100%{scale:1;}
    }
        @keyframes fade-in{
            from{
                opacity:0; scale:0.5;
            }
            to{
                opacity:1; scale:1;
            }
        }

    @media (width<1120px) {
        :is(.main-gallery img){
            height: 300px;
        }
    }

    @media (width<903px) {

        :is(.main-gallery img){
            width:90%;
        }

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
     <div class="arrow">
        <img id="ar" src="logo/icon/chevron-forward-outline.svg" alt="more" >
     </div>

      <div class="gallery">
         <div class="gallery-option">
            <ul>
                <li onclick="type2_active('bn')">ACTIVITE ON FLAD</li>
                <li onclick="type2_active('s')">SITBOSTORO BITORON</li>
                <li onclick="type2_active('bi')">BIKKHO ROPON</li>
                <li onclick="type2_active('df')">DEFAULT</li>
            </ul>
            <span>@copyright 2024 power by TechNest Solution</span>
          </div>

          <div class="gallery-option2">
              <ul>
                <li onclick="type_active('bn')" >ACTIVITE ON FLAD</li>
                <li onclick="type_active('s')" >SITBOSTORO BITORON</li>
                <li onclick="type_active('bi')" >BIKKHO ROPON</li>
                <li onclick="type_active('df')">DEFAULT</li>
              </ul>
            </div>

         <div class="main-gallery">

            <div class="sit">
                <?php
                require("admin/database.php");

                $sql="SELECT IMAGE FROM sit";
                $result= $_SESSION['conn']->query($sql);
                $result= $result->fetchAll();
                $sz=sizeof($result);
                $i=0;
                while($i<$sz){
                 ?>
                <img data-src="admin/homecontent/sit/<?php echo $result[$i][0]?>" class="lozad img img-responsive">
               <?php
               $i+=1;}
                ?>

               </div>

               <!-- bonna-->

               <div class="bonna">
                <?php
               // require("admin/database.php");

                $sql="SELECT IMAGE FROM sit";
                $result= $_SESSION['conn']->query($sql);
                $result= $result->fetchAll();
                $sz=sizeof($result);
                $i=0;
                while($i<$sz){
                 ?>
                <img data-src="admin/homecontent/sit/<?php echo $result[$i][0]?>" class="lozad img img-responsive">
               <?php
               $i+=1;}
                ?>

               </div>
         

               <!-- bikkho -->

               <div class="bikkho">
                <?php
               // require("admin/database.php");

                $sql="SELECT IMAGE FROM sit";
                $result= $_SESSION['conn']->query($sql);
                $result= $result->fetchAll();
                $sz=sizeof($result);
                $i=0;
                while($i<$sz){
                 ?>
                <img data-src="admin/homecontent/sit/<?php echo $result[$i][0]?>" class="lozad">
               <?php
               $i+=1;}
                ?>

               </div>

         </div>
   
</div>
<script type="text/javascript" src="all gallery/gallery.js"></script>
<script src="sidebar and navbar/sidebar.js"></script>

</body>
</html>