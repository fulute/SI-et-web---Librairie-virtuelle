<!--<form method="post" action="">
	<label for="pseudo">Pseudo : </label>
	<input type="text" name="pseudo" value="" />

	<label for="mdp">Mot de passe :</label>
	<input type="password" name="mdp" value="" />

	<input type="submit" value="Envoyer" />
</form>-->

<form method="post" action="">
	<label for="pseudo">Pseudo : </label>
	<input type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>" />
	<?php echo form_error('pseudo'); ?>

	<label for="mdp">Mot de passe :</label>
	<input type="password" name="mdp" value="" />
	<?php echo form_error('mdp'); ?>

	<input type="submit" value="Envoyer" />
</form>