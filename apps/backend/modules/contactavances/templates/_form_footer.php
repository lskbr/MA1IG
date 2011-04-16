<br />
<br />
Adresse mail de l'expediteur : <b><?php echo $message->getSender()->getEmailAddress();?></b>
<br />
Identité de l'expediteur (nom, prénom) : <b><?php echo $message->getSender()->getLastName()." ".$message->getSender()->getFirstName();?></b>
<br />
Date du premier mail de cette adresse :
<br />
Date du dernier mail de cette adresse :
<br />
Nombre total de mails envoyés depuis cette adresse :
<br />
Commentaire :
