<?php

class Photos {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $nom;
    private string $lib;
    private int $idbien;

    /* Constructor */

    public function __construct($lenom, $lelib, $lidbien) {
        $this->nom = $lenom;
        $this->lib = $lelib;
        $this->idbien = $lidbien;
    }

    public function setNom($lenom) {
        $this->nom = $lenom;
    }

    public function setLib($lelib) {
        $this->lib = $lelib;
    }

    public function setIdbien($lidbien) {
        $this->idbien = $lidbien;
    }

    /* Getter */

    public function getNom() {
        return $this->nom;
    }

    public function getLib() {
        return $this->lib;
    }

    public function getIdbien() {
        return $this->idbien;
    }

    public function create_photos(Photos $photo) {
        global $con;
        $sql = "INSERT INTO photos (nom_photo, lib_photo, id_bien)
            VALUES (:nom, :lib, :id_bien);";
        $req = $con->prepare($sql);
        $req->bindValue(':nom', $photo->getNom(), PDO::PARAM_STR);
        $req->bindValue(':lib', $photo->getLib(), PDO::PARAM_STR);  // Correction ici
        $req->bindValue(':id_bien', $photo->getIdbien(), PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

// READ

    public static function get_all_photos() {
        global $con;

        $req = "SELECT * FROM photos";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

// READ 1

    public static function get_one_photos(int $id) {
        global $con;
        $sql = "SELECT * FROM photos WHERE id_photo = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return $req->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function get_by_photos(int $id) {
        global $con;
        $sql = "SELECT * FROM photos WHERE id_bien = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return $req->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

// UPDATE

    public function update_photos(Photos $photo, int $id) {
        global $con;
        $sql = "UPDATE photos SET  nom_photo = :nom,
                                lib_photo = :lib,
                                id_bien = :id_bien
            WHERE id_photo = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':nom', $photo->getNom(), PDO::PARAM_STR);
        $req->bindValue(':lib', $photo->getLib(), PDO::PARAM_STR);
        $req->bindValue(':id_bien', $photo->getIdbien(), PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

// DELETE

    public function delete_photos_by_id(int $id) {
        global $con;
        $sql = "DELETE FROM photos WHERE id_photo = :id ;";
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
