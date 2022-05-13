<?php require_once "inc/init.inc.php" ?>
<?php require_once "inc/header.inc.php" ?>

<?php

// debug( $_POST );

$title = "";
$description = "";
$postal_code = "";
$city = "";
$price = "";

if( $_POST )
{
    // Contrôles des saisies
    foreach( $_POST as $key => $value )
    {
        $temp = strip_tags( $value );
        $_POST[$key] = htmlentities( addslashes( $temp ) );
    }

    // Erreur si champs vides
    foreach( $_POST as $key => $value )
    {
        // echo " key : $key, value :  $value, $_POST[$key]" . "<br>";

        if(  empty( $_POST[$key] ) )
        {
            // echo"here2" . "<br>";

            $error .= ($key == 'title') ? "<p class='alert alert-danger' role='alert'>Veuillez renseigner le titre</p>" : "";
            $error .= ($key == 'description') ? "<p class='alert alert-danger' role='alert'>Veuillez renseigner la description</p>" : "";
            $error .= ($key == 'postal_code') ? "<p class='alert alert-danger' role='alert'>Veuillez renseigner le code postal</p>" : "";
            $error .= ($key == 'city') ? "<p class='alert alert-danger' role='alert'>Veuillez renseigner la ville</p>" : "";
            $error .= ($key == 'price') ? "<p class='alert alert-danger' role='alert'>Veuillez renseigner le prix</p>" : "";
        }
    }

    // Vérification du code postal
    if( !empty( $_POST['postal_code']) )
    {
        if( !is_numeric( $_POST['postal_code'] ) )
        {
            $error .= "<p class='alert alert-danger' role='alert'>Code postal : Vous devez saisir des chiffres</p>";
        }
    }

    // Vérification du prix
    if( !empty( $_POST['price']) )
    {
        if( !is_numeric( $_POST['price'] ) )
        {
            $error .= "<p class='alert alert-danger' role='alert'>Prix : Vous devez saisir des chiffres</p>";
        }

        if( strlen($_POST['price'] ) > 9 )
        {
            $error .= "<p class='alert alert-danger' role='alert'>Prix : Nous traitons les biens inférieurs à 1 milliard d'euros</p>";
        }
    }
 
    // Update des données pour le formulaire
    $title = ( !empty( $_POST['title'] ) ) ? $_POST['title'] : "";
    $description = ( !empty( $_POST['description'] ) ) ? $_POST['description'] : "";
    $postal_code = ( !empty( $_POST['postal_code'] ) ) ? $_POST['postal_code'] : "";
    $city = ( !empty( $_POST['city'] ) ) ? $_POST['city'] : "";
    $price = ( !empty( $_POST['price'] ) ) ? $_POST['price'] : "";

    // Insertion en BDD
    if( empty( $error ) )
    {
        // $r = execute_requete("INSERT INTO advert(title, description, postal_code, city, type, price)
        // VALUES(
        //     '$_POST[title]',
        //     '$_POST[description]',
        //     '$_POST[postal_code]',
        //     '$_POST[city]',
        //     '$_POST[type]',
        //     '$_POST[price]'
        //     )
        // ");

        // header('location:affichage_dernieres_annonces.php');
        // exit();
    }

    // Insertion de 10 requêtes tests
    // for( $j=10; $j<20; $j++ )
    // {
    //     $r = execute_requete("INSERT INTO advert(title, description, postal_code, city, type, price)
    //     VALUES(
    //         'title$j',
    //         'description$j',
    //         '$j',
    //         'city$j',
    //         'location',
    //         '20'
    //         )
    //     ");
    // }
}

?>

<h1 style='text-align: center' class='mt-3'>Ajouter une annonce</h1>

<!-- <form method='post'>

<label for="title">Titre de l'annonce *</label><br>
<input type="text" name='title' id='title' value=<?= $title ?>><br><br>

<label for="description">Description de l'annonce *</label><br> -->
<!-- <input type="text" name='description' id='description'><br><br> -->
<!-- <textarea name="description" id="description" cols="30" rows="5"><?= $description ?></textarea><br><br>

<label for="postal_code">Code postal *</label><br>
<input type="text" name="postal_code" id="postal_code" value=<?= $postal_code ?>><br><br>

<label for="city">Ville *</label><br>
<input type="text" name="city" id="city" value=<?= $city ?>><br><br>

<label for="type">Type d'annonce *</label><br>
<select name="type" id="type">
    <option value="location">Location</option>
    <option value="vente">Vente</option>
</select><br><br>

<label for="price">Prix *</label><br>
<input type="text" name='price' id='price' value=<?= $price ?>><br><br>

<input id="button" type="submit" name='validation' value="Ajouter l'annonce">

</form> -->

<!-- BOOTSTRAP -->
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
        <form method="post">
            <div class="form-group mt-3">
                <label for="title">Titre de l'annonce *</label>
                <input type="text" class="form-control" name="title" id="title" value=<?= $title ?>>
            </div>
            <div class="form-group mt-3">
                <label for="description">Description de l'annonce *</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?= $description ?></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="postal_code">Code postal *</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" value=<?= $postal_code ?>>
            </div>
            <div class="form-group mt-3">
                <label for="city">Ville *</label>
                <input type="text" class="form-control" name="city" id="city" value=<?= $city ?>>
            </div>
            <div class="form-group mt-3">
                <label for="type">Type d'annonce *</label>
                <select class="form-control" name="type" id="type">
                    <option value="Location">Location</option>
                    <option value="Vente">Vente</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="price">Prix *</label>
                <input type="text" class="form-control" name="price" id="price" value=<?= $price ?>>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Ajouter l'annonce</button>
        </form>
        <?php echo $error ?>
        </div>
    </div>
</div>

<?php require_once "inc/footer.inc.php" ?>