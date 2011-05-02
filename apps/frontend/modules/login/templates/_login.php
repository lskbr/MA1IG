<?php if ($authenticated): ?>
<ul>
    <li>
        <span id="connected-bar-button">
            <?php echo '<span style="font-weight: normal">'.__('Connecté').' :</span> '.$sf_user->getName() ?>
            <?php echo link_to('<img src="/images/img_vide.gif" width=16 height=16/>', '@sf_guard_logout', array('title'=>'Déconnexion')) ?>
        </span>
    </li>
</ul>

<!-- Préchargement des images -->
<img src="/images/disconnection.png" style="display: none"/>
<img src="/images/disconnection-hover.png" style="display: none"/>
<?php else: ?>
<ul>
    <li><a id="login-bar-button" href="<?php echo url_for('@sf_guard_auth_signin') ?>"><?php echo __("Se connecter") ?></a></li>
    <li><span>|</span></li>
    <li><a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __("S'inscrire") ?></a></li>
</ul>
<?php endif; ?>