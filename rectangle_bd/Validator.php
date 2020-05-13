<?php

    class Validator{

        private $errors=[];

        public function getErrors(){
            return $this->errors;
        }

        public function is_valid(){
            return count($this->errors)===0;
        }

        public function is_number($nbr,$key,$errormessage="entrer un nombre"){
            if (!is_numeric($nbr)){
                $this->errors[$key]=$errormessage; 
            }
        }
        
        public function is_empty($nbr,$key,$sms=null){
            if (empty($nbr)){
                if($sms==null){
                    $sms="Le nombre est obligatoire";
                }
                $this->errors[$key]=$sms; 
            }
        }
    
        public function is_positif($nbr,$key,$errormessage="entrer un nombre positif"){
            $this->is_number($nbr,$key);
            if($this->is_valid()){
                if($nbr<=0){
                    $this->errors[$key]=$errormessage;
                }
            }
        }
    
        public function compare($nbr1,$nbr2,$key1,$key2,$errormessage="la longueur doit etre plus grand que la largeur"){
            $this->is_positif($nbr1,$key1);
            $this->is_positif($nbr2,$key2);      
            if($this->is_valid()){ 
                if ($nbr1<$nbr2){
                    $this->errors['all']=$errormessage;
                }
            }
                
        }
    
    }



?>