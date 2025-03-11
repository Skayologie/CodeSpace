# **_< CodeSpace \/>_**

## Description
CodeSpace est une plateforme dédiée exclusivement aux développeurs, inspirée de Reddit. Elle permet aux utilisateurs de :
- Partager des idées
- Collaborer sur des projets
- Poser des questions techniques
- Établir des relations professionnelles

L'objectif est d’adapter les fonctionnalités clés de Reddit pour répondre aux besoins spécifiques des développeurs, tout en intégrant des options supplémentaires pour améliorer l’expérience utilisateur.

## Fonctionnalités
- **Publication & Discussion** : Les utilisateurs peuvent créer des posts et interagir via des commentaires.
- **Système de Vote** : Un système de vote similaire à Reddit permet de mettre en avant les meilleurs contenus.
- **Catégorisation** : Organisation des publications par thématique (langages, frameworks, outils, etc.).
- **Collaboration** : Possibilité de créer des groupes de travail et de collaborer sur des projets.
- **Messagerie** : Système de messagerie pour favoriser l’échange entre développeurs.
- **Notifications** : Alertes pour suivre les discussions et mises à jour importantes.

## Technologies Utilisées
- **Frontend** : HTML, CSS , Tailwind , JavaScript 
- **Backend** : Laravel (PHP)
- **Base de données** : MySQL
- **Authentification** : Gestion sécurisée des utilisateurs avec JWT ou OAuth
- **Templating** : Blade

## Installation
1. Cloner le dépôt :
   ```bash
   git clone https://github.com/Skayologie/CodeSpace.git
   ```
2. Se rendre dans le répertoire du projet :
   ```bash
   cd CodeSpace
   ```
3. Installer les dépendances :
   ```bash
   composer install
   npm install
   ```
4. Configurer l’environnement :
    - Copier le fichier `.env.example` en `.env`
    - Modifier les variables d’environnement (DB, mail, etc.)
   ```bash
   php artisan key:generate
   ```
5. Exécuter les migrations :
   ```bash
   php artisan migrate
   ```
6. Lancer le serveur :
   ```bash
   php artisan serve
   ```

## Contribution
Les contributions sont les bienvenues ! Merci de respecter les bonnes pratiques de développement et de soumettre vos PRs sur la branche `develop`.

