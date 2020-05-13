<?php
    //Encapsulation permet de  géréer la porter des attibuts et mathodes d'une classe

    //lien d'héritage parce qu'on a besoin de longueur dans figure et il prend tt venant de figure
    class Rectangle extends Figure{
        //ATTIRBUTS D'INSTANCES
            private $largeur;
        //ATTIRBUTS DE CLASSE (STATIC)


        //METHODE 
          //ATTIRBUTS D'INSTANCES concret
            public function __construct(array $row=null, $largeur=null){
             
                if($largeur!=null){

                    $this->setLargeur($largeur);
                    
                }
                if($row!=null){

                    $this->hydrate($row);
                }
                
            }

           

            public function getLargeur(){
                return $this->largeur;//permet d'avoir acces aux attributs apartir des methodes
            }

           
            public function setLargeur($largeur){
                
                $largeur = (real) $largeur;
                if(is_real($largeur)){

                    $this->largeur=$largeur;
                }
            }
                    
            //getter et setter methodes static concrete
            
            public function hydrate(array $row){
                //Les keys de $row correspondent au nom de methode de rectangle
                
                foreach ($row as $key => $value) {
                   
                   $nameMethode = 'set'. ucfirst($key);
                   try {

                        if(method_exists($this, $nameMethode)){
                            
                            $this->$nameMethode($value);
                        }
                   } catch (\Throwable $th) {
                       
                        die($th->getMessage() ."sur la ligne". $th->getLine());
                   }
                   
                }
            }


            public function demiPerimetre(){
                return ($this->longueur + $this->largeur);
            }


            public function surface(){
                return (int)$this->longueur*(int)$this->largeur;
            }

            public function diagonale(){
                return sqrt(pow($this->longueur,2)+pow($this->largeur,2));
            }
            
    }

?>