<form action="ajouter.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label class="control-label col-lg-12">Téléchargement d'image extensions autorisées (png, jpeg, jpg, gif).</label>
                        <input type="file" name="image" class="btn-upload">
                        <?php 

                        if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
                            {
                        if ($_FILES['image']['size'] <= 1000000)
                                    {

                                            $fichier = pathinfo($_FILES['image']['name']);
                                            $extension_upload = $fichier['extension'];
                                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG');
                                            if (in_array($extension_upload, $extensions_autorisees))
                                            {
                                            move_uploaded_file($_FILES['image']['tmp_name'], '../img/produits/' . basename($_FILES['image']['name']));
                                            $requete = $bdd->prepare('INSERT INTO products(image) VALUES (?)') or exit(print_r($bdd->errorInfo()));
                                            $requete->execute(array($_FILES['image']['name']));

                                            }else{
                                                $erreur = "un problème de téléchargement est survenu !!";
                                            }
                                    }
                            } 
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Nom du produit</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description du produit</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Prix du produit Junior</label>
                        <input type="text" name="priceJ" id="priceJ" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label>Prix du produit Adulte</label>
                        <input type="text" name="priceA" id="priceA" class="form-control"><br>
                    </div>
                    <?php

                    if(isset($_POST['name']) AND isset($_POST['description']) AND isset($_POST['priceA']) AND isset($_POST['priceJ']))

                    {

                    $requete = $bdd->prepare('INSERT INTO products(name, description, priceA, priceJ,) VALUES (?, ?, ?, ?)');
                    $requete->execute(array($_POST['name'],$_POST['description'],$_POST['priceA'],$_POST['priceJ']));

                    }

                    ?>
                    <input type="submit" class="btn btn-primary" id="ajouter" name="ajouter" value="Ajouter">

                </form>
                <?php if (isset($erreur)) { echo $erreur;} ?>
