<?php
require 'pdo/pdo_groupe.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil groupe</title>
</head>
<body>
    <?php
        //récuperation du groupe connecté
        $grp = $_SESSION['groupe'];
        //récuperation du nom du groupe,le nom et prenom des membres,la classe,le score
        $req = $db->prepare("SELECT etudiant.etud_nom , etudiant.etud_prenom , etudiant.etud_classe , groupe.groupe_pts , groupe.groupe_classement FROM groupe inner join etudiant on etud_groupe_id = groupe_id WHERE groupe_id = :groupe_id ");
        $req->execute(array("groupe_id"=> $grp["groupe_id"]));
        $etudiant = $req->fetchAll(PDO::FETCH_OBJ); 
        if($etudiant)
        {
            $nb_etudiant = count($etudiant);
            for($i=0;$i<$nb_etudiant;$i++)
            {
                //récupération info dans les tables etudiant et groupe
                $nom = $etudiant[$i]->etud_nom;
                $prenom = $etudiant[$i]->etud_prenom;
                $classe = $etudiant[$i]->etud_classe;
                $score = $etudiant[$i]->groupe_pts;
                $classement=$etudiant[$i]->groupe_classement;
                echo "\n nom: ",$nom,"\n prenom : \n",$prenom ,"\n classe: \n",$classe," <br>";        
            }
            echo "score :",$score;
            echo "<br> classement :",$classement;
        }
?>
    <form method="post" action="deconnexion.php">
        <button name="submit">déconnexion</button>
    </form>
</body>
</html>