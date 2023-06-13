<!DOCTYPE html>
<?php
require 'php/pdo/pdo_groupe.php';
session_start();
?>
<!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Thu Jun 08 2023 10:03:13 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="maxences-top-notch-site-826874.webflow.io" data-wf-page="648190b084938643d6f724f7"
    data-wf-site="648190b084938643d6f724e3">

<head>
    <meta charset="utf-8" />
    <title>Maxence&#x27;s Top-Notch Site</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
  
    <link
        href="style/CSS/style_regle.css"
        rel="stylesheet" type="text/css" />
        <link
        href="style/CSS/style_groupe.css"
        rel="stylesheet" type="text/css" />
       
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon" />
</head>

<body class="body">
    <section class="wf-section"><img
            src="images/vaguehaut.png"
            loading="lazy" sizes="(max-width: 479px) 80vw, 60vw"
            srcset="images/vaguehaut2.png 500w, images/vaguehaut3.png 786w"
            alt="" class="image" />
        <div class="div-block-2">
            <div class="div-block">
            <button class="button1" data-modal="modalOne">
            <img
                    src="images/user1.png"
                    loading="lazy" alt="" class="image-3" /></button>
                    <div class="text-block">Connecté(e) sous :</div>
                
  
                    <div id="modalOne" class="modal">
      <div class="modal-content">


 


        <div class="contact-form">

        
          <a class="close">&times;</a>
          <form action="/" class="popup">
          <div class="container">
          <div class="div-block-21">
            <div class="text-block-8">
                Liste des joueurs de l&#x27;équipe <?php
                if (isset($_SESSION['groupe'])) {
         echo "<p class='nom_equipe'>".$_SESSION['groupe']['groupe_identifiant']. "</p>";
}
               ?></div>



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
                
                echo "<div class='text-block-10'>".$prenom."  ".$nom.", ".$classe."</div></div>";
                      
            }
            
            echo"<div class='div-block-23'>
            <div class='text-block-12'>Votre position : ".$classement. "</div>
            <div class='text-block-15'>Classement :</div>
            <div class='text-block-16'>1. Equipe °°</div>
            <div class='text-block-17'>2. Equipe °°</div>
            <div class='text-block-17'>3. Equipe °°</div>
        </div>";
       
        echo "<div class='div-block-24'>
        <div class='text-block-11'>Score actuel :" .$score. "pts</div> </div>";
            
        }
?>

    </div>
          
        
       
    
   

          </form>
        </div>
      </div>
    </div>
    


                
                <div class="text-block-2">
                <?php
                if (isset($_SESSION['groupe'])) {
         echo $_SESSION['groupe']['groupe_identifiant'];
}
               ?></div>

                
<div >
                
                <form method="post" action="php/deconnexion.php">
        <button class="text-block-3" name="submit">Déconnexion</button>
    </form>
    </div>
            </div>
        </div>
    </section>


    <section class="section wf-section">
        <div class="text-block-4">Les règles</div>
        <div class="text-block-5">Veuillez lire attentivement les règles avant de commencer la partie .<br />Toute
            règles non respecté sera sanctionné</div>
    </section>
    <section class="section-2 wf-section">
        <div class="div-block-3">
            <div style="padding-top:56.17021276595745%" class="video w-video w-embed"><iframe class="embedly-embed"
                    src="images/pascal.mp4"
                    scrolling="no" allowfullscreen title="Starship | First Integrated Flight Test"></iframe></div>
        </div><a href="jeu_carte.php" class="button w-button">Commencer ➔</a>
    </section>
    <div class="div-block-4"><img
            src="images/vaguebas.png"
            loading="lazy" sizes="(max-width: 479px) 80vw, 70vw"
            srcset="images/vaguebas2.png 500w, images/vaguebas3.png 720w"
            alt="" class="image-5" />
        <div class="div-block-5"><img
                src="images/logo_wallon.png"
                loading="lazy" alt="" class="image-6" /></div>
    </div>
    <script src="style/JS/groupe.js" type="text/javascript"></script>
    <script src="style/JS/script_regle.js"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="style/JS/script_regle2.js"
        type="text/javascript"></script>
</body>

</html>