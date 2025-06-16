# Daily News Africa

Ce dépôt contient un exemple minimal de site d'actualités s'appuyant sur le thème **Understrap** de WordPress et un petit plugin pour importer automatiquement des articles via des flux RSS.

## Pré-requis

- Une installation WordPress fonctionnelle.
- Le thème parent [Understrap](https://understrap.com/) installé dans `wp-content/themes/understrap`.

## Installation

1. Copiez le dossier `wp-content/themes/dailynewsafrica-child` dans le dossier des thèmes de votre installation WordPress.
2. Activez le thème "DailyNewsAfrica Child" depuis l'administration WordPress.
3. Copiez le dossier `wp-content/plugins/dna-rss-aggregator` dans le dossier des plugins puis activez le plugin "DNA RSS Aggregator".
4. Modifiez la variable `$feeds` du plugin pour y renseigner les URL des flux RSS que vous souhaitez importer.

## Personnalisation

Le thème enfant hérite de tout le fonctionnement d'Understrap. Vous pouvez surcharger les fichiers de modèle (par exemple `header.php`, `footer.php` ou les gabarits d'archives) pour obtenir un rendu similaire à [numero.com](https://numero.com/). Ajoutez vos styles personnalisés dans `style.css` ou via un fichier SCSS.

## Fonctionnement de l'import

Le plugin planifie une tâche WordPress exécutée toutes les heures (`wp-cron`). Pour chaque flux RSS défini, les articles sont parcourus et, s'ils n'existent pas déjà (même titre), un nouvel article WordPress est créé.

N'oubliez pas de vérifier les conditions légales liées à la republication de contenus provenant d'autres sites.
