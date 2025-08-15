
<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPID FORCE</title>
    <script type="text/javascript" src="lazy.js"></script>
    <style>
      .cardbox{
        display: flex;
        flex-direction: column;
        justify-content:center;
        align-items:start;
        width:100%;
        height: auto;
        padding-top: 20px;
        background-color:white;
      }
      .cardbox .card{
        display: flex;
        flex-wrap: wrap;
        justify-content:left;
        margin-left: 5%;
        margin-right: 5%;
        min-height:301px;
        max-height:301px;
        border-radius: 5px;
        margin-bottom:40px;
        background-color: aqua; 
      }
      .cardbox .card img{
        display: flex;
        flex-wrap: wrap;
        width:35%;
        border:2px solid palegreen;
        height:301px;
        transform: translateX(5%) translateY(7%);
        animation: cardmove both;
        animation-timeline: view(30% 10%);
      }

     @keyframes cardmove{
       0%{
        opacity: 0; transform: scale(0.3) translateX(5%) translateY(7%);
      }
      60%, 80%{
        opacity: 1; transform: scale(1) translateX(5%) translateY(7%);
       }
       100%{
        opacity: 0; transform: scale(0.3) translateX(5%) translateY(7%);
       }
     }

      .cardbox .card span{
        display:flex;
        flex-direction: column;
        justify-content:left;
        align-items:start;
        overflow-y: auto;
        max-height:301px;
        width:65%;
        padding-left:40px;
        background-color:white;

      }
      .cardbox .card span ul{
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        align-items: start;
        margin: 0px;
      }
      .cardbox .card span ul li{
         padding:5px;
      }
      .card:nth-child(even){
        flex-direction: row-reverse;
        justify-content: right;
      }


  .bo{
    display: flex;
    justify-content:center;
    align-items: center;
    flex-direction: column;
    height:auto;
    width:100%;
    margin-top:7rem;
  }

    @media(width<768px) {
        :is(.cardbox .card){
          max-height:150rem;
        }
        :is(.cardbox .card span){
           max-height:400px;
        }
        :is( .cardbox .card img,.cardbox .card span){
          width: 100%;
        }
        :is(.bo){
          margin-top: 5.7rem;
        }
      }
    </style>
</head>
<body >
<?php
      include("resizevideo.php");
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
 <div class="bo" id="bo">
    <?php
          include("slideimg.php");
       ?>

       <?php
          include("assetes/payment.html");
       ?>

  <div class="cardbox">
       <div class="card">
            <img data-src="admin\homecontent\slideshow\IMG-20240927-WA0002.jpg" alt="" class="lozad img img-responsive">
            <span>
              <h2>Our Journy</h2>
              <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero </li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
              </ul>
            </span>
       </div>
       <div class="card">
            <img data-src="admin\homecontent\slideshow\IMG-20240927-WA0003.jpg" alt="" class="lozad img img-responsive">
            <span>
              <h2>Our Journy</h2>
              <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero </li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
              </ul>
            </span>
       </div>
       <div class="card">
       <img data-src="admin\homecontent\slideshow\IMG-20240927-WA0004.jpg" alt="" class="lozad img img-responsive">
          <span>
              <h2>Our Journy</h2>
              <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero </li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque enim fuga iure, 
                    quas dolor asperiores mollitia doloribus excepturi commodi, repellat praesentium vero</li>
              </ul>
            </span>
       </div>
   </div>
</div>
    <?php
          include("assetes/footer.html");
       ?>


 <script src="sidebar and navbar/sidebar.js"></script> 
       <script>
                lozad('.lozad',{load:function(e1){
            e1.src=e1.dataset.src;
        }}).observe();
       </script>
</body>
</html>
