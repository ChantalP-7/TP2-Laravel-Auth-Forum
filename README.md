Tp1 cadriciel Laravel

Première partie : 

Créer une base de données avec deux tables, étudiants et villes. Les villes peuvent avoir plusieurs étudiants et les étudiants appartiennent à une seule ville.

Création du projet laravel avec composer : reseauMaisonneuve. Une fois dans le dossier créé, ajout du controller avec la commande php artisan make::controller

Ajout de controller etudiant et ville avec la même commande adaptée

Avec les lignes de commandes, je crée les fichiers de migration des étudiants et villes dans migrations, leurs dossiers dans factories pour permettre ensuite de générer des données aléatoires qui seront ajoutées dans nos tables sql avec la commande tinker.

Création des routes, modèles, vues etc.