<h1>Bienvenue, choisissez l'action que vous souhaitez réaliser</h1>
<?php
use_helper('Homepage');
echo homepageItem('Langues','Modifier les langues du site','language','lang'); //'Nom A Afficher', 'Description', 'route', 'Nom de l'image dans le répertoire web/images/icons/****.png'
echo homepageItem('Langues','Ajouter une nouvelle langue','language_new','add_lang');
echo homepageItem('Configuration','Activer les différents modules du site','configuration','config');
echo homepageItem('Catégories', 'Modifier des catégories du menu', 'category', 'category');
echo homepageItem('Catégories', 'Ajouter une catégorie au menu', 'category_new', 'add_category');