
lozad('.lozad',{load:function(e1){
    e1.src=e1.dataset.src;
}}).observe();
/*const observer = lozad(); // lazy loads elements with default selector as '.lozad'
  observer.observe();*/

function type_active(e){
    try{
      //let v=(e.target.className);
     // console.log(e);
     let v= document.querySelector(".gallery-option2");
     let v2=document.querySelector(".arrow");
      if(e=="s"){
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".bonna");
        let v5= document.querySelector(".sit");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }

    else  if(e=="bi"){
        let v3= document.querySelector(".sit");
        let v4= document.querySelector(".bonna");
        let v5= document.querySelector(".bikkho");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }


     else if(e=="bn"){
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".sit");
        let v5= document.querySelector(".bonna");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }
      else{
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".sit");
        let v5= document.querySelector(".bonna");
        v5.style.display="flex";
         v3.style.display="flex";
         v4.style.display="flex";

      }
 v.style.left="-200%";
 v2.style.display="block";
}
catch(error){
    location.reload();
}
}



function type2_active(e){

    try {
        
    if(e=="s"){
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".bonna");
        let v5= document.querySelector(".sit");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }

     else if(e=="bi"){
        let v3= document.querySelector(".bonna");
        let v4= document.querySelector(".sit");
        let v5= document.querySelector(".bikkho");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }

     else if(e=="bn"){
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".sit");
        let v5= document.querySelector(".bonna");
        v5.style.display="flex";
         v3.style.display="none";
         v4.style.display="none";
      }
      else{
        let v3= document.querySelector(".bikkho");
        let v4= document.querySelector(".sit");
        let v5= document.querySelector(".bonna");
        v5.style.display="flex";
         v3.style.display="flex";
         v4.style.display="flex";
      }
}
catch(error){
    location.reload();
}
}

