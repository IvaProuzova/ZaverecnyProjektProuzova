<?php
class Databaze {
    private $servername; // Název serveru (localhost)
    private $username; // Uživatelské jméno pro přístup k databázi
    private $password; // Heslo pro přístup k databázi
    private $dbname; // Název databáze
    private $conn; // Proměnná pro uchování spojení s databází

    /**
     * Konstruktor třídy pro inicializaci objektu Databaze.
     *
     * @param string $servername Název serveru (např. localhost)
     * @param string $username Uživatelské jméno pro přístup k databázi
     * @param string $password Heslo pro přístup k databázi
     * @param string $dbname Název databáze
     */
    public function __construct($servername = 'localhost', $username = 'root', $password = '', $dbname = 'db_pojistenci') {
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;

    // Připojení k databázi při vytvoření instance
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

    if (!$this->conn) {
        die("Připojení k databázi selhalo: " . mysqli_connect_error());
    }
    }

    /**
     * Metoda pro vložení nového pojištěnce do databáze.
     *
     * @param string $jmeno Jméno pojištěnce
     * @param string $prijmeni Příjmení pojištěnce
     * @param int $vek Věk pojištěnce
     * @param string $telefon Telefonní číslo pojištěnce
     * @return string Výsledek operace (úspěch nebo chyba)
     */
    public function vlozPojistence($jmeno, $prijmeni, $vek, $telefon) {
        // Kontrola, zda jsou všechny údaje vyplněny
        if (empty($jmeno) || empty($prijmeni) || empty($vek) || empty($telefon)) {
            return "Všechny údaje jsou povinné.";
        }

        // Kontrola věku
        if ($vek < 0 || $vek > 100) {
            return "Věk musí být v rozmezí 0 až 100.";
        }

        // Vložení dat do databáze
        $sql = "INSERT INTO pojistenci (jmeno, prijmeni, vek, telefon) VALUES ('$jmeno', '$prijmeni', '$vek', '$telefon')";

        if (mysqli_query($this->conn, $sql)) {
            return "Data byla úspěšně uložena.";
        } else {
            return "Chyba při ukládání dat: " . mysqli_error($this->conn);
        }
    }
        public function ziskejVsechnyPojistence() {
        $sql = "SELECT * FROM db_pojistenci.pojistenci";
        $result = mysqli_query($this->conn, $sql);
        $pojistenci = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pojistenci[] = $row;
            }
        }

        return $pojistenci;
    }
    /**
     * Metoda pro uzavření spojení s databází.
     */
    public function uzavriSpojeni() {
        // Uzavření spojení s databází
        mysqli_close($this->conn);
    }
}
?>
