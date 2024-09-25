-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 09, 2024 at 07:54 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawapodstolem`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Id_Klient` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `telefon` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `miasto` varchar(100) NOT NULL,
  `ulica` varchar(100) DEFAULT NULL,
  `kod_pocztowy` varchar(100) NOT NULL,
  `numer_d` int(11) NOT NULL,
  `numer_m` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`Id_Klient`, `imie`, `nazwisko`, `telefon`, `email`, `miasto`, `ulica`, `kod_pocztowy`, `numer_d`, `numer_m`) VALUES
(54, 'Sławomir', 'Borewicz', 2147483647, 'borewicz2137@gmail.com', 'Pruszków', 'Jana Pawła II', '05-800', 5, 69),
(55, 'Anastazy', 'Bambaryła', 2147483647, 'brzuchaty69@tworki.pl', 'Pruszków', 'Tworkowska', '05-800', 69, 0),
(56, 'Krzysztof', 'Kononowicz', 2147483647, 'konon@bialystok.pl', 'Białystok', 'Szkolna', '09-666', 17, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `img` varchar(100) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koszyk`
--

INSERT INTO `koszyk` (`id`, `id_produktu`, `nazwa`, `cena`, `img`, `ilosc`) VALUES
(97, 2, 'AMERICANO', 15, 'p2.png', 1),
(98, 1, 'ESPRESSO', 15, 'p1.png', 1),
(99, 3, 'LATTE MACCHIATO', 10, 'p3.png', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(100) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `img`) VALUES
(1, 'Espresso', 15.00, 'p1.png'),
(2, 'Americano', 15.00, 'p2.png'),
(3, 'LATTE MACCHIATO', 10.00, 'p3.png'),
(4, 'Cappuccino', 20.00, 'p4.png'),
(5, 'Flat White', 13.00, 'p5.png'),
(6, 'Moccachino', 16.00, 'p6.png'),
(7, 'Kanapka Poranna', 20.00, 'k1.png'),
(8, 'Kanapka Słodka', 25.00, 'k2.png'),
(9, 'Kanapka Chrupiąca', 15.00, 'k3.png'),
(10, 'Kanapka Jajeczna', 22.00, 'k4.png'),
(11, 'Kanapka Vege', 30.00, 'k5.png'),
(12, 'Kanapka Pomidorowa', 20.00, 'k6.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosc`
--

CREATE TABLE `wiadomosc` (
  `Id` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wiadomosc` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiadomosc`
--

INSERT INTO `wiadomosc` (`Id`, `imie`, `email`, `wiadomosc`, `data`) VALUES
(1, 'Test0', 'test0', 'test0', '2015-12-20 10:01:00'),
(2, 'Test2', 'test2@onet.pl', 'Pierwszy test dodawania do bazy danych', '2024-06-01 22:05:37'),
(3, 'Test3', 'test3@onet.pl', 'Drugi test dodawania do bazy danych', '2024-06-01 22:21:06'),
(4, 'sss', 'ss@wp.pl', 'Z zakladki Kontakt', '2024-06-05 02:07:20'),
(5, 'Aleksandra Noga', 'quera222@gmail.com', 'z zakladki o nas', '2024-06-07 00:02:58'),
(6, 'Aleksandra Noga', 'quera222@gmail.com', 'jeszcze raz z O nas', '2024-06-07 00:03:22'),
(7, 'Igor Świnka', 'testowaty666@kosciol.org', 'Kawa była pyszna, kanapka też, ale rano po tym wszystkim miałem problemy gastryczne. Pozdrawiam!', '2024-06-07 00:48:03'),
(8, 'Adam Małysz', 'trutututu@test.ru', 'Fajna sprawa, muszę kiedyś do Was skoczyć ;-)', '2024-06-07 00:49:24'),
(9, 'Karol Wojtyła', 'kwojtyla2137@vatican.org', 'A gdzie macie kremówki? Jeszcze jak!', '2024-06-07 00:51:58'),
(10, 'Karol Wojtyła', 'kwojtyla2137@vatican.org', 'A gdzie macie kremówki? Jeszcze jak!', '2024-06-07 20:19:16'),
(11, '', '', '', '2024-06-07 20:20:06'),
(12, '', '', '', '2024-06-07 20:20:27'),
(13, '', '', '', '2024-06-07 20:21:18'),
(14, '', '', '', '2024-06-07 20:29:27'),
(15, '', '', '', '2024-06-07 20:30:42'),
(16, '', '', '', '2024-06-07 20:30:43'),
(17, '', '', '', '2024-06-07 20:31:00'),
(18, '', '', '', '2024-06-07 20:32:36'),
(19, '', '', '', '2024-06-07 20:32:39'),
(20, '', '', '', '2024-06-07 20:32:40'),
(21, '', '', '', '2024-06-07 20:35:04'),
(22, '', '', '', '2024-06-07 20:35:06'),
(23, '', '', '', '2024-06-07 20:35:08'),
(24, '', '', '', '2024-06-07 20:37:10'),
(25, '', '', '', '2024-06-07 20:37:30'),
(26, '', '', '', '2024-06-07 20:38:10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zamowienie`
--

INSERT INTO `zamowienie` (`id_zamowienia`, `id_klienta`, `data`) VALUES
(40, 54, '2024-06-07 00:43:49'),
(41, 55, '2024-06-07 00:46:37'),
(42, 56, '2024-06-07 00:50:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie_szczegoly`
--

CREATE TABLE `zamowienie_szczegoly` (
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `cena` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `suma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zamowienie_szczegoly`
--

INSERT INTO `zamowienie_szczegoly` (`id_zamowienia`, `id_produktu`, `nazwa`, `cena`, `ilosc`, `suma`) VALUES
(40, 3, 'LATTE MACCHIATO', 10, 1, 10),
(41, 3, 'LATTE MACCHIATO', 10, 5, 50),
(41, 10, 'KANAPKA JAJECZNA', 22, 15, 330),
(41, 9, 'KANAPKA CHRUPIĄCA', 15, 1, 15),
(41, 8, 'KANAPKA SŁODKA', 25, 20, 500),
(42, 3, 'LATTE MACCHIATO', 10, 1, 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Id_Klient`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koszyk_id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `zamowienia_id_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `zamowienie_szczegoly`
--
ALTER TABLE `zamowienie_szczegoly`
  ADD KEY `zam_szczegoly_id_produktu` (`id_produktu`),
  ADD KEY `zam_szczegoly_id_zamowienia` (`id_zamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_Klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `koszyk_id_produktu` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zamowienia_id_klienta` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`Id_Klient`);

--
-- Constraints for table `zamowienie_szczegoly`
--
ALTER TABLE `zamowienie_szczegoly`
  ADD CONSTRAINT `zam_szczegoly_id_produktu` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`),
  ADD CONSTRAINT `zam_szczegoly_id_zamowienia` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienie` (`id_zamowienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
