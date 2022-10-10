<?php
include("../model/user.php");

$user = new User();
?>

<h1>Mes user</h1>

<?php echo $user->list(); ?>