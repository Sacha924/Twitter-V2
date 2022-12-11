-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 déc. 2022 à 17:11
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web_dev_fin_a4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_ID`, `comment`, `comment_author`, `date`) VALUES
(1, 5, 7, 'joli post', 'Sacha', '2022-12-11 14:04:18'),
(2, 1, 4, 'good to know\r\n', 'Sacha', '2022-12-11 14:04:41');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `user_ID`, `post_content`, `upload_image`, `post_date`) VALUES
(1, 4, 'i&#039;m happy !', '', '2022-12-10 11:21:06'),
(2, 4, 'No', 'ohma.jpg.65257', '2022-12-10 11:49:11'),
(3, 6, 'J&#039;ai fait le 1er post, c&#039;est moi Sacha', '', '2022-12-10 12:01:22'),
(4, 7, 'moi c&#039;est antoinou', 'antoine_bad_boy.jpg.55661', '2022-12-10 12:02:52'),
(5, 7, 'j&#039;aime post&eacute; !', '', '2022-12-10 12:07:16'),
(6, 6, 'Hey whatsup', '', '2022-12-11 14:04:51');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `relationship` text NOT NULL,
  `profil_picture` varchar(255) NOT NULL,
  `cover_picture` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_ID`, `f_name`, `l_name`, `username`, `email`, `password`, `biography`, `relationship`, `profil_picture`, `cover_picture`, `reg_date`, `posts`) VALUES
(1, 'jean', 'j', 'a', 'e@gmail.com', 'aaaaaaaaa', 'a', '', 'default_profile.png', 'default_cover.png', '2022-11-10 19:40:47', 'no'),
(4, 'a', 'a', 'test', 'afzedsd@gmail.com', 'azertyuiop', 'Welcome on my profile, this is my default status !', '.', 'cosmos.PNG.96724', 'default_cover.png', '2022-11-10 22:59:47', 'yes'),
(5, 'aze', 'azerty', 'testv2', 'bonjourno@outlook.fr', 'azertyuiop', 'Welcome on my profile, this is my default status !', '.', 'default_profile.png', 'default_cover.png', '2022-11-10 23:02:13', 'no'),
(6, 'Sacha', 'Simon', 'Sacha', 'sacha@gmail.com', 'AAAAAAAA', 'Welcome on my profile, this is my default status ! How are you', 'Single', 'default_profile.png', 'default_cover.png', '2022-12-10 12:00:49', 'yes'),
(7, 'Antoine', 'Siuu', 'Antoinito', 'antoine@gmail.com', 'aaaaaaaa', 'Welcome on my profile, this is my default status !', '.', 'default_profile.png', 'default_cover.png', '2022-12-10 12:02:12', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(1, 1, 6, 'bonjour', '2022-12-11 14:14:18', 'no'),
(2, 1, 6, '&ccedil;a va', '2022-12-11 14:14:29', 'no'),
(3, 1, 6, 'yo', '2022-12-11 14:24:15', 'no'),
(4, 6, 7, 'coucou je suis fan', '2022-12-11 14:25:15', 'no'),
(5, 6, 7, 'coucou je suis fan', '2022-12-11 14:25:18', 'no'),
(6, 1, 7, 'test', '2022-12-11 14:26:21', 'no'),
(7, 1, 7, 'test', '2022-12-11 14:26:23', 'no'),
(8, 1, 7, 'test', '2022-12-11 14:26:31', 'no'),
(9, 1, 7, 'test', '2022-12-11 14:26:33', 'no'),
(10, 1, 7, 'test', '2022-12-11 14:26:37', 'no');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- Index pour la table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
