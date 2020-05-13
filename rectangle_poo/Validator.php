<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
           return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)!=2 && empty($this->errors['all']);
    }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
    }
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                   $this->is_number($nombre,$key);
                   if($this->is_valid()){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
                    }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){
    $this->is_positif($nbre1,$key1);
    $this->is_positif($nbre2,$key2);
   if($this->is_valid()){
           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   }

}

public function  is_empty($nbre,$key,$sms=null){
    if(empty($nbre)){
        if($sms==null){
            $sms="Le Nombre  est Obligatoire";
        }
        $this->errors[$key]= $sms;

        }
    }
//Expressions Régulières
public function  is_email($valeur,$key,$sms=null){
    $masque = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";
    
        if(!preg_match($masque, $email)) {
        if($sms==null){
            $sms="c'est pas un mail";
        }
        $this->errors[$key]= $sms;

        }
      }


public function  is_telephone($valeur,$key,$sms=null){
    if(!preg_match("#[7][5-8][- \.?]?[0-9][0-9][0-9][- \.?]?([0-9][0-9][- \.?]?){2}$#", $valeur) || !preg_match("#[7][0][- \.?]?[0-9][0-9][0-9][- \.?]?([0-9][0-9][- \.?]?){2}$#", $valeur)){
        if($sms==null){
            $sms="Le Numéro de telephone n'est pas reglo";
        }
        $this->errors[$key]= $sms;

        }
    }





}



?>