-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 15 déc. 2021 à 12:45
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', '$2y$12$J2ILY6XtpFMK6TPwZJ1Ukub3l7/dJyBgmmiorzYA9X6xutdbQhMgm');

-- --------------------------------------------------------

--
-- Structure de la table `feeds`
--

CREATE TABLE `feeds` (
  `url` varchar(100) NOT NULL,
  `title` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feeds`
--

INSERT INTO `feeds` (`url`, `title`) VALUES
('https://fr.ign.com/feed.xml', 'IGN'),
('https://www.jeuxvideo.com/rss/rss.xml', 'jeuxvideo.com');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `url` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `websiteUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`url`, `title`, `description`, `date`, `websiteUrl`) VALUES
('https://fr.ign.com/alan-wake-ii/57479/news/alan-wake-2-se-fera-avec-les-acteurs-originaux', 'Alan Wake 2 se fera avec les acteurs originaux', '<img src=\"https://sm.ign.com/t/ign_fr/news/a/alan-wake-/alan-wake-2-will-feature-the-original-games-actors_avtg.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nIl faut rester authentique par rapport au premier jeu, pourtant déjà bien ancien.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/arc-raiders/57415/news/arc-raiders-le-nouveau-jeu-cooperatif-des-anciens-developpeurs-de-dice', 'ARC Raiders, le nouveau jeu coopératif des anciens développeurs de Dice', '<img src=\"https://sm.ign.com/t/ign_fr/news/a/arc-raider/arc-raiders-ex-dice-devs-new-game-is-a-co-op-pve-sci-fi-shoo_cv4h.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nFree-to-play et science-fiction.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/assassins-creed-valhalla/57461/news/assassins-creed-valhalla-vous-transforme-en-odin-dans-la-nouvelle-extension-dawn-of-ragnarok', 'Assassin\'s Creed Valhalla vous transforme en Odin dans la nouvelle extension « Dawn of Ragnarok »', '<img src=\"https://sm.ign.com/t/ign_fr/news/a/assassins-/assassins-creed-valhalla-turns-you-into-odin-in-new-expansio_uvdt.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nAssassin&#x27;s Creed Valhalla annonce sa prochaine méga extension.', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/assassins-creed-valhalla/57462/gallery/capture-dassassins-creed-valhalla-dawn-of-ragnarok', 'Capture d\'Assassin\'s Creed Valhalla Dawn of Ragnarok', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/a/assassins-/assassins-creed-valhalla-dawn-of-ragnarok-screenshots_52xs.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />Capture d&#x27;Assassin&#x27;s Creed Valhalla Dawn of Ragnarok', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/avatar-2/57477/news/avatar-2-james-cameron-partage-des-photos-du-tournage', 'Avatar 2 : James Cameron partage des photos du tournage', '<img src=\"https://sm.ign.com/t/ign_fr/news/a/avatar-2-j/avatar-2-james-cameron-shares-set-photos-from-long-awaited-s_hnbm.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nUn premier coup d&#x27;oeil au prochain voyage sur Pandora.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/babylons-fall/57424/news/une-date-tombe-pour-babylons-fall', 'Une date tombe pour Babylon\'s Fall', '<img src=\"https://sm.ign.com/t/ign_fr/news/b/babylons-f/babylons-fall-release-date-announced-requires-constant-inter_jy9t.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />Et un accès (légèrement) anticipé pour les précommandes.\nEt un accès anticipé pour les précommandes.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/doctor-strange-surgeon-supreme/57478/news/doctor-strange-est-mort-marvel-comics-devoile-le-nouveau-sorcier-supreme', 'Doctor Strange est mort, Marvel Comics dévoile le nouveau Sorcier Supreme', '<img src=\"https://sm.ign.com/t/ign_fr/news/d/doctor-str/doctor-strange-is-dead-marvel-comics-reveals-the-new-sorcere_bpe4.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLe nouveau Doctor Strange maintient la tradition familiale.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/dolmen/57311/video/12mn-de-gameplay-sur-la-preview-de-dolmen', 'DOLMEN : les 12 premières minutes sur la preview', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/dolmen-cover_5pmc.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nA-RPG scifi horror au programme d&#x27;un des prochains titres édités par Prime Matter.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/dolmen/57314/preview/preview-dolmen-un-petit-arpg-qui-a-tout-dun-grand', 'Preview Dolmen : un petit ARPG qui a tout d\'un grand', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/dolmen-cover_we7q.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nPrime Matter nous a laissé approcher son titre sci-fi horror exigeant, et c&#x27;est une agréable surprise!', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/final-fantasy-vii-remake-intergrade/57418/news/final-fantasy-7-remake-intergrade-trouve-le-chemin-du-pc', 'Final Fantasy 7 Remake Intergrade trouve le chemin du PC', '<img src=\"https://sm.ign.com/t/ign_fr/news/f/final-fant/final-fantasy-7-remake-intergrade-coming-to-pc_z9ha.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nL&#x27;exclusivité temporaire de 6 mois pour la PS5 s&#x27;achève.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/final-fantasy-vii-remake-intergrade/57465/news/la-configuration-de-final-fantasy-7-remake-intergrade-pour-pc-revelee', 'La configuration de Final Fantasy 7 Remake Intergrade pour PC révélée', '<img src=\"https://sm.ign.com/t/ign_fr/news/f/final-fant/final-fantasy-7-remake-intergrade-pc-system-requirements-rev_24q4.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLe jeu sera lancé sur PC via l&#x27;Epic Games Store le 16 décembre.', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/final-fantasy-vii-remake-intergrade/57466/gallery/final-fantasy-7-remake-intergrade-captures-pc', 'Final Fantasy 7 Remake Intergrade - Captures PC', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/f/final-fant/final-fantasy-7-remake-intergrade-pc-screenshots_yuet.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/forspoken/57452/video/forspoken-4-minutes-de-gameplay-en-video', 'Forspoken - 4 minutes de gameplay en vidéo', '<img src=\"https://sm.ign.com/t/ign_fr/video/f/forspoken-/forspoken-4-minute-gameplay-trailer_9jak.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\n4 minutes du jeu d&#x27;aventure action développé par Luminous Productions chez Square Enix.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/gallery/57416/arc-raiders-screenshots-and-gifs', 'Arc Raiders - Screenshots and GIFs', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/a/arc-raider/arc-raiders-screenshots-and-gifs_vyam.640.gif\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/gallery/57419/ff7-intergrade-gameplay-pc', 'FF7 Intergrade Gameplay PC', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/f/ff7-interg/ff7-intergrade-gameplay-pc_usyg.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/gallery/57423/persona-4-arena-ultimax-screenshot-gallery', 'Persona 4 Arena Ultimax Screenshot Gallery ', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/p/persona-4-/persona-4-arena-ultimax-screenshot-gallery_eujn.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/god-of-war-ragnarok/57413/news/playstation-acquiert-son-5e-studio-de-lannee', 'PlayStation acquiert son 5e studio de l\'année', '<img src=\"https://sm.ign.com/t/ign_fr/news/p/playstatio/playstation-acquires-its-fifth-studio-this-year_jnhk.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nValkyrie Entertainment « aidera au développement de licence clés de PlayStation Studios. »', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/halo-6/57434/news/halo-infinite-recevra-les-playlists-slayer-fiesta-free-for-all-et-swat-la-semaine-prochaine', 'Halo Infinite recevra les playlists Slayer, Fiesta, Free-For-All et SWAT la semaine prochaine', '<img src=\"https://sm.ign.com/t/ign_fr/news/h/halo-infin/halo-infinite-multiplayer-to-get-slayer-fiesta-free-for-all_65c1.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nDes modifications seront également apportées pour rendre les défis moins frustrants.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/halo-6/57480/news/des-joueurs-de-halo-infinite-ont-un-probleme-de-perte-de-sauvegarde', 'Des joueurs de Halo Infinite ont un problème de perte de sauvegarde', '<img src=\"https://sm.ign.com/t/ign_fr/news/s/some-halo-/some-halo-infinite-players-are-suffering-a-save-wiping-glitc_79z8.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLe problème semble provenir d&#x27;une double tentative de connexion pendant le jeu.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/les-animaux-fantastiques-3/57450/trailer/les-animaux-fantastiques-les-secrets-de-dumbledore-se-devoile-dans-un-nouveau-trailer', 'Les Animaux Fantastiques : Les Secrets de Dumbledore se dévoile dans un nouveau trailer', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/dumble_hsew.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLe 3e film de la saga arrive en salles le 7 avril 2022.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/mass-effect-the-series/57458/news/henry-cavill-aimerait-avoir-une-conversation-a-propos-dune-serie-mass-effect', 'Henry Cavill aimerait « avoir une conversation » à propos d\'une série Mass Effect', '<img src=\"https://sm.ign.com/t/ign_fr/news/h/henry-cavi/henry-cavill-would-love-to-have-a-conversation-about-the-mas_8cvu.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nL&#x27;acteur a laissé entendre qu&#x27;il avait un projet Mass Effect plus tôt cette année.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/mega-man-the-movie-theater/57453/news/netflix-aurait-un-film-mega-man-dans-les-tuyaux', 'Netflix aurait un film Mega Man dans les tuyaux', '<img src=\"https://sm.ign.com/t/ign_fr/news/m/mega-man-m/mega-man-movie-in-the-works-at-netflix_u5hp.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />Okkusenman okkusenman !\nDepuis 2018 le projet est toujours vivant.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/movies/57481/news/le-nouveau-makoto-shinkai-your-name-les-enfants-du-temps-se-devoile', 'Le nouveau Makoto Shinkai (Your Name, Les Enfants du Temps) se dévoile', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/laporte_b8av.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />La porte de Suzume est fermée...\nLe prochain film animé du réalisateur japonais est prévu pour l&#x27;automne 2022 au Japon.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/pc/57417/news/les-jeux-google-play-arrivent-sur-pc-en-2022', 'Les jeux Google Play arrivent sur PC en 2022', '<img src=\"https://sm.ign.com/t/ign_fr/news/g/google-pla/google-play-games-brings-mobile-games-to-pc-in-2022_7gh5.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLa plateforme exclusive à Android débarque bientôt sur PC.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/pc/57451/news/les-soldes-dhiver-ont-debute-sur-gog-nos-reco', 'Les Soldes d\'Hiver ont débuté sur GoG, nos reco', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/1920x1080-kv-winter-sale_vtk4.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nCa dure jusqu&#x27;au 3 janvier.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/persona-4-the-ultimax-ultra-suplex-hold/57422/news/persona-4-arena-ultimax-annonce-sur-ps4-switch-et-pc', 'Persona 4 Arena Ultimax annoncé sur PS4, Switch et PC', '<img src=\"https://sm.ign.com/t/ign_fr/news/p/persona-4-/persona-4-arena-ultimax-announced-for-ps4-switch-and-pc_y8b1.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nPersona c&#x27;est aussi de la baston.', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/princesse-dragon/57475/review/critique-princesse-dragon-un-conte-classique-aux-accents-modernes', 'Critique Princesse Dragon : un conte classique aux accents modernes', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/pridra1_ara5.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />Un conte classique aux accents modernes.\nVieux pots, meilleures confitures ! Princesse Dragon est un film d&#x27;animation jeunesse facile à suivre qui utilise avec intelligence les archétypes du conte.', '2021-12-15', 'https://fr.ign.com'),
('https://fr.ign.com/ps5/57448/trailer/les-nouvelles-couleurs-pour-la-dualsense', 'Les nouvelles couleurs pour la DualSense', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/galaxy_t5h9.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nLa date de disponibilité semble fixée au 13 janvier mais cela pourrait être différent pour notre région.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/ps5/57449/news/de-rouge-a-noir-trois-nouvelles-couleurs-pour-la-dualsense-et-des-facades-officielles-de-la-ps5', 'Rose à bleu, trois nouvelles couleurs pour la DualSense et des façades officielles de la PS5', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/galaxy_t5h9.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nC&#x27;est pour bientôt ! Mais pas Noël.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/spider-man-no-way-home/57474/review/critique-spider-man-no-way-home-aucun-spoilers-mais-un-peu-de-frustration', 'Critique Spider-Man No Way Home, aucun spoilers, mais un peu de frustration', '<img src=\"https://sm.ign.com/t/ign_fr/photo/n/new-spider/new-spider-man-no-way-home-trailer-premieres-tomorrow-new-po_81vb.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />Aucun spoilers, mais un peu de frustration.\nAprès un milliard de news sur No Way Home, nous voilà trop hypé face au produit final, mais la faute à qui ?', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/the-batman-1/57463/news/le-trailer-japonais-de-the-batman-devoile-de-nouvelles-images', 'Le trailer japonais de The Batman dévoile de nouvelles images', '<img src=\"https://sm.ign.com/t/ign_fr/news/t/the-batman/the-batman-japanese-trailer-reveals-new-footage_a24z.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nThe Batman pourrait-il retrouver un autre méchant familier ?', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/the-imaginary/57456/news/the-imaginary-le-studio-ponoc-presente-son-prochain-film', 'The Imaginary : le Studio Ponoc présente son prochain film', '<img src=\"https://sm.ign.com/t/ign_fr/screenshot/default/blob_bcfk.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nL&#x27;adaptation d&#x27;un roman sur le monde de l&#x27;imaginaire.', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/the-witcher-4/57441/news/henry-cavill-veut-jouer-dans-une-serie-tele-warhammer', 'Henry Cavill veut jouer dans une série télé Warhammer', '<img src=\"https://sm.ign.com/t/ign_fr/news/h/henry-cavi/henry-cavill-wants-to-be-in-a-warhammer-tv-show_hs94.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nMais pour un personnage 40K ou Fantasy ?', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/the-witcher-4/57442/gallery/the-witcher-season-two-images', 'The Witcher Season Two Images', '<img src=\"https://sm.ign.com/t/ign_fr/gallery/t/the-witche/the-witcher-season-two-images_sp17.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/the-witcher-4/57443/news/the-witcher-lequipe-parle-des-7-saisons-prevues', 'The Witcher : l\'équipe parle des 7 saisons prévues', '<img src=\"https://sm.ign.com/t/ign_fr/news/t/the-witche/the-witchers-cast-talk-the-seven-season-plan_ermh.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\n« Je veux juste m&#x27;assurer qu&#x27;on rende justice aux livres et au personnage. »', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/the-witcher-4/57444/news/henry-cavill-verrait-bien-la-serie-the-witcher-passer-par-toussaint', 'Henry Cavill verrait bien la série The Witcher passer par Toussaint', '<img src=\"https://sm.ign.com/t/ign_fr/news/h/henry-cavi/henry-cavill-would-like-the-witcher-show-to-go-to-toussaint_ahuc.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\n« Toussaint existe dans les livres, et Geralt y a passé du temps. »', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/the-witcher-4/57460/news/the-witcher-saison-2-ign-diffuse-un-qa-dhenry-cavill-avec-un-nouveau-clip-exclusif', 'The Witcher Saison 2 : IGN diffuse un Q&A d\'Henry Cavill, avec un nouveau clip exclusif', '<img src=\"https://sm.ign.com/t/ign_fr/news/t/the-witche/the-witcher-season-2-ign-to-stream-henry-cavill-qa-with-an-e_8us1.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nDécouvrez un aperçu exclusif de la saison 2 de The Witcher sur IGN.', '2021-12-13', 'https://fr.ign.com'),
('https://fr.ign.com/video/57436/les-jeux-google-play-arrivent-sur-pcmp4', 'Les jeux Google Play arrivent sur PC', '<img src=\"https://sm.ign.com/t/ign_fr/video/l/les-jeux-g/les-jeux-google-play-arrivent-sur-pcmp4_fpr6.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />', '2021-12-12', 'https://fr.ign.com'),
('https://fr.ign.com/video/57457/trailer-du-the-imaginary-studio-ponocmp4', 'Trailer du The Imaginary (Studio Ponoc)', '<img src=\"https://sm.ign.com/t/ign_fr/video/t/trailer-du/trailer-du-the-imaginary-studio-ponocmp4_crnt.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nUn premier aperçu de l&#x27;adaptation du roman jeunesse britannique « Amanda et les amis imaginaires » de A.F. Harrold et illustré par Emily Gravett.', '2021-12-14', 'https://fr.ign.com'),
('https://fr.ign.com/video/57469/henry-cavill-is-saving-the-witcher-3-blood-wine-for-christmas-ign-news', 'Henry Cavill is Saving The Witcher 3: Blood & Wine for Christmas - IGN News', '<img src=\"https://sm.ign.com/t/ign_fr/video/h/henry-cavi/henry-cavill-is-saving-the-witcher-3-blood-wine-for-christma_6hce.640.jpg\" width=\"120\" hspace=\"5\" alt=\"\" vspace=\"5\" align=\"left\" />\nHenry Cavill is saving The Witcher 3: Blood & Wine to play it this Christmas. Here&#x27;s what he had to say in our interview.', '2021-12-13', 'https://fr.ign.com'),
('https://www.jeuxvideo.com/news/1500629/le-smartphone-xiaomi-11t-5g-perd-150-avant-noel.htm', 'Le smartphone Xiaomi 11T 5G perd 150€ avant Noël', 'Le smartphone Xiaomi 11T, un Flagship Killer avec un appareil photo de 108 Mpx en promotion livré avant Noël\nAlors qu’on pensait la gamme bien installée et prête à attendre tranquillement 2022 et les Xiaomi 12, le géant chinois a débarqué avec ses grands...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506180/pokemon-diamant-perle-duplication-d-objets-un-nouveau-bug-en-1-1-2-notre-guide.htm', 'Pokémon Diamant / Perle, duplication rapide d\'objets : un nouveau bug en 1.1.2, notre guide', 'Pokémon Diamant Étincelant et Perle Scintillante est sorti depuis presque un mois. Depuis, de très nombreux glitchs et bugs y avaient été trouvés et la mise à jour 1.1.2 y avait été déployée afin de les corriger. Malgré ces mesures, un nouveau glitch...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506346/genshin-impact-arataki-itto-faut-il-l-invoquer-analyse-et-guide.htm', 'Genshin Impact, Arataki Itto : faut-il l\'invoquer ? Analyse et guide', 'Nouveau personnage présenté il y a quelques semaines par MiHoYo, Itto est le personnage\nstar de cette bannière. Et au vu des cadeaux de MiHoYo ces derniers temps,, vous avez peut-être de quoi essayer de l&#039;invoquer. Mérite t-il vos primo-gemmes ? Comment...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506398/dr-disrespect-lance-son-studio-aaa-avec-d-anciens-developpeurs-de-halo-et-de-call-of-duty.htm', 'Dr Disrespect lance son studio AAA avec d\'anciens développeurs de Halo et de Call of Duty', 'La vidéo en en-tête est la bande-annonce de Call of Duty : Modern Warfare 3, publiée le 17 avril 2012.\nDr Disrespect retourne à la case départ\nGuy Beahm, bien plus connu sous le nom de Dr. Disrespect, a lancé hier la création de son studio. S&#039;il était...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506399/genshin-impact-gorou-faut-il-l-invoquer-analyse-et-guide.htm', 'Genshin Impact, Gorou : faut-il l\'invoquer ? Analyse et guide', 'Nouveau personnage présenté il y a quelques semaines par MiHoYo en même temps qu&#039;Itto, Gorou est un personnage 4 étoiles Géo qui peut s&#039;avérer très intéressant si vous aimez cet élément. Alors juste avant de profiter des primo-gemmes offertes par MiHoYo,...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506409/alan-wake-2-dans-la-lignee-de-son-predecesseur-sam-wake-repond.htm', 'Alan Wake 2 dans la lignée de son prédécesseur ? Sam Wake répond ', 'La vidéo en en-tête est la bande-annonce révélant le développement d&#039;Alan Wake 2. Elle a été diffusée aux Game Awards le 10 décembre 2021.\nAlan Wake 2 sur les traces de son aîné\nCinq jours après un aller-retour au Microsoft Theater de Los Angeles où son...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506419/la-decision-de-xbox-qui-leur-a-coute-cher.htm', 'La décision de Xbox qui leur a coûté cher', 'GTA 3 : la révolution dans l&#039;indutrie vidéoludique\nSi maintenant, on n&#039;a plus besoin de présenter la licence Grand Theft Auto, c&#039;est que GTA 3 a révolutionné toute l&#039;industrie vidéoludique et du possible. Le jeu est passé d&#039;une animation 2D à 3D ce qui...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506422/rocket-league-sideswipe-comment-faire-apparaitre-le-bouton-cache-de-saut-boost.htm', 'Rocket League SideSwipe : Comment faire apparaitre le bouton caché de saut + boost ? ', 'Comment ajouter le bouton saut + boost dans Rocket League SideSwipe ?\nQuand vous allez faire le tutoriel, vous allez avoir la présentation des différents boutons accessibles sur Rocket League SideSwipe et cela ne sera pas bien compliqué puisqu&#039;en plus...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506430/le-macbook-air-2020-avec-puce-m1-est-disponible-a-moins-de-1000-pour-noel.htm', 'Le MacBook Air 2020 avec puce M1 est disponible à moins de 1000€ pour Noël !', 'Promo Amazon : moins de 1000€ pour le MacBook Air M1\nJamais un Macbook Air n&#039;aura autant ressemblé à un Macbook Pro. D&#039;un côté, le Pro s&#039;est grandement affiné et ne diffère de son petit frère que par son système de refroidissement et son autonomie augmentée,...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506440/bully-2-censee-etre-annulee-la-suite-du-jeu-de-rockstar-gta-serait-en-developpement.htm', 'Bully 2 :  censée être annulée, la suite du jeu de Rockstar (GTA) serait en développement', 'C&#039;est reparti pour un tour\nJamais officiellement annoncée, potentiellement annulée… Le deuxième épisode de Bully fait parler de lui de temps à autre. Aujourd’hui, c’est le leaker d’informations Tom Henderson qui évoque la franchise de Rockstar. C&#039;est...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506441/rayman-origins-gratuit-chez-ubisoft-retrouvez-notre-soluce-et-nos-guides.htm', 'Rayman Origins gratuit chez Ubisoft : retrouvez notre soluce et nos guides', 'Du 14 au 22 décembre 2021, les fans de la licence haute en couleur d&#039;Ubisoft auront l&#039;occasion de se replonger dans la Croisée des Rêves et aider Rayman à la sauver des cauchemars de Polokus dans Rayman Origins. Le studio français offre le jeu sur son...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506454/the-witcher-saison-2-netflix-date-heure-quand-la-suite-sera-disponible.htm', 'The Witcher saison 2 Netflix : date, heure... quand la suite sera disponible ?', 'La vidéo en en-tête est la bande-annonce officielle de la saison 2 de The Witcher.\nToss a coin to your Witcher\nDéjà connue via les livres de Andrzej Sapkowski   puis via la trilogie vidéoludique du même nom, la franchise The Witcher s&#039;est aussi fait un...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506470/on-connait-la-date-de-presentation-des-prochains-processeurs-amd-ryzen.htm', 'On connait la date de présentation des prochains processeurs AMD Ryzen', 'Le mois de janvier 2022 est en approche et avec lui, une nouvelle édition du CES de Las Vegas, la grand-messe des tendances high-tech de l’année à venir. De nombreux constructeurs de composants informatiques et d’ordinateurs vont profiter de cette occasion...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1506472/iphone-12-mini-pour-noel-a-prix-casse-c-est-possible.htm', 'iPhone 12 Mini pour Noël à prix cassé, c\'est possible', 'L’iPhone Mini à prix mini chez Amazon avec livraison garantie avant Noël\nAlors que le standard semble s’être enfin stabilisé sur des écrans compris entre 6,4 et 6,7 pouces après des années et des années d’expansion, il reste une part non négligeable de...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/test/1503561/ff14-endwalker-une-conclusion-magistrale-pour-l-un-des-meilleurs-final-fantasy.htm', 'FF14 Endwalker : Une conclusion magistrale pour l\'un des meilleurs Final Fantasy ', 'Quel parcours que celui de Final Fantasy XIV. Après un lancement chaotique en 2010, le second MMORPG dans l&#039;univers de Final Fantasy a eu droit à une refonte totale en 2013 pour connaître le succès qu&#039;on lui connaît aujourd&#039;hui. Résultat : après une année...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/1506406/chocobo-gp-le-mario-kart-like-a-la-sauce-final-fantasy-prend-date-sur-switch.htm', 'Chocobo GP : le Mario Kart-like à la sauce Final Fantasy prend date sur Switch !', 'Parmi un catalogue de 12 personnages jouables issus de la franchise culte de Square Enix, vous allez pouvoir faire chauffer le bitume le 10 mars prochain. À la manière d&#039;un Mario Kart classique, des objets spéciaux sont à récupérer au cours de la course,...', '2021-12-15', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/chroniques/1506445/et-si-gta-avait-ete-une-exclue-xbox.htm', 'Et si GTA avait été une exclue Xbox ?', 'Cette année, Xbox va fêter ses 20 ans. Pour célébrer cela comme il se doit, la marque américaine a lancé un documentaire en six épisodes sur les coulisses des différents lancements. Dedans, nous pouvons voir les intervenants se souvenir d&#039;une période...', '2021-12-15', 'https://www.jeuxvideo.com');

-- --------------------------------------------------------

--
-- Structure de la table `newswebsite`
--

CREATE TABLE `newswebsite` (
  `url` varchar(100) NOT NULL,
  `title` varchar(75) NOT NULL,
  `french` tinyint(4) NOT NULL DEFAULT '0',
  `feedsUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newswebsite`
--

INSERT INTO `newswebsite` (`url`, `title`, `french`, `feedsUrl`) VALUES
('https://fr.ign.com', 'IGN France', 0, 'https://fr.ign.com/feed.xml'),
('https://www.jeuxvideo.com', ' jeuxvideo.com', 0, 'https://www.jeuxvideo.com/rss/rss.xml');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`url`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`url`),
  ADD KEY `pk_websiteUrl` (`websiteUrl`);

--
-- Index pour la table `newswebsite`
--
ALTER TABLE `newswebsite`
  ADD PRIMARY KEY (`url`),
  ADD KEY `pk_feedUrl` (`feedsUrl`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `pk_websiteUrl` FOREIGN KEY (`websiteUrl`) REFERENCES `newswebsite` (`url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `newswebsite`
--
ALTER TABLE `newswebsite`
  ADD CONSTRAINT `pk_feedUrl` FOREIGN KEY (`feedsUrl`) REFERENCES `feeds` (`url`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
