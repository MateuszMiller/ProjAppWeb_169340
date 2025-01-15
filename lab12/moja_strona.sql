-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 15, 2025 at 01:01 PM
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
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `matka` int(11) DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `matka`, `nazwa`) VALUES
(0, NULL, 'Kategorie'),
(1, 0, 'Filmy'),
(2, 1, 'Akcja'),
(3, 1, 'Komedia'),
(4, 1, 'Dramat'),
(5, 2, 'Filmy sensacyjne'),
(6, 2, 'Superbohaterowie'),
(7, 3, 'Romantyczne'),
(8, 3, 'Czarna komedia'),
(9, 0, 'Seriale'),
(10, 9, 'Kryminalne'),
(11, 9, 'Sci-FI'),
(12, 11, 'Dystopijne'),
(13, 11, 'Kosmiczne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `id_sesji` varchar(255) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koszyk`
--

INSERT INTO `koszyk` (`id`, `id_sesji`, `id_produktu`, `ilosc`, `data_dodania`) VALUES
(10, 'qi288sfa66of344fda689saod0', 7, 345, '2025-01-13 22:46:27'),
(11, 'qi288sfa66of344fda689saod0', 10, 6, '2025-01-13 22:48:50'),
(12, 'qi288sfa66of344fda689saod0', 9, 4, '2025-01-13 22:48:51'),
(13, 'qi288sfa66of344fda689saod0', 14, 4, '2025-01-13 22:55:42'),
(14, 'qi288sfa66of344fda689saod0', 11, 1, '2025-01-13 22:59:41'),
(15, 'k2039fg6ldrtsmqqhc07a793ah', 4, 1, '2025-01-13 23:03:23'),
(16, '45idb30l6d6of3qthhfgi34v83', 4, 1, '2025-01-14 17:25:49'),
(17, 'chnv40oprnpnvjm5qlmqupf96j', 4, 1, '2025-01-14 23:17:18'),
(18, 'chnv40oprnpnvjm5qlmqupf96j', 6, 2, '2025-01-14 23:17:19'),
(19, 'chnv40oprnpnvjm5qlmqupf96j', 7, 1, '2025-01-14 23:17:20'),
(20, 'chnv40oprnpnvjm5qlmqupf96j', 8, 1, '2025-01-14 23:17:20'),
(21, '1gjoon12gjoor33v7h79r1vmrf', 4, 1, '2025-01-15 11:41:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<tr>\r\n    <td colspan=\"2\" class=\"content\">\r\n        <div class=\"film\">\r\n            <img src=\"img/diuna.jpg\" alt=\"Diuna\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2 id=\"Diuna\">Diuna</h2>\r\n                <p>Akcja toczy się w kosmosie w dalekiej przyszłości, w której, zamiast na doskonalenie urządzeń, postawiono na rozwój umysłu (Uniwersum Diuny). Najważniejszą planetą we wszechświecie stała się Arrakis, na której znajdują się złoża przyprawy, zwanej melanżem. Spowalnia ona starzenie i umożliwia jasnowidzenie, potrzebne do uniknięcia niebezpieczeństw podróży międzygwiezdnych. Powstawanie melanżu związane jest z cyklem rozwojowym czerwi pustyni – olbrzymich istot, żyjących w piaskach pustyń Arrakis. Planeta jest uważana za prawie bezludną, lecz żyją tam liczne plemiona Fremenów, tubylców przywykłych do ekstremalnych warunków. Diuna zostaje przekazana w lenno rodowi Atrydów. Na planetę przybywają książę Leto I Atryda, jego konkubina lady Jessika, syn Paul oraz ich armia. Cesarski dekret okazuje się jednak pułapką. Wkrótce po osiedleniu następuje konfrontacja z rodem Harkonnenów, którzy przez poprzednie 80 lat bezlitośnie eksploatowali planetę. Książę ginie, zaś Jessika i Paul zostają wysłani na pewną śmierć w głąb pustyni. Udaje im się przeżyć, wpadają jednak w ręce Fremenów. Paul w kontakcie z melanżem doznaje wizji przyszłości.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Avatar: Istota Wody\" class=\"film\">\r\n            <img src=\"img/avatar%20istota%20wody.jpg\" alt=\"Avater\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Avatar: Istota Wody</h2>\r\n                <p>Avatar: Istota wody (oryg. Avatar: The Way of Water) – amerykański film przygodowy science-fiction, produkcji 20th Century Studios. Jego reżyserem jest James Cameron, który napisał scenariusz wraz z Joshem Friedmanem, Amandą Silver, Rickiem Jaffą oraz Shane’em Salerno. Sequel filmu Avatar z 2009 roku, najbardziej dochodowego filmu wszech czasów. W rolach głównych wystąpili Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang, Cliff Curtis, Joel David Moore, CCH Pounder, Edie Falco, Jemaine Clement, Giovanni Ribisi i Kate Winslet. Światowa premiera filmu miała miejsce 6 grudnia 2022, a w kinach w Polsce i USA pojawił się dziesięć dni później. Otrzymał pozytywne recenzje od krytyków. Jego kontynuacja, Avatar 3 ma zostać wydany 20 grudnia 2024. Film zarobił na całym świecie 2,32 miliarda dolarów, stając się najbardziej dochodowym filmem 2022 roku i trzecim co do wielkości najbardziej dochodowym filmem wszech czasów. Produkcja otrzymała cztery nominacje do Nagrody Akademii Filmowej, zwyciężając w kategorii „najlepsze efekty specjalne.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Joker\" class=\"film\">\r\n            <img src=\"img/joker.jpg\" alt=\"Joker\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Joker</h2>\r\n                <p>Amerykański dramat psychologiczny na podstawie serii komiksów o postaci o tym samym imieniu wydawnictwa DC Comics, w reżyserii Todda Phillipsa, który napisał scenariusz wspólnie ze Scottem Silverem. Tytułową rolę zagrał Joaquin Phoenix, a obok niego w rolach głównych wystąpili: Robert De Niro, Zazie Beetz i Frances Conroy. W 1981 roku główny bohater, Arthur Fleck jest nieudolnym komikiem, który zaczyna siać zbrodnię i chaos w Gotham City, stając się przerażającą legendą znaną jako Joker. Film został oficjalnie zapowiedziany w lipcu 2018, zdjęcia do niego trwały od września do grudnia tego samego roku. Światowa premiera Jokera odbyła się 31 sierpnia 2019 podczas 76. Międzynarodowego Festiwalu Filmowego w Wenecji. W Polsce zadebiutował 4 października 2019. Kontynuacja filmu, Joker: Folie à deux ma zaplanowaną premierę na 4 października 2024 roku.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Greenbook\" class=\"film\">\r\n            <img src=\"img/greenbook.jpg\" alt=\"greenbook\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Green book</h2>\r\n                <p>amerykański komediodramat z 2018, opowiadający opartą na faktach historię pianisty Dona Shirleya oraz jego kierowcy i ochroniarza – Tony’ego Vallelongi. Wyróżniony Oscarami dla najlepszego filmu, za scenariusz oryginalny i dla najlepszego aktora drugoplanowego (Mahershala Ali) za rok 2018. Tytuł filmu pochodzi od The Negro Motorist Green Book – poradnika dla Afroamerykanów podróżujących po południowych stanach USA autorstwa Victora Hugo Greena.</p>\r\n\r\n                <p>Film wyreżyserował Peter Farrelly według scenariusza autorstwa jego, Briana Heyes Currie oraz syna jednego z bohaterów – Nicka Vallelongi na podstawie wywiadów udzielanych przez jego ojca i Dona Shirleya oraz listów pisanych przez Tony’ego do swojej żony[5]. Światowa premiera odbyła się 11 września 2018 na Międzynarodowym Festiwalu Filmowym w Toronto, podczas którego film otrzymał People Choice’s Award[6]. 17 października Green Book otworzyło 29 Festiwal Filmowy w Nowym Orleanie, a 9 listopada zostało zaprezentowane na AFI Fest[7]. 16 listopada film zaczęto pokazywać w dwudziestu miastach USA, a 21 listopada wszedł do normalnej dystrybucji</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Marsjanin\" class=\"film\">\r\n            <img src=\"img/Marsjanin.jpg\" alt=\"Marsjanin\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Marsjanin</h2>\r\n                <p>amerykański film z gatunku fantastyki naukowej z 2015 roku w reżyserii Ridleya Scotta. Film powstał na podstawie powieści Andy’ego Weira Marsjanin. Jego premiera miała miejsce 11 września 2015 roku[1]. Wyświetlany w kinach od 30 września (Wielka Brytania), a w USA i Polsce 2 października tego samego roku. </p>\r\n            </div>\r\n        </div>\r\n        <div id=\"ŻyciePi\" class=\"film\">\r\n            <img src=\"img/ŻyciePi.jpg\" alt=\"Życie Pi\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Życie Pi</h2>\r\n                <p> tajwańsko-amerykańsko-brytyjski dramat przygodowy z elementami fantastyki z 2012 roku w reżyserii Anga Lee. Film jest ekranizacją powieści Yanna Martela pod tym samym tytułem. Zdjęcia kręcono na Tajwanie (m.in. w Tajpej), w Indiach (stan Kerala i Puducherry) oraz w Kanadzie (Montreal).</p>\r\n\r\n                <p>Piscine Molitor Patel (tytułowy Pi) jest synem dyrektora ogrodu zoologicznego. Chłopiec o bardzo bogatym życiu duchowym szuka odpowiedzi na swoje pytania w hinduizmie, chrześcijaństwie i islamie, odnajdując w każdej z tych religii tę samą prawdę o Bogu. Jego ojciec postanawia przenieść swoje zoo z Indii do Kanady. W czasie rejsu transportującego zwierzęta i tytułowego bohatera dochodzi do sztormu. Statek ulega katastrofie, w wyniku której Pi wraz z nielicznymi ocalałymi zwierzętami – hieną, zebrą, orangutanem i tygrysem bengalskim – znajdują się w jednej szalupie ratunkowej na otwartym oceanie, by przez kolejne 227 dni walczyć o przetrwanie[1]. Film w swojej metaforycznej warstwie przybiera kształt religijnej przypowieści. </p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Django\" class=\"film\">\r\n            <img src=\"img/Django.jpg\" alt=\"Django\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Django</h2>\r\n                <p>amerykański western filmowy z 2012 roku w reżyserii Quentina Tarantino. Tytuł filmu nawiązuje do dzieła Sergia Corbucciego z 1966 roku pod tym samym tytułem. Bohaterem Django jest tytułowy czarnoskóry niewolnik (Jamie Foxx), który po wyzwoleniu przez niemieckiego łowcę głów (Christoph Waltz) przemierza z nim południe Stanów Zjednoczonych w poszukiwaniu wyjętych spod prawa, a później – w celu odnalezienia żony Django. Trop wiedzie do właściciela plantacji niewolniczej (Leonardo DiCaprio).</p>\r\n\r\n                <p>Django jest w dużej mierze inspirowany spaghetti westernami oraz nurtem „blaxploitation”. W filmie zaznaczone są charakterystyczne cechy dzieł reżysera: skłonność do przerysowanej przemocy oraz rozbudowane dialogi. Dzieło Tarantino uzyskało przychylne recenzje krytyków, zdobywając dwa Oscary oraz dwa Złote Globy, w obu przypadkach za scenariusz oraz rolę drugoplanową Waltza. </p>\r\n            </div>\r\n        </div>\r\n        <div id=\"NoCountryforOldMen\" class=\"film\">\r\n            <img src=\"img/NoCountryforOldMen.jpg\" alt=\"No Country for Old Men\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>No Country for Old Men</h2>\r\n                <p>Film opowiada historię myśliwego Llewelyna Mossa (Josh Brolin), który polując niedaleko meksykańskiej granicy znajduje grupę rozbitych samochodów, a wśród nich martwe ciała, dwa miliony dolarów oraz bagażnik pełen heroiny. Przywłaszczenie znaleziska jest początkiem jego problemów, musi uciekać przed zawodowym zabójcą Antonem Chigurhem (Javier Bardem) oraz meksykańską mafią. Jego tropem podąża również doświadczony szeryf Bell (Tommy Lee Jones) (myślący o przejściu na emeryturę).</p>\r\n\r\n                <p>Chigurh jest uosobieniem zła, zabija wszystkich, którzy staną na jego drodze, również przypadkowych ludzi. Szeryf Bell jest zaś symbolem „starego świata”, który odchodzi w zapomnienie. Obraz rozpoczyna się monologiem Bella o „starych czasach”, kończy się zaś jego rozmową z żoną o dwóch snach oraz refleksją nad życiowymi wyborami.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Władca Pierścieni: Powrót króla\" class=\"film\">\r\n            <img src=\"img/Władca Pierścieni Powrót króla.jpg\" alt=\"Władca Pierścieni: Powrót króla\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Władca Pierścieni: Powrót króla</h2>\r\n                <p>Trzeci i ostatni film z trylogii Władca Pierścieni, powstały w koprodukcji kinematografii amerykańskiej i nowozelandzkiej – w reżyserii Petera Jacksona. Światowa premiera filmu odbyła się 17 grudnia 2003 r.</p>\r\n                <p>Film jest adaptacją trzeciej części powieści J.R.R. Tolkiena Władca Pierścieni zatytułowanej Powrót króla. Kręcono go w plenerach Nowej Zelandii równocześnie z dwiema pozostałymi częściami trylogii. Poprzednią częścią trylogii był film Dwie wieże. </p>\r\n                <p>W 2004 roku film zdobył 11 Oscarów (we wszystkich kategoriach, w których go nominowano). Film otrzymał również 2 MTV Movie Awards w kategoriach Najlepszy Film i Najlepsza Scena Akcji (bitwa na polach Pelennoru). W serwisie Rotten Tomatoes 93% recenzji filmu uznano za pozytywne</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Władca Pierścieni: Dwie wieże\" class=\"film\">\r\n            <img src=\"img/Władca Pierścieni Dwie wieże.jpg\" alt=\"Władca Pierścieni: Dwie wieże\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Władca Pierścieni: Dwie wieże</h2>\r\n                <p>Władca Pierścieni: Dwie wieże (ang. The Lord of the Rings: The Two Towers) – drugi film z trylogii Władca Pierścieni w reżyserii Petera Jacksona. Światowa premiera miała miejsce 5 grudnia 2002 r.</p>\r\n                <p>Film jest adaptacją drugiej części powieści J.R.R. Tolkiena Władca Pierścieni zatytułowanej Dwie wieże. Kręcono go w plenerach Nowej Zelandii równocześnie z dwiema pozostałymi częściami trylogii. Jest on kontynuacją filmu Władca Pierścieni: Drużyna Pierścienia, a kolejną częścią trylogii jest Powrót króla.</p>\r\n                <p>Serwis Rotten Tomatoes przyznał mu wynik 95%.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Władca Pierścieni: Drużyna Pierścienia\" class=\"film\">\r\n            <img src=\"img/Władca Pierścieni Drużyna Pierścienia.jpg\" alt=\"Władca Pierścieni: Drużyna Pierścienia\" class=\"film-image\"> \r\n            <div class=\"film-description\">\r\n                <h2>Władca Pierścieni: Drużyna Pierścienia</h2>\r\n                <p>Pierwszy film z trylogii Władca Pierścieni w reżyserii Petera Jacksona. Światowa premiera filmu odbyła się 10 grudnia 2001 r. </p>\r\n                <p>Film jest adaptacją pierwszej części powieści J.R.R. Tolkiena Władca Pierścieni zatytułowanej Drużyna Pierścienia. Kręcono go w plenerach Nowej Zelandii równocześnie z dwiema pozostałymi częściami trylogii. Kontynuacją jest film Władca Pierścieni: Dwie wieże. </p>\r\n                <p>Film został wyprodukowany w studiu New Line Cinema przez Winugut Film na zlecenie New Line Cinema. Dystrybutor filmu to Warner Bros. na zlecenie New Line Cinema. </p>\r\n                <p>Serwis Rotten Tomatoes przyznał mu wynik 91%.</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Pianista\" class=\"film\">\r\n            <img src=\"img/Pianista.jpg\" alt=\"Pianista\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Pianista</h2>\r\n                <p> dramat wojenny z 2002 roku w reżyserii Romana Polańskiego, koprodukcja francusko-niemiecko-polsko-brytyjska. Film jest adaptacją autobiografii pianisty i kompozytora żydowskiego pochodzenia Władysława Szpilmana. W czasie II wojny światowej od 1940 przebywał on w getcie warszawskim. Po wielkiej akcji deportacyjnej latem 1942 roku wydostał się z getta i dzięki pomocy polskich przyjaciół zaczął ukrywać się w Warszawie po „aryjskiej” stronie. Po upadku powstania warszawskiego przetrwał dzięki kapitanowi Wehrmachtu – Wilmowi Hosenfeldowi. </p>\r\n                <p>Pianista został zaadaptowany przez scenarzystę Ronalda Harwooda i nakręcony z udziałem międzynarodowej obsady aktorskiej. Tytułową rolę Szpilmana odegrał Adrien Brody, natomiast w rolę Hosenfelda wcielił się Thomas Kretschmann. Film Polańskiego po prapremierze w maju 2002 roku wzbudził kontrowersje, zbierając przeważnie pozytywne recenzje w Stanach Zjednoczonych, lecz otrzymując zarazem negatywne oceny we Francji i w Polsce. Jedni recenzenci krytykowali film za akademicki styl i powściągliwość w ukazaniu skutków Zagłady Żydów, natomiast inni chwalili go za obiektywne, chłodne i pozbawione melodramatyzmu ujęcie Szoah. </p>\r\n                <p>Pianista zdobył szereg nagród i wyróżnień, między innymi: Złotą Palmę dla najlepszego filmu na Festiwalu Filmowym w Cannes, trzy Oscary (za reżyserię, scenariusz i rolę Brody’ego) oraz siedem Cezarów. Film odniósł również sukces komercyjny – przy budżecie 35 milionów dolarów zarobił na całym świecie ponad 120 milionów dolarów. </p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Gladiator\" class=\"film\">\r\n            <img src=\"img/Gladiator.jpg\" alt=\"Gladiator\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Gladiator</h2>\r\n                <p>film kostiumowy produkcji USA z 2000 roku w reżyserii Ridleya Scotta, którego akcja dzieje się w czasach starożytnego Rzymu. Obok postaci historycznych, jak cezar Marek Aureliusz czy jego syn Kommodus, występują też postacie fikcyjne jak Juba, czy też generał Maximus (ma on jednak kilka pierwowzorów historycznych). </p>\r\n                <p>Inspiracją do filmu był między innymi obraz Jean-Léon Gérôme z 1872 pod tytułem Pollice verso. Gladiator zarobił ponad 457 milionów $ przy budżecie 103 milionów $[1]. </p>\r\n                <p>Serwis Rotten Tomatoes przyznał mu wynik 77%</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Zielona mila\" class=\"film\">\r\n            <img src=\"img/Zielona mila.jpg\" alt=\"Zielona mila\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Zielona mila</h2>\r\n                <p>amerykański film fabularny z 1999 roku w reżyserii Franka Darabonta, z Tomem Hanksem i Michaelem Duncanem w rolach głównych.</p>\r\n                <p>Scenariusz filmu oparty jest na powieści Stephena Kinga pod tym samym tytułem. </p>\r\n                <p>W roku 2000 film był nominowany do Oscara w czterech kategoriach (najlepszy aktor drugoplanowy, najlepszy film, najlepsza muzyka filmowa, najlepszy scenariusz adaptowany) nie zdobył jednak żadnej statuetki. Serwis Rotten Tomatoes przyznał mu wynik 80%</p>\r\n            </div>\r\n        </div>\r\n        <div id=\"Titanic\" class=\"film\">\r\n            <img src=\"img/Titanic.jpg\" alt=\"Titanic\" class=\"film-image\">\r\n            <div class=\"film-description\">\r\n                <h2>Titanic</h2>\r\n                <p>film fabularny produkcji amerykańskiej z 1997, oparty na historycznym wydarzeniu – zatonięciu „Titanica” w 1912. Został wyreżyserowany na podstawie własnego scenariusza przez Jamesa Camerona. Produkcją zajęły się studia filmowe 20th Century Fox, Paramount Pictures i Lightstorm Entertainment. </p>\r\n                <p>Film zdobył 11 Nagród Amerykańskiej Akademii Filmowej, w tym za najlepszy film. Jest czwarty na liście najbardziej kasowych filmów w historii kina – jako pierwszy przekroczył barierę 1 mld dol. przychodów (w sumie ponad 2 mld dol.). </p>\r\n            </div>\r\n        </div>\r\n    </td>\r\n</tr>', 1),
(2, 'filmy', '<tr>\r\n    <td colspan=\"2\" class=\"content\">\r\n        <h2>Trzy filmy oskarowe, które warto zobaczyć:</h2>\r\n        <!-- Pierwszy film -->\r\n        <div class=\"film\">\r\n            <h3>Film 1: \"The Godfather\"</h3>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sY1S34973zA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n        </div>\r\n\r\n        <!-- Drugi film -->\r\n        <div class=\"film\">\r\n            <h3>Film 2: \"Schindler\'s List\"</h3>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gG22XkN6pP8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n        </div>\r\n\r\n        <!-- Trzeci film -->\r\n        <div class=\"film\">\r\n            <h3>Film 3: \"Forrest Gump\"</h3>\r\n            <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bLvqoHBptjg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n        </div>\r\n    </td>\r\n</tr>', 1),
(3, 'kontakt', '<tr>\r\n    <td colspan=\"2\">\r\n        <?php\r\n        include \'contact.php\';\r\n\r\n        // Obsługa formularza\r\n        if ($_SERVER[\'REQUEST_METHOD\'] === \'POST\') {\r\n            if (isset($_POST[\'wyslij\'])) {\r\n                $odbiorca = \'email2@localhost\'; // Zmień na właściwy adres e-mail\r\n                WyslijMailKontakt($odbiorca);\r\n            } elseif (isset($_POST[\'przypomnij\'])) {\r\n                PrzypomnijHaslo();\r\n            }\r\n        }\r\n        ?>\r\n        <h1>Kontakt</h1>\r\n        <?php PokazKontakt(); ?>\r\n    </td>\r\n</tr>\r\n', 1),
(4, 'o_mnie', '<tr>\r\n    <td colspan=\"2\" class=\"content\">\r\n        <div class=\"about-us\">\r\n            <h2>Kim jestem?</h2>\r\n            <p>Jestem pasjonatem kina, który chce dzielić się swoją miłością do filmów oskarowych z szerszym gronem odbiorców.</p>\r\n            \r\n            <h2>Moja misja</h2>\r\n            <p>Moim celem jest promowanie wysokiej jakości kinematografii oraz przybliżenie widzom najlepszych filmów nagrodzonych Oscarem. Na mojej stronie znajdziesz szczegółowe opisy, recenzje oraz ciekawostki związane z filmami, które zdobyły największe uznanie krytyków i widzów na całym świecie.</p>\r\n\r\n            <h2>Dlaczego Oscary?</h2>\r\n            <p>Oscary to jedne z najbardziej prestiżowych nagród filmowych na świecie, przyznawane przez Amerykańską Akademię Sztuki i Wiedzy Filmowej. Dla mnie, te filmy to prawdziwe arcydzieła, które zasługują na uwagę i analizę, a ja chce dzielić się moją wiedzą na ich temat z fanami kina.</p>\r\n\r\n            <h2>Strony internetowe z których korzystam</h2>\r\n            <ul>\r\n                <li><strong>Wikipedia</strong></li>\r\n                <li><strong>Filmweb</strong></li>\r\n                <li><strong>Rotten Tomatoes</strong></li>\r\n            </ul>\r\n\r\n            <h2>Kontakt</h2>\r\n            <p>Masz pytania? Chcesz podzielić się swoją opinią na temat filmów? Skontaktuj się z nami za pomocą <a href=\"index.php?idp=kontakt\">formularz kontaktowy</a>formularza kontaktowego</a>.</p>\r\n\r\n            <h2>Gdzie oglądać</h2>\r\n            <p>Jeżeli chcesz dowiedzieć się gdzie oglądam filmy <a href=\"index.php?idp=ogladanie\">kliknij tutaj</a></p>\r\n        </div>\r\n    </td>\r\n</tr>\r\n', 1),
(5, 'ogladanie', '<tr>\r\n    <td class=\"content\">\r\n        <h2>Oto lista stron gdzie można oberzeć filmy:</h2>\r\n        <ul>\r\n            <li><a href=\"https://www.cda.pl/\" target=\"_blank\">cda</a></li>\r\n            <li><a href=\"https://www.max.com/pl/pl\" target=\"_blank\">HBO</a></li>\r\n            <li><a href=\"https://www.netflix.com\" target=\"_blank\">Netflix</a></li>\r\n        </ul>\r\n    </td>  \r\n</tr>\r\n        ', 1),
(6, 'ranking', '<tr>\r\n    <td>\r\n        <div class=\"content\">\r\n            <section class=\"ranking-section\">\r\n                <h2>Najlepsze Filmy Wszechczasów</h2>\r\n                <table class=\"ranking-table\">\r\n                    <thead>\r\n                        <tr>\r\n                            <th>Ranking</th>\r\n                            <th>Film</th>\r\n                            <th>Moja opinia</th>\r\n                        </tr>\r\n                    </thead>\r\n                    <tbody>\r\n                        <tr>\r\n                            <td>1</td>\r\n                            <td>Diuna</td>\r\n                            <td>Uważam że diuna to najlepszy filmy jaki dotychczas widzałęm, nic dodać nic ująć</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>2</td>\r\n                            <td>Green book</td>\r\n                            <td>Bardzo podoba mi się chemia między głównymi bohaterami</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>3</td>\r\n                            <td>Joker</td>\r\n                            <td>Nowość w filmach o superbochaterach</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>4</td>\r\n                            <td>Django</td>\r\n                            <td>Quentin Tarantino nigdy nie zawodzi</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>5</td>\r\n                            <td>Władca Pierścieni(wszystkie części)</td>\r\n                            <td>Wyszstkie częsci Władcy Pierścieni są fenomenalne pod względem wizualnym i fabularnym</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>6</td>\r\n                            <td>Marsjanin</td>\r\n                            <td>Podobało mi się sprytne podejście głównego bohatera</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>7</td>\r\n                            <td>Avatar: Istota Wody</td>\r\n                            <td>Nowa część w uniwersum Avatara która jest niesamowita</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>8</td>\r\n                            <td>Zielona mila</td>\r\n                            <td>Bardzo emocjonalny i genialny film</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>9</td>\r\n                            <td>Gladiator</td>\r\n                            <td>Podobała mi się akcja</td>\r\n                        </tr>\r\n                        <tr>\r\n                            <td>10</td>\r\n                            <td>No Country for Old Men</td>\r\n                            <td>Bardzo podobał mi się główny złoczyńca</td>\r\n                        </tr>\r\n                    </tbody>\r\n                </table>\r\n            </section>\r\n        </div>\r\n    </td>\r\n</tr>\r\n        ', 1),
(7, 'spis_filmow', '<tr>\r\n    <td colspan=\"2\" class=\"content\">\r\n        <h2>Lista filmów</h2>\r\n        <table class=\"film-table\">\r\n            <tr>\r\n                <th>Tytuł</th>\r\n                <th>Liczba Oscarów</th>\r\n                <th>Gatunek</th>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Diuna\">Diuna</a></td>\r\n                <td>6</td>\r\n                <td>Fantastyka naukowa(opera kosmiczna), Dramat przygodowy</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Avatar-Istota-Wody\">Avatar: Istota Wody</a></td>\r\n                <td>1</td>\r\n                <td>Fantastyka naukowa, Przygodowy</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Joker\">Joker</a></td>\r\n                <td>2</td>\r\n                <td>Dramat psychologiczny, Superbohaterski</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Greenbook\">Green Book</a></td>\r\n                <td>3</td>\r\n                <td>Komediodramat</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Marsjanin\">Marsjanin</a></td>\r\n                <td>0</td>\r\n                <td>Fantastyka naukowa</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#ŻyciePi\">Życie Pi</a></td>\r\n                <td>3</td>\r\n                <td>Dramatyczny, Przygodowy, Fantasy</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Django\">Django</a></td>\r\n                <td>2</td>\r\n                <td>Western</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#NoCountryforOldMen\">No Country for Old Men</a></td>\r\n                <td>4</td>\r\n                <td>Dramat, Kryminał, Thriller</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Wladca-Pierscieni-Powrot-Krola\">Władca Pierścieni: Powrót króla</a></td>\r\n                <td>11</td>\r\n                <td>Fantasy, Przygodowy</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Wladca-Pierscieni-Dwie-Wieze\">Władca Pierścieni: Dwie wieże</a></td>\r\n                <td>2</td>\r\n                <td>Fantasy, Przygodowy</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Wladca-Pierscieni-Druzyna-Pierscienia\">Władca Pierścieni: Drużyna Pierścienia</a></td>\r\n                <td>4</td>\r\n                <td>Fantasy, Przygodowy </td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Pianista\">Pianista</a></td>\r\n                <td>3</td>\r\n                <td>Dramat wojenny</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Gladiator\">Gladiator</a></td>\r\n                <td>5</td>\r\n                <td>Historyczny, Kostiumowy, Dramat</td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Zielona-Mila\">Zielona mila</a></td>\r\n                <td>0</td>\r\n                <td>Dramat obyczajowy, Fantasy </td>\r\n            </tr>\r\n            <tr>\r\n                <td><a href=\"index.php#Titanic\">Titanic</a></td>\r\n                <td>11</td>\r\n                <td>Melodramat, Katastroficzny</td>\r\n            </tr>\r\n        </table>\r\n    </td>\r\n</tr>', 1),
(8, 'Produkty', '<tr>\r\n    <td colspan=\"2\">\r\n        <?php include \'products.php\'; ?>\r\n        <h1>Produkty</h1>\r\n        pokazProdukty();\r\n    </td>\r\n</tr>', 1),
(9, 'koszyk', '<tr>\r\n    <td colspan=\"2\">\r\n        <?php include \'koszyk.php\'; ?>\r\n        <h1>Koszyk</h1>\r\n        showCart();\r\n    </td>\r\n</tr>', 0),
(10, 'Filmy', '<tr>\r\n    <td colspan=\"2\">\r\n        <h1>Filmy Oskarowe</h1>\r\n    <p>Trzy filmy oskarowe, które warto zobaczyć:</p>\r\n\r\n    <div class=\"film\">\r\n        <div class=\"film-image\">\r\n            <iframe width=\"300\" height=\"169\" src=\"https://www.youtube.com/embed/sY1S34973zA\" \r\n                    title=\"The Godfather Trailer\" frameborder=\"0\" \r\n                    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" \r\n                    allowfullscreen></iframe>\r\n        </div>\r\n        <div class=\"film-description\">\r\n            <h2>Film 1: \"The Godfather\"</h2>\r\n            <p>Jeden z najbardziej kultowych filmów w historii kina, zdobywca Oscara za najlepszy film. Reżyseria: Francis Ford Coppola.</p>\r\n        </div>\r\n    </div>\r\n\r\n    <div class=\"film\">\r\n        <div class=\"film-image\">\r\n            <iframe width=\"300\" height=\"169\" src=\"https://www.youtube.com/embed/gG22XNhtnoY\" \r\n                    title=\"Schindler\'s List Trailer\" frameborder=\"0\" \r\n                    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" \r\n                    allowfullscreen></iframe>\r\n        </div>\r\n        <div class=\"film-description\">\r\n            <h2>Film 2: \"Schindler\'s List\"</h2>\r\n            <p>Wzruszający film o Holokauście, zdobywca Oscara za najlepszy film. Reżyseria: Steven Spielberg.</p>\r\n        </div>\r\n    </div>\r\n\r\n    <div class=\"film\">\r\n        <div class=\"film-image\">\r\n            <iframe width=\"300\" height=\"169\" src=\"https://www.youtube.com/embed/bLvqoHBptjg\" \r\n                    title=\"Forrest Gump Trailer\" frameborder=\"0\" \r\n                    allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" \r\n                    allowfullscreen></iframe>\r\n        </div>\r\n        <div class=\"film-description\">\r\n            <h2>Film 3: \"Forrest Gump\"</h2>\r\n            <p>Inspirująca opowieść o życiu i miłości, zdobywca Oscara za najlepszy film. Reżyseria: Robert Zemeckis.</p>\r\n        </div>\r\n    </div>\r\n    </td>\r\n</tr>', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_modyfikacji` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `data_wygasniecia` datetime DEFAULT NULL,
  `cena_netto` decimal(10,2) NOT NULL,
  `podatek_vat` decimal(4,2) NOT NULL DEFAULT 23.00,
  `ilosc_magazyn` int(11) NOT NULL,
  `status_dostepnosci` tinyint(1) NOT NULL DEFAULT 1,
  `kategoria_id` int(11) NOT NULL,
  `gabaryt` varchar(255) DEFAULT NULL,
  `zdjecie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_magazyn`, `status_dostepnosci`, `kategoria_id`, `gabaryt`, `zdjecie`) VALUES
(4, 'Szybcy i Wściekli', 'Film akcji pełen pościgów i adrenaliny.', '2025-01-13 04:09:03', NULL, '2025-12-31 00:00:00', 45.00, 23.00, 20, 1, 5, 'Średni', '/images/szybcy.jpg'),
(5, 'Casino Royale', 'Klasyczny Bond z dużą dawką akcji.', '2025-01-13 04:09:03', NULL, '2025-12-31 00:00:00', 50.00, 23.00, 15, 1, 5, 'Średni', '/images/casino_royale.jpg'),
(6, 'Avengers', 'Film o drużynie superbohaterów walczących z zagrożeniem.', '2025-01-13 04:09:18', NULL, '2025-12-31 00:00:00', 60.00, 23.00, 10, 1, 6, 'Duży', '/images/avengers.jpg'),
(7, 'Batman: Początek', 'Początki Batmana w Gotham City.', '2025-01-13 04:09:18', NULL, '2025-12-31 00:00:00', 55.00, 23.00, 8, 1, 6, 'Duży', '/images/batman.jpg'),
(8, 'Notting Hill', 'Historia miłosna między aktorką a księgarzem.', '2025-01-13 04:09:38', NULL, '2025-12-31 00:00:00', 40.00, 23.00, 12, 1, 7, 'Mały', '/images/notting_hill.jpg'),
(9, 'Pamiętnik', 'Wzruszająca opowieść o miłości i poświęceniu.', '2025-01-13 04:09:38', NULL, '2025-12-31 00:00:00', 42.00, 23.00, 10, 1, 7, 'Mały', '/images/pamietnik.jpg'),
(10, 'Fargo', 'Historia kryminalna z elementami czarnego humoru.', '2025-01-13 04:09:53', NULL, '2025-12-31 00:00:00', 48.00, 23.00, 7, 1, 8, 'Średni', '/images/fargo.jpg'),
(11, 'Big Lebowski', 'Komedia o dziwacznym bohaterze wplątanym w kryminał.', '2025-01-13 04:09:53', NULL, '2025-12-31 00:00:00', 50.00, 23.00, 6, 1, 8, 'Średni', '/images/big_lebowski.jpg'),
(12, 'Blade Runner', 'Klasyczny film o dystopijnej przyszłości.', '2025-01-13 04:10:07', NULL, '2025-12-31 00:00:00', 55.00, 23.00, 10, 1, 11, 'Duży', '/images/blade_runner.jpg'),
(13, 'Mad Max: Fury Road', 'Postapokaliptyczny świat pełen chaosu.', '2025-01-13 04:10:07', NULL, '2025-12-31 00:00:00', 58.00, 23.00, 8, 1, 11, 'Duży', '/images/mad_max.jpg'),
(14, 'Gwiezdne Wojny: Nowa Nadzieja', 'Pierwszy film z kultowej serii Star Wars.', '2025-01-13 04:10:16', '2025-01-13 04:50:17', '2025-12-31 00:00:00', 60.00, 23.00, 15, 1, 13, 'Duży', '/images/star_wars.jpg'),
(15, 'Interstellar', 'Wyprawa kosmiczna w poszukiwaniu nowego domu.', '2025-01-13 04:10:16', '2025-01-13 04:49:27', '2025-12-31 00:00:00', 62.00, 23.00, 12, 1, 13, 'Duży', '/images/interstellar.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorie_ibfk_1` (`matka`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `kategorie_ibfk_1` FOREIGN KEY (`matka`) REFERENCES `kategorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `koszyk_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
