<?php
require_once "connexion.php";
$emailUtilisateur="";
$pwdUtilisateur="";
if( isset($_POST["emailC"]) && isset($_POST["pwdC"]))
{
$emailUtilisateur= $_POST["email"];
$pwdUtilisateur=$_POST["pwdC"];
$response = $connexion->prepare("SELECT count(*)
            FORM utilisateurs
            WHERE emailUtilisateur = :emailUtil and motDePass = :pwdUtil");
            $response->execute(array(
                "emailUtil" => $emailUtilisateur,
                "pwdUtil"  =>   $pwdUtilisateur
            ));
            if ($ligne = $response->fetch())
            {
                if ($ligne[0] == "1")
                {
                    echo "Succes";
                    exit();
                }
                else
                {
                    echo "Adresse email introuvable ou mot de passe erroné";
                    exit();
                }
            }
}



?>