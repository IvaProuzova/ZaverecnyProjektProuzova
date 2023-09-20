<?php
class Pojisteni {
    private $id;
    private $jmeno;
    private $prijmeni;
    private $vek;
    private $telefon;

    /**
     * Konstruktor třídy pro inicializaci objektu Pojisteni.
     *
     * @param string $jmeno Jméno pojištěného.
     * @param string $prijmeni Příjmení pojištěného.
     * @param int $vek Věk pojištěného.
     * @param string $telefon Telefonní číslo pojištěného.
     */
    public function __construct($jmeno, $prijmeni, $vek, $telefon) {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
        $this->vek = $vek;
        $this->telefon = $telefon;
    }

    /**
     * Získá ID pojištěného.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Získá jméno pojištěného.
     *
     * @return string
     */
    public function getJmeno() {
        return $this->jmeno;
    }

    /**
     * Nastaví jméno pojištěného.
     *
     * @param string $jmeno Jméno pojištěného.
     */
    public function setJmeno($jmeno) {
        $this->jmeno = $jmeno;
    }

    /**
     * Získá příjmení pojištěného.
     *
     * @return string
     */
    public function getPrijmeni() {
        return $this->prijmeni;
    }

    /**
     * Nastaví příjmení pojištěného.
     *
     * @param string $prijmeni Příjmení pojištěného.
     */
    public function setPrijmeni($prijmeni) {
        $this->prijmeni = $prijmeni;
    }

    /**
     * Získá věk pojištěného.
     *
     * @return int
     */
    public function getVek() {
        return $this->vek;
    }

    /**
     * Nastaví věk pojištěného.
     *
     * @param int $vek Věk pojištěného.
     */
    public function setVek($vek) {
        $this->vek = $vek;
    }

    /**
     * Získá telefonní číslo pojištěného.
     *
     * @return string
     */
    public function getTelefon() {
        return $this->telefon;
    }

    /**
     * Nastaví telefonní číslo pojištěného.
     *
     * @param string $telefon Telefonní číslo pojištěného.
     */
    public function setTelefon($telefon) {
        $this->telefon = $telefon;
    }

    /**
     * Uloží informace o pojištěném do databáze.
     *
     * @param mysqli $conn Připojení k databázi.
     * @return bool True pokud bylo uložení úspěšné, jinak false.
     */
    public function ulozDoDatabaze($conn) {
        $sql = "INSERT INTO pojistenci (jmeno, prijmeni, vek, telefon) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $this->jmeno, $this->prijmeni, $this->vek, $this->telefon);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>

