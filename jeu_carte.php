<!DOCTYPE html>
<?php
require 'php/pdo/pdo_groupe.php';
session_start();
?>
<!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Mon Jun 12 2023 18:08:21 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="maxences-top-notch-site-826874.webflow.io" data-wf-page="648190b084938643d6f724f7"
    data-wf-site="648190b084938643d6f724e3">

<head>
    <meta charset="utf-8" />
    <title>Maxence&#x27;s Top-Notch Site</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link
        href="style/CSS/style_jeu1.css"
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



        <div class="text-block-131">Rendez-vous au point indiquer sur la carte !</div>
        <div class="text-block-121">Cliquez sur le point pour voir apparaitre le lieu et trouver le QR code</div>
    </section>
    <section class="section-4 wf-section">
        <div class="div-block-7">
            <div class="text-block-91">Vous avez validé X/X étapes</div>
            <div class="text-block-101">Points total acutel :</div>
            <div class="text-block-111">250 pts</div>
        </div>
        <div class="div-block-6"><img
                src="images/carte.png"
                loading="lazy" sizes="(max-width: 479px) 95vw, 50vw"
                srcset="image/carte2.png 500w, images/carte3.png 776w"
                alt="" class="image-7" /></div>





        <div class="div-block-8">
            <div class="div-block-9">
                <button class="button1" data-modal="modalOne2"><img
                    src="images/qr.png"
                    loading="lazy" alt="" /></button>

                     <div id="modalOne2" class="modal">
    
 


        <div class="contact-form">

        
          <a class="close">&times;</a>
          <form action="/" class="popup">
          
          
          <div class="modal-content">

      <div class="row">
  <div class="col">
    <div id="reader"></div>
  </div>
  <div class="col" style="padding: 30px">
    <h4>Scan Result </h4>
    <div id="result">
      Result goes here
    </div>
  </div>
</div>
       
    
   

          </form>
        </div>
      </div>
</div>








                    <img
                    src="images/help.png"
                    loading="lazy" alt="" /></div>
        </div>
    </section>
    <div class="div-block-4"><img
            src="images/vaguebas.png"
            loading="lazy" sizes="(max-width: 479px) 80vw, 70vw"
            srcset="images/vaguebas2.pnng 500w, images/vaguebas3.png 720w"
            alt="" class="image-5" />
        <div class="div-block-5"><img
                src="images/logo_wallon.png"
                loading="lazy" alt="" class="image-6" /></div>
    </div>
    <script src="style/JS/script.js"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="style/JS/script2.js"
        type="text/javascript"></script>
        <script src="style/JS/groupe.js" type="text/javascript"></script>
        <script src="style/JS/qrcode_script.js"></script><script  src="style/JS/qr_code.js"></script>
</body>

</html>