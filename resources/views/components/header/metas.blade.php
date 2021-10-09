<?php if (isset($runtime['resources']['metas'])): ?>
	<?php foreach ($runtime['resources']['metas'] as $key => $value): ?>
		<meta name="<?= $value['name'] ?>" content="<?= $value['content'] ?>" />
	<?php endforeach ?>
<?php endif ?>