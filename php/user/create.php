<h1>Créer un user</h1>

<form method="post" action="../controller/user/create.php">
    <label for="firstname">Firstname</label>    
    <input id="firstname" type="text" name="firstname">

    <label for="lastname">Lastname</label>    
    <input id="lastname" type="text" name="lastname">

    <label for="email">Email</label>    
    <input id="email" type="email" name="email">

    <input type="submit" name="create" value="Créer">
</form>