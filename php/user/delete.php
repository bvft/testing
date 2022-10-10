<?php
include("../model/user.php");

$id = $_GET['id'] ?? null;

// il faudrait vérifier que l'id existe en bd
if($id)
{
    (new User())->delete($id);
}

header('Location: ../index.php');