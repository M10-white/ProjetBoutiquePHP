-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 déc. 2023 à 11:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique_telephone`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp(),
  `payer` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date_commande`, `payer`) VALUES
(1, '2023-12-05 08:43:21', 'OK'),
(2, '2023-12-04 08:44:40', 'OK'),
(3, '2023-12-04 08:30:40', 'KO'),
(14, '0000-00-00 00:00:00', 'OK');

-- --------------------------------------------------------

--
-- Structure de la table `contenue`
--

CREATE TABLE `contenue` (
  `clients_id` int(11) DEFAULT NULL,
  `produits_id` int(11) NOT NULL,
  `quantité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contenue`
--

INSERT INTO `contenue` (`clients_id`, `produits_id`, `quantité`) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(6, 1, 0),
(7, 1, 0),
(8, 1, 0),
(9, 1, 0),
(10, 1, 0),
(11, 1, 0),
(12, 1, 0),
(13, 1, 0),
(14, 1, 0),
(15, 1, 0),
(16, 1, 0),
(17, 1, 0),
(18, 1, 0),
(20, 1, 0),
(21, 1, 0),
(22, 1, 0),
(NULL, 1, 0),
(14, 8, 4),
(14, 7, 1),
(14, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `contenue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `contenue_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(20, 20),
(21, 21),
(22, 22);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `img`, `price`, `promotion`, `name`) VALUES
(4, 'iph13.png', 900, 850, 'iPhone 13 Pro'),
(5, 'Zfold.jpg', 800, 724, 'Samsung Galaxy Z Fold 3'),
(6, 'pixel6.png', 200, 168, 'Google Pixel 6 Pro');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(50) NOT NULL,
  `NOM_PRODUIT` varchar(255) NOT NULL,
  `DESCRIPTION_PRODUIT` varchar(255) NOT NULL,
  `PRIX_PRODUIT` int(50) NOT NULL,
  `STOCK_PRODUIT` int(50) NOT NULL,
  `MARQUE_TEL` varchar(10) NOT NULL,
  `MODELE_TEL` varchar(100) NOT NULL,
  `CARACTERISTIQUE_TEL` varchar(100) NOT NULL,
  `URL_IMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `NOM_PRODUIT`, `DESCRIPTION_PRODUIT`, `PRIX_PRODUIT`, `STOCK_PRODUIT`, `MARQUE_TEL`, `MODELE_TEL`, `CARACTERISTIQUE_TEL`, `URL_IMAGE`) VALUES
(1, 'iPhone 13 Pro', 'Le dernier smartphone phare d\'Apple avec une caméra triple, un écran Super Retina XDR et une puce A15 Bionic.\r\n', 1099, 500, 'iPhone', 'A2649', 'Caméra ultra grand-angle, mode nuit amélioré.\r\n', 'https://proxymedia.woopic.com/api/v1/images/1618%2Fedithor%2Fterminaux%2FiPhone_14_Pro_Deep_Purple_PDP_Image_Position-1a__FRFR_6329876d4d67a850e7ca4d2a.jpg?format=480x480&saveas=webp&saveasquality=80'),
(2, 'Samsung Galaxy Z Fold 3\r\n\r\n', 'Un téléphone pliable de Samsung avec un grand écran pliable, stylet S Pen et une performance puissante.', 1799, 300, 'Samsung', 'SM-F926U', 'Écran pliable Dynamic AMOLED 2X.', 'https://images.samsung.com/is/image/samsung/fr-feature-galaxy-z-fold3-5g-494412212?$FB_TYPE_I_JPG$'),
(3, 'Google Pixel 6 Pro\r\n\r\n', ' Le dernier smartphone Google avec une caméra avancée, une puce Tensor personnalisée et Android 12.', 899, 400, 'Google', 'G512B', 'Caméra ultra grand-angle avec capteur de 12 MP.', 'https://m.media-amazon.com/images/I/6191aDbiwjL.jpg'),
(4, 'OnePlus 9\r\n\r\n', 'Un téléphone OnePlus avec un écran fluide AMOLED, une charge rapide et un processeur Snapdragon 888.', 699, 250, 'OnePlus', 'IN2010', 'Charge Warp 65T.', 'https://www.backmarket.fr/cdn-cgi/image/format%3Dauto%2Cquality%3D75%2Cwidth%3D640/https://d2e6ccujb3mkqf.cloudfront.net/13560315-0ad3-4ff2-98f5-7abf613b4a68-1_8b786d91-3fd2-4de9-b3b1-775657f42b04.jpg'),
(5, 'Sony Xperia 1 III\r\n\r\n', 'Un smartphone Sony avec un écran 4K, un appareil photo Zeiss et une prise casque 3,5 mm.', 1199, 150, 'Sony', 'XQ-BC72\r\n', 'Écran OLED 4K HDR.', 'https://www.sony.fr/image/bec37fd1196426136aae242507e874b0?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF'),
(6, 'Xiaomi Mi 11 Ultra', 'Un téléphone Xiaomi avec une caméra triple de 50 MP, un écran AMOLED 2K et un Snapdragon 888.', 1199, 350, 'Xiaomi', 'M2102K1C', 'Écran secondaire à l\'arrière pour les selfies.', 'https://cdn.lesnumeriques.com/optim/product/62/62059/8ca72c64-mi-11-ultra__450_400.jpeg'),
(7, 'LG Velvet\r\n\r\n', 'Un smartphone LG élégant avec un écran OLED, une conception élégante et une caméra polyvalente.', 599, 100, 'LG', 'LM-G900N', 'Caméra principale de 48 MP.', 'https://m.media-amazon.com/images/I/71i+5gVbBsL.jpg'),
(8, 'Motorola Moto G Power (2021)\r\n\r\n', 'Un téléphone Motorola abordable avec une batterie massive de 5 000 mAh et un écran Max Vision.', 199, 700, 'Motorola', 'XT2117-4', 'Autonomie de batterie exceptionnelle.', 'https://fr.moviles.com/fotos/motorola-moto-g-power-2021-88912-g.jpg'),
(9, '8.3 5G', 'Un téléphone Nokia 5G avec un écran PureDisplay, des mises à jour Android garanties et une grande connectivité.', 599, 200, 'Nokia', 'TA-1243', 'Connectivité 5G.', 'https://www.backmarket.fr/cdn-cgi/image/format%3Dauto%2Cquality%3D75%2Cwidth%3D640/https://d2e6ccujb3mkqf.cloudfront.net/743326f0-c0ca-48b6-93da-a6e9463bca6f-1_e3c87b98-55e9-4a47-8805-d732f57d4edd.jpg'),
(10, 'Asus ROG Phone 5', 'Un téléphone gaming d\'Asus avec un écran AMOLED de 144 Hz, des boutons AirTrigger 5 et une puissance de jeu ultime.', 799, 120, 'Asus', 'ZS673KS', 'Écran de jeu avec taux de rafraîchissement élevé.', 'https://www.accessoires-asus.com/infos/image.php?c=MTA0OTc4&w=L2ltYWdlcy9zaXRlcy8xL3dhdGVyLnBuZw%3D%3D&f=em9vbS83ODk0OTYyNjcxMTIuanBn');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `panier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `panier_id`) VALUES
(1, 'matteo.consorti32@gmail.com', 'test', 1),
(2, 'kilian', 'test', 2),
(3, 'oui', 'test', 3),
(4, '', 'test', 4),
(5, 'po', 'test', 5),
(6, 'lui', 'test', 6),
(7, 'aaaa', 'test', 7),
(8, 'zzzzzz', 'test', 8),
(9, 'ppppp', 'test', 9),
(10, 'ouuuuu', 'test', 10),
(11, 'aaaaaaa', 'test', 11),
(12, 'aaaaaaaaaaaaa', 'test', 12),
(13, 'LUII', 'test', 13),
(14, 'test', 'test', 14),
(15, 'moiiiiiiii', 'test', 15),
(16, 'moiiiiiii', 'test', 16),
(17, 'kilian2', 'test', 17),
(18, 'unekjhdsklf', 'test', 18),
(20, 'iouezrayo', 'test', 20),
(21, 'username', 'test', 21),
(22, 'test', 'test', 22);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenue`
--
ALTER TABLE `contenue`
  ADD KEY `contenue_ibfk_1` (`clients_id`) USING BTREE,
  ADD KEY `contenue_ibfk_2` (`produits_id`) USING BTREE;

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panier_ibfk_1` (`contenue_id`) USING BTREE;

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_PRODUIT`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_ibfk_1` (`panier_id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_PRODUIT` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenue`
--
ALTER TABLE `contenue`
  ADD CONSTRAINT `contenue_ibfk_2` FOREIGN KEY (`produits_id`) REFERENCES `produit` (`ID_PRODUIT`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`panier_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `contenue` (`clients_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
