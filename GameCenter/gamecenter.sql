-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 03 2020 г., 14:16
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamecenter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles_comments`
--

CREATE TABLE `articles_comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `first_last_name_user` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles_comments`
--

INSERT INTO `articles_comments` (`id`, `id_user`, `id_article`, `first_last_name_user`, `comment`) VALUES
(1, 1, 1, 'vladut ionita', 'La scurt timp dupa aparitia internetului a inceput sa se dezvolte comertul online. Aceasta modalitate de a vinde produse sau servicii s-a dovedit a fi una dintre nenumaratele afaceri profitabile din mai multe motive, pe care le voi detalia in cele ce urmeaza.'),
(2, 1, 1, 'vladut ionita', 'cucu'),
(97, 1, 29, 'vladut ionita', 'hello'),
(98, 1, 29, 'vladut ionita', 'the zelda is the best!!!!'),
(99, 1, 36, 'vladut ionita', 'Faster, smoother, and bursting at the seams with content, Berseria delivers a much needed kick to the series.'),
(100, 2, 36, 'Kira Akitzuka', 'It has a great story!'),
(101, 3, 37, 'Ian Sarivan', 'very good game!'),
(102, 3, 37, 'Ian Sarivan', 'dsadas');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_rating`
--

CREATE TABLE `articles_rating` (
  `id` int(11) NOT NULL,
  `id_game_block` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `numbers_voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles_rating`
--

INSERT INTO `articles_rating` (`id`, `id_game_block`, `star`, `numbers_voted`) VALUES
(1, 1, 5, 240),
(2, 1, 4, 358),
(3, 1, 3, 388),
(4, 1, 2, 126),
(5, 1, 1, 101),
(16, 2, 5, 502),
(17, 2, 4, 360),
(18, 2, 3, 264),
(19, 2, 2, 135),
(20, 2, 1, 25),
(36, 10, 5, 477),
(37, 10, 4, 354),
(38, 10, 3, 277),
(39, 10, 2, 103),
(40, 10, 1, 80),
(41, 11, 5, 452),
(42, 11, 4, 4),
(43, 11, 3, 8),
(44, 11, 2, 2),
(45, 11, 1, 1),
(131, 29, 5, 522),
(132, 29, 4, 4),
(133, 29, 3, 8),
(134, 29, 2, 2),
(135, 29, 1, 1),
(166, 36, 5, 423),
(167, 36, 4, 1),
(168, 36, 3, 3),
(169, 36, 2, 1),
(170, 36, 1, 1),
(171, 37, 5, 1),
(172, 37, 4, 1),
(173, 37, 3, 2),
(174, 37, 2, 1),
(175, 37, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `game_block_info`
--

CREATE TABLE `game_block_info` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `written_on` date NOT NULL DEFAULT current_timestamp(),
  `photo_logo_name` varchar(200) NOT NULL,
  `photo_background_name` varchar(200) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(600) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `game_block_info`
--

INSERT INTO `game_block_info` (`id`, `author`, `written_on`, `photo_logo_name`, `photo_background_name`, `title`, `description`, `text`) VALUES
(1, 'vladut ionita', '2020-12-02', 'Rockstar_Games_Logo.png', 'rockstar.jpg', 'Rock Star', 'Rockstar Games, Inc. is an American video game publisher based in New York City. ', 'Rockstar Games, Inc. is an American video game publisher based in New York City. The company was established in December 1998 as a subsidiary of Take-Two Interactive, using the assets Take-Two had previously acquired from BMG Interactive. Founding members of the company were Sam and Dan Houser, Terry Donovan and Jamie King, who worked for Take-Two at the time, and of which the Houser brothers were previously executives at BMG Interactive. Sam Houser heads the studio as president.<br />\r\n\n<br />\r\nSince 1999, several companies acquired by or established under Take-Two have become part of Rockstar Games, such as Rockstar Canada (later renamed Rockstar Toronto) becoming the first one in 1999, and Rockstar Dundee the most recent in 2020. All companies organized under Rockstar Games bear the \"Rockstar\" name and logo. In this context, Rockstar Games is sometimes also referred to as Rockstar New York, Rockstar NY or Rockstar NYC. Rockstar Games also sports a motion capture studio in Bethpage, New York.<br />\r\n\n<br />\r\nRockstar Games predominantly publishes games in the action-adventure genre, while racing games also saw success for the company. One of such action-adventure game franchises is Grand Theft Auto, which Rockstar Games took over from BMG Interactive, which published the series\' original 1997 entry. The most recent game in the series, Grand Theft Auto V, has shipped over 135 million copies since its release in September 2013, making it one of the best-selling video games of all time. Other popular franchises published by Rockstar Games are Red Dead, Midnight Club, Max Payne and Manhunt.'),
(2, 'vladut ionita', '2020-12-02', 'sonic adventure logo.png', 'sonic adventure.jpg', 'Sonic Adventure', 'Sonic Adventure is a 1998 platform game for Sega`s Dreamcast and the first main Sonic the Hedgehog game to feature 3D gameplay.', 'Sonic Adventure is a 3D platform game with action and role-playing elements. Players control one of six anthropomorphic protagonists as they venture to defeat Doctor Robotnik and his robot army, who seek the seven magical Chaos Emeralds and the evil entity Chaos. Six player characters are unlocked as the game progresses, each with their own story and attributes. Sonic the Hedgehog performs a spin dash, homing attack, and light-speed dash; Miles \"Tails\" Prower flies, swims, and attacks robots using his tails; Knuckles the Echidna glides, climbs walls, and punches; Amy Rose can defeat enemies using her hammer; Big the Cat is slow and carries a fishing rod he can cast; and E-102 Gamma can shoot laser beams.<br />\r\n<br />\r\nAt the start of the game, the player is placed in one of several Adventure Fields, open-ended hub worlds inhabited by advice-giving non-player characters. The player character is guided and instructed by the voice of Tikal the Echidna. Through exploration, the player discovers entrances to levels called Action Stages, some of which must be opened using keys hidden in the Adventure Field. Once the player accesses an Action Stage, they are tasked with a specific objective, which is different for each character. Sonic must reach the level\'s end like in prior Sonic the Hedgehog games; Tails must reach the end before Sonic; Knuckles must find three hidden shards of the Master Emerald; Amy must solve puzzles and avoid being caught by a robot; Big must fish for his pet frog; and Gamma must fight his way through stages using projectiles as a defense.<br />\r\n<br />\r\nSome levels include minigames separate from the main story. These feature different styles of gameplay, among them rail shooting, racing, and sandboarding. Some minigames can only be accessed with particular characters. Fulfilling certain objectives allows the player to obtain bonus items. Unlocked minigames and stages the player has completed can be accessed from a Trial Mode on the title screen.<br />\r\n<br />\r\nLike previous Sonic the Hedgehog games, players collect golden rings as a form of health: if the player character is in possession of rings when they are hit by an enemy or other hazard, they will survive, but their rings will scatter and blink before disappearing. Canisters containing power-ups such as speed shoes, additional rings, invincibility, and elemental shields are also hidden in levels. In several stages, the player engages Robotnik or Chaos in a boss fight and must deplete the boss\'s health meter to proceed. Each character starts with a limited number of lives, and the player loses a life if the character drowns, gets crushed, or is hit without any rings in their possession. The game ends when the player runs out of lives. Lives can be replenished by collecting 100 rings or a 1-up.<br />\r\n<br />\r\nPlayers may also discover Chao Gardens, hidden, protective environments inhabited by Chao, a virtual pet. Players can hatch, name, and interact with a Chao, and raise the status of their Chao by giving it small animals found by defeating robots. The Dreamcast\'s handheld Visual Memory Unit (VMU) allows the player to download the minigame Chao Adventure, in which their Chao walks through a course to evolve and improve its skills. Evolving one\'s Chao improves its performance in competitions called Chao Races. Eggs that can produce special types of Chao are hidden throughout the Adventure Fields. Players can earn emblems by playing through Action Stages, searching through the Adventure Fields, or winning Chao Races. Each Action Stage has three emblems that can be earned by replaying the stages and fulfilling objectives, such as beating the level within a time limit.'),
(10, 'Kira Akitzuka', '2020-10-15', 'devil may cry 5 logo.png', 'devil may cry 5.png', 'Devil May Cry 5', 'Devil May Cry 5 (デビル メイ クライ 5 Debiru Mei Kurai Faibu?) is the fifth installment of the main Devil May Cry series and the sixth installment overall not counting mobile games. ', 'The game was formally announced at E3 2018 during the Microsoft Press Conference. Set after the events of Devil May Cry 4, the game follows Nero as he fights off a widespread demon invasion, all the while looking for the cloaked figure who took the Devil Bringer. It was released on 8th March 2019.<br />\n<br />\r\nDuring the PlayStation 5 Showcase event on September 16, 2020 the Special Edition of the game has been announced. It was released on November 10, 2020 for the Xbox Series X|S and on November 12 for the PlayStation 5.'),
(11, 'vladut ionita', '2020-11-09', 'Metal Gear Revenge logo.png', 'Metal Gear Rising Revengeance.jpg', 'Metal Gear Rising: Revengeance', 'An action hack and slash video game developed by PlatinumGames and published by Konami Digital Entertainment', 'Released for the PlayStation 3 (PS3), Xbox 360 and Windows, it is a spin-off in the Metal Gear series, and is set four years after the events of Metal Gear Solid 4: Guns of the Patriots. In the game, players control Raiden, a cyborg who confronts the private military company Desperado Enforcement, with the gameplay focusing on fighting enemies using a sword and other weapons to perform combos and counterattacks. Through the use of Blade Mode, Raiden can cut cyborgs in slow motion and steal parts stored in their bodies. The series\' usual stealth elements are also optional to reduce combat.<br />\r\n\n<br />\r\nThe game was originally being developed internally by Kojima Productions, who announced the game in 2009 under the title of Metal Gear Solid: Rising. However, the team met with difficulties in developing a game based on swordplay, so executive producer Hideo Kojima postponed its development until a solution could be found. The project resurfaced in late 2011 under its finalized title, with PlatinumGames as the new developer. The game underwent significant changes in its play mechanics and storyline under PlatinumGames\' involvement, although Kojima Productions retained responsibility for the game\'s overall plot and Raiden\'s design.<br />\r\n\n<br />\r\nUpon its worldwide release in February 2013, Metal Gear Rising: Revengeance was well-received by critics, being praised for its sophisticated cutting system, its use of Metal Gear elements to complement the story despite the game\'s focus on action, its soundtrack, and its boss fights; some criticism was directed at its camera and the length of the story mode. The game also enjoyed positive sales, with the PS3 and Steam versions selling an estimated total of more than 1.2 million copies. While those involved in the game\'s production have expressed desire to develop a sequel, such prospects have yet to come to fruition due to the ongoing conflicts between Konami and Kojima Productions.'),
(29, 'Kira Akitzuka', '2020-12-02', 'zelda logo.jpg', 'zelda background.jpg', 'The Legend of Zelda: Breath of', 'The first installment of the Zelda series. It centers its plot around a boy named Link, who becomes the central protagonist throughout the series.', '<b>GAMEPLAY</b><br /><br />\r\nConform studiului efectuat de compania Daedalus Millward Brown, derulat in perioada noiembrie 2011-ianuarie 2012, pentru piata online din Romania, cumparaturile prin intermediul internetului se fac preponderent de catre populatia din mediul urban, cu un nivel de educatie superior. De asemenea, veniturile celor care fac tranzactii online se situeaza peste medie. Atat femeile (45,2%) cat si barbatii (54,8%) prefera sa faca cumparaturi din magazine online. Varsta majoritara ai celor care cauta servicii online se situeaza intre 25 si 34 de ani. Privind prin perspectiva veniturilor lunare, cele mai multe cumparaturi online se realizeaza de persoanele cu un venit intre 1.400 si 1.800 de lei (20% dintre respondenti).<br /><br />\r\nIn topul tranzactiilor online se afla platile catre utilitati sau servicii, urmate de achizitia de produse electronice, imbracaminte, incaltaminte, produse cosmetice si parfumuri. Deasemenea, la mijlocul clasamentului se situeaza achizitia de telefoane mobile si servicii asociate acestora, produse electrocasnice, carti, ziare reviste. Nu sunt de neglijat nici serviciile turistice, din care preponderent se cumpara bilete de avion. Jucariile, filmele, jocurile si biletele la diferite evenimente se afla si ele printre preferintele romanilor care fac cumparaturi dintr-un magazin virtual.'),
(36, 'Kira Akitzuka', '2020-12-03', 'tales of berseria logo.png', 'tales of berseria background.jpg', 'Tales Of Berseria', 'Is the sixteenth Mothership Title in the Tales series. ', '<b>STORY</b><br />\r\n=================================================================================<br />\r\n<b>Setting</b><br />\r\nBerseria takes places in a world known as Desolation, specifically in the Holy Midgand Empire, a powerful country that rules over Desolation\'s archipelago of a continent. The game\'s world is shared with Tales of Zestiria, though these events occur in the distant past. There are countless numbers of islands around, and Midgand\'s rule crosses even the seas. Areas of land and islands in the game are divided into territories. Along with humans, one of the other main races is the malakim, supernatural spirits whose wills are sealed and used by humans as slaves to utilize their magical abilities after being made visible to even normal humans due to the Advent, an incident three years prior to Velvet Crowe\'s escape from the prison island of Titania.<br />\r\nThroughout the empire, a disease known as daemonblight causes those infected to lose their humanity and sense of rationality and transform into monsters known as daemons, who pose a threat to the world. Along with the rulers of the Holy Midgand Empire exists a theocratic order known as the Abbey, who are of great political and religious importance and are influential in imperial affairs. The exorcists, soldiers from the Abbey, are tasked with bringing peace and order by purging the world of daemons and are willing to go to extremes to reach their goal.<br />\r\n<br />\r\n<b>CHARACTERS</b><br />\r\n=================================================================================<br />\r\n<b>Velvet Crowe</b> (ベルベット・クラウ Berubetto Kurau?) – The main protagonist, who is a 19-year-old woman on a quest for vengeance. Her life changed due to an incident that occurred three years prior to the events of the story, during the Scarlet Night. She fights with a blade mounted on her right-hand gauntlet, her feet, and the demonic left arm. At some point, she joins Aifread\'s pirate team to face a common enemy.<br />\r\n<br />\r\n<b>Laphicet</b> (ライフィセット Raifisetto?) – A 10-year-old boy of the malak race who is considered to be the \"light\" to Velvet\'s \"darkness\". He possess a compass that is a key item in the story, as it points the boy to the places that will help his mind and heart grow. He fights using paper sheets, similarly to Lailah.<br />\r\n<br />\r\n<b>Rokurou Rangetsu</b> (ロクロウ・ランゲツ Rokurou Rangetsu?) – A black-haired man wearing samurai garb who, despite turning into a daemon, has retained his sense of reason. He follows Velvet to pay a debt to her and fights with twin daggers.<br />\r\n<br />\r\n<b>Magilou</b> (マギルゥ Magiruu?) – A mysterious woman who introduces herself as a witch, Magilou is an extroverted and chatty woman on the outside, but there is something secretive and sinister about her.<br />\r\n<br />\r\n<b>Eizen</b> (アイゼン Aizen?) – A man who, despite his appearance, is actually about 1,000-years-old. Eizen is Edna\'s brother. Known as the \"Reaper\", he is the First Mate of Aifread\'s pirates, who is on a search for his missing captain, Van Aifread, on the ship called the Van Eltia. Eizen joins forces with Velvet against their common enemy: the Abbey and its exorcists.<br />\r\n<br />\r\n<b>Eleanor Hume</b> (エレノア・ヒューム Erenoa Hyuumu?) – A compassionate, caring woman. Eleanor is an praetor-rank exorcist from the Abbey. After a certain event, Eleanor joins Velvet and her team to discover the truth behind the world.'),
(37, 'Ian Sarivan', '2020-12-03', 'cabal online logo.jpg', 'cabal online background.jpg', 'Cabal Online', 'Is a free-to-play, 3D massively multiplayer online role-playing game developed by South Korean company ESTsoft.', 'Different localizations of the game exist for various countries and regions. Although free-to-play, the game makes use of the freemium business model by implementing an \"Item Shop\", both in-game and via web, allowing players to purchase special premium coins using real currency, in order to acquire exclusive game enhancements and features, useful items and assorted vanity content.<br />\r\n<br />\r\nCabal Online takes place in a fictional world known as Nevareth, nearly a thousand years after its devastation by a powerful group of idealistic men, the CABAL. Hoping to turn their world into a utopia, they inadvertently fueled the forces and laws of nature to rebel against them, causing the event known as the Apocalypse. After the destruction, only eight members of the CABAL survived, including their leader, Faust.<br />\r\n<br />\r\nProphesying the future, Faust saw the rise of an evil force that would, once again, ruin the land of Nevareth. In the present day, that evil has come. It is now up to the player to face the waves of minions that have invaded the world and uncover the truth behind them');

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `first_name`, `last_name`, `sex`, `email`, `birthday`, `is_active`) VALUES
(1, 'vlad12', 'Vlad_123', 'vladut', 'ionita', 'm', 's@mail.ru', '2020-11-30', 1),
(2, 'nichita', 'Nichita_123', 'Kira', 'Akitzuka', 'm', 'staffordtony03@gmail.com', '2020-12-03', 1),
(3, 'sarivan', 'Vlad_123', 'Ian', 'Sarivan', 'm', 's@mail.ru', '2002-06-11', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_rating`
--
ALTER TABLE `articles_rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `game_block_info`
--
ALTER TABLE `game_block_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles_comments`
--
ALTER TABLE `articles_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `articles_rating`
--
ALTER TABLE `articles_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT для таблицы `game_block_info`
--
ALTER TABLE `game_block_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
