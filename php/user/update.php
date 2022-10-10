<?php
include("../model/user.php");

$id = $_GET['id'] ?? null;

$user = new User();
$u = $user->showUser($id);
?>

<h1>Modifier un user</h1>

<form method="post" action="../controller/user/create.php">
    <label for="firstname">Firstname</label>    
    <input id="firstname" type="text" name="firstname" value="<?php echo $u['firstname']; ?>">

    <label for="lastname">Lastname</label>    
    <input id="lastname" type="text" name="lastname" value="<?php echo $u['lastname']; ?>">

    <label for="email">Email</label>    
    <input id="email" type="email" name="email" value="<?php echo $u['email']; ?>">

    <input type="hidden" name="id" value="<?php echo $u['id']; ?>">

    <input type="submit" name="update" value="Modifier">
</form>