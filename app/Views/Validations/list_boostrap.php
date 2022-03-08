<?php if (! empty($errors)) : ?>
	<div class="errors" role="alert">
		
		<?php foreach ($errors as $error) : ?>
			<div class="alert alert-danger"><?= esc($error) ?></li></div>
		<?php endforeach ?>
		
	</div>
<?php endif ?>