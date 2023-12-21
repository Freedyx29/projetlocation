<?php

class Reservations {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $date;
    private string $datedebut;
    private string $datefin;
    private string $commentaire;
    private string $moderation;
    private string $annulation;
    private int $idclient;
    private int $idbien;

    /* Constructor */

    public function __construct($ladate, $ladatedebut, $ladatefin, $lecommentaire, $lamoderation, $lannulation, $lidclient, $lidbien) {
        $this->date = $ladate;
        $this->datedebut = $ladatedebut;
        $this->datefin = $ladatefin;
        $this->commentaire = $lecommentaire;
        $this->moderation = $lamoderation;
        $this->annulation = $lannulation;
        $this->idclient = $lidclient;
        $this->idbien = $lidbien;
    }

    public function setDate($ladate) {
        $this->date = $ladate;
    }

    public function setDatedebut($ladatedebut) {
        $this->datedebut = $ladatedebut;
    }

    public function setDatefin($ladatefin) {
        $this->datefin = $ladatefin;
    }

    public function setCommentaire($lecommentaire) {
        $this->commentaire = $lecommentaire;
    }

    public function setModeration($lamoderation) {
        $this->moderation = $lamoderation;
    }

    public function setAnnulation($lannulation) {
        $this->annulation = $lannulation;
    }

    public function setIdclient($lidclient) {
        $this->idclient = $lidclient;
    }

    public function setIdbien($lidbien) {
        $this->idbien = $lidbien;
    }

    /* Getter */

    public function getDate() {
        return $this->date;
    }

    public function getDatedebut() {
        return $this->datedebut;
    }

    public function getDatefin() {
        return $this->datefin;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getModeration() {
        return $this->moderation;
    }

    public function getAnnulation() {
        return $this->annulation;
    }

    public function getIdclient() {
        return $this->idclient;
    }

    public function getIdbien() {
        return $this->idbien;
    }

    public function create_reservations(Reservations $reservation) {
        global $con;
        $sql = "INSERT INTO reservation (date_resa, date_debut_resa, date_fin_resa, commentaire, moderation, annulation_resa, id_client, id_bien) 
            VALUES (:date, :datedebut, :datefin, :commentaire, :moderation, :annulation, :idclient, :idbien);";
        $req = $con->prepare($sql);
        $req->bindValue(':date', $reservation->getDate(), PDO::PARAM_STR);
        $req->bindValue(':datedebut', $reservation->getDatedebut(), PDO::PARAM_STR);
        $req->bindValue(':datefin', $reservation->getDatefin(), PDO::PARAM_STR);
        $req->bindValue(':commentaire', $reservation->getCommentaire(), PDO::PARAM_STR);
        $req->bindValue(':moderation', $reservation->getModeration(), PDO::PARAM_STR);
        $req->bindValue(':annulation', $reservation->getAnnulation(), PDO::PARAM_STR);
        $req->bindValue(':idclient', $reservation->getIdclient(), PDO::PARAM_STR);
        $req->bindValue(':idbien', $reservation->getIdbien(), PDO::PARAM_STR);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ

    public static function get_all_reservations() {
        global $con;

        $req = "SELECT * FROM reservation";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ 1

    public static function get_one_reservations(int $id) {
        global $con;
        $sql = "SELECT * FROM reservation WHERE id_reservation = :id ;";
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

    public function update_reservations(Reservations $reservation, int $id) {
        global $con;
        $sql = "UPDATE reservation SET  date_resa = :date,
                                date_debut_resa = :datedebut,
                                date_fin_resa = :datefin,
                                commentaire = :commentaire,
                                moderation = :moderation,
                                annulation_resa = :annulation,
                                id_client = :idclient,
                                id_client = :idbien,
            WHERE id_reservation = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':date', $reservation->getDate(), PDO::PARAM_STR);
        $req->bindValue(':datedebut', $reservation->getDatedebut(), PDO::PARAM_STR);
        $req->bindValue(':datefin', $reservation->getDatefin(), PDO::PARAM_STR);
        $req->bindValue(':commentaire', $reservation->getCommentaire(), PDO::PARAM_STR);
        $req->bindValue(':moderation', $reservation->getModeration(), PDO::PARAM_STR);
        $req->bindValue(':annulation', $reservation->getAnnulation(), PDO::PARAM_STR);
        $req->bindValue(':idclient', $reservation->getIdclient(), PDO::PARAM_STR);
        $req->bindValue(':idbien', $reservation->getIdbien(), PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//DELETE

    public function delete_reservations_by_id(int $id) {
        global $con;
        $sql = "DELETE FROM reservation WHERE id_reservation = :id ;";
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