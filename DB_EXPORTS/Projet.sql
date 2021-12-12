-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 déc. 2021 à 06:21
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

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

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', '$2y$12$J2ILY6XtpFMK6TPwZJ1Ukub3l7/dJyBgmmiorzYA9X6xutdbQhMgm');

-- --------------------------------------------------------

--
-- Structure de la table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
CREATE TABLE IF NOT EXISTS `feeds` (
  `url` varchar(100) NOT NULL,
  `title` varchar(65) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `feeds`
--

INSERT INTO `feeds` (`url`, `title`) VALUES
('https://www.jeuxvideo.com/rss/rss.xml', 'jeuxvidéo.com');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `websiteUrl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`url`, `title`, `description`, `date`, `websiteUrl`) VALUES
('https://www.jeuxvideo.com/news/1505005/le-meilleur-ecran-pc-du-monde-le-samsung-odyssey-g9-pour-350-de-moins.htm', 'Le meilleur écran PC du monde, le Samsung Odyssey G9, pour 350€ de moins !', 'Promo sur l&#039;écran PC gamer 49 pouces Samsung Odyssey G9 : économisez 350€ sur Amazon\nParler d&#039;un écran comme étant LE meilleur du monde est très engageant. Pourtant, l&#039;expression n&#039;est pas utilisée à tort et à travers, elle est pesée, mesurée et... presque...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505336/spider-man-no-way-home-le-compte-a-rebours-est-lance.htm', 'Spider-Man : No Way Home, le compte à rebours est lancé', 'Marvel et les spoilers : la contre-attaque\nPlus que quatre jours avant la sortie de Spider-Man No Way Home. Le prochain film des productions Marvel a été encadré de manière à limiter le plus possible les potentielles fuites, en réponse à divers leaks...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1497393/pc-kena-deathloop-psychonauts-2-les-meilleures-experiences-solo-de-2021.htm', 'PC : Kena, Deathloop, Psychonauts 2... les meilleures expériences solo de 2', 'Humankind\nAmplitude s&#039;est largement fait connaître avec sa saga Endless, qui a décliné le 4X d&#039;une bien belle manière et qui est parvenu à le rendre (presque) accessible, sans pour autant en négliger la profondeur. Avec Humankind, le studio français revient...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1502454/eve-online-mass-effect-halo-les-meilleurs-jeux-de-science-fiction.htm', 'EVE Online, Mass Effect, Halo... les meilleurs jeux de science fiction', 'EVE Online\nS&#039;il est bien un jeu qui crie un amour sans bornes à l&#039;espace et aux aventures que l&#039;on peut y vivre, c&#039;est bien EVE Online. Avec 18 ans d&#039;existence, le bac à sable de CCP a été le théâtre d&#039;événements incroyables qui dépassent de loin ce que...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505339/game-awards-2021-destiny-2-la-reine-sorciere-nous-eblouit.htm', 'Game Awards 2021 : Destiny 2 La Reine Sorcière nous éblouit', 'Depuis son annonce en août dernier, tous les regards sont tournés vers\nLa Reine Sorcière. Les fans rongent leur frein en attendant son arrivée prévue pour le 22 février 2022, une date composée de nombreuses fois du chiffre 2. Pour un jeu qui s&#039;intitule...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505117/tres-bon-prix-pour-la-carte-graphique-radeon-rx-6600.htm', 'Très bon prix pour la carte graphique Radeon RX 6600', 'La Radeon RX 6600 Core Gaming à moins de 600€ chez Amazon\nCela ne vous aura pas échappé, c’est la panique du côté des cartes graphiques. En effet, avec les pénuries du moment, il est de plus en plus dur de compléter sa configuration avec une carte graphique...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1501579/new-world-nous-voulons-faire-savoir-aux-joueurs-que-nous-les-ecoutons.htm', 'New World : \"Nous voulons faire savoir aux joueurs que nous les écoutons\"', ' JV : New World vient de sortir sa première mise à jour de contenu. Quelle a été la partie la plus difficile dans son développement ?\nScot Lane, Game Director : Publier quoi que ce soit tout en gérant un service en direct est un défi. Cette version était...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505152/idee-cadeaux-de-noel-harry-potter-lego-dvd-accessoires-les-promos-magiques-sont-la.htm', 'Idée cadeaux de Noël Harry Potter : LEGO, DVD, accessoires... les promos ma', 'Harry Potter : une idée cadeau de Noël en or !\nHarry Potter, en France, est synonyme de Noël. Il faut dire que le tout premier film est sorti dans les salles de cinéma début décembre 2001. Ce qui fait que les tous premiers spectateurs, tout juste en âge...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505327/benjo-kazooie-nintendo-64-entre-dans-le-catalogue-du-nintendo-switch-online.htm', 'Banjo-Kazooie Nintendo 64 entre dans le catalogue du Nintendo Switch Online', 'Après l&#039;entrée toute récente de Paper Mario au catalogue du Pack additionnel, le jeu qui avait laissé son empreinte sur Nintendo 64 en 1998, c&#039;est au tour du duo emblématique Banjo et Kazooie d&#039;arriver sur le Nintendo Switch Online. Cet ajout est prévu...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505325/genshin-impact-1600-primo-gemmes-gratuites-a-recuperer-attention-duree-limitee.htm', 'Genshin Impact, 1600 primo-gemmes gratuites à récupérer : attention, durée ', 'Actuellement en version 2.3, Genshin Impact a déjà annoncé\ndeux nouveaux personnages qui arriveront en 2.4. Et forcément, pour les récupérer, avoir un petit bonus côté Primo-gemmes ne serait pas de trop. Et justement, MiHoYo a une bonne nouvelle pour...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/high-tech/tests/test-1504498.htm', 'Test de la chaise Recaro Exo FX : prestation haut de gamme pour jouer penda', 'h4\nC’est à une marque allemande que nous nous intéressons aujourd’hui, un spécialiste du siège qui existe depuis 1906. Recaro est à l’origine connu pour la fabrication de sièges pour voitures, mais étend depuis quelque temps son scope. On peut citer “Recaro...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505322/le-retour-d-un-challenger-realiste-a-star-wars-et-aux-autres-sagas-de-s-f.htm', 'Le retour d\'un challenger \"réaliste\" à Star Wars et aux autres sagas de S-F', 'Nous voici prêts à en découdre avec la dernière saison de la série de science-fiction The Expanse, actuellement diffusée sur Amazon Prime Video. Cette série nous plonge au 23ème siècle, au coeur d&#039;une période futuriste durant maquelle les hommes ont colonisé...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1492028/spider-man-quel-est-le-meilleur-film-sur-l-homme-araignee-avant-la-sortie-de-no-way-home.htm', 'Spider-Man : Quel est le meilleur film sur l\'Homme-Araignée avant la sortie', 'h4\nSpider-Man\nSpider-Man, sorti en 2002, est le premier film de la trilogie de Sam Raimi. Celui-ci met en scène Tobey Maguire dans le rôle de Peter Parker et Kirsten Dunst dans celui de Mary-Jane, sa bien-aimée. Les notes parlent d&#039;elles-mêmes. Avec un...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505287/pas-d-idee-cadeau-pour-noel.htm', 'Pas d’idée cadeau pour Noël ? ', 'La meilleure idée cadeau de Noël est sûrement la plus évidente\nIl peut arriver que l’on se torture l’esprit pour tenter de rentrer dans la tête de ses proches afin de savoir ce qu’ils souhaitent profondement pour Noël. Et parfois, on ne peut que se résoudre...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505317/game-awards-2021-steelrising-la-rencontre-entre-nier-automata-et-l-histoire-de-france.htm', 'Game Awards 2021 : SteelRising, la rencontre entre NieR Automata et l\'Histo', 'SteelRising possède plusieurs particularités qui font que ce titre développé par un studio basé dans la capitale de notre pays se démarque des Action-RPG que l&#039;on a l&#039;habitude de voir. Tout d&#039;abord son contexte, puisque le jeu prend place à Paris au cours...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/preview/1504589/noara-the-conspiracy-tft-et-league-of-legends-n-ont-qu-a-bien-se-tenir.htm', 'Noara The Conspiracy : TFT et League of Legends n’ont qu’à bien se tenir', 'Noara est le projet ultime d’ATYPIQUE Studio… et aussi son premier. Il faut dire qu’en 2017 Jérémy Filali créait ce studio avec une idée bien précise en tête : adapter en jeu l’univers qu’il imagine depuis plus de 16 ans. Suite du livre publié en 2019...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505312/game-awards-2021-genshin-impact-donne-un-apercu-de-la-belle-yun-jin.htm', 'Game Awards 2021 : Genshin Impact donne un aperçu de la belle Yun Jin', 'Lors de cette édition 2021 des Game Awards, Genshin Impact a remporté le prix du Meilleur jeu mobile. Après quoi, nous avons pu visionner une toute nouvelle bande-annonce concernant le jeu d&#039;aventure de MiHoYo, qui mettait en avant Arataki Itto et Gorou,...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505119/game-awards-among-us-vr-trahissez-vos-amis-en-3-dimensions.htm', 'Game Awards : Among Us VR, trahissez vos amis en 3 dimensions', 'InnerSloth surfe sur le succès phénoménal de leur jeu phare, Among Us. Préparez-vous à remplir des tâches avec vos propres mains puisque le jeu sera bientôt disponible en VR, développé par InnerSloth, Robot Teddy et Schell Games.\nAmong Us VR, enfin !\nMême...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505307/game-awards-2021-le-reboot-saints-row-2022-refait-parler-de-lui.htm', 'Game Awards 2021 : Le reboot Saints Row 2022 refait parler de lui', 'Après avoir porté Saints Row IV : Re-Elected sur Switch en mars 2020, puis le remaster du troisième épisode intitulé Saints Row : The Third Remastered en mai de la même année, Deep Silver avait prévu de nous embarquer à nouveau dans les aventures des...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1502368/marvel-naruto-batman-a-qui-profitent-les-collabs-de-fortnite.htm', 'Marvel, Naruto, Batman... À qui profitent les collabs de Fortnite ?', 'Le texte suivant est une retranscription de la vidéo ci-dessus\nKezacolab\nLes collaborations, qu’est-ce que c’est ? Timothee Chalamet et Zendaya faisant la marche du sable dans Fortnite, ce n&#039;est pas arrivé par hasard, du jour au lendemain. Dans l’histoire...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/chroniques/1502369/marvel-naruto-batman-pourquoi-fortnite-devient-le-avengers-de-la-pop-culture.htm', 'Marvel, Naruto, Batman... Pourquoi Fortnite devient le Avengers de la pop c', 'De Marvel à Naruto, en passant par Ariana Grande, il n&#039;est pas difficile de constater qu&#039;Epic Games a plus ou moins toucher à tout pour ses collaborations. Jeu vidéo, cinéma, livres, comics, manga : le nombre d&#039;œuvres venant de ces domaines que le studio...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504995/la-carte-micro-sd-officielle-nintendo-switch-128-go-a-moins-de-30.htm', 'La Carte Micro-SD officielle Nintendo Switch 128 Go à moins de 30€ !', 'Promotion Amazon : 28€ seulement pour la carte mémoire Micro-SD officielle Nintendo Switch\nLa Nintendo Switch est une excellente console, et les records de ventes ne disent certainement pas le contraire ! Cependant, par rapport à ses rivales, elle n’offre...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505280/coin-master-tours-spins-gratuits-et-pieces-gratuites-11-decembre-2021.htm', 'Coin Master : Tours (spins) gratuits et pièces gratuites 11 décembre 2021', ' Chaque jour, Coin Master vous propose de gagner des tours gratuits et des pièces gratuites en plus de ceux que vous pouvez débloquant en jouant et en avançant dans le jeu. Pour progresser plus rapidement et construire plus vite vos villages, pas de secret...', '2021-12-11', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505303/sony-officialise-l-acquisition-d-un-nouveau-studio-pour-developper-des-exclusivites-ps5.htm', 'Sony officialise l’acquisition d’un nouveau studio pour développer des excl', 'Jim Ryan nous avait prévenu, le développement de Sony Interactive Entertainment et des PlayStation Studios allait encore se poursuivre un bon moment ! Mais jusqu’à maintenant, difficile de réellement savoir sur quels studios la firme comptait jeter son...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505295/game-awards-2021-tout-ce-qu-il-faut-savoir-sur-sonic-film-et-jeu.htm', 'Game Awards 2021 : Tout ce qu’il faut savoir sur Sonic (film et jeu)', 'C’est une véritable histoire d’amour qu’a initié le véloce hérisson bleu avec les joueurs lorsqu’il est sorti un beau matin de 1991 sur les consoles Mega Drive de SEGA. Propulsé au rang d’icône, Sonic a fait les beaux jours de la firme nippone et il s’est...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504981/les-chaises-gaming-secret-lab-s-assoient-sur-les-prix-pour-noel.htm', 'Les chaises gaming Secret Lab s\'assoient sur les prix pour Noël ', 'C’est Noël chez SecretLab et les chaises gaming sont en promotion !\nC’est un grand coup que SecretLab fait en proposant des réductions sur l’ensemble de son catalogue ! Et avec des réductions qui vont jusqu’à -90€, c’est le moment d’investir dans un tout...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505275/lost-ark-le-mmo-free-to-play-qui-veut-detroner-final-fantasy-xiv-revele-sa-date-de-sortie-lors-des-game-awards.htm', 'Lost Ark : le MMO free-to-play qui veut détrôner Final Fantasy XIV révèle s', 'Lors de l’E3 2021, les développeurs coréens qui constituent les équipes de Smilegate avaient annoncé une merveilleuse nouvelle à tous les amateurs de MMO, et encore plus de MMORPG ! Sublime et très convaincant, Lost Ark n’avait pas eu de mal à rallier...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/1505210/planet-of-lana-poesie-aventure-et-puzzle.htm', 'Planet of Lana : poésie, aventure et puzzle', 'Planet of Lana était l&#039;un des surprises de l&#039;E3 2021. Avec sa direction artistique extrêmement prenante et poétique, il a su toucher le public. L&#039;opus a un air de Ghibli que l&#039;on aime voir à tout âge, synonyme de décors enchanteurs et personnages poignants....', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/1505031/monster-hunter-rise-nouveau-monstre-terrain-de-chasse-inedit-l-extension-sunbreak-se-devoile-un-peu-plus.htm', 'Monster Hunter Rise : nouveau monstre, terrain de chasse inédit, l\'extensio', 'L&#039;année prochaine, la communauté de Monster Hunter Rise aura l&#039;occasion de mettre les mains sur le DLC Sunbreak qui s&#039;annonce déjà prometteur ! Capcom le sait et prend un malin plaisir à introduire au compte-gouttes les futures créatures à chasser à travers...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505291/harry-potter-les-secrets-de-dumbledore-bientot-reveles-le-film-les-animaux-fantastiques-3-donne-rendez-vous-en-video.htm', 'Harry Potter : les Secrets de Dumbledore bientôt révélés ? Le film Les Anim', 'Revoir les trois acteurs emblématiques de la saga Harry Potter, à savoir Rupert Grint (Ron), Emma Watson (Hermione) et Daniel Radcliffe (Harry), enfin réunis autour d’une même table et vingt-ans après la sortie du premier volet dans les salles obscures...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/1504996/babylon-s-fall-se-demarque-avec-son-trailer-aux-game-awards-2021.htm', 'Babylon\'s Fall se démarque avec son trailer aux Game Awards 2021 ', 'Babylon&#039;s Fall a déjà eu une bêta fermée et le jeu signé Square Enix et PlatinumGames (Bayonetta) a été bien retravaillé depuis. Visiblement, le chantier est presque fini car aux Game Awards 2021, un nouveau trailer a été présenté accompagné d&#039;une date...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504968/donnez-un-coup-de-fouet-a-votre-vieux-pc-2-to-a-moins-de-150-avec-le-ssd-interne-samsung-qvo.htm', 'Donnez un coup de fouet à votre vieux PC : 2 To à moins de 150€ avec le SSD', 'Promotion sur le SSD Interne Samsung QVO 2 To chez Cdiscount\nFiabilité, discretion, vitesse de transfert de vos fichiers et surtout de temps de chargement (pour Windows comme pour vos jeux), les SSD surpassent sur l’ensemble des points les HDD traditionnels....', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505030/forspoken-date-de-sortie-dlc-trailer-le-jeu-impose-son-style-aux-game-awards-2021.htm', 'Forspoken : date de sortie, DLC, trailer, le jeu impose son style aux Game ', 'Forspoken, l’ex-Projet Athia\nLancer une toute nouvelle licence n’est jamais chose aisée mais Square-Enix se prête à l’exercice avec Forspoken, un jeu d’action-aventure AAA qui continue de se dévoiler progressivement. Petit rappel des faits : on y incarne...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505177/les-meilleures-offres-sur-les-pc-gamer-avec-rtx-approuvees-par-nvidia.htm', 'Les meilleures offres sur les PC gamer avec RTX (approuvées par Nvidia !)', 'PC portable et PC fixes en promo : ces 3 offres avec RTX 30XX sont recommandées par Nvidia\nAvant toute chose, nous nous devons de rappeler brièvement qui est Nvidia. Nividia, c&#039;est une entreprise américaine qui conçoit principalement des puces cartes...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504990/sonic-frontiers-decouvrez-le-monde-ouvert-pour-la-premiere-fois-avec-ce-trailer-des-game-awards-2021.htm', 'Sonic Frontiers : Découvrez le monde ouvert pour la première fois avec ce t', 'Le hérisson bleu était à l&#039;honneur lors des Game Awards 2021. En plus d&#039;un trailer pour le prochain film à son effigie, Sonic a eu l&#039;occasion de nous montrer le prochain jeu prévu par Sega et la Sonic Team : Sonic Frontiers. Le nouvel opus, qu&#039;on connaissait...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/chroniques/1505120/qui-sont-les-grands-gagnants-des-game-awards-2021.htm', 'Qui sont les grands gagnants des Game Awards 2021 ?', 'Les vainqueurs...et les vaincus\nLes Game Awards, c’est un peu les oscars du jeu vidéo. La cérémonie se déroule chaque année et on y récompense notamment le meilleur jeu de l’année. Cette année, le gagnant de ce grand titre n&#039;est autre que It Takes Two....', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504974/pubg-annonce-son-nouveau-modele-economique-pour-le-meilleur.htm', 'PUBG annonce son nouveau modèle économique, pour le meilleur ?', 'PUBG est presque déjà un classique, tant le titre de Krafton a marqué ces dernières années, devenant l&#039;un des étendards du genre battle-royale. Comme beaucoup de ses semblables, le jeu va passer free-to-play sur toutes les plateformes, le 12 janvier.\nFree...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504446/wartales-guide-astuces-et-conseils-pour-bien-debuter-votre-vie-de-mercenaire.htm', 'Wartales, guide : astuces et conseils pour bien débuter votre vie de mercen', 'h4\nBien choisir sa Troupe\nLe destin\nLorsque vous démarrez une nouvelle partie, le jeu vous demande de choisir votre destin. Vous avez le choix entre 5 options qui affecteront votre facilité à vous déplacer dans le monde :\n* Vos compagnons sont des amis...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505139/genshin-impact-preparez-l-arrivee-d-itto-et-gorou-les-ressources-necessaires-pour-les-faire-evoluer.htm', 'Genshin Impact, préparez l\'arrivée d\'Itto et Gorou : les ressources nécessa', 'Plus que quelques jours avant l&#039;arrivée d&#039;Itto et Gorou, les deux nouveaux personnages Géo de la version 2.3 de Genshin Impact. Vous avez peut-être déjà récupéré l&#039;équipement pour le(s) perso(s) de votre choix, mais vous pouvez également déjà tout farmer...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505171/legendes-pokemon-arceus-un-voltorbe-un-peu-special-rejoint-le-pokedex.htm', 'Légendes Pokémon Arceus : Un Voltorbe un peu spécial rejoint le Pokédex', 'Légendes Pokémon Arceus se déroulera à Hisui, autrement dit à Sinnoh dans une époque passée. Cette particularité nous permet de découvrir des Pokémons à la forme particulière, comme ce Voltorbe.\nLes formes de Pokémon\n Pokémon a introduit les Formes régionales...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504402/noel-voici-des-idees-cadeaux-parfaites-pour-offrir-a-un-geek.htm', 'Noël : voici des idées cadeaux parfaites pour offrir à un geek !  ', '-20% sur les Box et goodies chez Wootbox\nBox, figurines, t-shirts, accessoires et décorations, trouvez le cadeau idéal parmi une large sélection de produits à prix réduits !\nLa sélection Gaming\nLa sélection Manga\nLa sélection Super-héros\nToute commande...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504779/star-wars-eclipse-infos-histoire-periode-tout-savoir-sur-le-jeu-developpe-en-france.htm', 'Star Wars Eclipse : infos, histoire, période... Tout savoir sur le jeu déve', 'Le texte suivant est une retranscription du script de la vidéo\nStar Wars Eclipse, c’est quoi ?\nStar Wars Eclipse, c’est un jeu d’action-aventure développé par Quantic Dream qui vous proposera de vivre l’histoire de plusieurs personnages dans l’univers...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/chroniques/1504879/star-wars-eclipse-du-jamais-vu-pour-la-franchise.htm', 'Star Wars Eclipse : du jamais vu pour la franchise !', 'Pour rappel, Quantic Dream est le studio derrière Heavy Rain ou Detroit : Become Human. Vous l&#039;aurez donc compris, nous avons affaire à un spécialiste des jeux possédant une narration à embranchement. Toutefois, au vu des informations révélées par d&#039;autres...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1503563/genshin-impact-tout-savoir-sur-l-evenement-l-affaire-du-bantan-sango-le-chien-guerrier.htm', 'Genshin Impact, tout savoir sur l\'événement \"L\'affaire du Bantan Sango : Le', 'A peine le précédent événement terminé que le suivant est déjà sur le point d&#039;être disponible. L&#039;affaire du Bantan Sango : Le chien guerrier vous demandera d&#039;enquêter sur de mystérieuses disparitions... Alors n&#039;oubliez pas de récupérer vos 800 primo-gemmes...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505173/fortnite-chapitre-3-deja-un-reequilibrage-pour-les-armes-plus-appreciees-et-celles-les-plus-critiquees.htm', 'Fortnite Chapitre 3 : déjà un rééquilibrage pour les armes plus appréciées ', 'Le fusil d&#039;assaut Mark 7 de Fortnite Chapitre 3 moins fort au corps à corps, le Traqueur renforcé\nLe patch de rééquilibrage des armes et objets de Fortnite Chapitre 3 a été déployé ce vendredi après-midi, juste avant le week-end afin d&#039;offrir aux boucleurs...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505011/notre-avis-sur-geforce-now-la-facon-la-plus-economique-de-jouer-sur-une-rtx-3080-en-2021.htm', 'Notre avis sur GeForce Now : la façon la plus économique de jouer sur une R', 'Vous désespérez de jouer sur une carte graphique de dernière génération, sans avoir à hypothéquer votre appartement ? Vous cherchez en vain un bon plan pour une GeForce RTX à un prix décent ? Nvidia a peut-être une solution à laquelle vous ne vous attendiez...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1504857/game-awards-2021-nightingale-nouveau-jeu-de-survie-par-des-anciens-de-bioware-mass-effect-dragon-age.htm', 'Game Awards 2021 : Nightingale, nouveau jeu de survie par des anciens de Bi', 'Inflexion Games est un studio basé à Edmonton au Canada, et formé par des anciens de chez BioWare. Ouvert par Improbable - qui leur fournit IMS, des services aidant les développeurs à créer des jeux multijoueurs - Inflexion a développé Nightingale, un...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1503711/pokemon-diamant-etincelant-perle-scintillante-ou-et-comment-trouver-des-eclats-etranges-notre-guide.htm', 'Pokémon Diamant Étincelant / Perle Scintillante : Où et comment trouver des', 'Quelques nouveautés ont fait leur apparition dans Pokémon Diamant Étincelant et Perle Scintillante, en comparaison des volets sortis sur Nintendo DS. Parmi celles-ci, on dénombre notamment les Grands Souterrains et le Parc Rosa Rugosa. Beaucoup de légendaires...', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/videos/1505057/have-a-nice-death-la-mort-va-si-bien-a-ce-nouveau-roguelite-2d.htm', 'Have a Nice Death : la mort va si bien à ce nouveau roguelite 2D', 'Dans Have a Nice Death, vous incarnez la Mort, tout simplement. Votre quotidien à la tête de Death Incorporated, une multinationale spécialisée dans le traitement des âmes, commence à vous pousser à bout alors que vos employés n&#039;en font qu&#039;à leur tête....', '2021-12-10', 'https://www.jeuxvideo.com'),
('https://www.jeuxvideo.com/news/1505155/call-of-duty-warzone-pacific-gros-changements-sur-les-armes-decouvrez-le-premier-patch.htm', 'Call of Duty Warzone Pacific : gros changements sur les armes, découvrez le', 'Changements sur les snipers de Warzone Pacific\nQuand on parle de snipers qui dominent la méta depuis un petit moment, comment ne pas évoquer le Swiss K31 ? En effet, celui-ci est clairement en haut de la liste de tous les joueurs et la réduction du tressaillement...', '2021-12-10', 'https://www.jeuxvideo.com');

-- --------------------------------------------------------

--
-- Structure de la table `newswebsite`
--

DROP TABLE IF EXISTS `newswebsite`;
CREATE TABLE IF NOT EXISTS `newswebsite` (
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `french` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `newswebsite`
--

INSERT INTO `newswebsite` (`url`, `title`, `french`) VALUES
('https://www.jeuxvideo.com', ' jeuxvideo.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
