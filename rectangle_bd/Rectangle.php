<?php
    //Encapsulation permet de  géréer la porter des attibuts et mathodes d'une classe

    //lien d'héritage parce qu'on a besoin de longueur dans figure et il prend tt venant de figure
    class Rectangle extends Figure{
        //ATTIRBUTS D'INSTANCES
            private $largeur;
        //ATTIRBUTS DE CLASSE (STATIC)


        //METHODE 
          //ATTIRBUTS D'INSTANCES concret
            public function __construct($largeur=null,$row=null){
                if($largeur!=null){
                    $this->largeur=$largeur;
                }
                if($row!=null){
                    $this->hydrate($row);
                }
            }

           

            public function getLargeur(){
                return $this->largeur;//permet d'avoir acces aux attributs apartir des methodes
            }

           
            public function setLargeur($largeur){
                $this->largeur=$largeur;
            }
                    
            //getter et setter methodes static concrete
            
            public function hydrate($row){
                $this->longueur=$row['longueur'];
                $this->largeur=$row['largeur'];
                $this->id=$row['id'];
            }


            public function demiPerimetre(){
                die(var_dump($this));
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