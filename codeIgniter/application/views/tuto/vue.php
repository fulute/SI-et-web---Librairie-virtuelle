<h1>Bonjour</h1>

<p>
    Ceci est mon paragraphe !
</p>

<p>
    Votre pseudo est <?php echo $pseudo; ?>.
</p>

<p>
    Votre email est <?php echo $email; ?>.
</p>

<p>
<?php if($en_ligne): ?>
    Vous �tes en ligne.
<?php else: ?>
    Vous n'�tes pas en ligne.
<?php endif; ?>
</p>