
    <?php


        //pour l'affichage on utilisera un tableau associatif pour longueur et largeur
        //pour quil grade la valeur quand c'est bon il faut ajouter une valeur ligne 83 et initialiser nos valeur a vide ligne 74
        //pour les sessions
        //ouvrir une session: session_start() ***** fermer une session (c'est ecrasé toute les val):session_destroy()

    $manager=new RectangleMannager();
       
        if (isset($_POST['bouton'])){
            if ($_POST['bouton']==="calcul"){
                $validator=new Validator();

            $longueur=$_POST['longueur'];
            $largeur=$_POST['largeur'];

            $validator->is_empty($longueur,'longueur');
            $validator->is_empty($largeur,'largeur');
                
                if ($validator->is_valid()){
                    $validator->compare($longueur,$largeur,'longueur','largeur');
                    if ($validator->is_valid()){
                        $rectangle=new Rectangle($longueur,$largeur);
                        $rectangle->setLongueur($longueur);
                        $rectangle->setLargeur($largeur);
                       $manager->create($rectangle);

                    }
                }
            

            $errors=$validator->getErrors();
            if (isset($errors['longueur'])){ 
                $longueur="";}
            if (isset($errors['largeur'])){ 
                $largeur="";
            }
            }
        }
    ?>

        
    
    <div class="container" style="margin-top:50px">

        <?php if (isset($errors['all'])){
            $longueur="";
            $largeur=""; ?>
            <div class="alert alert-danger col-4">
                <strong>ERREUR</strong> <?php echo $errors['all'];?>
            </div>
        <?php
        }
        ?>

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
            <label>Entrer la largeur</label>
            <div class="col-4 m1-2">
                <input type="text" id="valeur" value="<?=$largeur?>" name="largeur" class="form-control">
            </div>
        <?php if (isset($errors['largeur'])){ 
            $largeur="";?>
            <div class="alert alert-danger col-4">
                <strong>ERREUR</strong> <?php echo $errors['largeur'];?>
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
        $rectangles=$manager->findAll();
        if (count($rectangles)>0){?>
            <table class="table container table-bordered">
                <thead>
                    <tr>
                        <th>Démi-périmètre</th>
                        <th>Périmètre</th>
                        <th>Surface</th>
                        <th>Diagonale</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($rectangles as $key=>$rectangle) {

                ?>
                    <tr>
                        <td scope="row"><?=$rectangle->demiPerimetre()?></td>
                        <td><?=$rectangle->perimetre()?></td>
                        <td><?=$rectangle->surface()?></td>
                        <td><?=$rectangle->diagonale()?></td>
                    </tr>
                <?php
                    
                }
                ?>
                </tbody>
            </table>
        <?php }?>
    