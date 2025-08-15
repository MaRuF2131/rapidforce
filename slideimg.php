
<head>
<style>
.mySlides h1{
  width:98%;
  color:palegoldenrod;
}
.mySlides span{
  width:min(500px,98%);
  color:aqua;
}
/* CSS */
.mySlides .contibute {
  background-color:#00281F;
  border-radius:5px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color:brown;
  cursor: pointer;

  display:flex;
  flex-wrap:nowrap ;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  height: 40px;
  width:min(100%,200px);
  margin-top: 30px;
   user-select: none;
  -webkit-user-select: none;
  transition: all 250ms;
}

.mySlides .contibute:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}
.mySlides .contibute span{
     position: relative;
     left: -200%;
     height:60px;
     width:30px;
     background-color: rgba(0,0,0,0.3);
     transform:rotate(25deg);
     animation: flot 2s linear infinite;
}
@keyframes flot{
  0%{
    left: -200%;
  }
  50%{
    left:0%;
  }
  100%{
    left: 200%;
  }
}
.mySlides{
     display: flex;
     flex-direction: column;
     justify-content:left;
     align-items:start;
     width:100%;
     height: 100%;
     padding-left: 50px;
     padding-top:30px;
     background-image: url("logo/icon/bonna image.jpg");
     border-image: linear-gradient(to right,rgba(0,0,0,0.5),rgba(0,0,0,0.5)) fill 1;
     background-size: 100% 100%;
     background-repeat: no-repeat;
     transition: background-image 1s ease-in-out;
}

/* Slideshow container */
.slideshow-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    max-width: 1800px;
    height:400px;
    width:95%;
    border-radius: 5px;
    overflow: hidden;
}

</style>
</head>

<div class="slideshow-container">
   <div class="mySlides fade">
        <h1>MAKE BEAUTIFUL WORLD</h1>
        <span> We invite you to join with us in this journey.Your commitment whether
           through financial contributions,volunteering your time or
            spreading the word is invaluable
          </span>
       <div class="contibute">  DONATE <span></span> </div>  
    </div> 

</div>
<?php
  $sql="SELECT IMAGE FROM slide_show";
  $result= $_SESSION['conn']->query($sql);
  $result= $result->fetchAll();
?>

<script>
  let img2 =JSON.parse('<?php echo json_encode($result); ?>');
  let sz=img2.length;
  let i=0;
//showSlides();
function showSlides() {
     let slides = document.querySelector(".mySlides");
      setTimeout(()=>{
            slides.style.backgroundImage="url('"+("admin/homecontent/slideshow/"+img2[i][0])+"')";
            i=(i+1)%sz;            
        },1500)

}
document.addEventListener("DOMContentLoaded", () => {
    //showSlides(); // Initial call
    //setInterval(showSlides,3000); // Call every 5 seconds
});

</script>

