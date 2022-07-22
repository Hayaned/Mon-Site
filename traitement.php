<?php  
    //  var_dump($_POST);
    //  die();

     try{
          $newBD=new PDO('mysql:host=localhost;dbname=formulaire_boostrap','root','');
          echo "Connexion etablie";
    }catch(PDOException $e){
        die('Erreur');
     }

     if (isset($_POST['Nom']) && isset($_POST['Email']) && isset($_POST['Telephone']) && isset($_POST['Messages']))
     {   
         $Nom = htmlspecialchars($_POST['Nom']);
         $Email = htmlspecialchars($_POST['Email']);
         $Telephone = htmlspecialchars($_POST['Telephone']);
         $Messages = htmlspecialchars($_POST['Messages']);
         $insertion=$newBD->prepare('INSERT INTO table1(Nom,Email,Telephone,Messages) VALUES(:Nom,:Email,:Telephone,:Messages)');


         $insertion->bindvalue(':Nom',$_POST['Nom'],PDO::PARAM_STR);
         $insertion->bindvalue(':Email',$_POST['Email'],PDO::PARAM_STR);
         $insertion->bindvalue(':Telephone',$_POST['Telephone'],PDO::PARAM_STR);
         $insertion->bindvalue(':Messages',$_POST['Messages'],PDO::PARAM_STR);
          
         $verification=$insertion->execute();
         if($verification){
            echo "insertion reussie ";
         }else{
            echo " erreur insertion ";
         }

     }else{
        echo "une variable n'est pas declaree ou est null";
     }

     

?>