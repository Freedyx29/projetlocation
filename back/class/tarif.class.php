<?php

class Tarifs {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $datedebut;
    private string $datefin;
    private string $prix;
    private int $idbien;

    /* Constructor */

    public function __construct($ladd, $ladf, $leprix, $lidbien) {
        $this->datedebut = $ladd;
        $this->datefin = $ladf;
        $this->prix = $leprix;
        $this->idbien = $lidbien;
    }

    public function setDatedebut($ladd) {
        $this->datedebut = $ladd;
    }

    public function setDatefin($ladf) {
        $this->datefin = $ladf;
    }

    public function setPrix($leprix) {
        $this->prix = $leprix;
    }

    public function setIdbien($lidbien) {
        $this->idbien = $lidbien;
    }

    /* Getter */

    public function getDatedebut() {
        return $this->datedebut;
    }

    public function getDatefin() {
        return $this->datefin;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getIdbien() {
        return $this->idbien;
    }

    public function create_tarifs(Tarifs $tarif) {
        global $con;
        $sql = "INSERT INTO tarifs (DD_tarif, DF_tarif, prix_loc, id_bien)
            VALUES (:DD, :DF, :prix, :id_bien);";
        $req = $con->prepare($sql);
        $req->bindValue(':DD', $tarif->getDatedebut(), PDO::PARAM_STR);
        $req->bindValue(':DF', $tarif->getDatefin(), PDO::PARAM_STR);
        $req->bindValue(':prix', $tarif->getPrix(), PDO::PARAM_STR);
        $req->bindValue(':id_bien', $tarif->getIdbien(), PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ

    public static function get_all_tarifs() {
        global $con;

        $req = "SELECT * FROM tarifs";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ 1

    public static function get_one_tarifs(int $id) {
        global $con;
        $sql = "SELECT * FROM tarifs WHERE id_tarif = :id ;";
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

    public function update_tarifs(Tarifs $tarif, int $id) {
        global $con;
        $sql = "UPDATE tarifs SET  DD_tarif = :DD,
                                DF_tarif = :DF,
                                prix_loc = :prix
                                id_bien = :id_bien,
            WHERE id_tarif = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':DD', $tarif->getDatedebut(), PDO::PARAM_STR);
        $req->bindValue(':DF', $tarif->getDatefin(), PDO::PARAM_STR);
        $req->bindValue(':prix', $tarif->getPrix(), PDO::PARAM_STR);
        $req->bindValue(':id_bien', $tarif->getIdbien(), PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//DELETE

    public function delete_tarifs_by_id(int $id) {
        global $con;
        $sql = "DELETE FROM tarifs WHERE id_tarif = :id ;";
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
