
<h1>
	Rdv accépté:
</h1>
<?php foreach ($rdvPris as $rdv): ?>
<?php
	if (count($rdv)==0){
		echo '<h1>vous n\'avez encore pris aucun rendez-vous<h1>';
	}
?>
<ul>

		<li>


			<h2>
				<?= html_escape($rdv['nomClient'] . ' ') ?>
			</h2>
			<span><?php html_escape($rdv['date']) ?></span>
			<span><?= html_escape($rdv['heure']) ?></span><i>  <?= html_escape($rdv['duree'])?></i>
			<span><a href="<?= base_url('entreprise/rdvEntrepriseController/annuler_rdv_controller') ?>">annuler RDV</a> </span>
		</li>
	<?php endforeach; ?>
</ul>
