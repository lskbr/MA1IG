<br />
<br />
Adresse mail de l'expediteur : <b><?php echo $message->getSender()->getEmailAddress();?></b>
<br />
Identité de l'expediteur (nom, prénom) : <b><?php echo $message->getSender()->getLastName()." ".$message->getSender()->getFirstName();?></b>
<br />
Date du premier mail de cette adresse : <b><?php echo $message->getSender()->getCorespondance()->getFirstMail();?></b>
<br />
Date du dernier mail de cette adresse : <b><?php echo $message->getSender()->getCorespondance()->getLastMail();?></b>
<br />
Nombre total de mails envoyés depuis cette adresse : <b><?php echo $message->getSender()->getCorespondance()->getNumberOfMail();?></b>