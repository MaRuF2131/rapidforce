 
document.onclick=(e)=>{
    e=e||window.event;
    try{
    const sidebar = document.querySelector('.sidebar')
    const s = e?.target?.className; // Safely access className
    const s1 = e?.target?.id; // Safely access id
/*     let s=(e.target.className);
    let s1=(e.srcElement.id); */
    if(s=="menu" || s1=="d"){sidebar.style.right="0px";}
    else{sidebar.style.right= '-100%';}
    call_menubar(e);
  }
  catch(erro){ location.reload()  }

  function call_menubar(e){
    try{
        const sidebox =document.querySelector('.gallery-option2')
        const arw = document.querySelector('.arrow')
        const s = e?.target?.className; // Safely access className
        const s1 = e?.target?.id; // Safely access id
/*         let s=(e.target.className);
        let s1=(e.target.id); */
      if(sidebox && arw){
        if(s=="arrow" || s1=="ar"){
             arw.style.display="none"
             sidebox.style.left="0px";
            }
         else{
            if( s1!="search0" && s1!="search1")sidebox.style.left='-200%';
            if(window.innerWidth<=599)arw.style.display = 'block';
        }
       }
    }
       catch(erro){
            location.reload()  
          
       }
    }
}

function hidesidebar(){
   let width=window.innerWidth;
   try{
    if(width>800){
         const sidebar = document.querySelector('.sidebar')
         sidebar.style.right= '-100%';
         }

         call_me2(width);
    }

catch(erro){   location.reload()   }

function call_me2(width){
    try{
        if(width>599){
            const sidebox = document.querySelector('.gallery-option2')
            const arw = document.querySelector('.arrow')
             if(sidebox)sidebox.style.left = '-200%';
             if(arw)arw.style.display = 'none';
            }
            else{
            const arw = document.querySelector('.arrow')
              if(arw)arw.style.display = 'block';
            }
    }

    catch(erro){location.reload()  }
 }

}
window.onresize=hidesidebar;
 