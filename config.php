<?php
class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        try {
            if (!isset(self::$pdo)) {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=biblio-tech',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            }
            return self::$pdo;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
    }
}
?>
