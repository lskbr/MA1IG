<center>
    <h1>Déleguer la réponse à </h1>
</center>
<ul>
<?php foreach($users as $user): ?>

    <li><a class="delegateTo" href="#" id="<?php echo $user->getPersonId(); ?>"><?php echo $user->getPerson()->getFirstName()." ".$user->getPerson()->getLastName(); ?></a></li>

<?php endforeach;?>
    <input type="hidden" class="delegateToMessageId" value="#">
</ul>