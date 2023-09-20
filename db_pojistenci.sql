-- Tento skript vytváří databázi `db_pojistenci` a tabulku `pojistenci` pro projekt evidenci pojistných událostí.

-- Nastavení režimu SQL
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Úvodní nastavení
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Vytvoření databáze `db_pojistenci`, pokud neexistuje
CREATE DATABASE IF NOT EXISTS `db_pojistenci` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `db_pojistenci`;

-- Struktura tabulky `pojistenci`
CREATE TABLE `pojistenci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `vek` int(3) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Konec transakce
COMMIT;
