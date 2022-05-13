<?php require_once "inc/init.inc.php" ?>
<?php require_once "inc/header.inc.php" ?>

<?php

// debug($_GET);

$updateMessage = "";

// Affichage des détails de l'annonce 
if( isset($_GET['id']) )
{
    $r = execute_requete("SELECT * FROM advert WHERE id='$_GET[id]'");
    $ligne = $r->fetch( PDO::FETCH_ASSOC );

    // debug($ligne);

    // $content .= "<p><strong>Id</strong> : $ligne[id]</p>";
    // $content .= "<p><strong>Titre</strong> : $ligne[title]</p>";
    // $content .= "<p><strong>Description</strong> : $ligne[description]</p>";
    // $content .= "<p><strong>Code postal</strong> : $ligne[postal_code]</p>";
    // $content .= "<p><strong>Ville</strong> : $ligne[city]</p>";
    // $content .= "<p><strong>Prix</strong> : $ligne[price]</p>";

    $content .="<div class='container'>";
    $content .="<div class='row'>";
    $content .="<div class='col-md-4 mx-auto mt-3'>";
    $content .= "<table class='table'>";

    $content .= "<tr><td><strong> Id </strong></td><td> $ligne[id]</td></tr>";
    $content .= "<tr><td><strong> Titre </strong></td><td> $ligne[title]</td></tr>";
    $content .= "<tr><td><strong> Description </strong></td><td> $ligne[description]</td></tr>";
    $content .= "<tr><td><strong> Code postal </strong></td><td> $ligne[postal_code]</td></tr>";
    $content .= "<tr><td><strong> Ville </strong></td><td> $ligne[city]</td></tr>";
    $content .= "<tr><td><strong> Prix </strong></td><td> $ligne[price]</td></tr>";

    $content .= "</table>";
    $content .="</div>";
    $content .="</div>";
    $content .="</div>";

    $updateMessage = $ligne['reservation_message'];
}
else
{
    // header('location:consulter_toutes_les_annonces.php');
    // exit();
}

// Modification du message dans la BDD
if ( isset( $_POST['messageToInsert'] ) )
{
    if( !empty( $_POST['messageToInsert'] ) )
    {
        // debug($_POST);
        // $message = strip_tags( $_POST['messageToInsert'] );
        // $message = htmlentities( addslashes( $message ) );
        // $pdo->exec("UPDATE advert SET reservation_message = '$message' WHERE id = $_GET[id]");

        // $updateMessage = $_POST['messageToInsert'];

        // header('location:consulter_toutes_les_annonces.php');
        // exit();
    }
    else
    {
        $error .= "<p class='alert alert-danger' role='alert'>Veuillez renseigner un message de réservation</p>";
    }
}

?>
<!-- Titre de la page -->
<h1 style='text-align: center' class='mt-3'>Consultation de l'annonce
    <?php
        if( isset($_GET['id']) )
        {
            echo 'numéro ' . $ligne['id'] . ' - ' . $ligne['title'];
        }
    ?>
</h1>

<!-- Affichage du contenu -->
<?php echo $content; ?>

<!-- Affichage du message de réservation -->
<?php
    if( (isset($_GET['id']) && !empty($ligne['reservation_message'])) ||
        (isset($_POST['messageToInsert']) &&  !empty($_POST['messageToInsert']))
    )
    {
        echo "<p style='text-align: center' class='mt-3'><strong>Message de réservation :</strong> $updateMessage </p>";
    }
?>

<!-- Affichage du formulaire -->
<?php if( (isset($_GET['id']) )) : ?>


<div class='container'>
<div class='row'>
<div class='col-md-4 mx-auto'>
<?php echo $error; ?>
</div>
</div>
</div>

<!-- <form method="post">
    <label for="messageToInsert" style='font-weight: bold;'>Message *</label><br>
    <textarea name="messageToInsert" id="messageToInsert" cols="30" rows="5"></textarea><br><br>

    <input type="submit" value="Je réserve">
</form> -->

<?php if( (isset($_GET['msg']) && empty($_GET['msg'])) ) : ?>
<div class='container'>
<div class='row'>
<div class='col-md-4 mx-auto'>
<hr>
<form method="post">
    <div class="form-group mt-3">
        <label for="messageToInsert">Description de l'annonce *</label>
        <textarea class="form-control" name="messageToInsert" id="messageToInsert" rows="3">Message *</textarea>
    </div>
    
    <div class="row">
    <div class='col-md-6 mx-auto mt-3  mb-5 text-center'>
    <button type="submit" class="btn btn-primary">Je réserve</button>
    </div>
    </div>
    
</form>
</div>
</div>
</div>
<?php endif; ?>

<?php endif; ?>

<?php require_once "inc/footer.inc.php" ?>