<?php require_once "inc/init.inc.php" ?>
<?php require_once "inc/header.inc.php" ?>

<?php 

// Affichage de toutes les annonces
$r = execute_requete("SELECT * FROM advert");

$content .="<div class='container'>";
$content .="<div class='row'>";
$content .="<div class='col-md-12 mx-auto mt-3'>";
$content .= "<table class='table'>";
    $content .= "<thead>";
    $content .= "<tr>"; 
        // $nombre_colonne = $r->columnCount();

        // for( $i = 0; $i < $nombre_colonne; $i++ )
        // {
        //     $titre = $r->getColumnMeta( $i );
        //     $content .= "<th> $titre[name] </th>";
        // }

        // $content .= "<th> Fiche de l'annonce </th>";
        $content .= "<th> Identifiant </th>";
        $content .= "<th> Titre </th>";
        $content .= "<th> Description </th>";
        $content .= "<th> Code postal </th>";
        $content .= "<th> Ville </th>";
        $content .= "<th> Type </th>";
        $content .= "<th> Prix (euros) </th>";
        $content .= "<th> Statut </th>";
        $content .= "<th> Fiche </th>";

    $content .= "</tr>";
    $content .= "</thead>";

    while( $ligne = $r->fetch( PDO::FETCH_ASSOC ) )
    {

        $content .= "<tr>";
        // debug( $ligne );

        foreach( $ligne as $indice => $valeur )
        {
            // debug( $valeur );

            if( $indice == 'reservation_message' )
            {
                if( !empty( $valeur ) )
                {
                    $content .= "<td> <span style='color:red'> Déjà réservé </span> </td>";
                }
                else
                {
                    $content .= "<td> <span style='color:black'> Disponible </span> </td>";
                }
            }
            else
            {
                $content .= "<td> $valeur </td>";
            }
        }

        $content .= "<td><a href='consulter_une_annonce.php?id=$ligne[id]&&msg=$ligne[reservation_message]'>$ligne[id]_Fiche_$ligne[title]</a></td>";

        $content .= "</tr>";
    }

$content .= "</table>";
$content .="</div>";
$content .="</div>";
$content .="</div>";

?>

<h1 style='text-align: center' class='mt-3'>Consulter toutes les annonces</h1>

<?php echo $content; ?>

<?php require_once "inc/footer.inc.php" ?>