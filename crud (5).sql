-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 mars 2023 à 20:46
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `re_password1` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`, `re_password1`) VALUES
(20, 'hicham', 'hicham@gmail.com', '12345', '12345'),
(21, 'hicham', 'hicham@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id_candidature` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `score` int(11) DEFAULT 0,
  `reqexp` varchar(50) NOT NULL,
  `reqfor` varchar(50) NOT NULL,
  `reqskill` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`id_candidature`, `user_id`, `id_job`, `date`, `score`, `reqexp`, `reqfor`, `reqskill`, `status`) VALUES
(203, 70, 30, '2023-03-20', 35, 'false', 'true', 0, 'Waiting'),
(204, 90, 29, '2023-03-20', 44, 'true', 'true', 0, 'Rejected'),
(205, 90, 30, '2023-03-20', 26, 'false', 'true', 100, 'Waiting'),
(206, 100, 30, '2023-03-21', 26, 'false', 'true', 100, 'Waiting');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_email` varchar(255) NOT NULL,
  `tel` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_company`, `name`, `person_name`, `person_email`, `tel`, `address`, `rec_id`) VALUES
(1, 'ChaseandWootenAssociates', 'WynnLivingstonInc', 'WynnLivingstonInc@mail.com', 1, 'Cupidatatimpeditd', 74),
(2, 'ChaseandWootenAssociates', 'WynnLivingstonInc', 'WynnLivingstonInc@mail.com', 1, 'Cupidatatimpeditd', 79),
(3, 'ChaseandWootenAssociates', 'WynnLivingstonInc', 'WynnLivingstonInc@mail.com', 1, 'Cupidatatimpeditd', 88);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id_experience` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `startyear` date NOT NULL,
  `endyear` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id_experience`, `user_id`, `experience`, `company`, `startyear`, `endyear`) VALUES
(360, 80, 'Serveur', 'IE N CES  P H YSIQ UES\nM EN TIO N T R ', '2019-01-01', '2020-01-01'),
(365, 77, 'Development full stack', 'INETUM 	\n', '2024-01-01', '2025-01-01'),
(366, 77, 'STAGE', 'MALETA 	\n', '2022-09-01', '2022-10-01'),
(367, 77, 'STAGE', 'MAROC TELECOM 	\n \n', '2022-01-01', '2024-01-01'),
(530, 70, 'STAGE', 'BENJ AAFAR	 FES	\n', '2020-09-01', '2021-07-01'),
(531, 70, 'STAGE', 'SOCIETE INDUS TRIELLE LESAFFRE	 FE S	\n', '2018-02-01', '2018-05-01'),
(532, 70, 'Charge de clientèle', 'ALOMR ANE	 FES	\n', '2017-07-01', '2017-09-01'),
(533, 70, 'STAGE', 'RADEEF	 FE S	\n', '2016-07-01', '2016-09-01'),
(534, 70, 'Charge de clientèle', 'BMCI BNP P ARIBAS	 FE S	\n', '2015-07-01', '2015-08-01'),
(535, 82, 'Development full stack', 'INETUM 	\n', '2024-01-01', '2025-01-01'),
(536, 82, 'STAGE', 'MALETA 	\n', '2022-09-01', '2022-10-01'),
(537, 82, 'STAGE', 'MAROC TELECOM \n', '2022-01-01', '2024-01-01'),
(538, 85, 'STAGE', 'CAPGEMINI	 	', '2020-06-01', '2020-01-01'),
(549, 90, 'Development full stack', 'INETUM 	\n', '2024-01-01', '2025-01-01'),
(550, 90, 'STAGE', 'MALETA 	\n', '2022-09-01', '2022-10-01'),
(551, 90, 'STAGE', 'MAROC TELECOM \n', '2022-01-01', '2024-01-01'),
(552, 100, 'Developpeur full stack', 'INETUM 	', '2024-01-01', '2025-01-01'),
(553, 100, 'STAGE', 'MALETA ', '2022-09-01', '2022-10-01'),
(554, 100, 'STAGE', 'SOCI', '2022-01-01', '2024-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `startyear` int(11) DEFAULT NULL,
  `endyear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `user_id`, `formation`, `school`, `startyear`, `endyear`) VALUES
(489, 80, 'DEUST', '', 2020, 2022),
(490, 80, 'Licence', 'UC A', 2020, NULL),
(498, 77, 'Baccalaureat', 'LYCEE AL KHWARIZMI', 2018, 2019),
(499, 77, 'DEUST', 'FST SETTAT', 2019, 2022),
(500, 77, 'LST', 'FST SETTAT', 2022, 2023),
(521, 81, 'Bac', 'Lyc é e A l', 2018, 2019),
(522, 81, 'DEUST', 'Fac u lt é  d es s c ie nce ', 2019, 2022),
(523, 81, 'Licence', '', 2019, NULL),
(738, 70, 'Bac', '', 2009, 2012),
(739, 70, 'LST', 'IGA', 2013, 2016),
(740, 70, 'Master M2', 'UNIVERSITÉ PRIVÉE DE FE ', 2016, 2018),
(743, 82, 'Bac', 'LYCEE AL KHWARIZMI', 2018, 2019),
(744, 82, 'DEUST', 'FST SETTAT', 2019, 2022),
(745, 82, 'LST', 'FST SETTAT', 2022, 2023),
(746, 85, 'Bac', 'LYCEE ESSAFIR ', 2015, 2016),
(747, 85, 'DEUST', '', 2016, 2018),
(748, 85, 'LST', '', 2018, 2019),
(765, 90, 'Bac', 'LYCEE AL KHWARIZMI', 2018, 2019),
(766, 90, 'DEUST', 'FST SETTAT', 2019, 2022),
(767, 90, 'LST', 'FST SETTAT', 2022, 2023),
(768, 100, 'Bac', 'LYCEE AL KHWARIZMI', 2018, 2019),
(769, 100, 'DEUST', 'FST SETTAT', 2019, 2022),
(770, 100, 'LST', 'FST SETTAT', 2022, 2023),
(771, 100, 'master', 'bjjj', 2010, 4520);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id_information` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `ville` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `tel` int(250) DEFAULT NULL,
  `genre` varchar(191) DEFAULT NULL,
  `select` varchar(100) DEFAULT NULL,
  `cv` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id_information`, `user_id`, `nom`, `prenom`, `ville`, `date`, `tel`, `genre`, `select`, `cv`) VALUES
(55, 70, 'chaouki', 'oussama', 'casablanca', '2002-01-06', 691483208, 'male', 'informatique', 'dossier/dsssd.pdf'),
(57, 68, 'anass', 'elachham', 'casablanca', '2023-03-16', 625000000, 'male', 'Droit', NULL),
(58, 75, 'achham', 'anass', 'casablanca', '2002-06-05', 691483208, 'male', 'Ingénierie', NULL),
(59, 71, 'chaouki', 'oussama', 'casa', '2022-11-08', 691483208, '', 'Agricole', NULL),
(60, 76, 'dou', 'sss', 'casa', '2023-03-13', 645891523, '', 'Btp', NULL),
(61, 77, 'chaouki', 'oussama', 'casablanca', '2023-03-30', 691483208, 'male', 'Informatique', 'dossier/admin.pdf'),
(64, 78, 'chaouki', 'oussama', 'casablanca', '2023-03-30', 601023004, 'male', 'Droit', 'dossier/Admin1.pdf'),
(65, 79, 'chaouki', 'oussama', 'casablanca', '2023-02-23', 691483208, 'male', 'Informatique', 'dossier/AD.pdf'),
(66, 80, 'chaouki', 'oussama', 'casablanca', '2023-04-01', 691483208, 'male', 'Informatique', 'dossier/admin3.pdf'),
(68, 81, 'chaouki', 'anass', 'casablanca', '2023-03-16', 691483208, 'male', 'Informatique', 'dossier/trrtr.pdf'),
(69, 81, 'chaouki', 'anass', 'casablanca', '2023-03-16', 691483208, 'male', 'Informatique', 'dossier/trrtr.pdf'),
(70, 81, 'chaouki', 'anass', 'casablanca', '2023-03-16', 691483208, 'male', 'Informatique', 'dossier/trrtr.pdf'),
(71, 82, 'MAKHTARI', 'IKRAM', 'casablanca', '2001-09-12', 691483208, 'female', 'Artisanat', 'dossier/MAKHTARI.pdf'),
(72, 84, 'chaouki', 'SDSD', 'DSF', '2023-03-31', 2147483647, 'male', 'Informatique', NULL),
(73, 85, 'chaouki', 'oussama', 'casablanca', '2023-03-24', 691483208, 'male', 'Informatique', 'dossier/OUSSAMA99.pdf'),
(74, 89, 'chaouki', 'oussama', 'casablanca', '2002-01-06', 691483208, 'male', 'Informatique', 'dossier/oussamachaouki.pdf'),
(75, 90, 'chaouki', 'oussama', 'casablanca', '2011-06-17', 691483208, 'male', 'Informatique', 'dossier/oussamachaouki.pdf'),
(76, 100, 'chaouki', 'oussama', 'casablanca', '2002-01-06', 691483208, 'male', 'Informatique', 'dossier/oussamachaouki.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `recruter_id` int(255) NOT NULL,
  `domain` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_salaire` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `formationreq` varchar(100) NOT NULL,
  `expreq` int(11) NOT NULL,
  `skillreq` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`id_job`, `recruter_id`, `domain`, `company`, `job_title`, `job_description`, `job_salaire`, `date`, `formationreq`, `expreq`, `skillreq`) VALUES
(29, 74, 'informatique', 'OussamaChaouki', 'Stage', 'YTRIKUHJYT', 4554, '2023-03-20', '3', 22, 'FD'),
(30, 74, 'informatique', 'OussamaChaouki', 'Stage', 'fdsfhgghghf', 144, '2023-03-20', '...', 47, 'sql'),
(31, 88, 'informatique', 'OussamaChaouki', 'Stage', 'dfvghnkjl', 2010, '2023-03-21', '4', 12, 'sql');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `user_id`, `language`) VALUES
(0, 70, 'anglais'),
(0, 81, 'anglais,français'),
(0, 82, 'anglais,français'),
(0, 90, 'anglais,espagnol,français'),
(0, 100, 'anglais,espagnol,français');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `rec_id` int(50) NOT NULL,
  `can_id` int(50) NOT NULL,
  `message` text NOT NULL,
  `receive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `rec_id`, `can_id`, `message`, `receive`) VALUES
(265, 74, 70, 'Your candidature has been accepted', 1),
(266, 74, 70, 'Your candidature has been accepted', 1),
(267, 74, 70, 'Your candidature has been accepted', 1),
(268, 74, 70, 'Your candidature has been accepted', 1),
(269, 74, 70, 'Your candidature has been accepted', 1),
(270, 74, 70, 'Your candidature has been accepted', 1),
(271, 74, 70, 'Your candidature has been accepted', 1),
(272, 74, 70, 'Your candidature has been accepted', 1),
(273, 74, 70, 'malheureusement j ai déjà la liste complète', 1),
(274, 74, 70, 'dsqsddsq', 0),
(275, 74, 70, 'dssddsds', 0),
(276, 74, 70, 'dfsfdff', 0),
(277, 74, 73, 'hjhh', 1),
(278, 74, 70, 'Your candidature has been accepted', 1),
(279, 74, 80, 'hjhh', 1),
(280, 74, 80, 'fgfchvjklm', 1),
(281, 77, 70, 'hjhh', 0),
(282, 75, 70, 'cv', 0),
(283, 74, 70, 'HI', 0),
(284, 74, 70, 'HHHI', 1),
(285, 74, 70, 'DDD', 1),
(286, 74, 70, 'VVV', 1),
(287, 74, 70, 'HGHGG', 1),
(288, 74, 70, 'HELLO', 0),
(289, 74, 70, 'HIII', 0),
(290, 74, 70, 'LETTT', 1),
(291, 88, 89, 'HELLO', 1),
(292, 74, 70, 'Your candidature has been accepted', 1),
(293, 74, 89, 'Your candidature has been accepted', 1),
(294, 74, 70, 'Your candidature has been accepted', 1),
(295, 74, 70, 'Your candidature has been accepted', 1),
(296, 74, 70, 'Your candidature has been accepted', 1),
(297, 74, 89, 'Your candidature has been accepted', 1),
(298, 74, 89, 'Your candidature has been accepted', 1),
(299, 74, 89, 'Your candidature has been accepted', 1),
(300, 74, 89, 'Your candidature has been accepted', 1),
(301, 74, 89, 'Your candidature has been accepted', 1),
(302, 74, 70, 'Your candidature has been accepted', 1),
(303, 74, 70, 'Your candidature has been accepted', 1),
(304, 74, 70, 'gjhjhjhgjhg', 0),
(305, 74, 90, 'jhh', 0),
(306, 74, 90, 'Your candidature has been accepted', 1),
(307, 74, 90, 'Your candidature has been accepted', 1),
(308, 74, 90, 'Your candidature has been accepted', 1),
(309, 74, 90, 'Your candidature has been accepted', 1),
(310, 74, 90, 'Your candidature has been accepted', 1),
(311, 74, 90, 'Your candidature has been accepted', 1),
(312, 74, 90, 'Your candidature has been rejected', 1),
(313, 74, 100, 'heello', 0),
(314, 74, 100, 'Your candidature has been accepted', 1),
(315, 74, 100, 'Your candidature has been rejected', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recruters`
--

CREATE TABLE `recruters` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(250) NOT NULL,
  `re_password` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `activation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recruters`
--

INSERT INTO `recruters` (`id`, `username`, `email`, `password`, `re_password`, `name`, `status`, `activation`) VALUES
(74, 'dsssd', 'dsssd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(75, 'oussamach', 'oussam1chaouki@gmail.com', '5a0d8e3086932a1c66114dfee918823d', '5a0d8e3086932a1c66114dfee918823d', 'oussamach', 1, 1),
(76, 'oussamachaaouki', 'dsssd1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'oussamach', 1, 1),
(77, 'oussamachaaouki1', 'dsssd12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'oussamach', 1, 1),
(78, 'AD', 'dsssd263@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(79, 'khadija', 'khadija37@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'khadija', 1, 1),
(80, 'oussama11chaouki', 'oussa11chaouki@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(81, 'OUSSAMAO', 'OUSSAM1CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'DFVBJ', 1, 1),
(82, 'OUSSAMAA', 'SSAMA11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(83, 'adminoussama', 'OUSSAMCHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(84, 'oussamapp', 'OUSA11CHAOUKI@GMAIL.', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(85, 'OUSSAMACHAOUKISSS', 'OUSSAMA11CHAOUKI@GMAIL.COMS', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(86, 'FFFFF', 'OUGGGSSAMA11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(87, 'oussamffaCHAOUKI', 'OUSSAMA1mm1CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(88, 'oussamachaouki', 'OUSSAMA11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id_skills` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id_skills`, `user_id`, `skill`) VALUES
(77, 80, 'mysql,postgresql,visual,p,gmail,javascript,php,c++,css,c,html,js,java,oracle,sql,r,pr,android,e-commerce,front-end,math'),
(80, 77, 'mysql,php,c++,css,c,shell,html,js,linux,java,sql,telecom,email'),
(86, 81, 'p,eve,gmail,javascript,php,c++,css,c,html,js,design,java,oracle,sql,r,pr,cad,lan,html5'),
(153, 70, 'p,gmail,c++,c,word,excel,marketing,access,microsoft office,r,pr,lan,international'),
(155, 82, 'mysql,php,c++,css,c,shell,html,js,website,linux,java,sql,telecom,email'),
(156, 85, 'mysql,python,django,javascript,php,ruby,css,html,js,front-end'),
(161, 90, 'mysql,php,c++,css,c,shell,html,js,website,linux,java,sql,telecom,email'),
(162, 100, 'click,mysql,php,c++,css,c,shell,html,js,linux,java,sql,industry experience,twitter,telecom,email');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(250) NOT NULL,
  `re_password` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `activation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `re_password`, `name`, `status`, `activation`) VALUES
(65, 'hichamD', 'hicham@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '81dc9bdb52d04dc20036dbd8313ed055', 'hamza', 1, 1),
(66, 'hicham', 'hicham@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'hamza', 1, 1),
(67, 'sbvsd', 'hicham@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'hciahm', 1, 1),
(68, 'yaml', 'yaml@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'hamza', 1, 1),
(69, 'yam', 'yaml$@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'hamz$', 1, 1),
(70, 'dsssd', 'f@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'fdsfd', 0, 1),
(71, 'dsss', 'dsssd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(72, 'dsssdS', 'OU@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'y', 1, 1),
(73, 'oussama11chaouki', 'dsssd1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(74, 'dsssd1', 'dsssd2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(75, 'anass', 'anass@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'anass', 1, 1),
(76, 'cc', 'cc@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'y', 1, 1),
(77, 'Admin', 'dsss5d@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(78, 'Admin1', 'dsssd263@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(79, 'AD', 'AD@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(80, 'Admin3', 'OUSSAMAD11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(81, 'trrtr', 'OUSSAMAg11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(82, 'MAKHTARI', 'IKRAMMAKHTARI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'IKRAM', 1, 1),
(84, 'oussama89', 'OUSSAMA14CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OUSSAMA', 1, 0),
(85, 'OUSSAMA99', 'OUSSAMA1CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OUSSAMA', 1, 0),
(86, 'oussama900', 'OUSSAM1CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 0),
(88, 'oussamap', 'OUSSAMACHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(89, 'oussachaouki', 'OUSSAM1CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'oussama', 1, 1),
(90, 'oussamchaoukiss', 'OUSSAMACHAUKI@GMAIL.COM', 'd7a84628c025d30f7b2c52c958767e76', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1),
(91, 'oussahaouki', 'OUSSAMA1AOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 0),
(92, 'oussddamachaouki', 'OUSSAMA11CHdddAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 0),
(93, 'oussamachaoukiDD', 'OUSSAMA11CHAODDUKI@GMAIL.COM', '5a0d8e3086932a1c66114dfee918823d', '5a0d8e3086932a1c66114dfee918823d', 'OussamaChaouki', 1, 1),
(100, 'oussamachaouki', 'OUSSAMA11CHAOUKI@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'OussamaChaouki', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id_candidature`),
  ADD KEY `candidature_FK_1` (`user_id`),
  ADD KEY `fk_foreign_1` (`id_job`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_information`),
  ADD KEY `information_fk_key` (`user_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `jobs_ibfk_1` (`recruter_id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_ibfk_1` (`rec_id`),
  ADD KEY `can_id` (`can_id`);

--
-- Index pour la table `recruters`
--
ALTER TABLE `recruters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skills`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id_candidature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=774;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_information` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT pour la table `recruters`
--
ALTER TABLE `recruters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_FK_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_foreign_1` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_foreign_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_foreign_3` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`) ON DELETE CASCADE;

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `recruters` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_fk_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`recruter_id`) REFERENCES `recruters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`rec_id`) REFERENCES `recruters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`can_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
