<h1>Bienvenue, choisissez l'action que vous souhaitez réaliser</h1>
<?php
use_helper('Homepage');
echo homepageItem('Langues','Modifiez les langues du site','language','lang');
echo homepageItem('Langues','Ajouter une nouvelle langue','language_new','add_lang');
echo homepageItem('Configuration','Activez les différents modules du site','configuration','config');