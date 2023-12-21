<?php

class Typebien {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $libtype;

    /* Constructor */

    public function __construct($lelibtype) {
        $this->libtype = $lelibtype;
    }

    public function setLib($lelibtype) {
        $this->lib = $lelibtype;
    }

    /* Getter */

    public function getLib() {
        return $this->libtype;
    }

    public function create_typebien(Typebien $typebien) {
        global $con;
        $sql = "INSERT INTO typebien ('lib_type_bien')
            VALUES (:lib);";
        $req = $con->prepare($sql);
        $req->bindValue(':lib', $typebien->getLib(), PDO::PARAM_STR);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ

    public static function get_all_typebien() {
        global $con;

        $req = "SELECT * FROM typebien";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//READ 1

    public static function get_one_typebien(int $id) {
        global $con;
        $sql = "SELECT * FROM typebien WHERE id_type_bien = :id ;";
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

    public function update_typebien(Typebien $typebien, int $id) {
        global $con;
        $sql = "UPDATE typebien SET lib_type_bien = :lib
            WHERE id_type_bien = :id ;";
        $req = $con->prepare($sql);
        $req->bindValue(':lib', $typebien->getLib(), PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//DELETE

    public function delete_typebien_by_id(int $id) {
        global $con;
        $sql = "DELETE FROM typebien WHERE id_type_bien = :id ;";
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
