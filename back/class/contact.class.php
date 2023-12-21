<?php

class Contacts {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $nom;
    private string $prenom;
    private string $mail;
    private string $tel;
    private string $mess;

    /* Constructor */

    public function __construct($lenom, $leprenom, $lemail, $letel, $lemess) {
        $this->nom = $lenom;
        $this->prenom = $leprenom;
        $this->mail = $lemail;
        $this->tel = $letel;
        $this->mess = $lemess;
    }

    public function setNom($lenom) {
        $this->nom = $lenom;
    }

    public function setPrenom($leprenom) {
        $this->prenom = $leprenom;
    }

    public function setMail($lemail) {
        $this->mail = $lemail;
    }

    public function setTel($letel) {
        $this->tel = $letel;
    }

    public function setMess($lemess) {
        $this->mess = $lemess;
    }

    /* Getter */

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getMess() {
        return $this->mess;
    }

    public function create_contact(Contacts $Contacts) {
        global $con;

        $sql = "INSERT INTO contact (nom, prenom, mail, tel, mess)
        VALUES (:nom, :prenom, :mail, :tel, :mess);";

        $req = $con->prepare($sql);
        $req->bindValue(':nom', $Contacts->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $Contacts->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':mail', $Contacts->getMail(), PDO::PARAM_STR);
        $req->bindValue(':tel', $Contacts->getTel(), PDO::PARAM_STR);
        $req->bindValue(':mess', $Contacts->getMess(), PDO::PARAM_STR);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ

    public static function get_all_contacts() {
        global $con;

        $req = "SELECT * FROM contact";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ 1

    public function get_one_contacts(int $id) {
        global $con;
        $sql = "SELECT * FROM contact WHERE id_contact = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return $req->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
