<h1>Code Google Analytics :</h1>

<table>
  <thead>
    <tr>
        <th>Code</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($google_analyticss as $google_analytics): ?>
    <tr>
      <td><a href="<?php echo url_for('google_analytics/edit?id='.$google_analytics->getId()) ?>" title="Editer le code"><?php echo $google_analytics->getCode() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="lien_google_analytics">
    Accéder à la page des statistiques enregistrées par Google Analytics :<br/>
    <a href="http://www.google.com/analytics/" target="_blank">Cliquez-ici</a>, puis connectez-vous avec le compte de Graine de vie.
</div>