<?php require_once "inc/init.inc.php" ?>
<?php require_once "inc/header.inc.php" ?>

<?php

// Affichage des 15 dernières années
$r = execute_requete("SELECT * FROM advert ORDER BY id DESC LIMIT 0, 5");

$content .="<div class='container'>";
// $content .="<h2 style='text-align: center' class='mt-3'>Affichage des 15 dernières annonces ajoutées </h2>";
$content .="<div class='row'>";
$content .="<div class='col-md-8 mx-auto mt-3'>";
$content .= "<table class='table'>";
    $content .= "<thead>";
    $content .= "<tr>"; 
        // $nombre_colonne = $r->columnCount();

        // for( $i = 0; $i < $nombre_colonne; $i++ )
        // {
        //     $titre = $r->getColumnMeta( $i );
        //     $content .= "<th> $titre[name] </th>";
        // }
        $content .= "<th> Titre </th>";
        $content .= "<th> Description </th>";
        $content .= "<th> Code postal </th>";
        $content .= "<th> Ville </th>";
        $content .= "<th> Type </th>";
        $content .= "<th> Prix (euros)</th>";
    $content .= "</tr>";
    $content .= "</thead>";

    while( $ligne = $r->fetch( PDO::FETCH_ASSOC ) )
    {
        $content .= "<tr>";
        // debug( $ligne );

        foreach( $ligne as $indice => $valeur )
        {
            if( $indice == 'title' )
            {
                $content .= "<td>" . $valeur . "</td>";
            }
            else if( $indice != 'id' && $indice != 'reservation_message')
            {
                $content .= "<td> $valeur </td>";
            }
        }
        $content .= "</tr>";
    }

$content .= "</table>";
$content .="</div>";
$content .="</div>";
$content .="</div>";

?>

<h1 style='text-align: center' class='mt-3'>Affichage des 5 dernières annonces ajoutées</h1>

<?php echo $content; ?>

<?php require_once "inc/footer.inc.php" ?>