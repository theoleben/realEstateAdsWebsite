<?php
// Fonction de debugage : (permet de faire un print_r() "amélioré")
function debug( $arg )
{
    echo "<div style='background:#fda500; z-index:1000'>";

        $trace = debug_backtrace();
        // debug_backtrace() : fonction interne de php qui retourne un array avec des infos de l'endroit où l'on fait appel à la fonction

        echo"<p>Debug demandé dans le fichier : ". $trace[0]['file'] . " à la ligne : " . $trace[0]['line'] . "</p>";

        print '<pre>';
            print_r( $arg );
        print '</pre>';

    echo "</div>";
}

// Fonction pour exécuter la requête :
function execute_requete( $req )
{
    global $pdo; // global : permet de rapattrier la varibale $pdo dans l'espace local de la fonction
    $pdostatement = $pdo->query( $req );

    return $pdostatement;
}

?>