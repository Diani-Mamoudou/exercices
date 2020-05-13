    <?php


        //pour l'affichage on utilisera un tableau associatif pour longueur et largeur
        //pour quil grade la valeur quand c'est bon il faut ajouter une valeur ligne 83 et initialiser nos valeur a vide ligne 74
        //pour les sessions
        //ouvrir une session: session_start() ***** fermer une session (c'est ecrasé toute les val):session_destroy()
        $manager=new CarreMannager();

        if (isset($_POST['bouton'])){
            if ($_POST['bouton']==="calcul"){
                $validator=new Validator();

            $longueur=$_POST['longueur'];
            $validator->is_empty($longueur,'longueur');
            
                
                if ($validator->is_valid()){
                    $validator->is_positif($longueur,'longueur');
                    if ($validator->is_valid()){
                        $carre=new Carre($longueur);
                        $carre->setLongueur($longueur);
                        $manager->create($carre);

                    }
                
                }

            $errors=$validator->getErrors();
            if (isset($errors['longueur'])){ 
                $longueur="";
            }

        }
    }
    ?>


        
    
    <div class="container" style="margin-top:50px">


        <form name="mon-formulaire1" action="" method="post">
        <div class="form-group row">
            <label>Entrer la longueur</label>
            <div class="col-4 m1-2">
                <input type="text" id="valeur" value="<?=$longueur?>" name="longueur" class="form-control">
            </div>
        <?php if (isset($errors['longueur'])){ 
            $longueur="";?>
            <div class="alert alert-danger col-4">
                <strong>ERREUR</strong> <?php echo $errors['longueur'];?>
            </div>
        <?php
        }
        ?>
        </div>

            <div class="form-group row">
                <div class="offset-sm-4 col-sm-2">    
                    <button type ="submit" name="bouton"  value="calcul" class="btn btn-primary">ENVOYER</button>
                </div>

                <div class="col-sm-2">    
                    <button type ="submit" name="bouton" value="reinitialisation" class="btn btn-secondary">Réinitialiser</button>
                </div>
            </div>
        </form>
    </div>

    <?php
        $carres=$manager->findAll();
        if (count($carres)!==0){ ?>
            <table class="table container table-bordered">
                <thead>
                    <tr>
                        <th>Démi-périmètre</th>
                        <th>Périmètre</th>
                        <th>Surface</th>
                        <th>Diagonale</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($carres as $key=>$carre) {
                ?>
                    <tr>
                        <td scope="row"><?=$carre->demiPerimetre()?></td>
                        <td><?=$carre->perimetre()?></td>
                        <td><?=$carre->surface()?></td>
                        <td><?=$carre->diagonale()?></td>
                        <td>
                            <a name="" id="" class="btn btn-success" href="#" role="button">Edit</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    <?php } ?>