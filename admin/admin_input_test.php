<?php
 namespace input_test {
 class test{ 
 private function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

   private function empty_check($v){
    if (empty($_POST[$v])) {
        return false;
      }
      else return $this->test_input(($_POST[$v]));
}

 private function string_check($value){
       $value=$this->empty_check($value);
        if($value==false||$value=='') return "error";

        if (preg_match("/[^0-9a-zA-Z-.,\/ ]/",$value)) {
          return "error";
        }
        else return $value;
      
    }

 private function number_check($value){
      $value=$this->empty_check($value);
      if($value===false||$value==='') return "error";
    if(preg_match("/[^0-9.]/",$value)) {
        return "error";
     }
     else return $value;

   }

   private function img_check($value,$value2){
    $check=array("image/jpg","image/jpeg","image/png","image/gif");
    $value2=$this->test_input($value2);
     if(in_array($value,$check)) return $value2;
     else return "error";
   }

   private function video_check($value,$value2){
      $check=array('video/mp4','video/mov','video/avi','video/wmv','video/avchd','video/webm','video/mkv');
      $value2=$this->test_input($value2);
      if(in_array($value,$check)) return $value2;
       else return "error";
     }

    public function text($value){ return $this->string_check($value);}
    public function number($value){ return $this->number_check($value);}
    public function image($value,$value2){ return $this->img_check($value,$value2);}
    public function video($value,$value2){ return $this->video_check($value,$value2);}
  }
 }
?>