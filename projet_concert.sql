-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 jan. 2024 à 08:22
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_concert`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(255) NOT NULL,
  `url_image_artiste` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url_info_artiste` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom_artiste`, `url_image_artiste`, `url_info_artiste`) VALUES
(2, 'Ninho', 'https://static.qobuz.com/images/artists/covers/medium/3a6fccd702996d59e54c9278cc999c22.jpg', 'https://fr.wikipedia.org/wiki/Ninho'),
(3, 'Damso', 'https://i.pinimg.com/736x/cc/5b/8b/cc5b8b020c7d8a912a8a35b14b64de4d--hiphop-cover-art.jpg', 'https://fr.wikipedia.org/wiki/Damso'),
(4, 'Sexion d\'assaut', 'https://images-na.ssl-images-amazon.com/images/I/81CkW7CewzL._SL1200_.jpg', 'https://fr.wikipedia.org/wiki/Sexion_d%27assaut'),
(5, 'Dr.Peacock', 'https://yt3.ggpht.com/-Z-yaYaoDjUw/AAAAAAAAAAI/AAAAAAAAAAA/ggjDyg7EVyk/s900-c-k-no-mo-rj-c0xffffff/photo.jpg', 'https://fr.wikipedia.org/wiki/Dr._Peacock'),
(7, 'Werenoi', 'https://is1-ssl.mzstatic.com/image/thumb/Music122/v4/9b/9e/ce/9b9ece30-8130-0be9-1980-25d69e9de797/cover.jpg/1200x1200bf-60.jpg', 'https://fr.wikipedia.org/wiki/Werenoi');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

DROP TABLE IF EXISTS `concert`;
CREATE TABLE IF NOT EXISTS `concert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_concert` varchar(255) NOT NULL,
  `date_concert` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `heure` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `salle_concert` int NOT NULL,
  `artiste` int NOT NULL,
  `theme` int NOT NULL,
  `sponsor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salle_concert` (`salle_concert`),
  KEY `artiste` (`artiste`),
  KEY `theme` (`theme`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`id`, `nom_concert`, `date_concert`, `heure`, `url_image`, `salle_concert`, `artiste`, `theme`, `sponsor`) VALUES
(1, 'Trip to Romania', '25/01/2024', '21h00', 'https://content.hardtunes.com/albums/5344/5511/original.jpg', 3, 5, 7, 'Monster, Red bull'),
(2, 'Binks', '23/04/2024', '23h34', 'https://th.bing.com/th/id/R.15952c3f82faf26bb0c8041a1df607d9?rik=S9p0v8yLn91lTg&pid=ImgRaw&r=0', 3, 2, 6, 'apple'),
(3, 'Bing ', '23/10/2024', '23h00', 'https://th.bing.com/th/id/OIP.USw3KhE27hZEvAqDUTSZ-wAAAA?w=400&h=400&rs=1&pid=ImgDetMain', 5, 7, 6, 'HEADN');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  `visiteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom_role`, `visiteur`) VALUES
(1, 'label', ''),
(2, 'salle de concert', '');

-- --------------------------------------------------------

--
-- Structure de la table `salle_concert`
--

DROP TABLE IF EXISTS `salle_concert`;
CREATE TABLE IF NOT EXISTS `salle_concert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_salle` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int NOT NULL,
  `url_image_concert` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle_concert`
--

INSERT INTO `salle_concert` (`id`, `nom_salle`, `ville`, `code_postal`, `url_image_concert`) VALUES
(2, 'Zénith Sud', 'Montpellier', 34000, 'https://www.montpellier3m.fr/sites/default/files/equipements/photos/DSC_0309.JPG'),
(3, 'Gaveau', 'Paris', 93000, 'https://th.bing.com/th/id/OIP.Gtl8XmpSOEf1zXrgaSwW9AHaE8?rs=1&pid=ImgDetMain'),
(5, 'Olympia', 'paris', 94000, 'https://sortir.telerama.fr/sites/tr_master/files/styles/m_plus_640x360/public/assets/images/place/84/54/originale.jpg?itok=SmlzE42N');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `nom_theme`) VALUES
(6, 'Rap'),
(7, 'Techno'),
(8, 'Rock');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`) VALUES
(1, 'bouzekri', 'tayib', 'tayib@gmail.com', 'php', 2),
(3, '', 'antoine', 'antoine@gmail.com', 'gobbe', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`artiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concert_ibfk_2` FOREIGN KEY (`theme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `concert_ibfk_3` FOREIGN KEY (`salle_concert`) REFERENCES `salle_concert` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
