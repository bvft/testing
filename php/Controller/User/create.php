<?php
include("../../model/user.php");

$user = new User();

if(isset($_POST['create']))
{
    $firstname = $_POST['firstname'] ?? null;
    $lastname = $_POST['lastname'] ?? null;
    $email = $_POST['email'] ?? null;

    if($firstname && $lastname && $email)
    {
        // On pourrait vérifier chaque élément et retourner un msg d'erreur à l'utilisateur
        /*$email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $firstname = preg_match('/^[a-zA-Z ]{2,}$/', $firstname);
        $lastname = preg_match('/^[a-zA-Z ]{2,}$/', $lastname);*/

        // Si il y a une erreur, envoie l'algorithme à error 
        // goto error;

        $user->create($firstname, $lastname, $email);
    }

    // On pourrait renvoyer sur la page du formulaire de création
    //error:
}

if(isset($_POST['update']))
{
    // On pourrait faire le même procéder que plus haut
    // Et vérifier si l'id en post et en get sont identiques
    $firstname = $_POST['firstname'] ?? null;
    $lastname = $_POST['lastname'] ?? null;
    $email = $_POST['email'] ?? null;
    $id = $_POST['id'] ?? null;

    if($id && $firstname && $lastname && $email)
    {
        $user->update($id, $firstname, $lastname, $email);
    }
}

if(isset($_POST['delete']))
{
    // On pourrait vérifier si l'id en post et en get sont identiques
    $id = $_POST['id'] ?? null;

    if($id)
    {
        $user->delete($id);
    }
}

header('Location: ../../index.php');