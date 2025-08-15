
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rezise and move tool/tool.css">
      
    <style>
      *{
        box-sizing: border-box;
      }
      .donatebutton span{
        background:linear-gradient(90deg,red,blue,darkblue,green);
        background-clip: text;
        -webkit-text-fill-color: transparent;
      }
        .donatebutton{
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 60px;
            width: 60px;
            border-radius: 50%;
            background-color:aqua;
            box-shadow: 10px 0px 20px;
            z-index: 100;
            cursor: pointer;
            position: fixed;
            right: 3px;
            bottom:50px;
            transform: rotate(45deg);
            animation: buttonanimation 3s linear infinite;
        }
        @keyframes buttonanimation{
          0%{
            opacity:0.8;
            scale: 0.5;
          }
          50%{
            opacity: 1;
            scale:1;
          }
          100%{
            opacity:0.8;
            scale:0.5;
          }
        }
        .donatebutton:hover{
          animation-play-state: paused;
        }
        .pop_donate{
            display: none;
            flex-direction: column;
            align-items:start;
            overflow: hidden;
            width:min(600px,100%);
            height:min(800px,100%);
            background-color:black;
            z-index:2000;
            padding: 5px;
            border-radius: 5px;
            position:fixed;
            bottom:0px;
            left:50%;
            transform: translateX(-50%);
        }
        .pop_donate .pmnt{
           display: flex;
           flex-wrap: wrap;
           justify-content:center;
           align-items:start;
           background-color: black;
           height: 100%;
           width: 100%;
           overflow-y: auto;
        }
        

    </style>

    
   </head>
   <body>
    <div class="pop_donate">
       <div  id="mns2"><img id="down" src="logo/icon/cross-23.svg" alt="Close"></div>
       <div class="pmnt">
        <?php
        include("assetes/payment.html");
        ?>
      </div>
  </div>

    <div class="donatebutton">
         <span>Donate</span>
    </div>

    <script>
        document.querySelector(".donatebutton").addEventListener("click",function(){
          try{
            document.querySelector(".pop_donate").style.display="flex";
          }
          catch(erro){
            location.reload();
          }
        })
        document.querySelector("#down").addEventListener("click",function(){
          try{
            document.querySelector(".pop_donate").style.display="none";
          }
          catch(erro){
            location.reload();
          }
        })
    </script>
  </body>
   </html>
