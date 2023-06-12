-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-12 14:56:35
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bar`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `account` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`admin_id`, `account`, `password`) VALUES
(1, '黃子庭', 'B0843042');

-- --------------------------------------------------------

--
-- 資料表結構 `alcohol`
--

CREATE TABLE `alcohol` (
  `alc_id` int(5) NOT NULL,
  `alc_name` varchar(50) NOT NULL,
  `type_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `alcohol`
--

INSERT INTO `alcohol` (`alc_id`, `alc_name`, `type_id`) VALUES
(1, '威士忌 Whisky', 'T2'),
(2, '伏特加 Vodka', 'T2'),
(3, '朗姆酒 Rum', 'T2'),
(4, '琴酒 Gin', 'T2'),
(5, '龍舌蘭 Tequila', 'T2'),
(6, '百富 Balvenie 12', 'T2'),
(7, '百富 Balvenie 14', 'T2'),
(8, '百富 Balvenie 16', 'T2'),
(9, '麥卡倫 Macallan 12', 'T2'),
(10, '格蘭菲迪 Glenfiddich 15', 'T2'),
(11, '格蘭菲迪 Glenfiddich 18', 'T2'),
(12, '格蘭利威 Glenlivet 15', 'T2'),
(13, '魁烈奇 Craigellachie 13', 'T2'),
(14, '格蘭花格 Glenfaclas 105', 'T2'),
(15, '邑極摩 Inchmurrin', 'T2'),
(16, '亞伯樂 Aberlour 12', 'T2'),
(17, '亞伯樂 Aberlour a\'Bunadh', 'T2'),
(18, '大摩 Dalmore 12', 'T2'),
(19, '大摩 Dalmore 15', 'T2'),
(20, '格蘭傑 Nectar D\'Or', 'T2'),
(21, '百樂門 Benromach12', 'T2'),
(22, '歐本 Oban 14', 'T2'),
(23, '高原騎士 Highland Park 12', 'T2'),
(24, '克拉格摩爾 Cragganmore 12', 'T2'),
(25, '安努克 anCnoc 12', 'T2'),
(26, '皇家藍勛 Royal Lochnagar 12', 'T2'),
(27, '富特尼 Old Pulteney 12', 'T2'),
(28, '艾柏迪 Aberfeldy 12', 'T2'),
(29, '艾柏迪 Aberfeldy 16', 'T2'),
(30, '格蘭多納 Glendronach 12', 'T2'),
(31, '達爾維尼 Dalwhinnie 15', 'T2'),
(32, '格蘭路思 Glenrothes 12', 'T2'),
(33, '克里尼基 Clynelish14', 'T2'),
(34, '樂加維林 Lagavulin 16', 'T2'),
(35, '樂加維林 Lagavulin 12', 'T2'),
(36, '拉佛格 Laphroaig Quarter Cask', 'T2'),
(37, '波摩 Bowmore 15', 'T2'),
(38, '阿貝 Ardbeg 10', 'T2'),
(39, '卡爾里拉 Coal loa12', 'T2'),
(40, '大力克斯 Talisker 10', 'T2'),
(41, '艾斯卡 Port Askaig 100 proof', 'T2'),
(42, '布萊迪 Brichladdich', 'T2'),
(43, '齊克倫12', 'T2'),
(44, 'Nikka 12', 'T2'),
(45, '日本響 Japan Hibiki', 'T2'),
(46, '日本余氏', 'T2'),
(47, '日本竹鶴 Japan Taketsuru', 'T2'),
(48, '日本知多 Japan Chita', 'T2'),
(49, '台灣瑪蘭經典獨奏 Taiwan Kavakan Vinho', 'T2'),
(50, '台灣歐馬 Taiwan Omar 12(波本)', 'T2'),
(51, '台灣歐馬 Taiwan Omar 12(雪莉)', 'T2'),
(52, '愛爾蘭波希米爾 Irish Bushmills 12', 'T2'),
(53, '美國捷克丹尼爾紳士 American Jack Daniel\'s Gentleman', 'T2'),
(54, 'Comment-allez vous 無濾過純米酒', 'T2'),
(55, '獺祭45 Dassi 純米大吟釀', 'T2'),
(56, 'Fudoh 備前雄町純米吟釀無濾過生原酒', 'T2'),
(57, 'OMAR 波本花香', 'T2'),
(58, 'OMAR 雪莉果乾', 'T2'),
(59, '三隻猴子 Monket Shoudler', 'T2'),
(60, '蘇格登 Singleton 12', 'T2'),
(61, '慕赫 Mortlach 12', 'T2'),
(62, '清酒 Sake', 'T2'),
(63, 'House 紅酒', 'T3'),
(64, 'Pierrick Bouley,勃根地,法國', 'T3'),
(65, 'CHATEAU PARAN JUSTICE,聖艾美濃,法國波爾多', 'T3'),
(66, 'Quintarelli Rosso Ca del Merlo,Veneto 義大利', 'T3'),
(67, 'Deltetto,Piedmont,義大利', 'T3'),
(68, 'Gaja Ca\'Marcanda Promis,Chianti,義大利', 'T3'),
(69, 'PRUNETO,Chianti,義大利', 'T3'),
(70, '白蘭地 Brandy', 'T3'),
(71, 'El Coto,Rioja,西班牙', 'T3'),
(72, 'XANTHOS,美國', 'T3'),
(73, 'Terrazas,阿根廷', 'T3'),
(74, 'House 白酒', 'T3'),
(75, 'DOMAINE DES PERES DE L\'EGLISE,南隆河教皇斯堡,法國', 'T3'),
(76, 'MJ JANEIL MELODY,法國西南', 'T3'),
(77, 'Generazione Alessandro,西西里Etna火山,義大利', 'T3'),
(78, 'Gran Maestro Offida,Marche,義大利', 'T3'),
(79, 'Ca\'di Rajo,Veneto,義大利', 'T3'),
(80, 'SASSO BIANCO,托斯卡尼,義大利', 'T3'),
(81, 'KOL,Pfalz,德國', 'T3'),
(82, 'Bodega Poedra Negra,阿根廷', 'T3'),
(83, 'Zardetto Private Cuvee Brut,義大利北部', 'T3'),
(84, 'Paco & Lola Lolo Albarino 2021,西班牙北部', 'T3'),
(85, 'Linfa Garofoli Serra del Conte,義大利中部', 'T3'),
(86, 'Ippolito Mare Chiaro Ciro White,義大利南部', 'T3'),
(87, 'Jones Along Came Difference', 'T3'),
(88, 'Ampelomeryx rouge,法國西南部', 'T3'),
(89, 'Bodega Covinas Aula Syrah,西班牙南部', 'T3'),
(90, '梅酒 Plum Wine', 'T3'),
(91, '柚子酒 Grapefruit Wine', 'T3'),
(92, '韓國燒酒 白葡萄', 'T3'),
(93, '韓國燒酒 水蜜桃', 'T3'),
(94, '蜂蜜奶油啤酒 Honey Beer', 'T4'),
(95, '台灣啤酒 Taiwan Beer', 'T4'),
(96, '生力啤酒 San Miguel', 'T4'),
(97, '奧地利聖誕老人陳年啤酒王 Samichlaus', 'T4'),
(98, '奧地利接骨木花檸檬啤酒 RadlerNatur', 'T4'),
(99, '奧地利濃烈黑啤酒 Dopplebock', 'T4'),
(100, '奧地利干邑啤酒 Urbock', 'T4'),
(101, '威士忌啤酒 Nessie', 'T4'),
(102, '海尼根 Heineken Draft Beer', 'T4'),
(103, '麒麟啤酒 Kirin Beer', 'T4'),
(104, '朝日黑啤 Asahi Dry Black Beer', 'T4'),
(105, '精釀啤酒 Craft Beer', 'T4'),
(106, '百威啤酒', 'T4'),
(107, '黑俄羅斯 Black Russian', 'T1'),
(108, '伏特加萊姆 Vodka Lime', 'T1'),
(109, '柯夢波丹 Cosmopolitan', 'T1'),
(110, '性慾海灘 Sex on the beach', 'T1'),
(111, '血腥瑪麗 Bloody Mary', 'T1'),
(112, '螺絲起子 Screwdriver', 'T1'),
(113, '神風 Kamikaze', 'T1'),
(114, '誘惑 Temptation', 'T1'),
(115, '鹹狗 Salty Dog', 'T1'),
(116, '新加坡司令 Singapore Sling', 'T1'),
(117, '佛羅里達 Florida', 'T1'),
(118, '紅粉佳人 Pink Lady', 'T1'),
(119, '白色佳人 White Lady', 'T1'),
(120, '西方玫瑰 Western Rose', 'T1'),
(121, '黑夜之吻 Kiss in the dark', 'T1'),
(122, '卡羅素 Caruso', 'T1'),
(123, '琴湯尼 Gin Tonic', 'T1'),
(124, '馬丁尼 Martini', 'T1'),
(125, '琴菲士 Gin Fizz', 'T1'),
(126, '琴蕾 Gimlet', 'T1'),
(127, '愛情 Tom Collins', 'T1'),
(128, '漂浮威士忌 Whisky Float', 'T1'),
(129, '愛爾蘭玫瑰 Irish Rose', 'T1'),
(130, '威士忌可樂 Whisky Coke', 'T1'),
(131, '約翰可林 John Collin', 'T1'),
(132, '曼哈頓 Manhattan', 'T1'),
(133, '高飛球 HighBall', 'T1'),
(134, '紐約 New York', 'T1'),
(135, '鏽釘 Rusty Nail', 'T1'),
(136, '獵人 Hunter', 'T1'),
(137, '教父 God Father', 'T1'),
(138, '藍色夏威夷 Blue Hawaiian', 'T1'),
(139, '加州之戀 California Love', 'T1'),
(140, '惡魔之吻 Devil Kiss', 'T1'),
(141, '自由古巴 Cuba Libre', 'T1'),
(142, '戴克利花 Daiquiri Blossom', 'T1'),
(143, '戴克利 Daiquiri', 'T1'),
(144, '巴卡迪 Bacardi', 'T1'),
(145, '小英文 X.Y.Z.', 'T1'),
(146, '阿羅哈 ALOHA', 'T1'),
(147, '莫吉托 Mojito', 'T1'),
(148, '邁泰 MaiTai', 'T1'),
(149, '藍色瑪格麗特 Blue Margarita', 'T1'),
(150, '龍舌蘭日出 Tequila sunrise', 'T1'),
(151, '龍舌蘭炸藥 Tequila bomb', 'T1'),
(152, '夏日迷霧 Summer Haze', 'T1'),
(153, '瑪格麗特 Margarita', 'T1'),
(154, '貝里詩牛奶 Baileys Milk', 'T1'),
(155, '墨西哥牛奶 Kahlua Milk', 'T1'),
(156, '貴妃醉酒 Drunken Beauty', 'T1'),
(157, '初戀 First Love', 'T1'),
(158, '環遊世界 Around the world', 'T1'),
(159, '八號當鋪 Eight PawnShop', 'T1'),
(160, '長島冰茶 Long Island ice tea', 'T1'),
(161, '深水炸彈 Deep Bomb', 'T1'),
(162, '天使之吻 Angel\'s Kiss', 'T1'),
(163, '迪塔摩尼 Ditamoni', 'T1'),
(164, '草莓牛奶 Strawberry Paradise', 'T1'),
(165, '轟炸機 B52', 'T1'),
(166, '禁果 Forbidden Fruit', 'T1'),
(167, '經典 Old Fashioned', 'T1'),
(168, '內格羅尼 Negroni', 'T1'),
(169, '純酒精 Vesper', 'T1'),
(170, '白色桑格莉亞 White Sangria', 'T1'),
(171, '紐約酸酒 New York Sour', 'T1'),
(172, '野格紅牛 JagerBomb', 'T1'),
(173, '叢林鳥 Jungle Bird', 'T1'),
(174, '翱翔 Aviation', 'T1'),
(175, '盤尼西林 Penicillin', 'T1'),
(176, '莫斯科驢子 Moscow Mule', 'T1'),
(177, '側車 Side Car', 'T1'),
(178, '親親我 Gin Gin Mule', 'T1'),
(179, '綠色蚱蜢 Grasshopper', 'T1'),
(180, '威士忌酸酒 Whisky Sour', 'T1'),
(181, '傑克蘿絲 Jack Rose', 'T1'),
(182, '奇奇椰酒 Chi Chi', 'T1'),
(183, '愛爾蘭咖啡 Caifé Gaelach', 'T1'),
(184, '咖啡馬丁尼 Expresso Martini', 'T1'),
(185, '泡泡  Spumoni', 'T1'),
(186, '美人魚 Mermaid', 'T1'),
(187, '阿瑪迪斯 Amadeus', 'T1'),
(188, '落日殺神 Collateral', 'T1'),
(189, '熱情波蜜 Passionate Bomi Roku', 'T1'),
(190, '烏梅香茶 Smoked Plum Kaoliang', 'T1'),
(191, '路摸思 Lumos', 'T1'),
(192, '寶島冰茶 Homies Long Island', 'T1'),
(193, '原諒 Forgiveness', 'T1'),
(194, '榛愛 True Love', 'T1'),
(195, '荔姬愛CALL客 Dita Coke', 'T1'),
(196, '春泥 Spring Mud', 'T1'),
(197, '櫻花 Sakura', 'T1'),
(198, '冰雪奇緣 Frozen', 'T1'),
(199, '愛麗絲 Alice Wonderland', 'T1'),
(200, '芭拉芭巴巴 Balaba Baba', 'T1'),
(201, '金桔掰 Bye Bye Kumquat', 'T1'),
(202, '玫瑰佳人 Rose Lady', 'T1'),
(203, '桂花情人 Osmanthus Lover', 'T1'),
(204, '深海 Deepwater', 'T1'),
(205, '雨人 Rain Man', 'T1'),
(206, '沉默第三者  Silent Third', 'T1'),
(207, '法蘭西集團  French Connection', 'T1'),
(208, '暗戀滋味', 'T1'),
(209, '茉莉情人', 'T1'),
(210, '像極了愛情', 'T1'),
(211, '涷檸冰茶', 'T1');

-- --------------------------------------------------------

--
-- 資料表結構 `alc_ele`
--

CREATE TABLE `alc_ele` (
  `alc_id` int(5) NOT NULL,
  `ele_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `alc_ele`
--

INSERT INTO `alc_ele` (`alc_id`, `ele_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 7),
(55, 7),
(56, 7),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 8),
(63, 9),
(64, 9),
(65, 9),
(66, 9),
(67, 9),
(68, 9),
(69, 9),
(70, 6),
(71, 9),
(72, 9),
(73, 9),
(74, 10),
(75, 10),
(76, 10),
(77, 10),
(78, 10),
(79, 10),
(80, 10),
(81, 10),
(82, 10),
(83, 11),
(84, 11),
(85, 11),
(86, 11),
(87, 11),
(88, 11),
(89, 11),
(90, 12),
(91, 13),
(92, 14),
(93, 14),
(94, 15),
(95, 15),
(96, 15),
(97, 15),
(98, 15),
(99, 15),
(100, 15),
(101, 15),
(102, 15),
(103, 15),
(104, 15),
(105, 15),
(106, 15),
(107, 2),
(107, 18),
(108, 2),
(108, 57),
(109, 2),
(109, 17),
(109, 47),
(109, 50),
(110, 2),
(110, 37),
(110, 48),
(110, 52),
(111, 2),
(111, 47),
(111, 53),
(111, 60),
(112, 2),
(112, 48),
(113, 2),
(113, 47),
(114, 2),
(114, 19),
(114, 47),
(114, 50),
(114, 57),
(115, 2),
(115, 47),
(115, 49),
(115, 59),
(116, 4),
(116, 17),
(116, 20),
(116, 38),
(116, 42),
(116, 47),
(116, 51),
(116, 56),
(117, 4),
(117, 47),
(117, 48),
(117, 56),
(118, 21),
(118, 47),
(118, 58),
(119, 4),
(119, 17),
(119, 47),
(120, 4),
(120, 6),
(120, 22),
(120, 47),
(121, 4),
(121, 20),
(121, 22),
(122, 4),
(122, 23),
(122, 24),
(123, 4),
(123, 45),
(123, 47),
(124, 4),
(124, 23),
(125, 4),
(125, 42),
(125, 47),
(126, 4),
(126, 57),
(127, 4),
(127, 42),
(127, 47),
(128, 1),
(128, 64),
(129, 1),
(129, 52),
(129, 57),
(130, 1),
(130, 43),
(131, 1),
(131, 42),
(131, 57),
(131, 58),
(132, 1),
(132, 56),
(133, 42),
(133, 57),
(134, 1),
(134, 52),
(134, 57),
(135, 1),
(135, 25),
(136, 1),
(136, 42),
(136, 57),
(136, 58),
(137, 1),
(137, 26),
(138, 2),
(138, 3),
(138, 27),
(138, 48),
(138, 51),
(139, 3),
(139, 28),
(139, 42),
(140, 17),
(140, 20),
(140, 57),
(141, 29),
(141, 43),
(141, 47),
(142, 3),
(142, 20),
(142, 48),
(143, 3),
(143, 17),
(143, 57),
(144, 3),
(144, 52),
(144, 57),
(145, 3),
(145, 17),
(146, 3),
(146, 17),
(147, 57),
(147, 64),
(148, 3),
(148, 19),
(148, 48),
(148, 57),
(149, 5),
(149, 27),
(149, 57),
(150, 5),
(150, 48),
(150, 58),
(151, 5),
(151, 44),
(152, 5),
(152, 45),
(153, 5),
(153, 30),
(153, 47),
(153, 58),
(154, 31),
(154, 46),
(155, 18),
(155, 46),
(156, 2),
(156, 21),
(156, 32),
(156, 45),
(156, 59),
(157, 44),
(157, 52),
(157, 58),
(158, 2),
(158, 3),
(158, 4),
(158, 5),
(158, 48),
(158, 51),
(159, 3),
(159, 33),
(159, 34),
(159, 47),
(159, 48),
(159, 49),
(159, 51),
(159, 58),
(160, 2),
(160, 3),
(160, 4),
(160, 5),
(160, 43),
(161, 1),
(161, 2),
(161, 3),
(161, 4),
(161, 5),
(162, 20),
(162, 35),
(162, 54),
(163, 21),
(163, 45),
(163, 49),
(164, 28),
(164, 39),
(164, 46),
(165, 2),
(165, 18),
(165, 31),
(166, 37),
(166, 47),
(166, 48),
(167, 1),
(167, 42),
(167, 56),
(167, 58),
(168, 4),
(168, 23),
(168, 66),
(169, 2),
(169, 4),
(169, 36),
(170, 10),
(170, 37),
(170, 47),
(170, 58),
(170, 67),
(171, 1),
(171, 9),
(171, 47),
(171, 48),
(171, 58),
(171, 68),
(172, 62),
(172, 63),
(173, 3),
(173, 38),
(173, 47),
(173, 51),
(173, 58),
(174, 4),
(174, 20),
(174, 38),
(174, 47),
(175, 1),
(175, 57),
(175, 69),
(175, 70),
(176, 2),
(176, 57),
(176, 61),
(177, 6),
(177, 17),
(177, 47),
(177, 58),
(178, 4),
(178, 47),
(178, 58),
(178, 61),
(178, 64),
(178, 70),
(179, 24),
(179, 39),
(179, 46),
(180, 1),
(180, 47),
(180, 58),
(181, 6),
(181, 47),
(181, 52),
(182, 2),
(182, 51),
(182, 58),
(182, 71),
(183, 1),
(183, 54),
(183, 55),
(183, 58),
(184, 2),
(184, 18),
(184, 55),
(185, 23),
(185, 45),
(185, 49),
(186, 2),
(186, 9),
(186, 67),
(186, 69),
(187, 6),
(187, 46),
(187, 55),
(187, 72),
(188, 1),
(188, 3),
(188, 6),
(188, 76),
(188, 77),
(189, 4),
(189, 77),
(189, 79),
(190, 40),
(190, 77),
(190, 80),
(191, 4),
(191, 67),
(191, 81),
(192, 2),
(192, 3),
(192, 4),
(192, 5),
(192, 17),
(192, 43),
(192, 75),
(193, 2),
(193, 12),
(193, 82),
(194, 2),
(194, 46),
(194, 51),
(194, 83),
(195, 21),
(195, 43),
(196, 3),
(196, 6),
(196, 31),
(197, 5),
(197, 17),
(197, 38),
(198, 2),
(198, 4),
(198, 37),
(198, 84),
(199, 4),
(199, 54),
(199, 67),
(199, 73),
(200, 3),
(200, 17),
(200, 57),
(200, 74),
(201, 15),
(201, 16),
(201, 75),
(202, 10),
(202, 21),
(202, 73),
(203, 4),
(203, 85),
(204, 3),
(204, 41),
(204, 51),
(205, 3),
(205, 17),
(205, 86),
(206, 1),
(206, 17),
(206, 56),
(206, 57),
(206, 58),
(207, 6),
(207, 26),
(208, 10),
(208, 45),
(208, 87),
(209, 4),
(209, 79),
(209, 88),
(210, 2),
(210, 17),
(210, 47),
(211, 2),
(211, 3),
(211, 4),
(211, 5),
(211, 17),
(211, 43),
(211, 47);

-- --------------------------------------------------------

--
-- 資料表結構 `bar`
--

CREATE TABLE `bar` (
  `bar_id` int(5) NOT NULL,
  `bar_name` varchar(30) NOT NULL,
  `bar_address` varchar(30) NOT NULL,
  `bar_score` float DEFAULT NULL,
  `site_id` varchar(3) NOT NULL,
  `menu_image` varchar(300) DEFAULT NULL,
  `map` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `bar`
--

INSERT INTO `bar` (`bar_id`, `bar_name`, `bar_address`, `bar_score`, `site_id`, `menu_image`, `map`) VALUES
(1, '渣男Taiwan Bistro 古亭四渣', '台北市中正區和平西路一段62號', 4.7, '100', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.2284519811533!2d121.5163581852333!3d25.02632006942054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9fca5cf5f71%3A0xdf4bd899d6f82a91!2z5rij55S3VGFpd2FuIEJpc3Ryb-OAiuWPpOS6reWbm-a4o-OAiw!5e0!3m2!1szh-TW!2stw!4v1684826583584!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(2, '獨角落 Do Bar', '台北市大同區長安西路162號號1樓', 4.8, '103', 'https://lh3.googleusercontent.com/p/AF1QipPC0aHcyigzaeanxWrAOAaZG2dRqSu2oBQ9cBds=w960-h960-n-o-v1\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.5026446170227!2d121.51379827510944!3d25.050947277805395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a98f7e2b9baf%3A0x2f9fbc18cfa1cf0d!2z542o6KeS6JC9RG8gQmFy!5e0!3m2!1szh-TW!2stw!4v1684826615217!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(3, 'SOUL MATE BAR', '台北市大同區承德路一段76號1樓', 4.8, '103', 'https://scontent-tpe1-1.xx.fbcdn.net/v/t1.6435-9/121773515_685009865728193_4590068407260743704_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=730e14&_nc_ohc=QKPFt2W66ysAX-fed5R&_nc_ht=scontent-tpe1-1.xx&oh=00_AfCDkmbb9SEhezX0-NBmgm_YAt1-yysf2Z_12DWYlGHajg&oe=648ADFEF', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.452818740603!2d121.51473307510952!3d25.052637077804295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a92edc971289%3A0xa85f9b1ff03706bd!2sSOUL%20MATE%20BAR!5e0!3m2!1szh-TW!2stw!4v1684826644910!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, '渣男Taiwan Bistro 中山五渣', '台北市大同區承德路二段14號', 4.5, '103', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.371114365809!2d121.51540847510957!3d25.055407777802486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a90175ad2017%3A0xfb40cf5a5fccd8e1!2z5rij55S3VGFpd2FuIEJpc3RybyDkuK3lsbHlupc!5e0!3m2!1szh-TW!2stw!4v1684826676650!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(5, 'Nep. Lounge Bar', '台北市中山區天津街63號B1', 4.4, '104', 'https://img.onl/VbRk9O', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4828348651595!2d121.51866417975272!3d25.051619120576568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a96f323de083%3A0xcbd6087ca0144d25!2sNep.%20Lounge%20Bar!5e0!3m2!1szh-TW!2stw!4v1684826702261!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(6, '渣男 Taiwan Bistro 敦北三渣', '台北市松山區敦化北路120巷7弄13號', 4.7, '105', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4220364663206!2d121.5455114751095!3d25.05368097780365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abebab7cb0e9%3A0x18f2787d3a6c29d7!2z5rij55S3IFRhaXdhbiBCaXN0cm8g5pWm5YyX5LiJ5rij!5e0!3m2!1szh-TW!2stw!4v1684826747916!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(7, 'HOMIES SOFT BAR', '台北市松山區南京東路五段250巷2弄13號', 4.9, '105', 'https://img.onl/ZhogtU', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.508624218561!2d121.56425147510943!3d25.050744477805605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9a83dd64d7d%3A0xad01fab83d04ffb8!2sHOMIES%20SOFT%20BAR!5e0!3m2!1szh-TW!2stw!4v1684826789912!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(8, 'PUN', '台北市大安區信義路四段378巷5號', 4.5, '106', 'https://farm8.staticflickr.com/7915/47154591882_3aa1c530ff_c.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.04276066621!2d121.5533127751087!3d25.032622877817264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abcbc14e34bd%3A0xfaa10e154b46672a!2sPUN!5e0!3m2!1szh-TW!2stw!4v1684826813981!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(9, 'Min shelter cocktail bar ', '台北市萬華區武昌街二段82巷2弄6號', 4.9, '108', 'https://scontent.ftpe8-4.fna.fbcdn.net/v/t39.30808-6/341550615_1470519733685777_522663691879065664_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=a26aad&_nc_ohc=OGFu88TZpKMAX8sb5V6&_nc_ht=scontent.ftpe8-4.fna&oh=00_AfB3PqkzxKsqKxaIeXMWPuzwNkZyUblnL6_cNW-LPErP6w&oe=64898DDE', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.688477601155!2d121.50312007510918!3d25.044643977809496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a999fff1dc3d%3A0x50158bb4b1bfb510!2zTWluIHNoZWx0ZXIgY29ja3RhaWwgYmFyIOW3t-WFp-mFkuWQpw!5e0!3m2!1szh-TW!2stw!4v1684826834488!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(10, '渣男 Taiwan Bistro 信義一渣', '台北市信義區信義路五段150巷315弄12號', 4.6, '110', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.208567192347!2d121.56618877510867!3d25.026995077820896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abb2e680ed73%3A0xd97a03e137aee0d0!2z5rij55S3IFRhaXdhbiBCaXN0cm8g5L-h576p5LiA5rij!5e0!3m2!1szh-TW!2stw!4v1684826857680!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(11, '渣男Taiwan Bistro 天母八渣', '台北市士林區福國路40號', 4.9, '111', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.9878986381855!2d121.52147607511112!3d25.102270977772204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442af53b8decf63%3A0x70504bdbb2e07959!2z5rij55S3VGFpd2FuIEJpc3Ryb-OAiuWkqeavjeWFq-a4o-OAiw!5e0!3m2!1szh-TW!2stw!4v1684826880481!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(12, '簡單吧 Simplebar', '台北市士林區大北路42號', 4.7, '111', 'https://img.onl/eQvIwW', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.350661810773!2d121.52112387976176!3d25.089988520487804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a92bea23ad07%3A0xa18d1325b39f55d4!2zU2ltcGxlYmFyIOewoeWWruWQp-OAgg!5e0!3m2!1szh-TW!2stw!4v1684826920443!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(13, '陳三 Chen*3', '台北市內湖區民權東路六段123巷34弄21-1號', 4.7, '114', 'https://img.onl/SF1nrL', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.9259931372617!2d121.58971367511006!3d25.070497377792805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ac851dd10b57%3A0x33be7f8394419ad9!2z6Zmz5LiJQ2hlbiozIEJpc3Rybw!5e0!3m2!1szh-TW!2stw!4v1684826942098!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(14, 'Single&Double', '台北市文山區指南路一段29號', 4.9, '116', 'https://scontent.ftpe8-4.fna.fbcdn.net/v/t39.30808-6/309607101_470684901745750_2694384045537909400_n.jpg?stp=cp6_dst-jpg&_nc_cat=102&ccb=1-7&_nc_sid=c4c01c&_nc_ohc=8YBcQSDsLO0AX_eTz4F&_nc_ht=scontent.ftpe8-4.fna&oh=00_AfBrznv6QEvLjF6wXCMVpmJyOVgd8tlmKvHkO84SWrrABQ&oe=648A0FDA', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.363812057837!2d121.56719607510719!3d24.98775087784633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abfc62a0ae7f%3A0x6f1f1810f4bef0c!2sSingle%26Double!5e0!3m2!1szh-TW!2stw!4v1684826971006!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(15, 'HOYDEA', '台北市文山區新光路一段158號', 4.3, '116', 'https://img.onl/9eHqA4', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.217881792686!2d121.5709388751074!3d24.992711377843133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aa652dda332f%3A0xcddc10d55ba8f7f5!2sHOYDEA!5e0!3m2!1szh-TW!2stw!4v1684826991307!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(16, '渣男 Taiwan Bistro 木柵二渣', '台北市文山區萬芳路9-1號', 4.8, '116', 'https://inline.imgix.net/menus/-LaPGv120tJCLRpBuCWx:inline-live-2a466--LaPGvUznj-qURRElXj_-e78e8f83-d033-4550-9a4e-baa90b5da113.jpg?auto=format&dpr=1&fm=jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.048123782825!2d121.56791657510752!3d24.998480677839325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aa68b2adc2ef%3A0x994c821502530140!2z5rij55S3IFRhaXdhbiBCaXN0cm8g5pyo5p-15LqM5rij!5e0!3m2!1szh-TW!2stw!4v1684827016302!5m2!1szh-TW!2stw\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- 資料表結構 `element`
--

CREATE TABLE `element` (
  `ele_id` int(5) NOT NULL,
  `ele_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `element`
--

INSERT INTO `element` (`ele_id`, `ele_name`) VALUES
(1, '威士忌'),
(2, '伏特加'),
(3, '朗姆酒'),
(4, '琴酒'),
(5, '龍舌蘭'),
(6, '白蘭地'),
(7, '米酒'),
(8, '清酒'),
(9, '紅酒'),
(10, '白酒'),
(11, '葡萄酒'),
(12, '梅酒'),
(13, '柚子酒'),
(14, '燒酒'),
(15, '啤酒'),
(16, '生命之水'),
(17, '君度橙酒'),
(18, '咖啡利口酒'),
(19, '白橙力嬌酒'),
(20, '櫻桃利口酒'),
(21, '荔枝利口酒'),
(22, '干味美思酒'),
(23, '香艾酒'),
(24, '綠薄荷香甜酒'),
(25, '蜂蜜利口酒'),
(26, '杏仁利口酒'),
(27, '藍柑橘酒'),
(28, '草莓利口酒'),
(29, '白蘭姆酒'),
(30, '白柑橘香甜酒'),
(31, '奶酒'),
(32, '玫瑰利口酒'),
(33, '哈密瓜利口酒'),
(34, '柳橙利口酒'),
(35, '可可利口酒'),
(36, '麗葉酒'),
(37, '蜜桃利口酒'),
(38, '香甜酒'),
(39, '白巧克力利口酒'),
(40, '高粱酒'),
(41, '橘皮風味酒'),
(42, '蘇打水'),
(43, '可樂'),
(44, '雪碧'),
(45, '通寧水'),
(46, '牛奶'),
(47, '檸檬汁'),
(48, '柳橙汁'),
(49, '葡萄柚汁'),
(50, '蔓越莓汁'),
(51, '鳳梨汁'),
(52, '紅石榴汁'),
(53, '番茄汁'),
(54, '鮮奶油'),
(55, '咖啡'),
(56, '苦精'),
(57, '萊姆'),
(58, '糖漿'),
(59, '鹽'),
(60, '辛香料'),
(61, '薑汁汽水'),
(62, '野格'),
(63, '紅牛'),
(64, '薄荷'),
(65, '水'),
(66, '苦酒'),
(67, '蘋果'),
(68, '蛋白'),
(69, '蜂蜜'),
(70, '生薑'),
(71, '椰漿'),
(72, '巧克力'),
(73, '玫瑰'),
(74, '芭樂'),
(75, '金桔'),
(76, '冬瓜茶'),
(77, '烏梅'),
(78, '香柚'),
(79, '百香果'),
(80, '甘草'),
(81, '接骨木花'),
(82, '紫蘇'),
(83, '榛果'),
(84, '柑橘'),
(85, '桂花'),
(86, '芒果'),
(87, '烏龍紅茶'),
(88, '茉莉綠茶');

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `bar_id` int(5) NOT NULL,
  `alc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`bar_id`, `alc_id`) VALUES
(1, 40),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 95),
(1, 147),
(2, 109),
(2, 110),
(2, 119),
(2, 123),
(2, 126),
(2, 133),
(2, 137),
(2, 143),
(2, 153),
(2, 167),
(2, 168),
(2, 172),
(2, 174),
(2, 177),
(2, 206),
(2, 207),
(3, 95),
(3, 102),
(3, 108),
(3, 110),
(3, 113),
(3, 141),
(3, 168),
(3, 208),
(3, 209),
(3, 210),
(3, 211),
(4, 40),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(4, 61),
(4, 62),
(4, 83),
(4, 84),
(4, 85),
(4, 86),
(4, 87),
(4, 88),
(4, 89),
(4, 90),
(4, 91),
(4, 92),
(4, 93),
(4, 95),
(4, 147),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 95),
(5, 104),
(5, 111),
(5, 116),
(5, 148),
(5, 168),
(5, 171),
(5, 172),
(5, 173),
(5, 174),
(5, 175),
(5, 176),
(5, 177),
(5, 178),
(5, 179),
(6, 40),
(6, 54),
(6, 55),
(6, 56),
(6, 57),
(6, 58),
(6, 59),
(6, 60),
(6, 61),
(6, 62),
(6, 83),
(6, 84),
(6, 85),
(6, 86),
(6, 87),
(6, 88),
(6, 89),
(6, 90),
(6, 91),
(6, 92),
(6, 93),
(6, 95),
(6, 147),
(7, 186),
(7, 187),
(7, 188),
(7, 189),
(7, 190),
(7, 191),
(7, 192),
(7, 193),
(7, 194),
(7, 195),
(7, 196),
(7, 197),
(7, 198),
(7, 199),
(7, 200),
(7, 201),
(7, 202),
(7, 203),
(7, 204),
(7, 205),
(8, 111),
(8, 132),
(8, 147),
(8, 153),
(8, 167),
(8, 168),
(8, 173),
(8, 177),
(8, 185),
(9, 108),
(9, 109),
(9, 110),
(9, 112),
(9, 123),
(9, 130),
(9, 133),
(9, 138),
(9, 141),
(9, 143),
(9, 148),
(9, 150),
(9, 153),
(9, 158),
(9, 160),
(9, 161),
(9, 170),
(9, 171),
(10, 40),
(10, 54),
(10, 55),
(10, 56),
(10, 57),
(10, 58),
(10, 59),
(10, 60),
(10, 61),
(10, 62),
(10, 83),
(10, 84),
(10, 85),
(10, 86),
(10, 87),
(10, 88),
(10, 89),
(10, 90),
(10, 91),
(10, 92),
(10, 93),
(10, 95),
(10, 147),
(11, 40),
(11, 54),
(11, 55),
(11, 56),
(11, 57),
(11, 58),
(11, 59),
(11, 60),
(11, 61),
(11, 62),
(11, 83),
(11, 84),
(11, 85),
(11, 86),
(11, 87),
(11, 88),
(11, 89),
(11, 90),
(11, 91),
(11, 92),
(11, 93),
(11, 95),
(11, 147),
(12, 124),
(12, 137),
(12, 138),
(12, 141),
(12, 143),
(12, 147),
(12, 148),
(12, 160),
(12, 167),
(12, 168),
(12, 172),
(12, 177),
(12, 180),
(12, 181),
(12, 182),
(12, 183),
(12, 184),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(13, 14),
(13, 15),
(13, 16),
(13, 17),
(13, 18),
(13, 19),
(13, 20),
(13, 21),
(13, 22),
(13, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 29),
(13, 30),
(13, 31),
(13, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(13, 38),
(13, 39),
(13, 40),
(13, 41),
(13, 42),
(13, 43),
(13, 44),
(13, 45),
(13, 46),
(13, 47),
(13, 48),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(13, 53),
(13, 63),
(13, 64),
(13, 65),
(13, 66),
(13, 67),
(13, 68),
(13, 69),
(13, 71),
(13, 72),
(13, 73),
(13, 74),
(13, 75),
(13, 76),
(13, 77),
(13, 78),
(13, 79),
(13, 80),
(13, 81),
(13, 82),
(13, 95),
(13, 102),
(13, 103),
(13, 104),
(13, 105),
(13, 123),
(13, 127),
(13, 133),
(13, 160),
(13, 167),
(13, 168),
(13, 169),
(14, 109),
(14, 119),
(14, 124),
(14, 125),
(14, 126),
(14, 137),
(14, 143),
(14, 145),
(14, 160),
(14, 167),
(14, 168),
(14, 177),
(14, 180),
(15, 94),
(15, 95),
(15, 96),
(15, 97),
(15, 98),
(15, 99),
(15, 100),
(15, 101),
(15, 107),
(15, 108),
(15, 109),
(15, 110),
(15, 111),
(15, 112),
(15, 113),
(15, 114),
(15, 115),
(15, 116),
(15, 117),
(15, 118),
(15, 119),
(15, 120),
(15, 121),
(15, 122),
(15, 123),
(15, 124),
(15, 125),
(15, 126),
(15, 127),
(15, 128),
(15, 129),
(15, 130),
(15, 131),
(15, 132),
(15, 133),
(15, 134),
(15, 135),
(15, 136),
(15, 137),
(15, 138),
(15, 139),
(15, 140),
(15, 141),
(15, 142),
(15, 143),
(15, 144),
(15, 145),
(15, 146),
(15, 147),
(15, 148),
(15, 149),
(15, 150),
(15, 151),
(15, 152),
(15, 153),
(15, 154),
(15, 155),
(15, 156),
(15, 157),
(15, 158),
(15, 159),
(15, 160),
(15, 161),
(15, 162),
(15, 163),
(15, 164),
(15, 165),
(15, 166),
(16, 40),
(16, 54),
(16, 55),
(16, 56),
(16, 57),
(16, 58),
(16, 59),
(16, 60),
(16, 61),
(16, 62),
(16, 83),
(16, 84),
(16, 85),
(16, 86),
(16, 87),
(16, 88),
(16, 89),
(16, 90),
(16, 91),
(16, 92),
(16, 93),
(16, 95),
(16, 147);

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `record_time` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  `bar_id` int(5) NOT NULL,
  `bar_score` int(1) NOT NULL,
  `opinion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`record_time`, `user_id`, `bar_id`, `bar_score`, `opinion`) VALUES
('2023-06-11 02:51:41', 1, 1, 3, '距離太遠了，下次來要注意交通時間'),
('2023-06-12 10:23:19', 1, 13, 2, '店員態度差 下次不來了');

-- --------------------------------------------------------

--
-- 資料表結構 `site`
--

CREATE TABLE `site` (
  `site_id` varchar(3) NOT NULL,
  `site_name` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `site`
--

INSERT INTO `site` (`site_id`, `site_name`) VALUES
('100', '中正區'),
('103', '大同區'),
('104', '中山區'),
('105', '松山區'),
('106', '大安區'),
('108', '萬華區'),
('110', '信義區'),
('111', '士林區'),
('112', '北投區'),
('114', '內湖區'),
('115', '南港區'),
('116', '文山區');

-- --------------------------------------------------------

--
-- 資料表結構 `time`
--

CREATE TABLE `time` (
  `bar_id` int(5) NOT NULL,
  `day` varchar(3) NOT NULL COMMENT '星期',
  `sTime` time DEFAULT NULL COMMENT '開始時間',
  `cTime` time DEFAULT NULL COMMENT '結束時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `time`
--

INSERT INTO `time` (`bar_id`, `day`, `sTime`, `cTime`) VALUES
(1, 'D1', '17:30:00', '25:30:00'),
(1, 'D2', '17:30:00', '25:30:00'),
(1, 'D3', '17:30:00', '25:30:00'),
(1, 'D4', '17:30:00', '25:30:00'),
(1, 'D5', '17:30:00', '25:30:00'),
(1, 'D6', '17:30:00', '25:30:00'),
(1, 'D7', '17:30:00', '25:30:00'),
(2, 'D1', NULL, NULL),
(2, 'D2', '18:00:00', '25:30:00'),
(2, 'D3', '18:00:00', '25:30:00'),
(2, 'D4', '18:00:00', '25:30:00'),
(2, 'D5', '18:00:00', '27:00:00'),
(2, 'D6', '18:00:00', '27:00:00'),
(2, 'D7', '18:00:00', '25:30:00'),
(3, 'D1', '19:30:00', '26:00:00'),
(3, 'D2', '19:30:00', '26:00:00'),
(3, 'D3', '19:30:00', '26:00:00'),
(3, 'D4', '19:30:00', '26:00:00'),
(3, 'D5', '19:30:00', '27:00:00'),
(3, 'D6', '19:30:00', '27:00:00'),
(3, 'D7', '19:30:00', '26:00:00'),
(4, 'D1', '17:30:00', '25:30:00'),
(4, 'D2', '17:30:00', '25:30:00'),
(4, 'D3', '17:30:00', '25:30:00'),
(4, 'D4', '17:30:00', '25:30:00'),
(4, 'D5', '17:30:00', '25:30:00'),
(4, 'D6', '17:30:00', '25:30:00'),
(4, 'D7', '17:30:00', '25:30:00'),
(5, 'D1', '19:30:00', '27:00:00'),
(5, 'D2', '19:30:00', '27:00:00'),
(5, 'D3', '19:30:00', '27:00:00'),
(5, 'D4', '19:30:00', '27:00:00'),
(5, 'D5', '19:30:00', '27:00:00'),
(5, 'D6', '19:30:00', '27:00:00'),
(5, 'D7', '19:30:00', '27:00:00'),
(6, 'D1', '17:30:00', '25:30:00'),
(6, 'D2', '17:30:00', '25:30:00'),
(6, 'D3', '17:30:00', '25:30:00'),
(6, 'D4', '17:30:00', '25:30:00'),
(6, 'D5', '17:30:00', '25:30:00'),
(6, 'D6', '17:30:00', '25:30:00'),
(6, 'D7', '17:30:00', '25:30:00'),
(7, 'D1', NULL, NULL),
(7, 'D2', '19:00:00', '27:00:00'),
(7, 'D3', '19:00:00', '27:00:00'),
(7, 'D4', '19:00:00', '27:00:00'),
(7, 'D5', '19:00:00', '27:00:00'),
(7, 'D6', '19:00:00', '27:00:00'),
(7, 'D7', '19:00:00', '27:00:00'),
(8, 'D1', '18:30:00', '25:30:00'),
(8, 'D2', '18:30:00', '25:30:00'),
(8, 'D3', '18:30:00', '25:30:00'),
(8, 'D4', '18:30:00', '25:30:00'),
(8, 'D5', '18:30:00', '25:30:00'),
(8, 'D6', '18:30:00', '26:30:00'),
(8, 'D7', '18:30:00', '26:30:00'),
(9, 'D1', '19:00:00', '25:00:00'),
(9, 'D2', '19:00:00', '25:00:00'),
(9, 'D3', '19:00:00', '25:00:00'),
(9, 'D4', '19:00:00', '25:00:00'),
(9, 'D5', '19:30:00', '27:00:00'),
(9, 'D6', '19:30:00', '27:00:00'),
(9, 'D7', '19:00:00', '25:00:00'),
(10, 'D1', '17:30:00', '25:30:00'),
(10, 'D2', '17:30:00', '25:30:00'),
(10, 'D3', '17:30:00', '25:30:00'),
(10, 'D4', '17:30:00', '25:30:00'),
(10, 'D5', '17:30:00', '25:30:00'),
(10, 'D6', '17:30:00', '25:30:00'),
(10, 'D7', '17:30:00', '25:30:00'),
(11, 'D1', '17:30:00', '25:30:00'),
(11, 'D2', '17:30:00', '25:30:00'),
(11, 'D3', '17:30:00', '25:30:00'),
(11, 'D4', '17:30:00', '25:30:00'),
(11, 'D5', '17:30:00', '25:30:00'),
(11, 'D6', '17:30:00', '25:30:00'),
(11, 'D7', '17:30:00', '25:30:00'),
(12, 'D1', '20:00:00', '27:00:00'),
(12, 'D2', '20:00:00', '27:00:00'),
(12, 'D3', '20:00:00', '27:00:00'),
(12, 'D4', '20:00:00', '27:00:00'),
(12, 'D5', '20:00:00', '27:00:00'),
(12, 'D6', '20:00:00', '27:00:00'),
(12, 'D7', '20:00:00', '27:00:00'),
(13, 'D1', '18:00:00', '24:30:00'),
(13, 'D2', '18:00:00', '24:30:00'),
(13, 'D3', '18:00:00', '24:30:00'),
(13, 'D4', '18:00:00', '24:30:00'),
(13, 'D5', '18:00:00', '24:30:00'),
(13, 'D6', '18:00:00', '24:30:00'),
(13, 'D7', '18:00:00', '24:30:00'),
(14, 'D1', NULL, NULL),
(14, 'D2', NULL, NULL),
(14, 'D3', '18:30:00', '25:00:00'),
(14, 'D4', '18:30:00', '25:00:00'),
(14, 'D5', '18:30:00', '26:00:00'),
(14, 'D6', '18:30:00', '26:00:00'),
(14, 'D7', '18:30:00', '25:00:00'),
(15, 'D1', NULL, NULL),
(15, 'D2', '21:00:00', '26:00:00'),
(15, 'D3', '21:00:00', '26:00:00'),
(15, 'D4', '21:00:00', '26:00:00'),
(15, 'D5', '21:00:00', '26:00:00'),
(15, 'D6', '21:00:00', '26:00:00'),
(15, 'D7', '21:00:00', '26:00:00'),
(16, 'D1', '17:30:00', '25:30:00'),
(16, 'D2', '17:30:00', '25:30:00'),
(16, 'D3', '17:30:00', '25:30:00'),
(16, 'D4', '17:30:00', '25:30:00'),
(16, 'D5', '17:30:00', '25:30:00'),
(16, 'D6', '17:30:00', '25:30:00'),
(16, 'D7', '17:30:00', '25:30:00');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `type_id` varchar(3) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
('T1', 'Cocktail'),
('T2', 'Pure'),
('T3', 'Wine'),
('T4', 'Beer');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `account` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `account`, `password`) VALUES
(1, '黃子庭', '0986969846', 'B0843042');

-- --------------------------------------------------------

--
-- 資料表結構 `week`
--

CREATE TABLE `week` (
  `day_id` varchar(3) NOT NULL,
  `day_name` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `week`
--

INSERT INTO `week` (`day_id`, `day_name`) VALUES
('D1', '週一'),
('D2', '週二'),
('D3', '週三'),
('D4', '週四'),
('D5', '週五'),
('D6', '週六'),
('D7', '週日');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `alcohol`
--
ALTER TABLE `alcohol`
  ADD PRIMARY KEY (`alc_id`),
  ADD KEY `type_id` (`type_id`);

--
-- 資料表索引 `alc_ele`
--
ALTER TABLE `alc_ele`
  ADD PRIMARY KEY (`alc_id`,`ele_id`),
  ADD KEY `alc_ele_ibfk_2` (`ele_id`);

--
-- 資料表索引 `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`bar_id`),
  ADD KEY `bar_ibfk_1` (`site_id`);

--
-- 資料表索引 `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`ele_id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`bar_id`,`alc_id`),
  ADD KEY `alc_id` (`alc_id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_time`,`user_id`,`bar_id`),
  ADD KEY `record_ibfk_1` (`bar_id`),
  ADD KEY `record_ibfk_2` (`user_id`);

--
-- 資料表索引 `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`);

--
-- 資料表索引 `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`bar_id`,`day`),
  ADD KEY `day` (`day`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`day_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `element`
--
ALTER TABLE `element`
  MODIFY `ele_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `alcohol`
--
ALTER TABLE `alcohol`
  ADD CONSTRAINT `alcohol_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `alc_ele`
--
ALTER TABLE `alc_ele`
  ADD CONSTRAINT `alc_ele_ibfk_2` FOREIGN KEY (`ele_id`) REFERENCES `element` (`ele_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alc_ele_ibfk_3` FOREIGN KEY (`alc_id`) REFERENCES `alcohol` (`alc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `bar`
--
ALTER TABLE `bar`
  ADD CONSTRAINT `bar_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`alc_id`) REFERENCES `alcohol` (`alc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`bar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`bar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `time_ibfk_1` FOREIGN KEY (`bar_id`) REFERENCES `bar` (`bar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_ibfk_2` FOREIGN KEY (`day`) REFERENCES `week` (`day_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
