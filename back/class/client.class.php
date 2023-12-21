<?php

class Clients {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $nom;
    private string $prenom;
    private string $rue;
    private string $codep;
    private string $vil;
    private string $mail;
    private string $pass;
    private string $statut;
    private string $valid;

    /* Constructor */

    public function __construct($lenom, $leprenom, $larue, $lecodep, $lavil, $lemail, $lepass, $lestatut, $lavalid) {
        $this->nom = $lenom;
        $this->prenom = $leprenom;
        $this->rue = $larue;
        $this->codep = $lecodep;
        $this->vil = $lavil;
        $this->mail = $lemail;
        $this->pass = $lepass;
        $this->statut = $lestatut;
        $this->valid = $lavalid;
    }

    public function setNom($lenom) {
        $this->nom = $lenom;
    }

    public function setPrenom($leprenom) {
        $this->prenom = $leprenom;
    }

    public function setRue($larue) {
        $this->rue = $larue;
    }

    public function setCodep($lecodep) {
        $this->codep = $lecodep;
    }

    public function setVil($lavil) {
        $this->vil = $lavil;
    }

    public function setMail($lemail) {
        $this->mail = $lemail;
    }

    public function setPass($lepass) {
        $this->pass = $lepass;
    }

    public function setStatut($lestatut) {
        $this->statut = $lestatut;
    }

    public function setValid($lavalid) {
        $this->valid = $lavalid;
    }

    /* Getter */

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getRue() {
        return $this->rue;
    }

    public function getCodep() {
        return $this->codep;
    }

    public function getVil() {
        return $this->vil;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getValid() {
        return $this->valid;
    }

    public function create_clients(Clients $client) {
        global $con;
        $sql = "INSERT INTO clients (nom_client, prenom_client, rue_client, codep_client, vil_client, mail_client, pass_client, statut_client, valid_client) 
            VALUES (:nom, :prenom, :rue, :codep, :vil, :mail, :pass, :statut, :valid);";
        $req = $con->prepare($sql);
        $req->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':rue', $client->getRue(), PDO::PARAM_STR);
        $req->bindValue(':codep', $client->getCodep(), PDO::PARAM_STR);
        $req->bindValue(':vil', $client->getVil(), PDO::PARAM_STR);
        $req->bindValue(':mail', $client->getMail(), PDO::PARAM_STR);
        $req->bindValue(':pass', $client->getPass(), PDO::PARAM_STR);
        $req->bindValue(':statut', $client->getStatut(), PDO::PARAM_STR);
        $req->bindValue(':valid', $client->getValid(), PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ

    public static function get_all_clients() {
        global $con;

        $req = "SELECT * FROM clients";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ 1

    public static function get_one_clients(int $id) {
        global $con;
        $sql = "SELECT * FROM clients WHERE id_client = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return $req->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//UPDATE

    public function update_clients(Clients $client, int $id) {
        global $con;
        $sql = "UPDATE client SET  nom_client = :nom,
                                prenom_client = :prenom,
                                rue_client = :rue,
                                codep_client = :codep,
                                vil_client = :vil,
                                mail_client = :mail,
                                pass_client = :pass,
                                statut_client = :statut,
                                valid_client = :valid,
            WHERE id_client = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':nom', $client->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':rue', $client->getRue(), PDO::PARAM_STR);
        $req->bindValue(':codep', $client->getCodep(), PDO::PARAM_STR);
        $req->bindValue(':vil', $client->getVil(), PDO::PARAM_STR);
        $req->bindValue(':mail', $client->getMail(), PDO::PARAM_STR);
        $req->bindValue(':pass', $client->getPass(), PDO::PARAM_STR);
        $req->bindValue(':statut', $client->getStatut(), PDO::PARAM_STR);
        $req->bindValue(':valid', $client->getValid(), PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//DELETE

    public function delete_clients_by_id(int $id) {
        global $con;
        $sql = "DELETE FROM clients WHERE id_client = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
