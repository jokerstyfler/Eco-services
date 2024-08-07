Procedure pour build le projet :
vous aurez besoin d'installer php 8.1 pour ne pas avoir de conflit
installer les composant: 
 - composer i
 - npm i

apres  la creation de la base de donnee sur phpmyadmin, lancer la migration des table et et les different enregistrement:
php artisan migrate:fresh : pour recréer toutes les tables en écrasant ce qui existe
php artisan db:seed  : pour executer le fichier de creation des donnee dans les tables 
liste des utilisateur creer en fonction de leurs role :
utilisateur admin
admin@gmail.com
admin
------------------
User simple:
user@gmail.com
user

lancer le projet:
php artisan serve
npm run dev 