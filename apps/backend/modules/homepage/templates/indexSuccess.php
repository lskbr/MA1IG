<h1>Bienvenue, choisissez l'action que vous souhaitez réaliser</h1>
<?php
use_helper('Homepage');
echo homepageItem('Configuration','Activer les différents modules du site','configuration','config');
echo homepageItem('Langues','Modifier les langues du site','language','lang'); //'Nom A Afficher', 'Description', 'route', 'Nom de l'image dans le répertoire web/images/icons/****.png'
echo homepageItem('Langues','Ajouter une nouvelle langue','language_new','add_lang');
echo homepageItem('Actualités','Gérer les actualités publiées sur la page d\'acceuil','news','news');
echo homepageItem('Catégories', 'Modifier des catégories du menu', 'category', 'category');
echo homepageItem('Catégories', 'Ajouter une catégorie au menu', 'category_new', 'add_category');
echo homepageItem('Utilisateurs', 'Gestion des utilisateurs du site Internet', 'sf_guard_user', 'user');
echo homepageItem('Utilisateurs', 'Ajouter manuellement un utilisateur', 'sf_guard_user_add', 'add_user');
echo homepageItem('Groupes', 'Gestion des différents groupes d\'utilisateurs', 'sf_guard_group', 'group');
echo homepageItem('Droits', 'Gestion des différents droits', 'sf_guard_permission', 'permission');
echo homepageItem('Gestion des pages', 'Gestion des pages et de leurs contenu', 'static_page', 'staticpage');
echo homepageItem('Ajouter une page', 'Ajout d\'une page au site internet', 'static_page_new', 'add_staticpage');
echo homepageItem('Compteur d\'arbres', 'Modifer le compteur', 'counter', 'counter');
echo homepageItem('Livre d\'or', 'Valider les messages du livre d\'or', 'guestbook', 'guestbook');
echo homepageItem('Liste des FAQ', 'Afficher la liste des questions fréquemment posées', 'faq', 'faq','faq');
echo homepageItem('Ajouter une FAQ', 'Ajout d\'une FAQ', 'faq_new', 'add_faq','faq');
echo homepageItem('Liste des citations', 'Afficher la liste des citations', 'citation', 'quote-left','citation');
echo homepageItem('Ajouter une citation', 'Ajout d\'une citation', 'citation_new', 'add_quote-left','citation');
echo homepageItem('Liste des partenaires', 'Afficher la liste des partenaires', 'partner', 'partner','partner');
echo homepageItem('Ajouter un partenaire', 'Ajout d\'un partenaire', 'partner_new', 'add_partner','partner');
echo homepageItem('Livre d\'or', 'Valider les messages du livre d\'or', 'guestbook', 'guestbook','guestbook');
echo homepageItem('Livre d\'or', 'Ajouter un message dans le livre d\'or', 'guestbook_new', 'add_guestbook','guestbook');

