<?php

class Biens {

    const errmessage = "Une erreur s'est produite \n";

    /* Propriété */

    private string $nom;
    private string $rue;
    private string $codep;
    private string $vil;
    private string $superficie;
    private string $nbpiece;
    private string $nbchambre;
    private string $nbcouchage;
    private string $descriptif;
    private string $ref;
    private string $statut;
    private string $suppr;
    private int $idtype;

    /* Constructor */

    public function __construct($lenom, $larue, $lecodep, $lavil, $lasuperficie, $lenbpiece, $lenbchambre, $lenbcouchage, $ledescriptif, $laref, $lestatut, $lasuppr, $lidtype) {
        $this->nom = $lenom;
        $this->rue = $larue;
        $this->codep = $lecodep;
        $this->vil = $lavil;
        $this->superficie = $lasuperficie;
        $this->nbpiece = $lenbpiece;
        $this->nbchambre = $lenbchambre;
        $this->nbcouchage = $lenbcouchage;
        $this->descriptif = $ledescriptif;
        $this->ref = $laref;
        $this->statut = $lestatut;
        $this->suppr = $lasuppr;
        $this->idtype = $lidtype;
    }

    public function setNom($lenom) {
        $this->nom = $lenom;
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

    public function setSuperficie($lasuperficie) {
        $this->superficie = $lasuperficie;
    }

    public function setNbpiece($lenbpiece) {
        $this->nbpiece = $lenbpiece;
    }

    public function setNbchambre($lenbchambre) {
        $this->nbchambre = $lenbchambre;
    }

    public function setNbcouchage($lenbcouchage) {
        $this->nbcouchage = $lenbcouchage;
    }

    public function setDescriptif($ledescriptif) {
        $this->descriptif = $ledescriptif;
    }

    public function setRef($laref) {
        $this->ref = $laref;
    }

    public function setStatut($lestatut) {
        $this->statut = $lestatut;
    }

    public function setSuppr($lasuppr) {
        $this->suppr = $lasuppr;
    }

    public function setIdtype($lidtype) {
        $this->idtype = $lidtype;
    }

    /* Getter */

    public function getNom() {
        return $this->nom;
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

    public function getSuperficie() {
        return $this->superficie;
    }

    public function getNbpiece() {
        return $this->nbpiece;
    }

    public function getNbchambre() {
        return $this->nbchambre;
    }

    public function getNbcouchage() {
        return $this->nbcouchage;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function getRef() {
        return $this->ref;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getSuppr() {
        return $this->suppr;
    }

    public function getIdtype() {
        return $this->idtype;
    }

    public function create_biens(Biens $Biens) {
        global $con;

        $sql = "INSERT INTO biens (nom_bien, rue_bien, codep_bien, vil_bien, superficie_bien, nb_piece, nb_chambre, nb_couchage, descriptif, ref_bien, statut_bien, suppr, id_type_bien) 
        VALUES (:nom, :rue, :codep, :vil, :superficie, :nbpiece, :nbchambre, :nbcouchage, :descriptif, :ref, :statut, :suppr, :idtypebien);";

        $req = $con->prepare($sql);
        $req->bindValue(':nom', $Biens->getNom(), PDO::PARAM_STR);
        $req->bindValue(':rue', $Biens->getRue(), PDO::PARAM_STR);
        $req->bindValue(':codep', $Biens->getCodep(), PDO::PARAM_STR);
        $req->bindValue(':vil', $Biens->getVil(), PDO::PARAM_STR);
        $req->bindValue(':superficie', $Biens->getSuperficie(), PDO::PARAM_STR);
        $req->bindValue(':nbpiece', $Biens->getNbpiece(), PDO::PARAM_STR);
        $req->bindValue(':nbchambre', $Biens->getNbchambre(), PDO::PARAM_STR);
        $req->bindValue(':nbcouchage', $Biens->getNbcouchage(), PDO::PARAM_STR);
        $req->bindValue(':descriptif', $Biens->getDescriptif(), PDO::PARAM_STR);
        $req->bindValue(':ref', $Biens->getRef(), PDO::PARAM_STR);
        $req->bindValue(':statut', $Biens->getStatut(), PDO::PARAM_STR);
        $req->bindValue(':suppr', $Biens->getSuppr(), PDO::PARAM_STR);
        $req->bindValue(':idtypebien', $Biens->getIdtype(), PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function get_one_bien(Biens $Biens) {
        global $con;
        $sql = "SELECT id_bien FROM biens 
    WHERE nom_bien = :nom 
    AND rue_bien = :rue 
    AND codep_bien = :codep 
    AND vil_bien = :vil 
    AND superficie_bien = :superficie 
    AND nb_piece = :nbpiece 
    AND nb_chambre = :nbchambre 
    AND nb_couchage = :nbcouchage 
    AND descriptif = :descriptif 
    AND ref_bien = :ref 
    AND statut_bien = :statut 
    AND id_type_bien = :idtypebien;";

        $req = $con->prepare($sql);
        $req->bindValue(':nom', $Biens->getNom(), PDO::PARAM_STR);
        $req->bindValue(':rue', $Biens->getRue(), PDO::PARAM_STR);
        $req->bindValue(':codep', $Biens->getCodep(), PDO::PARAM_STR);
        $req->bindValue(':vil', $Biens->getVil(), PDO::PARAM_STR);
        $req->bindValue(':superficie', $Biens->getSuperficie(), PDO::PARAM_STR);
        $req->bindValue(':nbpiece', $Biens->getNbpiece(), PDO::PARAM_STR);
        $req->bindValue(':nbchambre', $Biens->getNbchambre(), PDO::PARAM_STR);
        $req->bindValue(':nbcouchage', $Biens->getNbcouchage(), PDO::PARAM_STR);
        $req->bindValue(':descriptif', $Biens->getDescriptif(), PDO::PARAM_STR);
        $req->bindValue(':ref', $Biens->getRef(), PDO::PARAM_STR);
        $req->bindValue(':statut', $Biens->getStatut(), PDO::PARAM_STR);
        $req->bindValue(':idtypebien', $Biens->getIdtype(), PDO::PARAM_INT);
        try {
            $req->execute();
            // Retourne l'ID du bien trouvé
            return $req->fetchColumn();
        } catch (PDOException $e) {
            // Loguez l'erreur ou prenez d'autres mesures nécessaires
            // Vous pouvez également lancer une nouvelle exception
            error_log($e->getMessage());
            throw new Exception("Erreur lors de la récupération de l'ID du bien.");
        }
    }

    public static function get_all_biens() {
        global $con;

        $req = "SELECT * FROM biens WHERE suppr = 0";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function get_one_biens(int $id) {
        global $con;
        $sql = "SELECT * FROM biens WHERE id_bien = :id ;";
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

    public function update_biens(biens $Biens, int $id) {
        global $con;
        $sql = "UPDATE biens SET nom_bien = :nom, rue_bien = :rue, codep_bien = :codep, vil_bien = :vil, superficie_bien = :superficie, nb_piece = :nbpiece, nb_chambre = :nbchambre, nb_couchage = :nbcouchage, descriptif = :descriptif, ref_bien = :ref, statut_bien = :statut, suppr = :suppr, id_type_bien = :idtypebien WHERE id_bien = :id;";

        $req = $con->prepare($sql);
        $req->bindValue(':nom', $Biens->getNom(), PDO::PARAM_STR);
        $req->bindValue(':rue', $Biens->getRue(), PDO::PARAM_STR);
        $req->bindValue(':codep', $Biens->getCodep(), PDO::PARAM_STR);
        $req->bindValue(':vil', $Biens->getVil(), PDO::PARAM_STR);
        $req->bindValue(':superficie', $Biens->getSuperficie(), PDO::PARAM_STR);
        $req->bindValue(':nbpiece', $Biens->getNbpiece(), PDO::PARAM_STR);
        $req->bindValue(':nbchambre', $Biens->getNbchambre(), PDO::PARAM_STR);
        $req->bindValue(':nbcouchage', $Biens->getNbcouchage(), PDO::PARAM_STR);
        $req->bindValue(':descriptif', $Biens->getDescriptif(), PDO::PARAM_STR);
        $req->bindValue(':ref', $Biens->getRef(), PDO::PARAM_STR);
        $req->bindValue(':statut', $Biens->getStatut(), PDO::PARAM_STR);
        $req->bindValue(':suppr', $Biens->getSuppr(), PDO::PARAM_STR);
        $req->bindValue(':idtypebien', $Biens->getIdtype(), PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

//DELETE

    function delete_biens_by_id(int $id) {
        global $con;
        $sql = "UPDATE biens SET suppr = 1 WHERE id_bien = :id;";
        $req = $con->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $req->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function trier_bien() {
        global $con;

        $req = "SELECT * FROM biens WHERE suppr = 0 ORDER BY id_bien DESC LIMIT 6";
        $sql = $con->prepare($req);
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}