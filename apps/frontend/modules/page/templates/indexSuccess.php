<?php 
slot('title', __('Bienvenue !'));

if(config::getInstance()->get('citation'))
  include_component('citation', 'citation');
?>

<div class="homepage_col1">
<h1>Le mot du président</h1>
<div class="president_speech">
<?php echo __('<p>En à peine deux siècles de révolution industrielle, l’homme est parvenu à détériorer, souvent de façon irréversible, son habitat, la Terre, résultat magnifique et fragile de millions d’années d’évolution.</p><p>
Nous sommes infiniment convaincus qu’il est temps d’agir, de réparer ce qui peut l’être et de préparer l’avenir pour que, lorsque l’Humanité aura progressé dans son évolution en organisant un monde plus conscient et moins injuste, la Terre soit encore en état de loger ses habitants.</p><p>
Aujourd’hui, notre planète s’essouffle car elle n’a plus les moyens naturels de compenser l’empreinte écologique de l’homme.</p><p>
Le seuil d’alerte est atteint. Les équilibres naturels se révèlent beaucoup plus fragiles que les hommes ne l’ont imaginé pendant des décennies. L’érosion de la biodiversité a atteint un niveau sans commune mesure avec l’histoire de la vie sur Terre.</p><p>
La destruction des forêts prend de telles proportions que, chaque année, plus de douze millions d’hectares de forêt disparaissent, soit une surface équivalente à quatre fois la superficie totale de la Belgique.<br/>
Plus personne ne peut ignorer ce constat implacable : la Terre a atteint un seuil de vulnérabilité sans précédent. Les dégâts sont désormais visibles à l’œil nu.</p><p>
Nous avons un devoir de solidarité vis-à-vis des générations suivantes. Nous devons accepter notre responsabilité écrasante dans la situation actuelle. Nous n’avons pas le droit de laisser à nos enfants comme seul héritage la gestion de nos manquements, comme nous leur abandonnons aujourd’hui nos déchets en tous genres. Si nous n’agissons pas, nous serons coupable de non-assistance à humanité en danger.');?>
<p class="sign"><?php echo __('Frédéric Debouche, Président de Graine de Vie.'); ?></p>
</div>

</div>
<div class="homepage_col2">
<?php
if(config::getInstance()->get('news'))
  include_component('news', 'news');
if(config::getInstance()->get('guestbook'))
  include_component('guestbook', 'guestbook');
?>
</div>

<div class="hompage_clear">
</div>
