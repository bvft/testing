<?php

class User
{
    public $connexion;

    /**
     * Initialise une connexion PDO
     * Dans un gos projet il faudrait séparer la connexion à la base de données
     * pour éviter de ré-écrire la même chose à chaque fois. Pourquoi pas utilsier un singleton
     */
    public function __construct()
    {
        try
        {
            $this->connexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }
        catch(PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return;
        }
    }

    /**
     * Créer un user
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @return void
     */
    public function create(string $firstname, string $lastname, string $email): void
    {
        $stmt = $this->connexion->prepare("INSERT INTO user (firstname, lastname, email)
            VALUES(:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
    }

    /**
     * Modifie un user
     *
     * @param integer $id
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @return void
     */
    public function update(int $id, string $firstname, string $lastname, string $email): void
    {
        $stmt = $this->connexion->prepare("UPDATE user
            SET firstname = :firstname, lastname = :lastname, email = :email
            WHERE id = :id");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    /**
     * Supprime un user
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $stmt = $this->connexion->prepare("DELETE FROM user
            WHERE id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    /**
     * Affiche tous les users
     *
     * @return void
     */
    public function list(): void
    {
        $stmt = $this->connexion->prepare("SELECT * FROM user");
        $stmt->execute();

        while($user = $stmt->fetch())
        {
            echo $user['firstname'] . ' ' . $user['lastname'] . ' ' . $user['email'] . '</br >';
            echo '<a href="../user/update.php?id='. $user['id'] .'">Modifier</a></br >';
            echo '<a href="../user/delete.php?id='. $user['id'] .'">Supprimer</a></br >';
        }
    }

    /**
     * Affiche un user
     *
     * @param integer $id
     * @return void
     */
    public function showUser(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch();
    }
}