-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 29 jan. 2021 à 17:06
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TP_commentaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1 : Un dimanche soir en Alaska', '<p><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Quelques barques bancales pos&eacute;es sur un monde en sursis. Aux confins de l\'Am&eacute;rique et des glaces, le petit village indig&egrave;ne de Salmon Bay vit ses derniers instants.</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px; background-color: #ffffff;\" /><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Bient&ocirc;t, le littoral c&eacute;dera, la baie l\'engloutira.</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px; background-color: #ffffff;\" /><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">En attendant la barge charg&eacute;e de les mener au nouveau site, les habitants disent adieu &agrave; la terre &ndash; cette terre o&ugrave; plane l\'esprit des anc&ecirc;tres, cette boue o&ugrave; les petites filles dessinent des histoires ... Adieu &agrave; la toundra pel&eacute;e, &agrave; la station de radio locale o&ugrave; Jo-Jo, le DJ, passe sans fin des vieux disques, aux chemins de planches et aux m&eacute;lop&eacute;es yupik ... Tyler, le premier esquimau de la plan&egrave;te allergique au froid, Dennis dit &laquo;l\'Embrouille&raquo;, Angelic, Panika, Josh, Junior et les autres &ndash; tous sentent pourtant que Salmon Bay n\'a pas dit son dernier mot.</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px; background-color: #ffffff;\" /><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Avant la grande travers&eacute;e, pour le meilleur peut-&ecirc;tre, le village leur r&eacute;serve un cataclysmique chant du d&eacute;part</span></p>', '2020-10-07 11:11:50'),
(2, 'Chapitre 2 : Le garçon dans la neige', '<p><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Certains secrets ne peuvent rester enfouis &agrave; jamais?Edie Kiglatuk a quitt&eacute; son &icirc;le d\'Ellesmere pour venir &agrave; Anchorage, en Alaska, o&ugrave; se d&eacute;roule une course de tra&icirc;neaux &agrave; laquelle participe son ex-mari, Sammy. Alors qu\'elle se prom&egrave;ne en for&ecirc;t, Edie fait une d&eacute;couverte macabre : le cadavre d\'un nouveau-n&eacute;, cach&eacute; dans une minuscule cabane. L?inspecteur Truro est charg&eacute; de l?affaire. Pour lui, cela ne fait aucun doute : les coupables de ce meurtre appartiennent &agrave; une communaut&eacute; ferm&eacute;e baptis&eacute;e les &laquo; Old Believers &raquo;, qu\'il soup&ccedil;onne de pratiques satanistes. Chuck Hillingberg, maire d\'Anchorage et aspirant au si&egrave;ge de gouverneur, met tout en ?uvre pour que le dossier soit enterr&eacute; au plus vite. Mais Edie n\'est pas convaincue par cette piste, d\'autant qu\'un deuxi&egrave;me b&eacute;b&eacute; est retrouv&eacute; mort alors que le principal suspect est retenu en prison. Avec l\'aide de son ami Derek, policier, elle d&eacute;cide de mener sa propre enqu&ecirc;te?</span></p>', '2020-10-10 11:11:50'),
(3, 'Chapitre 4 : Aucun homme ni de dieu', '<p><span style=\"color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px; background-color: #ffffff;\">\"<em>Le premier enfant disparut alors qu\'il tirait sa luge sur les hauteurs du village. Sans un bruit - nul cri, d\'homme ou de loup, pour t&eacute;moin.</em>\" Quand Russell Core arrive dans le village de Keelut, la lettre de Medora Slone soigneusement pli&eacute;e dans la poche de sa veste, il se sent &eacute;pi&eacute;. Dans la cabane des Slone, il &eacute;coute l\'histoire de Medora : les loups descendus des collines, la disparition de son fils unique, la rage et l\'impuissance. Aux premi&egrave;res lueurs de l\'aube, Core s\'enfonce dans la toundra glac&eacute;e &agrave; la poursuite de la meute.</span></p>', '2020-11-27 11:36:24'),
(6, 'Chapitre 3 : Paradis blanc', '<p><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Quand Ernt rentre du Vietnam, Leni, dix ans, ne reconna&icirc;t pas son p&egrave;re. Poursuivi par de terribles cauchemars, il se montre violent envers sa femme Cora. Un jour, il re&ccedil;oit une lettre du p&egrave;re d\'un de ses amis, mort dans ses bras durant cet enfer, qui lui l&egrave;gue une masure en Alaska. Ernt pense qu\'il pourra s\'y reconstruire. Avant la guerre, ils &eacute;taient si heureux...</span><br style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px; background-color: #ffffff;\" /><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">&laquo; Quelqu\'un m\'a dit un jour que l\'Alaska ne forgeait pas le caract&egrave;re, elle le r&eacute;v&eacute;lait. La triste v&eacute;rit&eacute;, c\'est que l\'obscurit&eacute; qui peut r&eacute;gner en Alaska a r&eacute;v&eacute;l&eacute; le c&ocirc;t&eacute; obscur de mon p&egrave;re. Il &eacute;tait v&eacute;t&eacute;ran du Vietnam, ancien prisonnier de guerre. Nous ne savions pas alors tout ce que cela signifiait. Maintenant, nous le savons. &raquo;</span></p>', '2020-11-25 00:00:00'),
(11, 'Chapitre 5 : La fille de l\'hiver', '<p><span style=\"background-color: #ffffff; color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px;\">Depuis la <strong>mort</strong> de leur b&eacute;b&eacute;, le <strong>mariage</strong> de Mabel et Jack n\'a plus jamais &eacute;t&eacute; le m&ecirc;me. Partir vivre sur ces terres inhospitali&egrave;res paraissait alors une bonne id&eacute;e. Seulement, le <strong>chagrin</strong> et le <strong>d&eacute;sir</strong> d\'enfant les ont suivis l&agrave;-bas et la rudesse du climat, le travail &eacute;reintant aux champs les enferment chacun dans leur <strong>douleur</strong>.</span><br style=\"background-color: #ffffff; margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px;\" /><br style=\"background-color: #ffffff; margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px;\" /><span style=\"background-color: #ffffff; color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px;\">Jusqu\'&agrave; ce soir de d&eacute;but d\'hiver o&ugrave;, dans un moment d\'insouciance, le couple sculpte un bonhomme de neige &agrave; qui ils donnent les traits d\'une petite fille. Le lendemain matin, celui-ci a fondu et de minuscules empreintes de pas partent en direction de la for&ecirc;t&hellip;</span><br style=\"background-color: #ffffff; margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px;\" /><br style=\"background-color: #ffffff; margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: auto; -webkit-font-smoothing: antialiased; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: #1b1b1b; font-family: \'Roboto Slab\', serif; font-size: 14.56px;\" /><span style=\"background-color: #ffffff; color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px;\">Peu de temps apr&egrave;s, une petite fille appara&icirc;t pr&egrave;s de leur cabane, parfois suivie d\'un renard roux tout aussi farouche qu\'elle. Qui est-elle ? D\'o&ugrave; vient-elle ? Est-elle une hallucination ou un miracle ? Et si cette petite fille &eacute;tait la cl&eacute; de ce bonheur qu\'ils n\'attendaient plus ?</span></p>', '2021-01-26 17:21:46'),
(12, 'Chapitre 6 : La grand marin', '<p><span style=\"color: #1b1b1b; font-family: arial, helvetica, sans-serif; font-size: 14.56px; background-color: #ffffff;\">Quand Lili Colt arrive &agrave; Kodiak, un port de l\'Alaska, elle sait qu\'elle va enfin r&eacute;aliser son r&ecirc;ve : s\'embarquer sur un de ces bateaux qui partent p&ecirc;cher au loin. Pour la jeune femme, une runaway qui a fui jadis le confort d\'une famille fran&ccedil;aise pour \" faire la route \" , la v&eacute;ritable aventure commence. Le choc est brutal. Il lui faut dormir &agrave; m&ecirc;me le pont dans le froid insupportable, l\'humidit&eacute; permanente et le sel qui ronge la peau, la fatigue, les blessures...Seule femme au milieu de ces hommes rudes, au verbe rare et au geste pr&eacute;cis qui finiront par l\'adopter. A terre, Lili partage la vie des marins -les bars, les clubs de strip-tease, les motels miteux. Quand elle tombe amoureuse du \" Grand marin \" , elle sait qu\'il lui faudra choisir entre sa propre libert&eacute; et son attirance pour cet homme dont la fragilit&eacute; la bouleverse.</span></p>', '2021-01-29 17:44:41'),
(13, 'Chapitre 7 : Qui es-tu Alaska ?', '<p><span style=\"color: #236fa1; font-family: \'Roboto Slab\', serif; background-color: #ffffff;\">Miles Halter a seize ans et n\'a pas l\'impression d\'avoir v&eacute;cu. Assoiff&eacute; d\'exp&eacute;riences, il d&eacute;cide de quitter le petit cocon familial pour partir loin, en Alabama au pensionnat de Culver Creek. Ce sera le lieu de tous les possibles, du Grand Peut Etre. Et de toutes les premi&egrave;res fois. C\'est l&agrave; aussi, qu\'il rencontre Alaska. La troublante, l\'insaisissable et insoumise, dr&ocirc;le, intelligente et follement sexy, Alaska Young.</span></p>', '2021-01-29 17:45:40');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `post_id`, `author`, `comment`, `comment_date`, `report`) VALUES
(2, 1, 2, 'Trop génial ce blog !', '2020-10-21 16:20:15', 1),
(4, 1, 3, 'J\'adore ce blog', '2020-10-26 11:34:03', 1),
(5, 2, 3, 'Je suis nouvelle', '2020-10-26 16:41:40', 1),
(9, 2, 5, 'Super billet <!-- ', '2020-12-18 13:18:26', 0),
(10, 10, 5, 'Une pépite !', '2021-01-05 17:07:28', 0),
(11, 9, 6, 'Que d\'émotions ! Un chef-d\'oeuvre ', '2021-01-05 17:15:22', 0),
(12, 10, 6, 'Trépidant ce billet. Hate de découvrir la suite', '2021-01-07 11:26:21', 0),
(13, 1, 7, 'Insulte***', '2021-01-07 11:49:59', 1),
(14, 6, 7, 'Ce billet se lit tout seul. Le suspense s\'installe et reste bien présent jusqu\'au bout.. ou presque.', '2021-01-07 11:52:23', 0),
(15, 9, 7, 'Hello Lise10 je suis d\'accord avec toi ', '2021-01-07 11:53:13', 0),
(16, 6, 8, 'C\'est une déception. Une immense déception. Mais j\'ose espérer que ce n\'est que mon avis.\r\nJe me suis ennuyée du début à la fin.', '2021-01-07 11:56:17', 0),
(17, 3, 9, 'Très mitigée, une fois de plus, et ça fait quelque années que je n\'arrive plus à retrouver le Jean Forteroche qui me faisait oublié tout le reste ', '2021-01-07 12:00:54', 0),
(18, 10, 9, 'Ce billet est, à mon gout, bien meilleur. Ravis', '2021-01-07 12:01:59', 0),
(19, 10, 1, '<p><strong>Top</strong></p>', '2021-01-26 16:13:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `admin`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 0, 'viovio8', '$2y$10$iZT2Y.1TGWwmnfkO.OINnO4IO0QEwwP1y8dqBrXY0YIzU1rFOsE1O', 'violette08@hotmail.fr', '2020-11-10'),
(3, 0, 'Canelle04', '$2y$10$SLEnRk08GE3N7ASATYa5Y.zx3LoU97hdYrmUPPLluPJOUZHxaFZ1e', 'canelle@hotmail.fr', '2020-11-13'),
(4, 1, 'administrateur', '$2y$10$IGCMp65jWGQGTdIyK7BFyuAHOVZOxtL1poOw5.jqHUQjZ9vXEw7BW', 'violette.danjou@hotmail.fr', '2020-11-16'),
(6, 0, 'Lise10', '$2y$10$GFqcpNy08d0o9IVzi69njuIwLCVu0rWIJxXqzE4Kx3Hq1r0.bH3Ei', 'lili10@free.fr', '2021-01-05'),
(7, 0, 'cece20', '$2y$10$YUH3n20l.rflfEN.Tzxvj.7AZHTxe3IV5yYSxkB4FehcVxVmCNFuC', 'cece20@outlook.fr', '2021-01-07'),
(8, 0, 'phi24', '$2y$10$sKW7lBMDLl39EAr534HMg.8hsz0S6rFx8p84dd/co4CDt0rvbcffO', 'phi24@hotmail.com', '2021-01-07'),
(9, 0, 'justine15', '$2y$10$iHFS6R.zyy8R55ovqzyP..PACywrUrWeEvEoy5LJn66E7cIgCz9Ii', 'justine15@gmail.com', '2021-01-07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
