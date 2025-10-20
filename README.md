# PIDV-WEB3A19

📖 Table des matières
Présentation

Fonctionnalités Clés

Modules

Technologies Utilisées

Installation

Structure du Projet

API & Services Intégrés

Contribution

Licence


🚀 Présentation
FreelanceConnect est une plateforme web innovante qui facilite la mise en relation entre freelances et clients. Développée avec Symfony, elle offre une solution complète pour :

Publier et trouver des missions

Gérer les candidatures

Suivre les projets

Résoudre les réclamations

Organiser des formations professionnelles


💡 Fonctionnalités Clés
✔ Interface intuitive avec tableau de bord personnalisé
✔ Système de matching intelligent entre compétences et besoins
✔ Notifications en temps réel
✔ Statistiques avancées pour freelances et clients
✔ Espace formation avec suivi de progression

🧩 Modules
📋 Gestion des Missions
Publication de missions détaillées

Recherche multicritère (compétences, budget, durée)

Système de favoris et alertes

✍️ Gestion des Candidatures
Dépôt de propositions avec portfolio

Suivi de l'état des candidatures

Messagerie intégrée

📢 Gestion des Publications
Modération des annonces

Mise en avant des meilleures offres

Historique des publications

⚠️ Gestion des Réclamations
Système de ticket

Priorisation des urgences

Suivi des résolutions

🎓 Gestion des Formations
Catalogue de formations

Inscription en ligne

Génération d'attestations


💻 Technologies Utilisées
Backend

Symfony 6.4

PHP 8.2

Doctrine ORM

Frontend

Bootstrap 5

JavaScript (ES6+)

Webpack Encore

Base de données

MySQL 8.0

Outils

Composer

Git

Docker (optionnel)

🛠️ Installation
Cloner le dépôt :

bash
git clone https://github.com/mou7eeeb/PIDV-WEB3A19.git
cd PIDV-WEB3A19
Installer les dépendances :

bash
composer install
yarn install
Configurer la base de données :

bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
Lancer l'application :

bash
symfony serve
yarn dev-server
Accédez à l'application sur http://localhost:8000

📂 Structure du Projet
FreelanceConnect/
├── assets/
├── bin/
├── config/
├── migrations/
├── public/
├── src/
│   ├── Controller/
│   ├── Entity/
│   ├── Form/
│   ├── Repository/
│   └── Service/
├── templates/
├── tests/
├── translations/
├── var/
└── vendor/
🔌 API & Services Intégrés
Service	Description
API Gemini AI 
Mailjet	Envoi d'emails transactionnels
Twilio	Notifications SMS
DumpPDF pour la géneration des PDF 
QRCode pour la géneration des QRCode
🤝 Contribution
Forkez le projet

Créez une branche :

bash
git checkout -b feature/nouvelle-fonctionnalite
Committez vos changements :

bash
git commit -m "Description des modifications"
Poussez vers GitHub :

bash
git push origin feature/nouvelle-fonctionnalite
Ouvrez une Pull Request

📜 Licence
Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

🙏 Remerciements
Projet réalisé dans le cadre du module Projet Technologies Web à ESPRIT School of Engineering, sous la supervision de [Nom du Professeur].

"Connecter les talents, créer des opportunités." 💫

✨ FreelanceConnect - Votre pont vers le freelancing professionnel !




















Description
FreelanceConnect est une plateforme web développée par 5 étudiants de 3A19 à ESPRIT. Elle met en relation des freelances et des clients via une interface simple et efficace. Le projet est réalisé avec Symfony, PHP, MySQL et JavaScript, et propose les fonctionnalités suivantes :

Gestion des missions et des candidatures

Gestion des publications

Gestion des réclamations

Gestion des formations

Table des Matières
Installation

Utilisation

Fonctionnalités

Technologies Utilisées

Contributions

Licence

Installation
Clonez le repository :

bash
git clone https://github.com/mou7eeeb/PIDV-WEB3A19.git
cd PIDV-WEB3A19-Mouheb-User
Configurez l'environnement :

Installez les dépendances avec Composer :

bash
composer install
Configurez la base de données dans le fichier .env et exécutez :

bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
Lancez le serveur Symfony :

bash
symfony serve
Accédez à la plateforme via http://localhost:8000.

Utilisation
Freelances : Créez un profil, postulez aux missions et gérez vos candidatures.

Employeurs : Publiez des missions, consultez les candidatures et gérez vos projets.

Administrateurs : Gérez les réclamations, les formations et les publications.

Fonctionnalités
Gestion des missions : Publication, recherche et candidature.

Gestion des candidatures : Suivi des candidatures et notifications.

Gestion des publications : Modération et mise en avant.

Gestion des réclamations : Traitement des signalements.

Gestion des formations : Proposition et suivi des formations.

Technologies Utilisées
Backend : Symfony, PHP

Base de données : MySQL

Frontend : JavaScript, HTML/CSS

Outils : Composer, Git

Contributions
Nous apprécions toutes les contributions ! Pour contribuer :

Forkez le projet.

Créez une branche pour votre fonctionnalité (git checkout -b feature/nouvelle-fonctionnalité).

Committez vos changements (git commit -m 'Ajout d'une nouvelle fonctionnalité').

Poussez vers la branche (git push origin feature/nouvelle-fonctionnalité).

Ouvrez une Pull Request.

Contributeurs

Mouheb Sayadi Gestion user 

Chiraz - Gestion des missions et candidatures

Moetaz - Gestion des publications

Roua - Gestion des réclamations

Adam - Gestion des formations

Licence
Ce projet est sous licence MIT. Pour plus de détails, consultez le fichier LICENSE.

Ce README fournit une documentation claire et complète pour votre projet FreelanceConnect, facilitant son utilisation et sa contribution.

