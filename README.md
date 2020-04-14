## Batimat Test Technique : Dan Teddy Ngossinga

Cette application fait office de test technique pour le développement fullstack Laravel / VueJS

#Version utilisée

Laravel v7

#Requis
- Composer
- NodeJs
- Une base de données relationnelles, de préférences MySQL, MariaDB ou PostgreSQL
- Un serveur capable de faire tourner Laravel v7

#Installation

- Lancer la commande ``composer install``, en supposant que vous avez installé la commande Composer de façon globale
- Lancer la commande ``npm install``, en supposant que vous avez déjà installé NodeJs
- Créer un fichier .env (prenez exemple du fichier .env.example)
- Lancer la commande ``php artisan key:generate``
- Entrer les informations de la base de données (DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_HOST, DB_PORT, DB_CONNECTION)
- Lancer la commande ``php artisan migrate`` pour créer les tables dans la base de données (s'assurer d'avoir rempli le bon nom de la base de données)
- Lancer la commande ``composer dump-autoload`` pour regénérer le fichier autoloader de composer
- Lancer la commande ``php artisan db:seed`` pour créer l'utilisateur factice (email: email@gmail.com / mot de passe: password)


