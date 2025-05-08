# PIDV-WEB3A19
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
Chiraz - Gestion des missions et candidatures

Moetaz - Gestion des publications

Roua - Gestion des réclamations

Adam - Gestion des formations

Licence
Ce projet est sous licence MIT. Pour plus de détails, consultez le fichier LICENSE.

Ce README fournit une documentation claire et complète pour votre projet FreelanceConnect, facilitant son utilisation et sa contribution.

