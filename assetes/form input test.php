<?php
namespace form_space{
  class form_check{

    private $bld_check=array("O+","O-","A+","A-","B+","B-","AB+","AB-");
    private  $gen_check=array("female","male");

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

    public function string_check($value){
           $value=$this->empty_check($value);
            if($value==false) return false;

            if (preg_match("/[^a-zA-Z-.,\/ ]/",$value)) {
              return "error";
            }
            else return $this->test_input($value);
          
    }
  
    public function number_check($value){
            $value=$this->empty_check($value);
            if($value==false) return false;

        if(preg_match("/[^0-9]/",$value)) {
          return "error";
        }
        else return $value;
      
   }


   public function email_check($value){
        $value=$this->empty_check($value);
        if($value==false) return false;
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
           return "error";
         }
       else return $value;
  
  }
  

  public function blood_check($value){
           $value=$this->empty_check($value);
           if($value==false) return false;
       if (!(array_search($value,$this->bld_check)<8 && array_search($value,$this->bld_check)>-1)) {
         return "error";
       }
      else return $value;
  
   }

 public function gender_check($value){
          $value=$this->empty_check($value);
          if($value==false) return false;
          if (!(array_search(strtolower($value),$this->gen_check)<3 && array_search(strtolower($value),$this->gen_check)>-1)) {
            return "error";
           }
        else return $value;
  
    }

    public function check_box($value){
         if(empty($_POST[$value])) return "other";
         $check=array("swimming,","scout,","english,","other");
         $ans="";
         $cl=$_POST[$value];
        foreach ($cl as $dt){ if(in_array($dt,$check)) $ans.=$dt;}
        if($ans==''||$ans==' ') return"other";
        else return $this->test_input($ans);
    }


  } 
}
?>