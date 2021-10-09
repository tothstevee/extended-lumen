<?php if (isset($runtime['resources']['styles'])): ?>
	<?php foreach ($runtime['resources']['styles'] as $key => $value): ?>
		<link rel="stylesheet" type="text/css" href="<?= $value ?>">
	<?php endforeach ?>
<?php endif ?>