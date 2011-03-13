<!--author: Laurent-->
<div id="sidebar">
    <ul id="menu">
        <li><a href="<?php echo url_for('@homepage') ?>">Accueil</a></li>
        <?php foreach ($categories as $category): ?>
            <li>
                <span><?php echo $category->getName() ?><span>&#x21E9;</span></span>
                <ul>
                    <li><a href="#">Page1</a></li>
                </ul>
            </li>
        <?php endforeach; ?>



<!--        <li>
            <span>Graine de vie<span>&#x21E9;</span></span>
            <ul>
                <li><a href="#">Qui sommes nous?</a></li>
                <li><a href="#">Statuts</a></li>
                <li><a href="#">Actualités</a></li>
                <li><a href="#">Téléchargements</a></li>
            </ul>
        </li>
        <li>
            <span>Notre engagement<span>&#x21E9;</span></span>
            <ul>
                <li><a href="#">L'empreinte écologique</a></li>
                <li><a href="#">Planter des arbres</a></li>
                <li><a href="#"> Combien d'arbres?</a></li>
            </ul>
        </li>
        <li>
            <span>Raison d'agir<span>&#x21E9;</span></span>
            <ul>
                <li><a href="#">Raison d'avoir peur</a></li>
                <li><a href="#">Raison d'espérer</a></li>
                <li><a href="#">Comment nous aider?</a></li>
            </ul>
        </li>
        <li>
            <span>Projet Madagascar<span>&#x21E9;</span></span>
            <ul>
                <li><a href="#">Pourquoi Madagascar?</a></li>
                <li><a href="#">CAP EST</a></li>
                <li><a href="#">Aide à la population locale</a></li>
                <li><a href="#">Formation de pépiniériste</a></li>
                <li><a href="#">Campagne de sensibilisation</a></li>
            </ul>
        </li>
        <li><a href="#">Ils ont dit!</a></li>
        <li><a href="#">Comment nous aider?</a></li>
        <li><a href="#">Contact</a></li>
    </ul>-->
</div>
