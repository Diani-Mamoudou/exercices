<?php
    //Encapsulation permet de  géréer la porter des attibuts et mathodes d'une classe
    class Rectangle{
        //attribut d'une classe ne doivent etre visible  que dans cette classe(private)
            //instance c'est specifique à un objet de la classe ex: longueur et largeur car tout les rectangles n'auronts pas la meme longueur
            private $longueur;
            private $largeur;
            //classe: commun à l'ensemble des objets de la classe
            private static $unite; //unite ne sera créée qu'une seule fois




        //methodes d'une classe sont accessible de l'exterieur(public)
            //instance c'est specifique à un objet de la classe
                //concrete dont on connais la definition
                    //constructeurs permet de construire un objet
            public funtion u__construct($longueur=null,$largeur=null){
                if($longueur!=null){
                    $this->longueur=$longueur
                }
                if($largeur!=null){
                    $this->largeur=$largeur
                }
            }
            //ainsi c'est une surcharge du contructeur alors pour crer rectangle on fait $rectangle=new rectangle($longueur,$largeur) dans index
                    //getter et setter::getter==>accesseurs permettent la manipulation des attributs de la classe de l'exterieur
                                    //setteur==>mutateurs permet de modifier la valeur d'un attributs
            public function getLongueur(){
                return $this->longueur;//permet d'avoir acces aux attributs apartir des methodes
            }
            public function getLargeur(){
                return $this->largeur;//permet d'avoir acces aux attributs apartir des methodes
            }
            public function setLongueur($longueur){
                $this->longueur=$longueur;
            }
            public function setLargeur($largeur){
                $this->largeur=$largeur;

            }

                //getter et setter methodes static concrete


                    //metiers=>usecase (elles sont toute concrete)
            public function demiPerimetre($longueur,$largeur){

            }
            public function perimetre($longueur,$largeur){

            }
            public function surface($longueur,$largeur){

            }
            public function diagonale($longueur,$largeur){

            }
                //abstraite dont on ne connais pas encore sa definition
                    //metiers=>usecase

            //classe commun à l'ensemble des objets de la classe
                //concrete
                    //getter et setter
                    //metiers=>usecase
                //abstraite
                    //metiers=>usecase
    }

        //vu que unité est static pas besoin de creer un objet
        Rectangle::setUnite("cm");

        //creer un objet 
        $rect1=new Rectangle();
        //pour mettre longueur et largeur on utilise setter
        $rect1->setLongueur(12);
        $rect1->setLargeur(2);
        //pour obtenir longueur et largeur on utilise setter
        echo "Longueur".$rect1->getLongueur()."".$rect1->getUnite()."<br>";
        $rect1->getLongueur());


        //surchage de methode est une methode qui differente maniere d'utilisation exemple
        /*
        function is_empty($nbr,sms=null){}
        on peut l'appelé en mettant un paramettre pour nombre mais aussi en mettant 2(pour le sms)
         */
    //////////////////////*******BASE DE DONNE********\\\\\\\\\\\\\\\\\\\\\\

    /*pour acceder une base de donnee il faut
    1-connexion à la base
        a-@ server de la machine qui heberge le sgbd
        b-utilisateur d'un SGBDQ: root
        c-mot de passe: vide pour windows
    2-ecriture et execution des requetes=>LMD(insert,update,delate,select)
        a-mise a jour:=>update,insert,delete retourne un entier le nb de ligne qui a ete modifie
        b-interrogation permet recupération de donné:=>select

    3-recuperation des résultats

    4-fermer la connexion

    */
    ?>