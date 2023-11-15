<?php

class ReclamationModel {
    private int $id;
    private  ?string $nom = null;
    private  ?string $prenom = null;
    private  ?string $texte = null;
    private  ?string $email = null;
    private  ?string $tel = null;
    

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertReclamation($nom, $prenom, $texte, $email, $tel, $date) {
        $nom = $this->sanitizeInput($nom);
        $prenom = $this->sanitizeInput($prenom);
        $texte = $this->sanitizeInput($texte);
        $email = $this->sanitizeInput($email);
        $tel = $this->sanitizeInput($tel);
        $date = $this->sanitizeInput($date);

        $sql = "INSERT INTO reclamations (nom, prenom, texte, email, tel, date) VALUES ('$nom', '$prenom', '$texte', '$email', '$tel', '$date')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    private function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
