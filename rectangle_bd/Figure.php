<?php
    //tout ce qui est commun entre carre et rectangle on met ici
    require_once ("./IManager.php");
    abstract class Figure implements IManager{

        protected $longueur;
        protected $id;
        //ATTIRBUTS DE CLASSE (STATIC)
        protected static $unite;

        public function getLongueur(){
            return $this->longueur;//permet d'avoir acces aux attributs apartir des methodes
        }

        public function getId(){
            return $this->id;//permet d'avoir acces aux attributs apartir des methodes
        }

        public function setLongueur($longueur){
            $this->longueur=$longueur;
        }

        public function setId($id){
            $this->id=$id;
        }

           
        //getter et setter methodes static concrete
        public static function getUnite(){
            return self::$unite;//permet d'avoir acces aux attributs apartir des methodes
        }

        public static function setUnite($unite){
            self::$unite=$unite;
        }

        public abstract function demiPerimetre();

        public function perimetre(){
            return $this->demiPerimetre()*2;
        }

        public abstract function surface();

        public abstract function diagonale();

    }
?>