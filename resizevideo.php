<?php
require("videostore.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rezise and move tool/tool.css">
    <style>
/*     @property --angle{
            syntax:"<angle>";
            inherits:true;
            initial-value: 0deg;
        } */ 
        :root{
            --angle:0deg;
        }

    .mns{   
           touch-action:none;
            z-index: 1050;
            position:fixed;
            display:none;
            flex-direction: column;
            justify-content:start;
            align-items:center;
            box-sizing: 100% 100%;
            height:50%;
            width:50%;
            padding:5px;
            border-radius: 5px;
            background-image:conic-gradient( 
                from var(--angle),darkblue,black,white,blue,darkblue
                );    
            animation-name: colormove ,videoanimation;
            animation-duration:2s;
            animation-iteration-count: infinite,1;    
        }
        @keyframes colormove{
            to{
                --angle:360deg;
            }
        }
        @keyframes videoanimation{
            from{scale:0.5; opacity: 0.5;}
            to{ scale:1; opacity:1;}
        }

    .mns video{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        height:100%;
        border-radius: 5px;
        overflow: hidden;
        background:url("logo/icon/topbackground.jpg");
        border-image:linear-gradient(to right ,rgba(0,0,0,0.5),rgba(0,0,0,0.5)) fill 1;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: fixed;
        cursor:pointer;
     }

    </style>
    
</head>
    <div class="mns" id="g">
       <div  id="mns2" class="vmv"><img src="logo/icon/cross-23.svg" alt="Close"></div>
         <video src="admin/homecontent/vbikkho/7-1 CSS3 Module Introduction.mp4" id="vd" autoplay muted playsinline controls>
            browser not suppot or error
         </video>
    </div>
<script src="rezise and move tool/tool.js"></script>
<script>
  make_resize(".mns");
   make_move(".mns",".vmv");
  
    /*for video load */   
     data=JSON.parse('<?php echo json_encode($mrg);?>');
     ln=data.length;
     vi=0;
    document.getElementById("vd").addEventListener("ended" ,function(e){
      if(vi>ln)  vi=0;
      document.getElementById("vd").src='admin/homecontent/'+data[vi][0];
      vi++;
    })

</script>
    
