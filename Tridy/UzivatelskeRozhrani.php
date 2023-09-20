<?php
require_once('Databaze.php');

class UzivatelskeRozhrani {
    private $databaze;

    /**
     * Konstruktor třídy pro inicializaci objektu UzivatelskeRozhrani.
     *
     * @param Databaze $databaze Instance třídy Databaze pro přístup k databázi.
     */
    public function __construct(Databaze $databaze) {
        $this->databaze = $databaze;
    }

    /**
     * Zobrazí seznam pojištěnců v tabulce.
     */
    public function zobrazPojistence() {
        // Získá seznam všech pojištěnců z databáze
        $pojistenci = $this->databaze->ziskejVsechnyPojistance();

        // Výpis tabulky s pojištěnci
        echo '<h2 class="table-title">Pojištěnci</h2>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Jméno</th>';
        echo '<th>Příjmení</th>';
        echo '<th>Věk</th>';
        echo '<th>Telefon</th>';
        echo '</tr>';

        foreach ($pojistenci as $pojistenec) {
            echo '<tr>';
            echo '<td>' . $pojistenec['jmeno'] . '</td>';
            echo '<td>' . $pojistenec['prijmeni'] . '</td>';
            echo '<td>' . $pojistenec['vek'] . '</td>';
            echo '<td>' . $pojistenec['telefon'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    /**
     * Přidá nového pojištěnce do databáze.
     *
     * @param string $jmeno Jméno pojištěnce.
     * @param string $prijmeni Příjmení pojištěnce.
     * @param int $vek Věk pojištěnce.
     * @param string $telefon Telefonní číslo pojištěnce.
     * @return string Výsledek operace (úspěch nebo chyba).
     */
    public function pridejPojistence($jmeno, $prijmeni, $vek, $telefon) {
        // Zavolá metodu pro vložení nového pojištěnce do databáze
        $vysledek = $this->databaze->vlozPojisteneho($jmeno, $prijmeni, $vek, $telefon);

        return $vysledek;
    }
}
?>





