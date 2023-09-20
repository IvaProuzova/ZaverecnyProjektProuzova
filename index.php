<?php
// Načtení tříd
require_once('Tridy/Pojisteni.php');
require_once('Tridy/UzivatelskeRozhrani.php');
require_once('Tridy/Databaze.php');

// PHP kód pro vložení nového pojištěnce do databáze
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $vek = $_POST["vek"];
    $telefon = $_POST["telefon"];
    
    // Vytvoření instance třídy Databaze
    $databaze = new Databaze(); // Vytvoření instance třídy Databaze s výchozími hodnotami

    // Přidání nového pojištěnce do databáze
    $vysledek = $databaze->vlozPojistence($jmeno, $prijmeni, $vek, $telefon);

    // Zobrazení výsledku
    echo $vysledek;

    // Uzavření spojení s databází
    $databaze->uzavriSpojeni();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Evidence pojistných událostí</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <!-- Horní lišta -->
        <h1>PojištěníApp</h1>
        <a href="#">Pojištění</a>
        <a href="#">O Aplikaci</a>
    </div>

    <div class="table-container">
        <!-- Tabulka s Pojištěnci -->
        <h2 class="table-title">Pojištěnci</h2>
        <table>
            <tr>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Věk</th>
                <th>Telefon</th>
            </tr>
     <?php
            // Získání dat o pojištěncích z databáze (pomocí třídy Databaze)
            $databaze = new Databaze(); // Vytvoření instance třídy Databaze
            $pojistenci = $databaze->ziskejVsechnyPojistence();

            // Iterace přes data a generování řádků tabulky
            foreach ($pojistenci as $pojistenec) {
                echo '<tr>';
                echo '<td>' . $pojistenec['jmeno'] . '</td>';
                echo '<td>' . $pojistenec['prijmeni'] . '</td>';
                echo '<td>' . $pojistenec['vek'] . '</td>';
                echo '<td>' . $pojistenec['telefon'] . '</td>';
                echo '</tr>';
            }
            // Pokud není žádný pojištěnec v databázi, se přidá několik prázdných řádků
            if (empty($pojistenci)) {
            for ($i = 0; $i < 3; $i++) {
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
            }
        }
            ?>
        </table>
    </div>
    
    
    <div class="new-insured">
    <!-- Formulář pro nového pojištěnce -->
    <h2 class="form-title">Nový pojištěnec</h2>
    <form method="post" action="index.php">
    <img src="Obrazky/avatar.png" alt="Průkazová fotografie" class="pojisteni-image">
        <ul class="form-list">
            <!-- Položka pro jméno -->
            <li class="form-item">
                <label for="jmeno">Jméno:</label>
                <input type="text" id="jmeno" name="jmeno" class="form-input" maxlength="30">
            </li>
            <!-- Položka pro příjmení -->
            <li class="form-item">
                <label for="prijmeni">Příjmení:</label>
                <input type="text" id="prijmeni" name="prijmeni" class="form-input" maxlength="30">
            </li>
            <!-- Položka pro věk -->
            <li class="form-item">
                <label for="vek">Věk:</label>
                <input type="number" id="vek" name="vek" class="form-input" maxlength="30">
            </li>
            <!-- Položka pro telefon -->
            <li class="form-item">
                <label for="telefon">Telefon:</label>
                <input type="text" id="telefon" name="telefon" class="form-input" maxlength="30">
            </li>
        </ul>
        <div class="form-group">
            <input type="submit" name="submit" value="Uložit" class="save-button">
        </div>
    </form>
</div>

</body>
</html>
    