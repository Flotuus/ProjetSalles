<?php
function getPage()
{

    $lesPages['accueil'] = "actionAccueil";
    $lesPages['salles'] = "actionSalles";


    $contenu = $lesPages['accueil'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else{
        $page = 'accueil';
    }
    if (!isset($lesPages[$page])){
        $page = 'accueil';
    }

    $contenu = $lesPages[$page];

    return $contenu;

}

?>