
    //for resize
    
function make_resize(mns){
    try{ 
       magicquery=document.querySelector(mns);
       resize(magicquery);
      }
      catch(erro){
        location.reload();
      }
    }

function resize(magic){

    magic.style.top=((window.innerHeight-magic.offsetHeight)/2.0)+"px";
    magic.style.left=((window.innerWidth-magic.offsetWidth)/2.0)+"px";
    magic.onpointerover= handler;
    function handler(e) {
        parent=magic;
        main=parent.clientWidth+4;
        main2=parent.clientHeight+4;
        e=e||window.event;
        l3=parent.offsetLeft;
        l=e.clientX-l3;
        t3=parent.offsetTop;
        t=e.clientY-t3;
      
        if(((l<10) && (t<10)) || ((l<10) &&  t-main2>-10)) parent.style.cursor='auto';
        else if( ((t<10)&&  l-main>-10) || (l-main>-10 && t-main2>-10)) parent.style.cursor='auto';

        else if(l-main>-10){parent.style.cursor='e-resize';document.onpointerdown=resize_widthR;}
        else if(l<10){parent.style.cursor='e-resize';document.onpointerdown=resize_widthL;}

        else if(t-main2>-10){parent.style.cursor='n-resize';document.onpointerdown=resize_widthB;}
        else if(t<10){parent.style.cursor='n-resize';document.onpointerdown=resize_widthT;}
        else fnsh();
        
        function resize_widthT(){
            parent.style.bottom=window.innerHeight-(t3+parent.offsetHeight)+"px";
            document.onpointermove=changeT;
            document.onpointerup=fnsh;
        }

        function resize_widthB(){
            parent.style.top=t3+"px";
            document.onpointermove=changeB;
            document.onpointerup=fnsh;
       }
       
        function resize_widthR(){
            parent.style.left=l3+"px";
            document.onpointermove=changeR;
            document.onpointerup=fnsh;
       }

       function resize_widthL(){
            parent.style.right=window.innerWidth-(l3+parent.offsetWidth)+"px";
            document.onpointermove=changeL;
            document.onpointerup=fnsh;
       }
     
       function changeT(e){
                e=e||window.event;
                parent.style.top="unset"
                if(parent.offsetTop<3) fnsh();
                parent.style.height=(parent.offsetHeight)+(parent.offsetTop-e.clientY)+"px";
        }

       function changeB(e){
                e=e||window.event;
                parent.style.bottom="unset"
                if(parent.offsetHeight+t3+2==window.innerHeight) fnsh();
                parent.style.height=(parent.offsetHeight)+((e.clientY)-(parent.offsetHeight+t3))+"px";
        }


        function changeR(e){
                e=e||window.event;
                parent.style.right="unset"
                parent.style.width=(parent.offsetWidth)+(e.clientX-(parent.offsetWidth+l3))+"px";

        }


        function changeL(e){
                e=e||window.event;
                 parent.style.left="unset"
                parent.style.width=(parent.offsetWidth)+(parent.offsetLeft-e.clientX)+"px";
        }


            function fnsh(){
                document.onpointerup = null;
                document.onpointermove = null;
                document.onpointerdown=null;
            }

    }
}

//for move video box
function make_move(mns,mov,blnc=false){
    try{
    magicquery2=document.querySelector(mns);
    mover=document.querySelector(mov);
    move(magicquery2,mover,blnc);
    }
   catch(erro){
    location.reload();
   }
       
}

function move(magic2,mover,blnc){

   dragElement(magic2 ,mover,blnc);
    function dragElement(elmnt,mover,blnc) {

           var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0; 
           mover.onpointerdown=dragMouseDown;

           function dragMouseDown(e) {
                 e = e || window.event;
                 e.preventDefault();
                 pos3 = e.clientX-elmnt.offsetLeft;
                 pos4 = e.clientY-elmnt.offsetTop;

                 document.onpointerup = closeDragElement;

                document.onpointermove = elementDrag;
            }

            function elementDrag(e) {
                    e = e || window.event;
                    e.preventDefault();
                    pos1 = e.clientX;
                    pos2 = e.clientY;

                  // if(pos1-pos3<-pos3+10||pos2-pos4<-pos4+10) return
                   TOP=((pos2-pos4)/(window.innerHeight))*100 + "%";
                   LEFT=((pos1-pos3)/(window.innerWidth))*100 + "%";
                   elmnt.style.top =TOP;
                   elmnt.style.left =LEFT; 
                   if(blnc){
                    const letters = document.querySelectorAll('.letter');
                    letters.forEach((letter, index) => {
                        setTimeout(() => {
                            letter.style.transform="translate("+e.clientX+"px,"+e.clientY+"px)";
                            letter.style.opacity=1; // Fade in letter
                        }, index *100); // Delay for each letter
                    });
                   }

            }

           function closeDragElement() {
                   document.onpointerup = null;
                   document.onpointermove = null;
           }
        }
}