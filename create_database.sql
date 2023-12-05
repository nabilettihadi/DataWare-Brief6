CREATE DATABASE IF NOT EXISTS Brief6;

USE Brief6;

CREATE TABLE `equipes` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `Name_equipe` varchar(255) NOT NULL,
  `scrum_master_id` int(11) DEFAULT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`id_equipe`),
  KEY `scrum_master_id` (`scrum_master_id`),
  KEY `membre_id` (`membre_id`),
  CONSTRAINT `equipes_ibfk_1` FOREIGN KEY (`scrum_master_id`) REFERENCES `users` (`id_user`),
  CONSTRAINT `equipes_ibfk_2` FOREIGN KEY (`membre_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `projets` (
  `id_projets` int(11) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(255) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `scrum_master_id` int(11) DEFAULT NULL,
  `status_projet` varchar(50) NOT NULL DEFAULT 'en cours',
  `date_fin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_projets`),
  KEY `equipe_id` (`equipe_id`),
  KEY `scrum_master_id` (`scrum_master_id`),
  CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id_equipe`),
  CONSTRAINT `projets_ibfk_2` FOREIGN KEY (`scrum_master_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','product_owner','scrum_master') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `projets` (`id_projets`, `nom_projet`, `date_debut`, `equipe_id`, `scrum_master_id`, `status_projet`, `date_fin`) VALUES
(1, 'Brief6', '2023-11-28', NULL, NULL, 'finalisée', '2023-12-08');


INSERT INTO `users` (`id_user`, `First_name`, `Last_name`, `email`, `password`, `role`) VALUES
(1, 'Nabil', 'Ettihadi', 'nabil@gmail.com', 'nabil@123', 'product_owner'),
(2, 'Ahmed', 'Karim', 'ahmed@gmail.com', 'ahmed@123', 'scrum_master'),
(3, 'Sami', 'Berrada', 'sami@gmail.com', 'sami@123', 'user'),
(4, 'Amine', 'Hatimi', 'amine@gmail.com', 'amine@123', 'user');
