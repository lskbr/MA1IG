<h1>Bienvenue, choisissez l'action que vous souhaitez réaliser</h1>
<?php
use_helper('Homepage');
echo homepageItem('Langues','Modifiez les langues du site','language','lang'); //'Nom A Afficher', 'Description', 'route', 'Nom de l'image dans le répertoire web/images/icons/****.png'
echo homepageItem('Langues','Ajoutez une nouvelle langue','language_new','add_lang');
echo homepageItem('Configuration','Activez les différents modules du site','configuration','config');
echo homepageItem('Catégories', 'Gestion des catégories du menu', 'category');